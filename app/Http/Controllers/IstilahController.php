<?php

namespace App\Http\Controllers;

use App\Models\Istilah;
use Illuminate\Http\Request;

class IstilahController extends Controller
{
    /**
     * Menampilkan daftar istilah milik penulis
     */
    public function index()
    {
        $istilahs = Istilah::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('penulis.istilah.index', compact('istilahs'));
    }

    /**
     * Menampilkan form tambah istilah
     */
    public function create()
    {
        return view('penulis.istilah.create');
    }

    /**
     * Menyimpan data istilah
     */
    public function store(Request $request)
    {
        $request->validate([
            'istilah'  => 'required|string|max:255',
            'arti'     => 'required',
            'kategori' => 'nullable|string|max:255',
            'gambar'   => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar')
                ->store('istilah', 'public');
        }

        Istilah::create([

            'istilah'  => $request->istilah,
            'arti'     => $request->arti,
            'kategori' => $request->kategori,
            'gambar'   => $gambar,
            'status'   => 'pending',
            'user_id'  => auth()->id(),

        ]);

        return redirect()
            ->route('penulis.istilah.index')
            ->with('success', 'Istilah berhasil dikirim dan menunggu verifikasi admin.');
    }
}