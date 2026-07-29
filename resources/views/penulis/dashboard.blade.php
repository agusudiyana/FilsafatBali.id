@extends('penulis.layouts.app')

@section('content')

<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <div>
        <h1 class="text-4xl font-bold text-[#1A110A]">
            Dashboard Penulis
        </h1>

        <p class="text-gray-500 mt-2">
            Selamat datang kembali! Pantau dan kelola seluruh karya tulis budaya Anda di sini.
        </p>
    </div>
</div>

<!-- Grid Statistik Utama (4 Kolom Status) -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">

    <!-- Total Kiriman -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 relative overflow-hidden">
        <div class="flex justify-between items-center">
            <h3 class="font-semibold text-gray-500 text-sm">Total Kiriman</h3>
            <div class="p-2 bg-yellow-50 text-yellow-600 rounded-xl">
                <i data-feather="file-text" class="w-5 h-5"></i>
            </div>
        </div>
        <h1 class="text-4xl font-bold mt-4 text-[#1A110A]">
            {{ $total ?? 0 }}
        </h1>
    </div>

    <!-- Pending -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 relative overflow-hidden">
        <div class="flex justify-between items-center">
            <h3 class="font-semibold text-gray-500 text-sm">Pending</h3>
            <div class="p-2 bg-amber-50 text-amber-600 rounded-xl">
                <i data-feather="clock" class="w-5 h-5"></i>
            </div>
        </div>
        <h1 class="text-4xl font-bold mt-4 text-amber-600">
            {{ $pending ?? 0 }}
        </h1>
    </div>

    <!-- Disetujui -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 relative overflow-hidden">
        <div class="flex justify-between items-center">
            <h3 class="font-semibold text-gray-500 text-sm">Disetujui</h3>
            <div class="p-2 bg-green-50 text-green-600 rounded-xl">
                <i data-feather="check-circle" class="w-5 h-5"></i>
            </div>
        </div>
        <h1 class="text-4xl font-bold mt-4 text-green-600">
            {{ $disetujui ?? 0 }}
        </h1>
    </div>

    <!-- Ditolak -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 relative overflow-hidden">
        <div class="flex justify-between items-center">
            <h3 class="font-semibold text-gray-500 text-sm">Ditolak</h3>
            <div class="p-2 bg-red-50 text-red-600 rounded-xl">
                <i data-feather="x-circle" class="w-5 h-5"></i>
            </div>
        </div>
        <h1 class="text-4xl font-bold mt-4 text-red-600">
            {{ $ditolak ?? 0 }}
        </h1>
    </div>

</div>

