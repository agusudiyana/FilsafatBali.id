<?php

namespace App\Http\Controllers;

use App\Models\Ajaran;
use App\Models\Cecimpedan;
use App\Models\Satua;
use App\Models\Istilah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard Admin
    |--------------------------------------------------------------------------
    */

    public function index(): View
    {
        $totalAjaran = Ajaran::count();
        $pending = Ajaran::where('status', 'pending')->count();
        $disetujui = Ajaran::where('status', 'disetujui')->count();
        $totalPengguna = User::count();

        return view('admin.dashboard', compact(
            'totalAjaran',
            'pending',
            'disetujui',
            'totalPengguna'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI AJARAN / ARTIKEL (GABUNGAN TAB KATEGORI)
    |--------------------------------------------------------------------------
    */

    public function verifikasiAjaran(): View
    {
        $ajaran = Ajaran::where('status', 'pending')->latest()->get();
        $cecimpedan = Cecimpedan::where('status', 'pending')->latest()->get();
        $satua = Satua::where('status', 'pending')->latest()->get();
        $istilah = Istilah::where('status', 'pending')->latest()->get();

        return view('admin.verifikasi.artikel', compact('ajaran', 'cecimpedan', 'satua', 'istilah'));
    }

    public function detailAjaran(int $id): View
    {
        $ajaran = Ajaran::findOrFail($id);

        return view('admin.verifikasi.detail-ajaran', compact('ajaran'));
    }

    public function setujuiAjaran(int $id): RedirectResponse
    {
        $ajaran = Ajaran::findOrFail($id);
        $ajaran->update(['status' => 'disetujui']);

        return redirect()->back()->with('success', 'Ajaran berhasil disetujui.');
    }

    public function tolakAjaran(int $id): RedirectResponse
    {
        $ajaran = Ajaran::findOrFail($id);
        $ajaran->update(['status' => 'ditolak']);

        return redirect()->back()->with('success', 'Ajaran berhasil ditolak.');
    }

    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI CECIMPEDAN
    |--------------------------------------------------------------------------
    */

    public function verifikasiCecimpedan(): View
    {
        $cecimpedans = Cecimpedan::where('status', 'pending')
            ->latest()
            ->paginate(10);

        return view('admin.verifikasi.cecimpedan', compact('cecimpedans'));
    }

    public function detailCecimpedan(int $id): View
    {
        $cecimpedan = Cecimpedan::findOrFail($id);

        return view('admin.verifikasi.detail-cecimpedan', compact('cecimpedan'));
    }

    public function setujuiCecimpedan(int $id): RedirectResponse
    {
        $cecimpedan = Cecimpedan::findOrFail($id);
        $cecimpedan->update(['status' => 'disetujui']);

        return redirect()->back()->with('success', 'Cecimpedan berhasil disetujui.');
    }

    public function tolakCecimpedan(int $id): RedirectResponse
    {
        $cecimpedan = Cecimpedan::findOrFail($id);
        $cecimpedan->update(['status' => 'ditolak']);

        return redirect()->back()->with('success', 'Cecimpedan berhasil ditolak.');
    }

    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI SATUA
    |--------------------------------------------------------------------------
    */

    public function verifikasiSatua(): View
    {
        $satuas = Satua::where('status', 'pending')
            ->latest()
            ->paginate(10);

        return view('admin.verifikasi.satua', compact('satuas'));
    }

    public function detailSatua(int $id): View
    {
        $satua = Satua::findOrFail($id);

        return view('admin.verifikasi.detail-satua', compact('satua'));
    }

    public function setujuiSatua(int $id): RedirectResponse
    {
        $satua = Satua::findOrFail($id);
        $satua->update(['status' => 'disetujui']);

        return redirect()->back()->with('success', 'Satua berhasil disetujui.');
    }

    public function tolakSatua(int $id): RedirectResponse
    {
        $satua = Satua::findOrFail($id);
        $satua->update(['status' => 'ditolak']);

        return redirect()->back()->with('success', 'Satua berhasil ditolak.');
    }

    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI ISTILAH
    |--------------------------------------------------------------------------
    */

    public function verifikasiIstilah(): View
    {
        $istilahs = Istilah::where('status', 'pending')
            ->latest()
            ->paginate(10);

        return view('admin.verifikasi.istilah', compact('istilahs'));
    }

    public function detailIstilah(int $id): View
    {
        $istilah = Istilah::findOrFail($id);

        return view('admin.verifikasi.detail-istilah', compact('istilah'));
    }

    public function setujuiIstilah(int $id): RedirectResponse
    {
        $istilah = Istilah::findOrFail($id);
        $istilah->update(['status' => 'disetujui']);

        return redirect()->back()->with('success', 'Istilah berhasil disetujui.');
    }

    public function tolakIstilah(int $id): RedirectResponse
    {
        $istilah = Istilah::findOrFail($id);
        $istilah->update(['status' => 'ditolak']);

        return redirect()->back()->with('success', 'Istilah berhasil ditolak.');
    }

    /*
    |--------------------------------------------------------------------------
    | MANAJEMEN USER (PENULIS & PENGGUNA)
    |--------------------------------------------------------------------------
    */

    public function kelolaPenulis(): View
    {
        $penulis = User::where('role', 'penulis')->latest()->paginate(10);

        return view('admin.manajemen.penulis', compact('penulis'));
    }

    public function kelolaPengguna(): View
    {
        $pengguna = User::where('role', 'pengguna')->latest()->paginate(10);

        return view('admin.manajemen.pengguna', compact('pengguna'));
    }
}