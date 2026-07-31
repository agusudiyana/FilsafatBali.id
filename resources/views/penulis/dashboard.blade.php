@extends('penulis.layouts.app')

@section('content')
    <!-- Header Dashboard Penulis -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-4xl font-bold text-[#1A110A]" style="font-family: 'Cormorant Garamond', serif;">
                Dashboard Penulis
            </h1>

            <p class="text-gray-500 mt-1">
                Selamat datang kembali! Pantau, kelola, dan publikasikan naskah filsafat serta kebudayaan Bali Anda.
            </p>
        </div>

        <!-- Tombol Buat Karya Baru -->
        <div class="flex items-center gap-3">
            <a href="{{ route('penulis.artikel.create') }}"
                class="inline-flex items-center gap-2 bg-[#992B20] hover:bg-[#7A2219] text-white px-5 py-2.5 rounded-xl font-semibold text-sm shadow-sm transition">
                <i data-feather="pen-tool" class="w-4 h-4"></i>
                <span>Tulis Karya Baru</span>
            </a>
        </div>
    </div>

    <!-- Grid Statistik Utama (3 Kolom Status) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">

        <!-- Total Kiriman -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 relative overflow-hidden">
            <div class="flex justify-between items-center">
                <h3 class="font-semibold text-gray-500 text-sm">Total Kiriman</h3>
                <div class="p-2.5 bg-[#F5E9D7] text-[#C48D2D] rounded-xl">
                    <i data-feather="book-open" class="w-5 h-5"></i>
                </div>
            </div>
            <h1 class="text-4xl font-bold mt-4 text-[#1A110A]">
                {{ $total ?? 0 }}
            </h1>
            <p class="text-xs text-gray-400 mt-2">Seluruh naskah filsafat</p>
        </div>

        <!-- Menunggu Verifikasi (Pending) -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 relative overflow-hidden">
            <div class="flex justify-between items-center">
                <h3 class="font-semibold text-gray-500 text-sm">Menunggu Verifikasi</h3>
                <div class="p-2.5 bg-amber-50 text-amber-600 rounded-xl">
                    <i data-feather="clock" class="w-5 h-5"></i>
                </div>
            </div>
            <h1 class="text-4xl font-bold mt-4 text-amber-600">
                {{ $pending ?? 0 }}
            </h1>
            <p class="text-xs text-amber-700/60 mt-2">Sedang ditinjau editor</p>
        </div>

        <!-- Disetujui / Terbit -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 relative overflow-hidden">
            <div class="flex justify-between items-center">
                <h3 class="font-semibold text-gray-500 text-sm">Disetujui / Terbit</h3>
                <div class="p-2.5 bg-emerald-50 text-emerald-600 rounded-xl">
                    <i data-feather="check-circle" class="w-5 h-5"></i>
                </div>
            </div>
            <h1 class="text-4xl font-bold mt-4 text-emerald-600">
                {{ $disetujui ?? 0 }}
            </h1>
            <p class="text-xs text-emerald-700/60 mt-2">Telah tayang di platform</p>
        </div>

    </div>

    <!-- Bagian Informasi Tambahan -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">

        <!-- Papan Pengumuman & Pedoman Penulisan Filsafat -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2.5 bg-[#F5E9D7] text-[#C48D2D] rounded-xl">
                        <i data-feather="award" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-[#1A110A]">Pedoman Penulisan Konten Filsafat</h3>
                        <p class="text-xs text-gray-400">Panduan penyusunan naskah kebudayaan & ajaran Bali</p>
                    </div>
                </div>

                <div class="bg-[#F7F0E7]/60 border border-[#ebd8bc]/50 rounded-xl p-4 text-sm text-gray-700 space-y-3">
                    <p class="font-semibold text-[#1A110A] flex items-center gap-2">
                        <i data-feather="info" class="w-4 h-4 text-[#C48D2D]"></i>
                        Etika & Standar Kedalaman Materi
                    </p>
                    <ul class="list-disc list-inside space-y-1.5 text-gray-600 text-xs sm:text-sm leading-relaxed">
                        <li>Sertakan referensi sumber/literatur asli saat menulis ajaran filsafat (misal: Sastra Kuno,
                            Lontar, atau Naskah Adat).</li>
                        <li>Pastikan penulisan ejaan Bahasa Bali/Kawi dan terjemahan Bahasa Indonesia sudah akurat.</li>
                        <li>Naskah yang diajukan akan melalui proses verifikasi oleh Admin/Editor dalam kurun waktu max 1x24
                            jam.</li>
                    </ul>
                </div>
            </div>

            <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400">
                <span>Platform FilsafatBali.id</span>
                <span class="text-emerald-600 font-semibold flex items-center gap-1">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Sistem Penulisan Aktif
                </span>
            </div>
        </div>

        <!-- Ringkasan Kategori Karya (Filsafat & Kebudayaan) -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2.5 bg-[#F5E9D7] text-[#C48D2D] rounded-xl">
                        <i data-feather="layers" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-[#1A110A]">Distribusi Kategori</h3>
                        <p class="text-xs text-gray-400">Karya yang Anda terbitkan</p>
                    </div>
                </div>

                <div class="space-y-2.5 mt-4">
                    <!-- Artikel / Ajaran Tetua -->
                    <a href="{{ route('penulis.artikel.index') }}"
                        class="flex justify-between items-center p-3 bg-gray-50 hover:bg-[#F7F0E7] rounded-xl transition group">
                        <span class="text-xs font-semibold text-gray-700 group-hover:text-[#992B20]">Artikel & Ajaran
                            Tetua</span>
                        <span
                            class="font-bold text-[#1A110A] bg-white px-2.5 py-0.5 rounded-lg text-xs shadow-sm border border-gray-100">
                            {{ $totalArtikel ?? 0 }}
                        </span>
                    </a>

                    <!-- Cecimpedan -->
                    <a href="{{ route('penulis.cecimpedan.index') }}"
                        class="flex justify-between items-center p-3 bg-gray-50 hover:bg-[#F7F0E7] rounded-xl transition group">
                        <span class="text-xs font-semibold text-gray-700 group-hover:text-[#992B20]">Cecimpedan Bali</span>
                        <span
                            class="font-bold text-[#1A110A] bg-white px-2.5 py-0.5 rounded-lg text-xs shadow-sm border border-gray-100">
                            {{ $totalCecimpedan ?? 0 }}
                        </span>
                    </a>

                    <!-- Satua Bali -->
                    <a href="{{ route('penulis.satua.index') }}"
                        class="flex justify-between items-center p-3 bg-gray-50 hover:bg-[#F7F0E7] rounded-xl transition group">
                        <span class="text-xs font-semibold text-gray-700 group-hover:text-[#992B20]">Satua Bali</span>
                        <span
                            class="font-bold text-[#1A110A] bg-white px-2.5 py-0.5 rounded-lg text-xs shadow-sm border border-gray-100">
                            {{ $totalSatua ?? 0 }}
                        </span>
                    </a>

                    <!-- Istilah Bali -->
                    <a href="{{ route('penulis.istilah.index') }}"
                        class="flex justify-between items-center p-3 bg-gray-50 hover:bg-[#F7F0E7] rounded-xl transition group">
                        <span class="text-xs font-semibold text-gray-700 group-hover:text-[#992B20]">Istilah Bali</span>
                        <span
                            class="font-bold text-[#1A110A] bg-white px-2.5 py-0.5 rounded-lg text-xs shadow-sm border border-gray-100">
                            {{ $totalIstilah ?? 0 }}
                        </span>
                    </a>
                </div>
            </div>

            <div class="mt-4 pt-3 border-t border-gray-100 text-center">
                <span class="text-xs text-gray-400 italic">"Ngrembakang Kebudayaan miwah Filsafat Bali" ✨</span>
            </div>
        </div>

    </div>

    <!-- Tabel Kiriman Terbaru -->
    <div class="mt-8 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h3 class="font-bold text-lg text-[#1A110A]" style="font-family: 'Cormorant Garamond', serif;">
                    Aktivitas Naskah & Karya Terbaru
                </h3>
                <p class="text-sm text-gray-500">
                    Daftar karya filsafat, ajaran tetua, satua, dan istilah Bali yang terakhir Anda ajukan.
                </p>
            </div>
            <a href="{{ route('penulis.artikel.index') }}"
                class="text-xs font-bold text-[#992B20] hover:underline flex items-center gap-1 shrink-0">
                <span>Lihat Seluruh Karya</span>
                <i data-feather="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#F5E9D7] text-[#1A110A] text-xs uppercase font-semibold">
                    <tr>
                        <th class="p-4 text-center w-12">No</th>
                        <th class="p-4">Kategori Karya</th>
                        <th class="p-4">Judul / Tajuk Naskah</th>
                        <th class="p-4">Asal / Topik Kebudayaan</th>
                        <th class="p-4">Status Verifikasi</th>
                        <th class="p-4 text-center">Tanggal Dibuat</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($recentItems ?? [] as $item)
                        <tr class="hover:bg-gray-50/80 transition">
                            <td class="p-4 text-center text-gray-500 font-medium">{{ $loop->iteration }}</td>

                            <!-- Kategori Badges -->
                            <td class="p-4">
                                @if (($item->tipe ?? '') == 'Artikel')
                                    <span
                                        class="bg-amber-100 text-amber-800 px-2.5 py-1 rounded-md text-xs font-bold">Ajaran
                                        Tetua</span>
                                @elseif(($item->tipe ?? '') == 'Cecimpedan')
                                    <span
                                        class="bg-purple-100 text-purple-800 px-2.5 py-1 rounded-md text-xs font-bold">Cecimpedan</span>
                                @elseif(($item->tipe ?? '') == 'Satua')
                                    <span
                                        class="bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-md text-xs font-bold">Satua
                                        Bali</span>
                                @else
                                    <span
                                        class="bg-blue-100 text-blue-800 px-2.5 py-1 rounded-md text-xs font-bold">Istilah
                                        Bali</span>
                                @endif
                            </td>

                            <td class="p-4 font-semibold text-[#1A110A]">
                                {{ $item->judul ?? ($item->title ?? '-') }}
                            </td>

                            <td class="p-4 text-gray-600">
                                {{ $item->kategori ?? ($item->asal ?? '-') }}
                            </td>

                            <!-- Status Verifikasi (Disesuaikan dengan Gambar) -->
                            <td class="p-4">
                                @if (($item->status ?? 'pending') == 'pending')
                                    <span
                                        class="inline-flex items-center gap-1.5 bg-[#FFFDF0] text-[#C48D2D] border border-[#FDE68A] px-3 py-1 rounded-full text-xs font-semibold shadow-2xs">
                                        <i data-feather="clock" class="w-3.5 h-3.5 stroke-[2.5]"></i> Menunggu Verifikasi
                                    </span>
                                @elseif(($item->status ?? '') == 'disetujui' || ($item->status ?? '') == 'published')
                                    <span
                                        class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-semibold shadow-2xs">
                                        <i data-feather="check-circle" class="w-3.5 h-3.5 stroke-[2.5]"></i> Disetujui /
                                        Terbit
                                    </span>
                                @elseif(($item->status ?? '') == 'ditolak')
                                    <span
                                        class="inline-flex items-center gap-1.5 bg-[#FFF0F0] text-[#B91C1C] border border-[#FCA5A5] px-3 py-1 rounded-full text-xs font-semibold shadow-2xs">
                                        <i data-feather="x-circle" class="w-3.5 h-3.5 stroke-[2.5]"></i> Ditolak
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1.5 bg-[#FFF0F0] text-[#B91C1C] border border-[#FCA5A5] px-3 py-1 rounded-full text-xs font-semibold shadow-2xs">
                                        <i data-feather="alert-circle" class="w-3.5 h-3.5 stroke-[2.5]"></i> Perlu Revisi
                                    </span>
                                @endif
                            </td>

                            <td class="p-4 text-center text-gray-500 text-xs">
                                {{ isset($item->created_at) ? \Carbon\Carbon::parse($item->created_at)->format('d M Y') : '-' }}
                            </td>

                            <!-- Tombol Aksi Langsung (Dynamic Link) -->
                            <td class="p-4 text-center">
                                @php
                                    $editRoute = '#';
                                    if (($item->tipe ?? '') == 'Artikel') {
                                        $editRoute = route('penulis.artikel.edit', $item->id ?? 1);
                                    } elseif (($item->tipe ?? '') == 'Cecimpedan') {
                                        $editRoute = route('penulis.cecimpedan.edit', $item->id ?? 1);
                                    } elseif (($item->tipe ?? '') == 'Satua') {
                                        $editRoute = route('penulis.satua.edit', $item->id ?? 1);
                                    } elseif (($item->tipe ?? '') == 'Istilah') {
                                        $editRoute = route('penulis.istilah.edit', $item->id ?? 1);
                                    }
                                @endphp

                                <a href="{{ $editRoute }}"
                                    class="p-2 inline-flex text-gray-500 hover:text-[#992B20] hover:bg-gray-100 rounded-lg transition"
                                    title="Sunting Naskah">
                                    <i data-feather="edit-3" class="w-4 h-4"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <!-- Empty State Khusus Penulisan Filsafat & Sastra -->
                        <tr>
                            <td colspan="7" class="text-center py-12 px-4">
                                <div class="flex flex-col items-center justify-center gap-3 max-w-sm mx-auto">
                                    <div
                                        class="w-14 h-14 rounded-full bg-[#F5E9D7] text-[#C48D2D] flex items-center justify-center shadow-inner">
                                        <i data-feather="feather" class="w-6 h-6"></i>
                                    </div>
                                    <div class="space-y-1">
                                        <h4 class="font-bold text-[#1A110A] text-base"
                                            style="font-family: 'Cormorant Garamond', serif;">
                                            Belum Ada Naskah Ditulis
                                        </h4>
                                        <p class="text-xs text-gray-500 leading-relaxed">
                                            Mulailah bagikan wawasan filsafat, ajaran tetua, atau kisah kebudayaan Bali
                                            pertama Anda.
                                        </p>
                                    </div>
                                    <a href="{{ route('penulis.artikel.create') }}"
                                        class="mt-2 inline-flex items-center gap-2 bg-[#992B20] hover:bg-[#7A2219] text-white text-xs font-bold px-4 py-2 rounded-xl shadow-sm transition">
                                        <i data-feather="pen-tool" class="w-3.5 h-3.5"></i>
                                        <span>Tulis Naskah Pertama Sekarang</span>
                                    </a>
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
