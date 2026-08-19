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
    | 0. DASHBOARD PENGGUNA & NOTIFIKASI
    |--------------------------------------------------------------------------
    */
    public function dashboardIndex()
    {
        $user = Auth::user();

        // 1. Ambil data arsip/bookmark tersimpan milik pengguna yang sedang login
        $bookmarks = Bookmark::where('user_id', $user->id)->latest()->get();

        // 2. Ambil daftar notifikasi user (paginasi 10 per halaman)
        $notifikasis = $user->notifications()->paginate(10);

        // 3. Hitung total notifikasi yang belum dibaca
        $unreadCount = $user->unreadNotifications->count();

        // Kirim $bookmarks, $notifikasis, dan $unreadCount ke view
        return view('pengguna.dashboard', compact('bookmarks', 'notifikasis', 'unreadCount'));
    }

    // Menampilkan Halaman Dedicated / Khusus Pusat Notifikasi
    public function notifikasiIndex()
    {
        $user = Auth::user();

        // Ambil notifikasi dengan paginasi 15 per halaman
        $notifikasis = $user->notifications()->paginate(15);
        $unreadCount = $user->unreadNotifications->count();

        return view('pengguna.notifikasi.index', compact('notifikasis', 'unreadCount'));
    }

    // OTOMATIS TANDAI DIBACA & REDIRECT UNTUK MEMBUKA OVERLAY ARTIKEL SESUAI JUDUL
    public function bacaDanBuka($id)
    {
        $notif = Auth::user()->notifications()->where('id', $id)->first();

        // Default pengalihan ke seksi artikel
        $targetUrl = url('/#artikel');

        if ($notif) {
            $data = $notif->data ?? [];

            // Prioritaskan mengambil judul artikel/materi, lalu fallback ke ID jika ada
            $judul = $data['judul'] ?? $data['title'] ?? null;
            $itemId = $data['item_id'] ?? $data['id'] ?? null;

            if ($judul) {
                // Redirect menggunakan parameter 'open' (berdasarkan Judul) untuk mentrigger modal overlay
                $targetUrl = url('/?open=' . urlencode($judul) . '#artikel');
            } elseif ($itemId) {
                // Fallback jika hanya membawa ID
                $targetUrl = url('/?open_modal=' . $itemId . '&type=artikel#artikel');
            }

            // Tandai sudah dibaca agar titik merah indikator langsung hilang
            $notif->markAsRead();
        }

        return redirect()->to($targetUrl);
    }

    // Tandai satu notifikasi tertentu sebagai sudah dibaca (via tombol centang)
    public function markNotifAsRead($id)
    {
        $notif = Auth::user()->notifications()->where('id', $id)->first();

        if ($notif) {
            $notif->markAsRead();
        }

        return redirect()->back();
    }

    // Tandai SEMUA notifikasi sebagai sudah dibaca
    public function markAllNotifAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return redirect()->back()->with('success', 'Semua notifikasi ditandai sudah dibaca.');
    }

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
}