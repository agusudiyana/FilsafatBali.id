<?php

namespace App\Http\Controllers;

use App\Models\Satua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SatuaController extends Controller
{
    public function index()
    {
        $satuas = Satua::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('penulis.satua.index', compact('satuas'));
    }

    public function create()
    {
        return view('penulis.satua.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required',
            'tokoh'  => 'nullable|string|max:255',
            'asal'   => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('satua', 'public');
        }

        Satua::create([
            'judul'   => $request->judul,
            'penulis' => auth()->user()->name,
            'isi'     => $request->isi,
            'tokoh'   => $request->tokoh,
            'asal'    => $request->asal,
            'gambar'  => $gambar,
            'status'  => 'pending',
            'user_id' => auth()->id(),
        ]);

        return redirect()
            ->route('penulis.satua.index')
            ->with('success', 'Satua berhasil dikirim dan menunggu verifikasi admin.');
    }

    /**
     * Form Edit Satua
     */
    public function edit($id)
    {
        $satua = Satua::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($satua->status === 'disetujui') {
            return redirect()->route('penulis.satua.index')
                ->with('error', 'Data satua yang sudah disetujui tidak dapat diedit.');
        }

        return view('penulis.satua.edit', compact('satua'));
    }

    /**
     * Proses Update Satua
     */
    public function update(Request $request, $id)
    {
        $satua = Satua::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($satua->status === 'disetujui') {
            return redirect()->route('penulis.satua.index')
                ->with('error', 'Data satua yang sudah disetujui tidak dapat diubah.');
        }

        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required',
            'tokoh'  => 'nullable|string|max:255',
            'asal'   => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $gambar = $satua->gambar;
        if ($request->hasFile('gambar')) {
            if ($satua->gambar && Storage::disk('public')->exists($satua->gambar)) {
                Storage::disk('public')->delete($satua->gambar);
            }
            $gambar = $request->file('gambar')->store('satua', 'public');
        }

        $satua->update([
            'judul'  => $request->judul,
            'isi'    => $request->isi,
            'tokoh'  => $request->tokoh,
            'asal'   => $request->asal,
            'gambar' => $gambar,
            'status' => 'pending', // Reset status ke pending agar diverifikasi ulang
        ]);

        return redirect()
            ->route('penulis.satua.index')
            ->with('success', 'Data Satua berhasil diperbarui dan menunggu verifikasi admin.');
    }

    /**
     * Proses Hapus Satua
     */
    public function destroy($id)
    {
        $satua = Satua::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($satua->status === 'disetujui') {
            return redirect()->route('penulis.satua.index')
                ->with('error', 'Data satua yang sudah disetujui tidak dapat dihapus.');
        }

        if ($satua->gambar && Storage::disk('public')->exists($satua->gambar)) {
            Storage::disk('public')->delete($satua->gambar);
        }

        $satua->delete();

        return redirect()
            ->route('penulis.satua.index')
            ->with('success', 'Data Satua berhasil dihapus.');
    }
}