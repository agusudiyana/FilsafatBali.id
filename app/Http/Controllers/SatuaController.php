<?php

namespace App\Http\Controllers;

use App\Models\Satua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SatuaController extends Controller
{
    /**
     * Menampilkan daftar satua milik penulis yang sedang login (dengan filter status).
     */
    public function index(Request $request)
    {
        $query = Satua::where('user_id', auth()->id());

        // Filter status jika parameter status diisi di URL query
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $satuas = $query->latest()->get();

        return view('penulis.satua.index', compact('satuas'));
    }

    /**
     * Form tambah satua baru.
     */
    public function create()
    {
        return view('penulis.satua.create');
    }

    /**
     * Menyimpan satua baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required|string',
            'tokoh'  => 'nullable|string|max:255',
            'asal'   => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('satua', 'public');
        }

        Satua::create([
            'judul'   => $validated['judul'],
            'penulis' => auth()->user()->name,
            'isi'     => $validated['isi'],
            'tokoh'   => $validated['tokoh'] ?? null,
            'asal'    => $validated['asal'] ?? null,
            'gambar'  => $validated['gambar'] ?? null,
            'status'  => 'pending',
            'user_id' => auth()->id(),
        ]);

        return redirect()
            ->route('penulis.satua.index')
            ->with('success', 'Satua berhasil dikirim dan menunggu verifikasi admin.');
    }

    /**
     * Form edit satua.
     */
    public function edit(Satua $satua)
    {
        $this->authorizeOwner($satua);

        if ($satua->status === 'disetujui') {
            return redirect()
                ->route('penulis.satua.index')
                ->with('error', 'Data satua yang sudah disetujui tidak dapat diedit.');
        }

        return view('penulis.satua.edit', compact('satua'));
    }

    /**
     * Memperbarui data satua.
     */
    public function update(Request $request, Satua $satua)
    {
        $this->authorizeOwner($satua);

        if ($satua->status === 'disetujui') {
            return redirect()
                ->route('penulis.satua.index')
                ->with('error', 'Data satua yang sudah disetujui tidak dapat diubah.');
        }

        $validated = $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required|string',
            'tokoh'  => 'nullable|string|max:255',
            'asal'   => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        if ($request->hasFile('gambar')) {
            if ($satua->gambar && Storage::disk('public')->exists($satua->gambar)) {
                Storage::disk('public')->delete($satua->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('satua', 'public');
        }

        $satua->update([
            'judul'  => $validated['judul'],
            'isi'    => $validated['isi'],
            'tokoh'  => $validated['tokoh'] ?? null,
            'asal'   => $validated['asal'] ?? null,
            'gambar' => $validated['gambar'] ?? $satua->gambar,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('penulis.satua.index')
            ->with('success', 'Data Satua berhasil diperbarui dan menunggu verifikasi admin.');
    }

    /**
     * Menghapus data satua.
     */
    public function destroy(Satua $satua)
    {
        $this->authorizeOwner($satua);

        if ($satua->status === 'disetujui') {
            return redirect()
                ->route('penulis.satua.index')
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

    private function authorizeOwner(Satua $satua): void
    {
        if ($satua->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }
    }
}