<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Cecimpedan;
use App\Models\Satua;
use App\Models\Istilah;
use App\Models\AjaranTertua;
use App\Models\Filsafat;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil data utama yang berstatus 'disetujui'
        $ajarans = AjaranTertua::where('status', 'disetujui')->latest()->get();
        $artikels = Artikel::where('status', 'disetujui')->latest()->get();
        $cecimpedans = Cecimpedan::where('status', 'disetujui')->latest()->get();
        $satuas = Satua::where('status', 'disetujui')->latest()->get();
        $istilahs = Istilah::where('status', 'disetujui')->latest()->get();
        $filsafats = Filsafat::where('status', 'disetujui')->latest()->get();

        // 2. Hitung total jumlah data untuk Counter Statistik Dinamis
        $totalAjaran = $ajarans->count();
        $totalCecimpedan = $cecimpedans->count();
        $totalSatua = $satuas->count();
        $totalIstilah = $istilahs->count();
        $totalFilsafat = $filsafats->count();

        // 3. Hitung total data terverifikasi (gabungan seluruh materi yang disetujui)
        $totalTerverifikasi = $totalAjaran + $totalCecimpedan + $totalSatua + $totalIstilah + $totalFilsafat + $artikels->count();

        // 4. Hitung total kontributor (User)
        $totalKontributor = User::count();

        return view('home', compact(
            'ajarans',
            'artikels',
            'cecimpedans',
            'satuas',
            'istilahs',
            'filsafats',
            'totalAjaran',
            'totalCecimpedan',
            'totalSatua',
            'totalIstilah',
            'totalFilsafat',
            'totalTerverifikasi',
            'totalKontributor'
        ));
    }
}