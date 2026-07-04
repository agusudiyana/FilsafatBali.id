<?php

namespace App\Http\Controllers;

use App\Models\Ajaran;

class AjaranController extends Controller
{
    public function index()
    {
        $ajarans = Ajaran::latest()->get();

        return view('admin.ajaran.index', compact('ajarans'));
    }
}