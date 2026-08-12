<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Filsafat;
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
        $totalArtikel    = Artikel::where('user_id', $userId)->count();
        $totalFilsafat   = Filsafat::where('user_id', $userId)->count();
        $totalCecimpedan = Cecimpedan::where('user_id', $userId)->count();
        $totalSatua      = Satua::where('user_id', $userId)->count();
        $totalIstilah    = Istilah::where('user_id', $userId)->count();

        // Total seluruh kiriman
        $total = $totalArtikel + $totalFilsafat + $totalCecimpedan + $totalSatua + $totalIstilah;

        // Total pending
        $pending =
            Artikel::where('user_id', $userId)->where('status', 'pending')->count() +
            Filsafat::where('user_id', $userId)->where('status', 'pending')->count() +
            Cecimpedan::where('user_id', $userId)->where('status', 'pending')->count() +
            Satua::where('user_id', $userId)->where('status', 'pending')->count() +
            Istilah::where('user_id', $userId)->where('status', 'pending')->count();

        // Total disetujui / published
        $disetujui =
            Artikel::where('user_id', $userId)->whereIn('status', ['disetujui', 'published'])->count() +
            Filsafat::where('user_id', $userId)->whereIn('status', ['disetujui', 'published'])->count() +
            Cecimpedan::where('user_id', $userId)->whereIn('status', ['disetujui', 'published'])->count() +
            Satua::where('user_id', $userId)->whereIn('status', ['disetujui', 'published'])->count() +
            Istilah::where('user_id', $userId)->whereIn('status', ['disetujui', 'published'])->count();

        // Total ditolak / revisi
        $ditolak =
            Artikel::where('user_id', $userId)->whereIn('status', ['ditolak', 'revisi'])->count() +
            Filsafat::where('user_id', $userId)->whereIn('status', ['ditolak', 'revisi'])->count() +
            Cecimpedan::where('user_id', $userId)->whereIn('status', ['ditolak', 'revisi'])->count() +
            Satua::where('user_id', $userId)->whereIn('status', ['ditolak', 'revisi'])->count() +
            Istilah::where('user_id', $userId)->whereIn('status', ['ditolak', 'revisi'])->count();

        // 2. Ambil karya dari setiap model
        $artikels = Artikel::where('user_id', $userId)->get()->map(function ($item) {
            $item->tipe = 'Artikel';
            $item->judul = $item->judul ?? $item->title ?? '-';
            $item->kategori = $item->kategori ?? 'Ajaran Tetua';
            return $item;
        });

        $filsafats = Filsafat::where('user_id', $userId)->get()->map(function ($item) {
            $item->tipe = 'Filsafat';
            $item->judul = $item->judul ?? '-';
            $item->kategori = $item->kategori ?? 'Filsafat Bali';
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

        $recentItems = $artikels->concat($filsafats)
            ->concat($cecimpedans)
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
            'totalFilsafat',
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

        $query = Artikel::where('user_id', $userId);

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

        Artikel::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'penulis' => auth()->user()->name,
            'isi' => $request->isi,
            'kesimpulan' => $request->kesimpulan,
            'gambar' => $gambar,
            'status' => 'pending',
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('penulis.artikel.index')
            ->with('success', 'Artikel berhasil dikirim dan menunggu verifikasi admin.');
    }

    public function edit($id)
    {
        $artikel = Artikel::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('penulis.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'isi' => 'required',
            'kesimpulan' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = $artikel->gambar;
        if ($request->hasFile('gambar')) {
            if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            $gambar = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'isi' => $request->isi,
            'kesimpulan' => $request->kesimpulan,
            'gambar' => $gambar,
            'status' => 'pending',
        ]);

        return redirect()->route('penulis.artikel.index')
            ->with('success', 'Data artikel berhasil diperbarui dan menunggu verifikasi admin.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        return redirect()->route('penulis.artikel.index')
            ->with('success', 'Data artikel berhasil dihapus.');
    }

    /*
    |--------------------------------------------------------------------------
    | MANAJEMEN FILSAFAT BALI
    |--------------------------------------------------------------------------
    */

    public function filsafatIndex()
    {
        $filsafats = Filsafat::where('user_id', auth()->id())->latest()->get();
        return view('penulis.filsafat.index', compact('filsafats'));
    }

    public function filsafatCreate()
    {
        return view('penulis.filsafat.create');
    }

    public function filsafatStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'isi' => 'required|string',
            'makna' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('filsafat', 'public');
        }

        Filsafat::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'kategori' => $request->kategori ?? 'Filsafat Bali',
            'isi' => $request->isi,
            'makna' => $request->makna,
            'gambar' => $gambar,
            'status' => 'pending',
        ]);

        return redirect()->route('penulis.filsafat.index')
            ->with('success', 'Karya Filsafat Bali berhasil disimpan dan menunggu verifikasi.');
    }

    public function filsafatEdit($id)
    {
        $filsafat = Filsafat::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('penulis.filsafat.edit', compact('filsafat'));
    }

    public function filsafatUpdate(Request $request, $id)
    {
        $filsafat = Filsafat::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'isi' => 'required|string',
            'makna' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = $filsafat->gambar;
        if ($request->hasFile('gambar')) {
            if ($filsafat->gambar && Storage::disk('public')->exists($filsafat->gambar)) {
                Storage::disk('public')->delete($filsafat->gambar);
            }
            $gambar = $request->file('gambar')->store('filsafat', 'public');
        }

        $filsafat->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori ?? 'Filsafat Bali',
            'isi' => $request->isi,
            'makna' => $request->makna,
            'gambar' => $gambar,
            'status' => 'pending',
        ]);

        return redirect()->route('penulis.filsafat.index')
            ->with('success', 'Karya Filsafat Bali berhasil diperbarui.');
    }

    public function filsafatDestroy($id)
    {
        $filsafat = Filsafat::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        if ($filsafat->gambar && Storage::disk('public')->exists($filsafat->gambar)) {
            Storage::disk('public')->delete($filsafat->gambar);
        }

        $filsafat->delete();

        return redirect()->route('penulis.filsafat.index')
            ->with('success', 'Karya Filsafat Bali berhasil dihapus.');
    }

    /*
    |--------------------------------------------------------------------------
    | MANAJEMEN CECIMPEDAN
    |--------------------------------------------------------------------------
    */

    public function cecimpedanIndex()
    {
        $cecimpedans = Cecimpedan::where('user_id', auth()->id())->latest()->get();
        return view('penulis.cecimpedan.index', compact('cecimpedans'));
    }

    public function cecimpedanCreate()
    {
        return view('penulis.cecimpedan.create');
    }

    public function cecimpedanStore(Request $request)
    {
        $request->validate([
            'teks' => 'required|string',
            'jawaban' => 'required|string|max:255',
            'penjelasan' => 'nullable|string',
        ]);

        Cecimpedan::create([
            'user_id' => auth()->id(),
            'teks' => $request->teks,
            'jawaban' => $request->jawaban,
            'penjelasan' => $request->penjelasan,
            'status' => 'pending',
        ]);

        return redirect()->route('penulis.cecimpedan.index')
            ->with('success', 'Cecimpedan berhasil disimpan dan menunggu verifikasi.');
    }

    public function cecimpedanEdit($id)
    {
        $cecimpedan = Cecimpedan::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('penulis.cecimpedan.edit', compact('cecimpedan'));
    }

    public function cecimpedanUpdate(Request $request, $id)
    {
        $cecimpedan = Cecimpedan::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $request->validate([
            'teks' => 'required|string',
            'jawaban' => 'required|string|max:255',
            'penjelasan' => 'nullable|string',
        ]);

        $cecimpedan->update([
            'teks' => $request->teks,
            'jawaban' => $request->jawaban,
            'penjelasan' => $request->penjelasan,
            'status' => 'pending',
        ]);

        return redirect()->route('penulis.cecimpedan.index')
            ->with('success', 'Cecimpedan berhasil diperbarui.');
    }

    public function cecimpedanDestroy($id)
    {
        $cecimpedan = Cecimpedan::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $cecimpedan->delete();

        return redirect()->route('penulis.cecimpedan.index')
            ->with('success', 'Cecimpedan berhasil dihapus.');
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

        return redirect()->route('penulis.satua.index')
            ->with('success', 'Karya Satua Bali berhasil disimpan dan menunggu verifikasi.');
    }

    public function satuaEdit($id)
    {
        $satua = Satua::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('penulis.satua.edit', compact('satua'));
    }

    public function satuaUpdate(Request $request, $id)
    {
        $satua = Satua::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $request->validate([
            'judul'      => 'required|string|max:255',
            'sub_judul'  => 'nullable|string|max:255',
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

        return redirect()->route('penulis.satua.index')
            ->with('success', 'Karya Satua Bali berhasil diperbarui.');
    }

    public function satuaDestroy($id)
    {
        $satua = Satua::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        if ($satua->gambar && Storage::disk('public')->exists($satua->gambar)) {
            Storage::disk('public')->delete($satua->gambar);
        }

        $satua->delete();

        return redirect()->route('penulis.satua.index')
            ->with('success', 'Karya Satua Bali berhasil dihapus.');
    }

    /*
    |--------------------------------------------------------------------------
    | MANAJEMEN ISTILAH BALI
    |--------------------------------------------------------------------------
    */

    public function istilahIndex()
    {
        $istilahs = Istilah::where('user_id', auth()->id())->latest()->get();
        return view('penulis.istilah.index', compact('istilahs'));
    }

    public function istilahCreate()
    {
        return view('penulis.istilah.create');
    }

    public function istilahStore(Request $request)
    {
        $request->validate([
            'istilah' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'arti' => 'required|string',
            'contoh_kalimat' => 'nullable|string',
        ]);

        Istilah::create([
            'user_id' => auth()->id(),
            'istilah' => $request->istilah,
            'kategori' => $request->kategori ?? 'Istilah Bali',
            'arti' => $request->arti,
            'contoh_kalimat' => $request->contoh_kalimat,
            'status' => 'pending',
        ]);

        return redirect()->route('penulis.istilah.index')
            ->with('success', 'Istilah Bali berhasil disimpan dan menunggu verifikasi.');
    }

    public function istilahEdit($id)
    {
        $istilah = Istilah::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('penulis.istilah.edit', compact('istilah'));
    }

    public function istilahUpdate(Request $request, $id)
    {
        $istilah = Istilah::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $request->validate([
            'istilah' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'arti' => 'required|string',
            'contoh_kalimat' => 'nullable|string',
        ]);

        $istilah->update([
            'istilah' => $request->istilah,
            'kategori' => $request->kategori ?? 'Istilah Bali',
            'arti' => $request->arti,
            'contoh_kalimat' => $request->contoh_kalimat,
            'status' => 'pending',
        ]);

        return redirect()->route('penulis.istilah.index')
            ->with('success', 'Istilah Bali berhasil diperbarui.');
    }

    public function istilahDestroy($id)
    {
        $istilah = Istilah::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $istilah->delete();

        return redirect()->route('penulis.istilah.index')
            ->with('success', 'Istilah Bali berhasil dihapus.');
    }

    /*
    |--------------------------------------------------------------------------
    | RIWAYAT SEMUA KIRIMAN
    |--------------------------------------------------------------------------
    */

    public function riwayat()
    {
        $artikel    = Artikel::where('user_id', auth()->id())->latest()->get();
        $filsafat   = Filsafat::where('user_id', auth()->id())->latest()->get();
        $cecimpedan = Cecimpedan::where('user_id', auth()->id())->latest()->get();
        $satua      = Satua::where('user_id', auth()->id())->latest()->get();
        $istilah    = Istilah::where('user_id', auth()->id())->latest()->get();

        return view('penulis.riwayat.index', compact(
            'artikel',
            'filsafat',
            'cecimpedan',
            'satua',
            'istilah'
        ));
    }
}