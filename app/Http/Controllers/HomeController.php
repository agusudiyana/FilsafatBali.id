<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        // 3. Hitung total data terverifikasi
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

        // 1. Cari Satua Bali (Mencakup semua kemungkinan nama kolom)
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