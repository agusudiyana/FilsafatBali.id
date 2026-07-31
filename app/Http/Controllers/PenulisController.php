<?php

namespace App\Http\Controllers;

use App\Models\Ajaran;
use App\Models\Cecimpedan;
use App\Models\Satua;
use App\Models\Istilah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenulisController extends Controller
{
    /**
     * Dashboard Penulis
     */
    public function index()
    {
        $userId = auth()->id();

        // 1. Hitung total per kategori khusus milik penulis yang sedang login
        $totalArtikel    = Ajaran::where('user_id', $userId)->count();
        $totalCecimpedan = Cecimpedan::where('user_id', $userId)->count();
        $totalSatua      = Satua::where('user_id', $userId)->count();
        $totalIstilah    = Istilah::where('user_id', $userId)->count();

        // Total seluruh kiriman
        $total = $totalArtikel + $totalCecimpedan + $totalSatua + $totalIstilah;

        // Total pending
        $pending =
            Ajaran::where('user_id', $userId)->where('status', 'pending')->count() +
            Cecimpedan::where('user_id', $userId)->where('status', 'pending')->count() +
            Satua::where('user_id', $userId)->where('status', 'pending')->count() +
            Istilah::where('user_id', $userId)->where('status', 'pending')->count();

        // Total disetujui / published
        $disetujui =
            Ajaran::where('user_id', $userId)->whereIn('status', ['disetujui', 'published'])->count() +
            Cecimpedan::where('user_id', $userId)->whereIn('status', ['disetujui', 'published'])->count() +
            Satua::where('user_id', $userId)->whereIn('status', ['disetujui', 'published'])->count() +
            Istilah::where('user_id', $userId)->whereIn('status', ['disetujui', 'published'])->count();

        // Total ditolak / revisi
        $ditolak =
            Ajaran::where('user_id', $userId)->whereIn('status', ['ditolak', 'revisi'])->count() +
            Cecimpedan::where('user_id', $userId)->whereIn('status', ['ditolak', 'revisi'])->count() +
            Satua::where('user_id', $userId)->whereIn('status', ['ditolak', 'revisi'])->count() +
            Istilah::where('user_id', $userId)->whereIn('status', ['ditolak', 'revisi'])->count();

        // 2. Ambil karya dari setiap model, petakan atribut agar konsisten, lalu gabungkan
        $artikels = Ajaran::where('user_id', $userId)->get()->map(function ($item) {
            $item->tipe = 'Artikel';
            $item->judul = $item->judul ?? $item->title ?? '-';
            $item->kategori = $item->kategori ?? 'Ajaran Tetua';
            return $item;
        });

        $cecimpedans = Cecimpedan::where('user_id', $userId)->get()->map(function ($item) {
            $item->tipe = 'Cecimpedan';
            $item->judul = $item->teks ?? $item->pertanyaan ?? $item->judul ?? '-';
            $item->kategori = $item->asal ?? 'Teka-Teki';
            return $item;
        });

        $satuas = Satua::where('user_id', $userId)->get()->map(function ($item) {
            $item->tipe = 'Satua';
            $item->judul = $item->nama ?? $item->judul ?? '-';
            $item->kategori = $item->asal ?? 'Satua Bali';
            return $item;
        });

        $istilahs = Istilah::where('user_id', $userId)->get()->map(function ($item) {
            $item->tipe = 'Istilah';
            $item->judul = $item->istilah ?? $item->judul ?? '-';
            $item->kategori = $item->kategori ?? 'Istilah Bali';
            return $item;
        });

        // Combine all collections, order by created_at descending, and take the top 5
        $recentItems = $artikels->concat($cecimpedans)
            ->concat($satuas)
            ->concat($istilahs)
            ->sortByDesc('created_at')
            ->take(5);

        return view('penulis.dashboard', compact(
            'total',
            'pending',
            'disetujui',
            'ditolak',
            'totalArtikel',
            'totalCecimpedan',
            'totalSatua',
            'totalIstilah',
            'recentItems'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | MANAJEMEN ARTIKEL / AJARAN
    |--------------------------------------------------------------------------
    */

    public function artikelIndex(Request $request)
    {
        $kategori = $request->query('kategori', 'semua');
        $userId = auth()->id();

        $query = Ajaran::where('user_id', $userId);

        if ($kategori && strtolower($kategori) !== 'semua') {
            $query->whereRaw('LOWER(kategori) = ?', [strtolower($kategori)]);
        }

        $artikels = $query->latest()->get();

        return view('penulis.artikel.index', compact('artikels', 'kategori'));
    }

    public function create()
    {
        return view('penulis.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'isi' => 'required',
            'kesimpulan' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('artikel', 'public');
        }

        Ajaran::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'penulis' => auth()->user()->name,
            'isi' => $request->isi,
            'kesimpulan' => $request->kesimpulan,
            'gambar' => $gambar,
            'status' => 'pending',
            'user_id' => auth()->id(),
        ]);

        return redirect()
            ->route('penulis.artikel.index')
            ->with('success', 'Artikel berhasil dikirim dan menunggu verifikasi admin.');
    }

    public function edit($id)
    {
        $ajaran = Ajaran::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('penulis.artikel.edit', compact('ajaran'));
    }

    public function update(Request $request, $id)
    {
        $ajaran = Ajaran::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'isi' => 'required',
            'kesimpulan' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = $ajaran->gambar;

        if ($request->hasFile('gambar')) {
            if ($ajaran->gambar && Storage::disk('public')->exists($ajaran->gambar)) {
                Storage::disk('public')->delete($ajaran->gambar);
            }
            $gambar = $request->file('gambar')->store('artikel', 'public');
        }

        $ajaran->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'isi' => $request->isi,
            'kesimpulan' => $request->kesimpulan,
            'gambar' => $gambar,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('penulis.artikel.index')
            ->with('success', 'Data artikel berhasil diperbarui dan menunggu verifikasi admin.');
    }

    public function destroy($id)
    {
        $ajaran = Ajaran::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($ajaran->gambar && Storage::disk('public')->exists($ajaran->gambar)) {
            Storage::disk('public')->delete($ajaran->gambar);
        }

        $ajaran->delete();

        return redirect()
            ->route('penulis.artikel.index')
            ->with('success', 'Data artikel berhasil dihapus.');
    }

    /*
    |--------------------------------------------------------------------------
    | MANAJEMEN SATUA BALI
    |--------------------------------------------------------------------------
    */

    public function satuaIndex()
    {
        $satuas = Satua::where('user_id', auth()->id())->latest()->get();
        return view('penulis.satua.index', compact('satuas'));
    }

    public function satuaCreate()
    {
        return view('penulis.satua.create');
    }

    public function satuaStore(Request $request)
    {
        $request->validate([
            'judul'      => 'required|string|max:255',
            'sub_judul'  => 'nullable|string|max:255',
            'subtitle'   => 'nullable|string|max:255',
            'asal'       => 'nullable|string|max:255',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'ringkasan'  => 'nullable|string',
            'isi'        => 'required|string',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('satua', 'public');
        }

        Satua::create([
            'user_id'   => auth()->id(),
            'judul'     => $request->judul,
            'sub_judul' => $request->input('sub_judul') ?? $request->input('subtitle'),
            'asal'      => $request->input('asal') ?? 'Bali',
            'gambar'    => $gambar,
            'ringkasan' => $request->input('ringkasan') ?? $request->input('ringkasan_cerita'),
            'isi'       => $request->isi,
            'tokoh'     => $request->input('tokoh') ?? $request->input('tokoh_utama'),
            'alur'      => $request->input('alur') ?? $request->input('alur_cerita'),
            'moral'     => $request->input('moral') ?? $request->input('nilai_moral'),
            'filosofi'  => $request->input('filosofi') ?? $request->input('pesan_filosofi'),
            'status'    => 'pending',
        ]);

        return redirect()
            ->route('penulis.satua.index')
            ->with('success', 'Karya Satua Bali berhasil disimpan dan menunggu verifikasi.');
    }

    public function satuaEdit($id)
    {
        $satua = Satua::findOrFail($id);

        return view('penulis.satua.edit', compact('satua'));
    }

    public function satuaUpdate(Request $request, $id)
    {
        $satua = Satua::findOrFail($id);

        $request->validate([
            'judul'      => 'required|string|max:255',
            'sub_judul'  => 'nullable|string|max:255',
            'subtitle'   => 'nullable|string|max:255',
            'asal'       => 'nullable|string|max:255',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'ringkasan'  => 'nullable|string',
            'isi'        => 'required|string',
        ]);

        $gambar = $satua->gambar;
        if ($request->hasFile('gambar')) {
            if ($satua->gambar && Storage::disk('public')->exists($satua->gambar)) {
                Storage::disk('public')->delete($satua->gambar);
            }
            $gambar = $request->file('gambar')->store('satua', 'public');
        }

        $satua->update([
            'judul'     => $request->judul,
            'sub_judul' => $request->input('sub_judul') ?? $request->input('subtitle'),
            'asal'      => $request->input('asal') ?? 'Bali',
            'gambar'    => $gambar,
            'ringkasan' => $request->input('ringkasan') ?? $request->input('ringkasan_cerita'),
            'isi'       => $request->isi,
            'tokoh'     => $request->input('tokoh') ?? $request->input('tokoh_utama'),
            'alur'      => $request->input('alur') ?? $request->input('alur_cerita'),
            'moral'     => $request->input('moral') ?? $request->input('nilai_moral'),
            'filosofi'  => $request->input('filosofi') ?? $request->input('pesan_filosofi'),
            'status'    => 'pending',
        ]);

        return redirect()
            ->route('penulis.satua.index')
            ->with('success', 'Karya Satua Bali berhasil diperbarui.');
    }

    public function satuaDestroy($id)
    {
        $satua = Satua::findOrFail($id);

        if ($satua->gambar && Storage::disk('public')->exists($satua->gambar)) {
            Storage::disk('public')->delete($satua->gambar);
        }

        $satua->delete();

        return redirect()
            ->route('penulis.satua.index')
            ->with('success', 'Karya Satua Bali berhasil dihapus.');
    }

    /*
    |--------------------------------------------------------------------------
    | RIWAYAT SEMUA KIRIMAN
    |--------------------------------------------------------------------------
    */

    public function riwayat()
    {
        $ajaran     = Ajaran::where('user_id', auth()->id())->latest()->get();
        $cecimpedan = Cecimpedan::where('user_id', auth()->id())->latest()->get();
        $satua      = Satua::where('user_id', auth()->id())->latest()->get();
        $istilah    = Istilah::where('user_id', auth()->id())->latest()->get();

        return view('penulis.riwayat.index', compact(
            'ajaran',
            'cecimpedan',
            'satua',
            'istilah'
        ));
    }
}