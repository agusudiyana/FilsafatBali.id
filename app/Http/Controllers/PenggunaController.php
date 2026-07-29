<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Favorite;
use App\Models\Download;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 1. KOLEKSI ARSIP / SIMPANAN
    |--------------------------------------------------------------------------
    */
    public function arsipIndex()
    {
        $bookmarks = Bookmark::where('user_id', Auth::id())->latest()->get();
        return view('pengguna.arsip.index', compact('bookmarks'));
    }

    public function storeArsip(Request $request)
    {
        $request->validate([
            'item_title' => 'required|string',
            'item_type'  => 'required|string',
            'item_url'   => 'required|string',
        ]);

        // Cegah duplikasi simpanan
        $exists = Bookmark::where('user_id', Auth::id())
            ->where('item_url', $request->item_url)
            ->first();

        if ($exists) {
            return back()->with('info', 'Artikel ini sudah ada di dalam simpanan Anda.');
        }

        Bookmark::create([
            'user_id'    => Auth::id(),
            'item_title' => $request->item_title,
            'item_type'  => $request->item_type,
            'item_url'   => $request->item_url,
        ]);

        return back()->with('success', 'Artikel berhasil disimpan ke Koleksi Arsip!');
    }

    public function destroyArsip($id)
    {
        Bookmark::where('id', $id)->where('user_id', Auth::id())->delete();
        return back()->with('success', 'Artikel berhasil dihapus dari simpanan.');
    }

    /*
    |--------------------------------------------------------------------------
    | 2. ARTIKEL FAVORIT
    |--------------------------------------------------------------------------
    */
    public function favoritIndex()
    {
        $favorites = Favorite::where('user_id', Auth::id())->latest()->get();
        return view('pengguna.favorit.index', compact('favorites'));
    }

    public function toggleFavorit(Request $request, $id)
    {
        $favorite = Favorite::where('id', $id)->where('user_id', Auth::id())->first();

        if ($favorite) {
            $favorite->delete();
            return back()->with('success', 'Artikel berhasil dihapus dari favorit.');
        }

        Favorite::create([
            'user_id'       => Auth::id(),
            'article_title' => $request->article_title ?? 'Artikel Tanpa Judul',
            'article_url'   => $request->article_url ?? '#',
        ]);

        return back()->with('success', 'Artikel berhasil ditambahkan ke favorit!');
    }

    /*
    |--------------------------------------------------------------------------
    | 3. FORUM DISKUSI KOMUNITAS
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

    /*
    |--------------------------------------------------------------------------
    | 4. PUSAT UNDUHAN
    |--------------------------------------------------------------------------
    */
    public function unduhanIndex()
    {
        $downloads = Download::where('user_id', Auth::id())->latest()->get();
        return view('pengguna.unduhan.index', compact('downloads'));
    }
}