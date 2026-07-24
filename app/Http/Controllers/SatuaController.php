<?php

namespace App\Http\Controllers;

use App\Models\Satua;
use Illuminate\Http\Request;

class SatuaController extends Controller
{
    /**
     * Menampilkan daftar Satua milik penulis
     */
    public function index()
    {
        $satuas = Satua::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('penulis.satua.index', compact('satuas'));
    }

    /**
     * Form tambah Satua
     */
    public function create()
    {
        return view('penulis.satua.create');
    }

    /**
     * Simpan Satua
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'tokoh' => 'nullable|max:255',
            'asal' => 'nullable|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('satua', 'public');
        }

        Satua::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tokoh' => $request->tokoh,
            'asal' => $request->asal,
            'gambar' => $gambar,
            'status' => 'pending',
            'user_id' => auth()->id(),
        ]);

        return redirect()
            ->route('penulis.satua.index')
            ->with('success', 'Satua berhasil dikirim.');
    }
}