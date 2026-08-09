<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 1. KOLEKSI ARSIP / SIMPANAN (SUPPORT AJAX TOGGLE & JSON)
    |--------------------------------------------------------------------------
    */
    public function arsipIndex()
    {
        $bookmarks = Bookmark::where('user_id', Auth::id())->latest()->get();
        return view('pengguna.arsip.index', compact('bookmarks'));
    }

    public function storeArsip(Request $request)
    {
        // Validasi data masukan dari AJAX
        $request->validate([
            'item_title' => 'required|string',
            'item_type'  => 'nullable|string',
            'item_url'   => 'nullable|string',
        ]);

        $userId = Auth::id();
        $title = $request->item_title;
        $type = $request->item_type ?? 'artikel';
        $url = $request->item_url ?? '#';

        // Cek apakah artikel/item ini sudah ada di simpanan user
        $exists = Bookmark::where('user_id', $userId)
            ->where('item_title', $title)
            ->first();

        // JIKA SUDAH ADA -> TOGGLE OFF (BATAL SIMPAN / HAPUS)
        if ($exists) {
            $exists->delete();

            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'status'  => 'removed',
                    'message' => 'Artikel berhasil dihapus dari simpanan.'
                ]);
            }

            return back()->with('info', 'Artikel dihapus dari simpanan Anda.');
        }

        // JIKA BELUM ADA -> TOGGLE ON (SIMPAN BARU)
        Bookmark::create([
            'user_id'    => $userId,
            'item_title' => $title,
            'item_type'  => $type,
            'item_url'   => $url,
        ]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status'  => 'saved',
                'message' => 'Artikel berhasil disimpan ke Koleksi Arsip!'
            ]);
        }

        return back()->with('success', 'Artikel berhasil disimpan ke Koleksi Arsip!');
    }

    public function destroyArsip($id)
    {
        Bookmark::where('id', $id)->where('user_id', Auth::id())->delete();
        return back()->with('success', 'Artikel berhasil dihapus dari simpanan.');
    }

    /*
    |--------------------------------------------------------------------------
    | 2. FORUM DISKUSI KOMUNITAS
    |--------------------------------------------------------------------------
    */
    public function komunitasIndex()
    {
        $discussions = Discussion::with('user')->latest()->get();
        return view('pengguna.komunitas.index', compact('discussions'));
    }

    public function storeDiskusi(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:1000'
        ]);

        Discussion::create([
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Diskusi berhasil dikirim ke forum!');
    }
}