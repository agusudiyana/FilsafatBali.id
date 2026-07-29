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
            'judul'    => 'required|string|max:255',
            'isi'      => 'required',
            'jawaban'  => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
        ]);

        Cecimpedan::create([
            'judul'    => $request->judul,
            'penulis'  => auth()->user()->name,
            'isi'      => $request->isi,
            'jawaban'  => $request->jawaban,
            'kategori' => $request->kategori,
            'status'   => 'pending',
            'user_id'  => auth()->id(),
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
     * Proses Update Cecimpedan (Tanpa Gambar)
     */
    public function update(Request $request, $id)
    {
        $cecimpedan = Cecimpedan::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $request->validate([
            'judul'    => 'required|string|max:255',
            'isi'      => 'required',
            'jawaban'  => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
        ]);

        $cecimpedan->update([
            'judul'    => $request->judul,
            'isi'      => $request->isi,
            'jawaban'  => $request->jawaban,
            'kategori' => $request->kategori,
            'status'   => 'pending', // Kembalikan ke pending untuk diverifikasi ulang oleh admin
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