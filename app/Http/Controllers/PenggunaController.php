<?php

namespace App\Http\Controllers;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna.dashboard');
    }
}