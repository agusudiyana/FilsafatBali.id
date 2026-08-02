<?php

namespace App\Http\Controllers;

use App\Models\Filsafat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilsafatController extends Controller
{
    /**
     * Menampilkan daftar filsafat milik penulis yang sedang login.
     */
    public function index()
    {
        $filsafat = Filsafat::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('penulis.filsafat.index', compact('filsafat'));
    }

    /**
     * Menampilkan form tambah filsafat.
     */
    public function create()
    {
        return view('penulis.filsafat.create');
    }

    /**
     * Menyimpan data filsafat baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'          => 'required|string|max:255',
            'deskripsi'      => 'required|string',
            'asal'           => 'nullable|string|max:255',
            'fokus'          => 'nullable|string|max:255',
            'tokoh_terkenal' => 'nullable|string',
            'karakteristik'  => 'nullable|string',
            'implikasi'      => 'nullable|string',
        ]);

        Filsafat::create([
            'user_id'        => Auth::id(),
            'judul'          => $request->judul,
            'deskripsi'      => $request->deskripsi,
            'asal'           => $request->asal,
            'fokus'          => $request->fokus,
            'tokoh_terkenal' => $request->tokoh_terkenal ?? $request->tokoh,
            'karakteristik'  => $request->karakteristik,
            'implikasi'      => $request->implikasi ?? $request->penerapan,
            'status'         => 'pending',
        ]);

        return redirect()->route('penulis.filsafat.index')
            ->with('success', 'Data Filsafat berhasil ditambahkan dan menunggu verifikasi admin.');
    }

    /**
     * Menampilkan form edit filsafat.
     */
    public function edit($id)
    {
        $filsafat = Filsafat::where('user_id', Auth::id())->findOrFail($id);

        return view('penulis.filsafat.edit', compact('filsafat'));
    }

    /**
     * Memperbarui data filsafat di database.
     */
    public function update(Request $request, $id)
    {
        $filsafat = Filsafat::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'judul'          => 'required|string|max:255',
            'deskripsi'      => 'required|string',
            'asal'           => 'nullable|string|max:255',
            'fokus'          => 'nullable|string|max:255',
            'tokoh_terkenal' => 'nullable|string',
            'karakteristik'  => 'nullable|string',
            'implikasi'      => 'nullable|string',
        ]);

        $filsafat->update([
            'judul'          => $request->judul,
            'deskripsi'      => $request->deskripsi,
            'asal'           => $request->asal,
            'fokus'          => $request->fokus,
            'tokoh_terkenal' => $request->tokoh_terkenal ?? $request->tokoh,
            'karakteristik'  => $request->karakteristik,
            'implikasi'      => $request->implikasi ?? $request->penerapan,
            'status'         => 'pending', // Reset status ke pending jika diedit
        ]);

        return redirect()->route('penulis.filsafat.index')
            ->with('success', 'Data Filsafat berhasil diperbarui dan menunggu verifikasi admin.');
    }

    /**
     * Menghapus data filsafat.
     */
    public function destroy($id)
    {
        $filsafat = Filsafat::where('user_id', Auth::id())->findOrFail($id);
        $filsafat->delete();

        return redirect()->route('penulis.filsafat.index')
            ->with('success', 'Data Filsafat berhasil dihapus!');
    }
}