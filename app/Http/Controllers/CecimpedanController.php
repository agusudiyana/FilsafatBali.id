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
        // Validasi disesuaikan dengan field yang ada di form view
        $request->validate([
            'pertanyaan'        => 'required|string',
            'jawaban'           => 'required|string|max:255',
            'tingkat_kesulitan' => 'nullable|string|max:255',
            'terjemahan'        => 'nullable|string',
        ]);

        // Simpan data ke database
        Cecimpedan::create([
            'judul'             => $request->pertanyaan, // Fallback jika DB memakai kolom 'judul'
            'pertanyaan'        => $request->pertanyaan,
            'isi'               => $request->pertanyaan, // Fallback jika DB memakai kolom 'isi'
            'penulis'           => auth()->user()->name,
            'jawaban'           => $request->jawaban,
            'terjemahan'        => $request->terjemahan,
            'tingkat_kesulitan' => $request->tingkat_kesulitan ?? $request->kategori,
            'kategori'          => 'Cecimpedan',
            'status'            => 'pending',
            'user_id'           => auth()->id(),
        ]);

        return redirect()
            ->route('penulis.cecimpedan.index')
            ->with('success', 'Cecimpedan berhasil dikirim dan menunggu verifikasi admin.');
    }

    /**
     * Tampilkan Form Edit Cecimpedan
     */
    public function edit($id)
    {
        $cecimpedan = Cecimpedan::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('penulis.cecimpedan.edit', compact('cecimpedan'));
    }

    /**
     * Proses Update Cecimpedan
     */
    public function update(Request $request, $id)
    {
        $cecimpedan = Cecimpedan::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $request->validate([
            'pertanyaan'        => 'required|string',
            'jawaban'           => 'required|string|max:255',
            'tingkat_kesulitan' => 'nullable|string|max:255',
            'terjemahan'        => 'nullable|string',
        ]);

        $cecimpedan->update([
            'judul'             => $request->pertanyaan,
            'pertanyaan'        => $request->pertanyaan,
            'isi'               => $request->pertanyaan,
            'jawaban'           => $request->jawaban,
            'terjemahan'        => $request->terjemahan,
            'tingkat_kesulitan' => $request->tingkat_kesulitan ?? $request->kategori,
            'status'            => 'pending', // Reset ke status pending saat diubah
        ]);

        return redirect()
            ->route('penulis.cecimpedan.index')
            ->with('success', 'Cecimpedan berhasil diperbarui dan menunggu verifikasi admin.');
    }

    /**
     * Proses Hapus Cecimpedan
     */
    public function destroy($id)
    {
        $cecimpedan = Cecimpedan::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $cecimpedan->delete();

        return redirect()
            ->route('penulis.cecimpedan.index')
            ->with('success', 'Cecimpedan berhasil dihapus.');
    }
}