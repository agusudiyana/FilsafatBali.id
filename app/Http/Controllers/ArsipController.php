<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark; // MANDATORI: Jangan lupa baris ini!

class ArsipController extends Controller
{
    public function index()
    {
        // Ambil data arsip milik user yang login
        $arsips = Bookmark::where('user_id', auth()->id())->latest()->get();

        return view('arsip.index', compact('arsips'));
    }

    public function store(Request $request)
    {
        // Pastikan user sudah login
        if (!auth()->check()) {
            return response()->json(['status' => 'unauthorized', 'message' => 'Silakan login terlebih dahulu'], 401);
        }

        $userId = auth()->id();
        $title  = $request->item_title;
        $type   = $request->item_type;
        $url    = $request->item_url;

        // Cek apakah item sudah tersimpan di database
        $bookmark = Bookmark::where('user_id', $userId)
                            ->where('item_title', $title)
                            ->first();

        if ($bookmark) {
            // BATAL SIMPAN: Hapus dari database
            $bookmark->delete();
            return response()->json([
                'status'  => 'removed',
                'isSaved' => false,
                'message' => 'Berhasil dihapus dari arsip'
            ]);
        } else {
            // SIMPAN: Masukkan ke database
            Bookmark::create([
                'user_id'    => $userId,
                'item_title' => $title,
                'item_type'  => $type,
                'item_url'   => $url ?? url()->current()
            ]);

            return response()->json([
                'status'  => 'saved',
                'isSaved' => true,
                'message' => 'Berhasil disimpan ke arsip'
            ]);
        }
    }
}