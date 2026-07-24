<?php

namespace App\Http\Controllers;

use App\Models\Ajaran;
use App\Models\Cecimpedan;
use App\Models\Satua;
use App\Models\Istilah;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    /**
     * Dashboard Penulis
     */
    public function index()
    {
        // Total seluruh kiriman
        $total =
            Ajaran::where('user_id', auth()->id())->count() +
            Cecimpedan::where('user_id', auth()->id())->count() +
            Satua::where('user_id', auth()->id())->count() +
            Istilah::where('user_id', auth()->id())->count();

        // Total pending
        $pending =
            Ajaran::where('user_id', auth()->id())->where('status', 'pending')->count() +
            Cecimpedan::where('user_id', auth()->id())->where('status', 'pending')->count() +
            Satua::where('user_id', auth()->id())->where('status', 'pending')->count() +
            Istilah::where('user_id', auth()->id())->where('status', 'pending')->count();

        // Total disetujui
        $disetujui =
            Ajaran::where('user_id', auth()->id())->where('status', 'disetujui')->count() +
            Cecimpedan::where('user_id', auth()->id())->where('status', 'disetujui')->count() +
            Satua::where('user_id', auth()->id())->where('status', 'disetujui')->count() +
            Istilah::where('user_id', auth()->id())->where('status', 'disetujui')->count();

        // Total ditolak
        $ditolak =
            Ajaran::where('user_id', auth()->id())->where('status', 'ditolak')->count() +
            Cecimpedan::where('user_id', auth()->id())->where('status', 'ditolak')->count() +
            Satua::where('user_id', auth()->id())->where('status', 'ditolak')->count() +
            Istilah::where('user_id', auth()->id())->where('status', 'ditolak')->count();

        return view('penulis.dashboard', compact(
            'total',
            'pending',
            'disetujui',
            'ditolak'
        ));
    }

    /**
     * Daftar Ajaran
     */
    public function ajaranIndex()
    {
        $ajarans = Ajaran::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('penulis.ajaran.index', compact('ajarans'));
    }

    /**
     * Form Tambah Ajaran
     */
    public function createAjaran()
    {
        return view('penulis.ajaran.create');
    }

    /**
     * Simpan Ajaran
     */
    public function storeAjaran(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'contoh' => 'nullable',
            'referensi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('ajaran', 'public');
        }

        Ajaran::create([
            'judul' => $request->judul,
            'penulis' => auth()->user()->name,
            'isi' => $request->isi,
            'contoh' => $request->contoh,
            'referensi' => $request->referensi,
            'gambar' => $gambar,
            'status' => 'pending',
            'user_id' => auth()->id(),
        ]);

        return redirect()
            ->route('penulis.ajaran.index')
            ->with('success', 'Kiriman berhasil dikirim dan menunggu verifikasi admin.');
    }

    /**
     * Riwayat Semua Kiriman
     */
    public function riwayat()
    {
        $ajaran = Ajaran::where('user_id', auth()->id())->latest()->get();

        $cecimpedan = Cecimpedan::where('user_id', auth()->id())->latest()->get();

        $satua = Satua::where('user_id', auth()->id())->latest()->get();

        $istilah = Istilah::where('user_id', auth()->id())->latest()->get();

        return view('penulis.riwayat.index', compact(
            'ajaran',
            'cecimpedan',
            'satua',
            'istilah'
        ));
    }
}