<!-- Bagian Informasi Tambahan -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
    
    <!-- Papan Pengumuman Admin -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between">
        <div>
            <div class="flex items-center gap-3 mb-4">
                <div class="p-2.5 bg-[#F5E9D7] text-[#C48D2D] rounded-xl">
                    <i data-feather="bell" class="w-5 h-5"></i>
                </div>
                <div>
                    <h3 class="font-bold text-lg text-[#1A110A]">Pengumuman & Informasi Sistem</h3>
                    <p class="text-xs text-gray-400">Pesan penting dari Administrator platform</p>
                </div>
            </div>
            
            <div class="bg-[#F7F0E7]/60 border border-[#ebd8bc]/50 rounded-xl p-4 text-sm text-gray-700 space-y-2">
                <p class="font-semibold text-[#1A110A] flex items-center gap-2">
                    <i data-feather="info" class="w-4 h-4 text-[#C48D2D]"></i>
                    Panduan Verifikasi Karya
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Setiap karya (Satua atau Istilah) yang berstatus <strong>Pending</strong> akan ditinjau oleh Admin maksimal dalam 1x24 jam. Pastikan ejaan bahasa Bali atau terjemahan yang Anda masukkan sudah akurat dan sesuai kaidah.
                </p>
            </div>
        </div>

        <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400">
            <span>Status Platform: Berjalan Normal</span>
            <span class="text-green-600 font-semibold flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span> Terhubung ke Server
            </span>
        </div>
    </div>

    <!-- Ringkasan Jenis Karya -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between">
        <div>
            <div class="flex items-center gap-3 mb-4">
                <div class="p-2.5 bg-yellow-50 text-yellow-600 rounded-xl">
                    <i data-feather="layers" class="w-5 h-5"></i>
                </div>
                <div>
                    <h3 class="font-bold text-lg text-[#1A110A]">Jenis Karya Anda</h3>
                    <p class="text-xs text-gray-400">Distribusi kiriman</p>
                </div>
            </div>

            <div class="space-y-3 mt-4">
                <div class="flex justify-between items-center p-3 bg-gray-50 rounded-xl">
                    <span class="text-sm font-medium text-gray-700">Total Satua Bali</span>
                    <span class="font-bold text-[#1A110A] bg-white px-3 py-1 rounded-lg shadow-sm border border-gray-100">
                        {{ $totalSatua ?? 0 }}
                    </span>
                </div>
                <div class="flex justify-between items-center p-3 bg-gray-50 rounded-xl">
                    <span class="text-sm font-medium text-gray-700">Total Istilah</span>
                    <span class="font-bold text-[#1A110A] bg-white px-3 py-1 rounded-lg shadow-sm border border-gray-100">
                        {{ $totalIstilah ?? 0 }}
                    </span>
                </div>
            </div>
        </div>

        <div class="mt-6 pt-4 border-t border-gray-100 text-center">
            <span class="text-xs text-gray-400">Terus berkarya untuk melestarikan budaya Bali ✨</span>
        </div>
    </div>

</div>

<!-- Tabel Kiriman Terbaru (Gabungan Satua & Istilah) -->
<div class="mt-8 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
        <div>
            <h3 class="font-bold text-lg text-[#1A110A]">Aktivitas Kiriman Terbaru</h3>
            <p class="text-sm text-gray-500">Daftar karya (Satua & Istilah) terakhir yang Anda ajukan.</p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-[#F5E9D7] text-[#1A110A] text-xs uppercase font-semibold">
                <tr>
                    <th class="p-4">No</th>
                    <th class="p-4">Tipe</th>
                    <th class="p-4">Judul / Istilah</th>
                    <th class="p-4">Asal / Kategori</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-center">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse($recentItems ?? [] as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4 text-gray-500">{{ $loop->iteration }}</td>
                    <td class="p-4">
                        @if($item->tipe == 'Satua')
                            <span class="bg-amber-100 text-amber-800 px-2.5 py-1 rounded-md text-xs font-bold">Satua</span>
                        @else
                            <span class="bg-blue-100 text-blue-800 px-2.5 py-1 rounded-md text-xs font-bold">Istilah</span>
                        @endif
                    </td>
                    <td class="p-4 font-semibold text-[#1A110A]">{{ $item->judul }}</td>
                    <td class="p-4 text-gray-600">{{ $item->asal ?? '-' }}</td>
                    <td class="p-4">
                        @if($item->status == 'pending')
                            <span class="inline-flex items-center gap-1 bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                <i data-feather="clock" class="w-3 h-3"></i> Pending
                            </span>
                        @elseif($item->status == 'disetujui')
                            <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                <i data-feather="check-circle" class="w-3 h-3"></i> Disetujui
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                <i data-feather="x-circle" class="w-3 h-3"></i> Ditolak
                            </span>
                        @endif
                    </td>
                    <td class="p-4 text-center text-gray-500 text-xs">
                        {{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center p-8 text-gray-400">
                        <div class="flex flex-col items-center justify-center gap-2">
                            <i data-feather="inbox" class="w-8 h-8 text-gray-300"></i>
                            <span>Belum ada riwayat kiriman satua maupun istilah.</span>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Inisialisasi Feather Icons -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>

@endsection