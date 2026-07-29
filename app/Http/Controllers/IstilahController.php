<?php

namespace App\Http\Controllers;

use App\Models\Istilah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IstilahController extends Controller
{
    public function index()
    {
        $istilahs = Istilah::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('penulis.istilah.index', compact('istilahs'));
    }

    public function create()
    {
        return view('penulis.istilah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'istilah'    => 'required|string|max:255',
            'arti'       => 'required|string',
            'kategori'   => 'nullable|string|max:255',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('istilah', 'public');
        }

        Istilah::create([
            'istilah'    => $request->istilah,
            'penulis'    => auth()->user()->name,
            'arti'       => $request->arti,
            'kategori'   => $request->kategori,
            'gambar'     => $gambar,
            'status'     => 'pending',
            'user_id'    => auth()->id(),
        ]);

        return redirect()
            ->route('penulis.istilah.index')
            ->with('success', 'Istilah berhasil dikirim dan menunggu verifikasi admin.');
    }

    public function edit($id)
    {
        $istilah = Istilah::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($istilah->status === 'disetujui') {
            return redirect()->route('penulis.istilah.index')
                ->with('error', 'Data yang sudah disetujui tidak dapat diedit.');
        }

        return view('penulis.istilah.edit', compact('istilah'));
    }

    public function update(Request $request, $id)
    {
        $istilah = Istilah::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($istilah->status === 'disetujui') {
            return redirect()->route('penulis.istilah.index')
                ->with('error', 'Data yang sudah disetujui tidak dapat diubah.');
        }

        $request->validate([
            'istilah'    => 'required|string|max:255',
            'arti'       => 'required|string',
            'kategori'   => 'nullable|string|max:255',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $gambar = $istilah->gambar;
        if ($request->hasFile('gambar')) {
            if ($istilah->gambar && Storage::disk('public')->exists($istilah->gambar)) {
                Storage::disk('public')->delete($istilah->gambar);
            }
            $gambar = $request->file('gambar')->store('istilah', 'public');
        }

        $istilah->update([
            'istilah'    => $request->istilah,
            'arti'       => $request->arti,
            'kategori'   => $request->kategori,
            'gambar'     => $gambar,
            'status'     => 'pending',
        ]);

        return redirect()
            ->route('penulis.istilah.index')
            ->with('success', 'Data Istilah berhasil diperbarui dan menunggu verifikasi admin.');
    }

    public function destroy($id)
    {
        $istilah = Istilah::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($istilah->status === 'disetujui') {
            return redirect()->route('penulis.istilah.index')
                ->with('error', 'Data yang sudah disetujui tidak dapat dihapus.');
        }

        if ($istilah->gambar && Storage::disk('public')->exists($istilah->gambar)) {
            Storage::disk('public')->delete($istilah->gambar);
        }

        $istilah->delete();

        return redirect()
            ->route('penulis.istilah.index')
            ->with('success', 'Data Istilah berhasil dihapus.');
    }
}