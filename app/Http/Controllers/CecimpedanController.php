<?php

namespace App\Http\Controllers;

use App\Models\Cecimpedan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'tingkat'        => 'required|string',
            'pertanyaan'     => 'required|string',
            'terjemahan'     => 'required|string',
            'jawaban'        => 'required|string|max:255',
            'makna'          => 'nullable|string',
            'filosofi'       => 'nullable|string',
            'variasi_daerah' => 'nullable|string',
            'asal_daerah'    => 'nullable|string|max:255',
            'rekaman'        => 'nullable|string|max:255',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('cecimpedan', 'public');
        }

        Cecimpedan::create([
            'user_id'        => auth()->id(),
            'penulis'        => auth()->user()->name,
            'judul'          => $request->pertanyaan,
            'isi'            => $request->pertanyaan,
            'tingkat'        => $request->tingkat,
            'pertanyaan'     => $request->pertanyaan,
            'terjemahan'     => $request->terjemahan,
            'jawaban'        => $request->jawaban,
            'makna'          => $request->makna,
            'filosofi'       => $request->filosofi,
            'variasi_daerah' => $request->variasi_daerah,
            'asal_daerah'    => $request->asal_daerah,
            'rekaman'        => $request->rekaman,
            'gambar'         => $gambar,
            'status'         => 'pending',
        ]);

        return redirect()
            ->route('penulis.cecimpedan.index')
            ->with('success', 'Cecimpedan berhasil dikirim dan menunggu verifikasi admin.');
    }

    public function edit($id)
    {
        $cecimpedan = Cecimpedan::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('penulis.cecimpedan.edit', compact('cecimpedan'));
    }

    public function update(Request $request, $id)
    {
        $cecimpedan = Cecimpedan::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $request->validate([
            'tingkat'        => 'required|string',
            'pertanyaan'     => 'required|string',
            'terjemahan'     => 'required|string',
            'jawaban'        => 'required|string|max:255',
            'makna'          => 'nullable|string',
            'filosofi'       => 'nullable|string',
            'variasi_daerah' => 'nullable|string',
            'asal_daerah'    => 'nullable|string|max:255',
            'rekaman'        => 'nullable|string|max:255',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $gambar = $cecimpedan->gambar;
        if ($request->hasFile('gambar')) {
            if ($cecimpedan->gambar && Storage::disk('public')->exists($cecimpedan->gambar)) {
                Storage::disk('public')->delete($cecimpedan->gambar);
            }
            $gambar = $request->file('gambar')->store('cecimpedan', 'public');
        }

        $cecimpedan->update([
            'judul'          => $request->pertanyaan,
            'pertanyaan'     => $request->pertanyaan,
            'isi'            => $request->pertanyaan,
            'tingkat'        => $request->tingkat,
            'terjemahan'     => $request->terjemahan,
            'jawaban'        => $request->jawaban,
            'makna'          => $request->makna,
            'filosofi'       => $request->filosofi,
            'variasi_daerah' => $request->variasi_daerah,
            'asal_daerah'    => $request->asal_daerah,
            'rekaman'        => $request->rekaman,
            'gambar'         => $gambar,
            'status'         => 'pending',
        ]);

        return redirect()
            ->route('penulis.cecimpedan.index')
            ->with('success', 'Cecimpedan berhasil diperbarui dan menunggu verifikasi admin.');
    }

    public function destroy($id)
    {
        $cecimpedan = Cecimpedan::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($cecimpedan->gambar && Storage::disk('public')->exists($cecimpedan->gambar)) {
            Storage::disk('public')->delete($cecimpedan->gambar);
        }

        $cecimpedan->delete();

        return redirect()
            ->route('penulis.cecimpedan.index')
            ->with('success', 'Cecimpedan berhasil dihapus.');
    }
}