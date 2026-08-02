<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Cecimpedan;
use App\Models\Satua;
use App\Models\Istilah;

class HomeController extends Controller
{
    public function index()
    {
        $ajarans = Artikel::where('status', 'disetujui')
            ->latest()
            ->get();

        $cecimpedans = Cecimpedan::where('status', 'disetujui')
            ->latest()
            ->get();

        $satuas = Satua::where('status', 'disetujui')
            ->latest()
            ->get();

        $istilahs = Istilah::where('status', 'disetujui')
            ->latest()
            ->get();

        return view('home', compact(
            'ajarans',
            'cecimpedans',
            'satuas',
            'istilahs'
        ));
    }
}