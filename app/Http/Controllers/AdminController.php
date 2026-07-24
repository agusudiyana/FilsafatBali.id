<?php

namespace App\Http\Controllers;

use App\Models\Ajaran;
use App\Models\Cecimpedan;
use App\Models\Satua;
use App\Models\Istilah;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard Admin
    |--------------------------------------------------------------------------
    */

    public function index()
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
    | VERIFIKASI AJARAN
    |--------------------------------------------------------------------------
    */

    public function verifikasiAjaran()
    {
        $ajarans = Ajaran::where('status', 'pending')
            ->latest()
            ->get();

        return view('admin.verifikasi.ajaran', compact('ajarans'));
    }

    public function detailAjaran($id)
    {
        $ajaran = Ajaran::findOrFail($id);

        return view('admin.verifikasi.detail-ajaran', compact('ajaran'));
    }

    public function setujuiAjaran($id)
    {
        $ajaran = Ajaran::findOrFail($id);
        $ajaran->status = 'disetujui';
        $ajaran->save();

        return redirect()->route('admin.verifikasi.ajaran')
            ->with('success', 'Ajaran berhasil disetujui.');
    }

    public function tolakAjaran($id)
    {
        $ajaran = Ajaran::findOrFail($id);
        $ajaran->status = 'ditolak';
        $ajaran->save();

        return redirect()->route('admin.verifikasi.ajaran')
            ->with('success', 'Ajaran berhasil ditolak.');
    }

    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI CECIMPEDAN
    |--------------------------------------------------------------------------
    */

    public function verifikasiCecimpedan()
    {
        $cecimpedans = Cecimpedan::where('status', 'pending')
            ->latest()
            ->get();

        return view('admin.verifikasi.cecimpedan', compact('cecimpedans'));
    }

    public function detailCecimpedan($id)
    {
        $cecimpedan = Cecimpedan::findOrFail($id);

        return view('admin.verifikasi.detail-cecimpedan', compact('cecimpedan'));
    }

    public function setujuiCecimpedan($id)
    {
        $cecimpedan = Cecimpedan::findOrFail($id);
        $cecimpedan->status = 'disetujui';
        $cecimpedan->save();

        return redirect()->route('admin.verifikasi.cecimpedan')
            ->with('success', 'Cecimpedan berhasil disetujui.');
    }

    public function tolakCecimpedan($id)
    {
        $cecimpedan = Cecimpedan::findOrFail($id);
        $cecimpedan->status = 'ditolak';
        $cecimpedan->save();

        return redirect()->route('admin.verifikasi.cecimpedan')
            ->with('success', 'Cecimpedan berhasil ditolak.');
    }

    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI SATUA
    |--------------------------------------------------------------------------
    */

    public function verifikasiSatua()
    {
        $satuas = Satua::where('status', 'pending')
            ->latest()
            ->get();

        return view('admin.verifikasi.satua', compact('satuas'));
    }

    public function detailSatua($id)
    {
        $satua = Satua::findOrFail($id);

        return view('admin.verifikasi.detail-satua', compact('satua'));
    }

    public function setujuiSatua($id)
    {
        $satua = Satua::findOrFail($id);
        $satua->status = 'disetujui';
        $satua->save();

        return redirect()->route('admin.verifikasi.satua')
            ->with('success', 'Satua berhasil disetujui.');
    }

    public function tolakSatua($id)
    {
        $satua = Satua::findOrFail($id);
        $satua->status = 'ditolak';
        $satua->save();

        return redirect()->route('admin.verifikasi.satua')
            ->with('success', 'Satua berhasil ditolak.');
    }

    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI ISTILAH
    |--------------------------------------------------------------------------
    */

    public function verifikasiIstilah()
    {
        $istilahs = Istilah::where('status', 'pending')
            ->latest()
            ->get();

        return view('admin.verifikasi.istilah', compact('istilahs'));
    }

    public function detailIstilah($id)
    {
        $istilah = Istilah::findOrFail($id);

        return view('admin.verifikasi.detail-istilah', compact('istilah'));
    }

    public function setujuiIstilah($id)
    {
        $istilah = Istilah::findOrFail($id);
        $istilah->status = 'disetujui';
        $istilah->save();

        return redirect()->route('admin.verifikasi.istilah')
            ->with('success', 'Istilah berhasil disetujui.');
    }

    public function tolakIstilah($id)
    {
        $istilah = Istilah::findOrFail($id);
        $istilah->status = 'ditolak';
        $istilah->save();

        return redirect()->route('admin.verifikasi.istilah')
            ->with('success', 'Istilah berhasil ditolak.');
    }
}