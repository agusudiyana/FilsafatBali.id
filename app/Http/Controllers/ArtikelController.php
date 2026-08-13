<?php

namespace App\Http\Controllers;

use App\Models\Ajaran;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    // Menampilkan daftar ajaran
    public function index()
    {
        $ajarans = Ajaran::latest()->get();

        return view('admin.ajaran.index', compact('ajarans'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('admin.ajaran.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'isi' => 'required',
        ]);

        Ajaran::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori ?? 'Ajaran Tertua',
            'penulis' => $request->penulis,
            'desa' => $request->desa,
            'tahun' => $request->tahun,
            'isi' => $request->isi,
            'contoh' => $request->contoh,
            'referensi' => $request->referensi,
            'status' => 'disetujui', // Jika dibuat langsung oleh Admin, otomatis disetujui
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('ajaran.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit(Ajaran $ajaran)
    {
        return view('admin.ajaran.edit', compact('ajaran'));
    }

    // Mengupdate data
    public function update(Request $request, Ajaran $ajaran)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'isi' => 'required',
        ]);

        $ajaran->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori ?? $ajaran->kategori,
            'penulis' => $request->penulis,
            'desa' => $request->desa,
            'tahun' => $request->tahun,
            'isi' => $request->isi,
            'contoh' => $request->contoh,
            'referensi' => $request->referensi,
            'status' => $request->status ?? $ajaran->status,
        ]);

        return redirect()->route('ajaran.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy(Ajaran $ajaran)
    {
        $ajaran->delete();

        return redirect()->route('ajaran.index')
            ->with('success', 'Data berhasil dihapus.');
    }

    /**
     * Memperbarui status verifikasi artikel (Disetujui / Ditolak / Pending) oleh Admin
     */
    public function updateStatus($id, $status)
    {
        $ajaran = Ajaran::findOrFail($id);

        if (in_array($status, ['disetujui', 'ditolak', 'pending'])) {
            $ajaran->status = $status;
            $ajaran->save();

            return redirect()->back()
                ->with('success', 'Status artikel berhasil diperbarui menjadi ' . ucfirst($status));
        }

        return redirect()->back()
            ->with('error', 'Status tidak valid.');
    }
}