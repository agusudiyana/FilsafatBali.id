@extends('penulis.layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        
        <!-- Header Halaman -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 border-b border-[#E6D5B8] pb-6">
            <div>
                <span class="text-xs font-semibold tracking-widest text-[#C48D2D] uppercase">Manajemen Konten</span>
                <h1 class="text-3xl font-bold font-serif text-[#2C221E] mt-1">
                    Daftar Artikel & Kiriman
                </h1>
                <p class="text-[#6B635B] text-sm mt-1">
                    Kelola, pantau status verifikasi, dan tambahkan kearifan lokal Bali Anda di sini.
                </p>
            </div>

            <a href="{{ route('penulis.artikel.create') }}"
                class="bg-[#C48D2D] hover:bg-[#A9781F] text-white px-5 py-3 rounded-xl flex items-center gap-2 shadow-md transition-all transform hover:-translate-y-0.5">
                <i data-feather="plus-circle" class="w-5 h-5"></i>
                <span class="font-medium">Tambah Artikel Baru</span>
            </a>
        </div>

        <!-- Filter Kategori (Tab Navigasi Mini) -->
        <div class="flex flex-wrap gap-2 mb-6 border-b border-gray-200 pb-3">
            <button class="px-4 py-2 text-sm font-semibold text-white bg-[#2C221E] rounded-lg shadow-sm transition">Semua</button>
            <button class="px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-gray-100 rounded-lg transition">Ajaran Tertua</button>
            <button class="px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-gray-100 rounded-lg transition">Cecimpedan</button>
            <button class="px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-gray-100 rounded-lg transition">Satua Bali</button>
            <button class="px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-gray-100 rounded-lg transition">Istilah Bali</button>
        </div>

        @if (session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-xl mb-6 flex items-center gap-3 shadow-sm">
                <i data-feather="check-circle" class="w-5 h-5 text-emerald-600"></i>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Tabel Data Bersih & Elegan -->
        <div class="bg-white rounded-2xl shadow-sm border border-[#E6D5B8]/60 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-[#FBF9F5] text-[#2C221E] uppercase text-xs tracking-wider border-b border-[#E6D5B8]">
                        <tr>
                            <th class="p-4 font-semibold">No</th>
                            <th class="p-4 font-semibold">Judul Artikel</th>
                            <th class="p-4 font-semibold">Kategori</th>
                            <th class="p-4 font-semibold">Status</th>
                            <th class="p-4 font-center text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @forelse($artikels as $a)
                            <tr class="hover:bg-[#FBF9F5]/60 transition">
                                <td class="p-4 font-medium text-gray-500">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="p-4 font-semibold text-[#2C221E]">
                                    {{ $a->judul }}
                                </td>
                                <td class="p-4">
                                    <span class="bg-[#F3E7D0] text-[#2C221E] px-3 py-1 rounded-full text-xs font-medium">
                                        {{ $a->kategori ?? 'Ajaran Tertua' }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    @if ($a->status == 'pending')
                                        <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="clock" class="w-3.5 h-3.5"></i> Pending
                                        </span>
                                    @elseif($a->status == 'disetujui')
                                        <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="check-circle" class="w-3.5 h-3.5"></i> Disetujui
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 bg-rose-50 text-rose-700 border border-rose-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="x-circle" class="w-3.5 h-3.5"></i> Ditolak
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('penulis.artikel.edit', $a->id) }}" title="Edit Artikel"
                                            class="bg-amber-500 hover:bg-amber-600 text-white p-2 rounded-lg transition shadow-sm">
                                            <i data-feather="edit-2" class="w-4 h-4"></i>
                                        </a>

                                        <form action="{{ route('penulis.artikel.destroy', $a->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Artikel"
                                                class="bg-rose-500 hover:bg-rose-600 text-white p-2 rounded-lg transition shadow-sm">
                                                <i data-feather="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-12 text-gray-400">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <i data-feather="inbox" class="w-10 h-10 stroke-1 text-gray-300"></i>
                                        <span class="text-base font-medium text-gray-500">Belum ada data artikel yang dikirimkan.</span>
                                        <p class="text-xs text-gray-400">Mulai buat kontribusi budaya pertama Anda sekarang.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Script Inisialisasi Ikon -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>
@endsection