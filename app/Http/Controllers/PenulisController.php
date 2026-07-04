<?php

namespace App\Http\Controllers;

class PenulisController extends Controller
{
    public function index()
    {
        return view('penulis.dashboard');
    }
}