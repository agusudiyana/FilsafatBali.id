<?php

namespace App\Http\Controllers;

use App\Models\Ajaran;
use Illuminate\Http\Request;

class AjaranController extends Controller
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
            'penulis' => $request->penulis,
            'desa' => $request->desa,
            'tahun' => $request->tahun,
            'isi' => $request->isi,
            'contoh' => $request->contoh,
            'referensi' => $request->referensi,
            'status' => 'pending',
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
            'penulis' => $request->penulis,
            'desa' => $request->desa,
            'tahun' => $request->tahun,
            'isi' => $request->isi,
            'contoh' => $request->contoh,
            'referensi' => $request->referensi,
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
}