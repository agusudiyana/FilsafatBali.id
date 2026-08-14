<?php

namespace App\Http\Controllers;

use App\Models\AjaranTertua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AjaranTertuaController extends Controller
{
    /**
     * Menampilkan daftar Ajaran Tertua milik penulis (dilengkapi filter status).
     */
    public function index(Request $request)
    {
        $query = AjaranTertua::where('user_id', Auth::id());

        // Filter berdasarkan status jika dipilih di dropdown
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $ajaranTertua = $query->latest()->get();

        return view('penulis.ajaran_tertua.index', compact('ajaranTertua'));
    }

    public function create()
    {
        return view('penulis.ajaran_tertua.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['status'] = 'pending'; // Default status saat baru ditambah

        // Unggah Gambar jika ada
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('ajaran_tertua', 'public');
        }

        AjaranTertua::create($data);

        return redirect()->route('penulis.ajaran-tertua.index')
            ->with('success', 'Ajaran Tertua berhasil disimpan dan menunggu verifikasi admin!');
    }

    public function edit($id)
    {
        $ajaranTertua = AjaranTertua::where('user_id', Auth::id())->findOrFail($id);
        return view('penulis.ajaran_tertua.edit', compact('ajaranTertua'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ajaranTertua = AjaranTertua::where('user_id', Auth::id())->findOrFail($id);
        $data = $request->all();
        $data['status'] = 'pending'; // Reset status ke pending saat diperbarui

        // Update Gambar jika mengunggah file baru
        if ($request->hasFile('gambar')) {
            if ($ajaranTertua->gambar) {
                Storage::disk('public')->delete($ajaranTertua->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('ajaran_tertua', 'public');
        }

        $ajaranTertua->update($data);

        return redirect()->route('penulis.ajaran-tertua.index')
            ->with('success', 'Ajaran Tertua berhasil diperbarui dan menunggu verifikasi admin!');
    }

    public function destroy($id)
    {
        $ajaranTertua = AjaranTertua::where('user_id', Auth::id())->findOrFail($id);

        if ($ajaranTertua->gambar) {
            Storage::disk('public')->delete($ajaranTertua->gambar);
        }

        $ajaranTertua->delete();

        return redirect()->route('penulis.ajaran-tertua.index')
            ->with('success', 'Ajaran Tertua berhasil dihapus!');
    }
}