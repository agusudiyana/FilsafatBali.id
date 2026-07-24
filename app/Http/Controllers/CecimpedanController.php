<?php

namespace App\Http\Controllers;

use App\Models\Cecimpedan;
use Illuminate\Http\Request;

class CecimpedanController extends Controller
{
    public function index()
    {
        $cecimpedans = Cecimpedan::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('penulis.cecimpedan.index', compact('cecimpedans'));
    }

    public function create()
    {
        return view('penulis.cecimpedan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'jawaban' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('cecimpedan', 'public');
        }

        Cecimpedan::create([
            'judul'    => $request->judul,
            'penulis'  => auth()->user()->name,
            'isi'      => $request->isi,
            'jawaban'  => $request->jawaban,
            'kategori' => $request->kategori,
            'gambar'   => $gambar,
            'status'   => 'pending',
            'user_id'  => auth()->id(),
        ]);

        return redirect()
            ->route('penulis.cecimpedan.index')
            ->with('success', 'Cecimpedan berhasil dikirim dan menunggu verifikasi admin.');
    }
}