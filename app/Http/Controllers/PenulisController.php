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
        // Total seluruh kiriman
        $total =
            Ajaran::where('user_id', auth()->id())->count() +
            Cecimpedan::where('user_id', auth()->id())->count() +
            Satua::where('user_id', auth()->id())->count() +
            Istilah::where('user_id', auth()->id())->count();

        // Total pending
        $pending =
            Ajaran::where('user_id', auth()->id())->where('status', 'pending')->count() +
            Cecimpedan::where('user_id', auth()->id())->where('status', 'pending')->count() +
            Satua::where('user_id', auth()->id())->where('status', 'pending')->count() +
            Istilah::where('user_id', auth()->id())->where('status', 'pending')->count();

        // Total disetujui
        $disetujui =
            Ajaran::where('user_id', auth()->id())->where('status', 'disetujui')->count() +
            Cecimpedan::where('user_id', auth()->id())->where('status', 'disetujui')->count() +
            Satua::where('user_id', auth()->id())->where('status', 'disetujui')->count() +
            Istilah::where('user_id', auth()->id())->where('status', 'disetujui')->count();

        // Total ditolak
        $ditolak =
            Ajaran::where('user_id', auth()->id())->where('status', 'ditolak')->count() +
            Cecimpedan::where('user_id', auth()->id())->where('status', 'ditolak')->count() +
            Satua::where('user_id', auth()->id())->where('status', 'ditolak')->count() +
            Istilah::where('user_id', auth()->id())->where('status', 'ditolak')->count();

        return view('penulis.dashboard', compact(
            'total',
            'pending',
            'disetujui',
            'ditolak'
        ));
    }

    /**
     * Daftar Artikel dengan Filter Kategori
     */
    public function artikelIndex(Request $request)
    {
        $kategori = $request->query('kategori');

        $query = Ajaran::where('user_id', auth()->id());

        // Jika kategori dipilih dan bukan 'Semua', lakukan filter
        if ($kategori && $kategori != 'Semua') {
            $query->where('kategori', $kategori);
        }

        $artikels = $query->latest()->get();

        return view('penulis.artikel.index', compact('artikels', 'kategori'));
    }

    /**
     * Form Tambah Artikel
     */
    public function create()
    {
        return view('penulis.artikel.create');
    }

    /**
     * Simpan Artikel
     */
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

    /**
     * Form Edit Artikel (Diubah dari editAjaran menjadi edit)
     */
    public function edit($id)
    {
        $ajaran = Ajaran::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('penulis.artikel.edit', compact('ajaran'));
    }

    /**
     * Update Artikel
     */
    public function updateAjaran(Request $request, $id)
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

    /**
     * Hapus Artikel
     */
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

    /**
     * Riwayat Semua Kiriman
     */
    public function riwayat()
    {
        $ajaran = Ajaran::where('user_id', auth()->id())->latest()->get();
        $cecimpedan = Cecimpedan::where('user_id', auth()->id())->latest()->get();
        $satua = Satua::where('user_id', auth()->id())->latest()->get();
        $istilah = Istilah::where('user_id', auth()->id())->latest()->get();

        return view('penulis.riwayat.index', compact(
            'ajaran',
            'cecimpedan',
            'satua',
            'istilah'
        ));
    }
}