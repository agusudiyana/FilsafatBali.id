<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Artikel;
use App\Models\Cecimpedan;
use App\Models\Satua;
use App\Models\Istilah;
use App\Models\AjaranTertua;
use App\Models\Filsafat;
use App\Models\User;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil data utama yang berstatus 'disetujui' dari database
        $ajarans = AjaranTertua::where('status', 'disetujui')->latest()->get();
        $artikels = Artikel::where('status', 'disetujui')->latest()->get();
        $cecimpedans = Cecimpedan::where('status', 'disetujui')->latest()->get();
        $satuas = Satua::where('status', 'disetujui')->latest()->get();
        $istilahs = Istilah::where('status', 'disetujui')->latest()->get();
        $filsafats = Filsafat::where('status', 'disetujui')->latest()->get();

        // 2. Ambil nilai setting yang diinput manual oleh Admin (aman jika tabel belum ada)
        $settings = [];
        if (Schema::hasTable('settings')) {
            $settings = Setting::pluck('value', 'key')->toArray();
        }

        // 3. Tentukan Angka Total yang Ditampilkan:
        // Prioritas 1: Angka manual yang diinput Admin di Form Kelola Statistik
        // Prioritas 2 (Fallback): Hitungan asli dari database jika admin belum mengisinya
        $totalAjaran = isset($settings['total_ajaran_tetua']) && $settings['total_ajaran_tetua'] !== '' 
            ? (int) $settings['total_ajaran_tetua'] 
            : ($ajarans->count() + $artikels->count());

        $totalCecimpedan = isset($settings['total_cecimpedan']) && $settings['total_cecimpedan'] !== '' 
            ? (int) $settings['total_cecimpedan'] 
            : $cecimpedans->count();

        $totalSatua = isset($settings['total_satua_bali']) && $settings['total_satua_bali'] !== '' 
            ? (int) $settings['total_satua_bali'] 
            : $satuas->count();

        $totalIstilah = isset($settings['total_istilah_bali']) && $settings['total_istilah_bali'] !== '' 
            ? (int) $settings['total_istilah_bali'] 
            : $istilahs->count();

        $totalFilsafat = $filsafats->count();

        $realTerverifikasi = $ajarans->count() + $cecimpedans->count() + $satuas->count() + $istilahs->count() + $filsafats->count() + $artikels->count();
        $totalTerverifikasi = isset($settings['total_terverifikasi']) && $settings['total_terverifikasi'] !== '' 
            ? (int) $settings['total_terverifikasi'] 
            : $realTerverifikasi;

        $totalKontributor = isset($settings['total_kontributor']) && $settings['total_kontributor'] !== '' 
            ? (int) $settings['total_kontributor'] 
            : User::where('role', 'penulis')->count();

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

    /**
     * Endpoint API Live Search
     * Menghubungkan Search Bar langsung ke Database
     */
    public function searchLive(Request $request)
    {
        $query = trim($request->get('q', ''));

        if (empty($query)) {
            return response()->json([]);
        }

        $results = collect();

        // 1. Cari Satua Bali
        try {
            $satuas = Satua::where(function ($q) use ($query) {
                $q->where('judul', 'LIKE', "%{$query}%")
                  ->orWhere('nama', 'LIKE', "%{$query}%")
                  ->orWhere('judul_satua', 'LIKE', "%{$query}%")
                  ->orWhere('title', 'LIKE', "%{$query}%")
                  ->orWhere('cerita', 'LIKE', "%{$query}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$query}%");
            })->take(5)->get();

            foreach ($satuas as $item) {
                $judulSatua = $item->judul ?? $item->nama ?? $item->judul_satua ?? $item->title ?? 'Satua Bali';
                $results->push([
                    'id' => $item->id,
                    'judul' => (string) $judulSatua,
                    'penulis' => $item->penulis ?? ($item->user->name ?? 'Tim Balinesia'),
                    'tipe' => 'Satua Bali',
                    'target_type' => 'satua',
                    'color' => 'bg-[#2D6C3F]'
                ]);
            }
        } catch (\Exception $e) {}

        // 2. Cari Artikel / Ajaran Tetua
        try {
            $artikels = Artikel::where(function ($q) use ($query) {
                $q->where('judul', 'LIKE', "%{$query}%")
                  ->orWhere('title', 'LIKE', "%{$query}%")
                  ->orWhere('isi', 'LIKE', "%{$query}%");
            })->take(5)->get();

            foreach ($artikels as $item) {
                $judulArtikel = $item->judul ?? $item->title ?? 'Artikel';
                $results->push([
                    'id' => $item->id,
                    'judul' => (string) $judulArtikel,
                    'penulis' => $item->penulis ?? ($item->user->name ?? 'Tim Balinesia'),
                    'tipe' => $item->kategori ?? 'Ajaran Tetua',
                    'target_type' => 'artikel',
                    'color' => 'bg-[#992B20]'
                ]);
            }
        } catch (\Exception $e) {}

        // 3. Cari Cecimpedan
        try {
            $cecimpedans = Cecimpedan::where(function ($q) use ($query) {
                $q->where('judul', 'LIKE', "%{$query}%")
                  ->orWhere('pertanyaan', 'LIKE', "%{$query}%");
            })->take(5)->get();

            foreach ($cecimpedans as $item) {
                $judulCecimpedan = $item->judul ?? $item->pertanyaan ?? 'Cecimpedan';
                $results->push([
                    'id' => $item->id,
                    'judul' => (string) $judulCecimpedan,
                    'penulis' => $item->penulis ?? ($item->user->name ?? 'Tim Balinesia'),
                    'tipe' => 'Cecimpedan',
                    'target_type' => 'cecimpedan',
                    'color' => 'bg-[#D9A441]'
                ]);
            }
        } catch (\Exception $e) {}

        // 4. Cari Istilah Bali
        try {
            $istilahs = Istilah::where(function ($q) use ($query) {
                $q->where('istilah', 'LIKE', "%{$query}%")
                  ->orWhere('judul', 'LIKE', "%{$query}%")
                  ->orWhere('arti', 'LIKE', "%{$query}%");
            })->take(5)->get();

            foreach ($istilahs as $item) {
                $judulIstilah = $item->istilah ?? $item->judul ?? 'Istilah Bali';
                $results->push([
                    'id' => $item->id,
                    'judul' => (string) $judulIstilah,
                    'penulis' => $item->penulis ?? ($item->user->name ?? 'Tim Balinesia'),
                    'tipe' => 'Istilah Bali',
                    'target_type' => 'istilah',
                    'color' => 'bg-[#304C73]'
                ]);
            }
        } catch (\Exception $e) {}

        // 5. Cari Filsafat
        try {
            $filsafats = Filsafat::where(function ($q) use ($query) {
                $q->where('judul', 'LIKE', "%{$query}%")
                  ->orWhere('ringkasan', 'LIKE', "%{$query}%");
            })->take(5)->get();

            foreach ($filsafats as $item) {
                $results->push([
                    'id' => $item->id,
                    'judul' => (string) ($item->judul ?? 'Filsafat'),
                    'penulis' => $item->penulis ?? ($item->user->name ?? 'Tim Balinesia'),
                    'tipe' => 'Filsafat',
                    'target_type' => 'filsafat',
                    'color' => 'bg-[#8B231B]'
                ]);
            }
        } catch (\Exception $e) {}

        return response()->json($results->take(8));
    }
}