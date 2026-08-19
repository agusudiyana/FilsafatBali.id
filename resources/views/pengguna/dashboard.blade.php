<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-[#2B1A0E] leading-tight" style="font-family: 'Cormorant Garamond', serif;">
                {{ __('Dashboard Pengguna') }}
            </h2>
            <a href="{{ url('/') }}" class="text-sm font-semibold text-[#8D2B1D] hover:underline">
                &larr; Kembali ke Beranda
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- SAMBUTAN & INFORMASI USER -->
            <div class="bg-white border border-[#E5D6BF] p-8 rounded-2xl shadow-sm flex items-center justify-between gap-6">
                <div class="flex items-center gap-5">
                    <div class="w-16 h-16 rounded-full bg-[#8D2B1D] text-white flex items-center justify-center font-bold text-2xl border-2 border-[#C8A45A] shrink-0 overflow-hidden">
                        @if(auth()->user()->foto ?? false)
                            <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="{{ auth()->user()->name }}" class="w-full h-full object-cover rounded-full">
                        @else
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        @endif
                    </div>
                    <div>
                        <h1 style="font-family:'Cormorant Garamond',serif;" class="text-3xl font-bold text-[#2B1A0E]">
                            Rahajeng Rauh, {{ auth()->user()->name }}!
                        </h1>
                        <p class="text-[#675A4D] text-sm mt-1">
                            Selamat datang di Ruang Pengguna Arsipan Budaya FilsafatBali.id. Kelola koleksi arsip tersimpan dan cek pembaruan notifikasi Anda di sini.
                        </p>
                    </div>
                </div>
            </div>

            <!-- KARTU NAVIGASI UTAMA -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- KARTU 1: ARSIP TERSIMPAN -->
                <div class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm hover:border-[#8D2B1D] transition flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-[#EFE4D3] text-[#8D2B1D] flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#8D2B1D]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                </svg>
                            </div>
                            <span class="text-xs font-semibold bg-[#FAF6F0] text-[#8D2B1D] px-3 py-1 rounded-full border border-[#E5D6BF]">
                                {{ isset($bookmarks) ? count($bookmarks) : 0 }} Item
                            </span>
                        </div>
                        <h3 style="font-family:'Cormorant Garamond',serif;" class="text-2xl font-bold text-[#2B1A0E]">
                            Koleksi Arsip Tersimpan
                        </h3>
                        <p class="text-sm text-[#675A4D] mt-2">
                            Akses kembali naskah kebudayaan, satua, dan artikel filsafat favorit yang telah Anda simpan.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-[#E5D6BF]">
                        @if(Route::has('pengguna.arsip.index'))
                            <a href="{{ route('pengguna.arsip.index') }}" class="group w-full inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-[#8D2B1D] text-white text-xs font-semibold rounded-xl hover:bg-[#732216] transition shadow-sm cursor-pointer">
                                <span>Buka Koleksi Tersimpan</span>
                                <span class="transition-transform group-hover:translate-x-1">&rarr;</span>
                            </a>
                        @else
                            <a href="{{ url('/') }}#jenis-filsafat" class="group w-full inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-[#8D2B1D] text-white text-xs font-semibold rounded-xl hover:bg-[#732216] transition shadow-sm cursor-pointer">
                                <span>Jelajahi Beranda</span>
                                <span class="transition-transform group-hover:translate-x-1">&rarr;</span>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- KARTU 2: PUSAT NOTIFIKASI -->
                <div class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm hover:border-[#8D2B1D] transition flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <!-- IKON LONCENG DENGAN INDIKATOR TITIK MERAH -->
                            <div class="relative w-12 h-12 rounded-xl bg-[#EFE4D3] text-[#8D2B1D] flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#8D2B1D]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                
                                <!-- TITIK MERAH: MUNCUL HANYA JIKA ADA UNREAD NOTIFIKASI -->
                                @if(isset($unreadCount) && $unreadCount > 0)
                                    <span class="absolute -top-1 -right-1 flex h-3.5 w-3.5">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#8D2B1D] opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-[#8D2B1D] border-2 border-white"></span>
                                    </span>
                                @endif
                            </div>

                            <span class="text-xs font-semibold bg-[#FAF6F0] text-[#8D2B1D] px-3 py-1 rounded-full border border-[#E5D6BF]">
                                {{ isset($unreadCount) ? $unreadCount : 0 }} Belum Dibaca
                            </span>
                        </div>
                        <h3 style="font-family:'Cormorant Garamond',serif;" class="text-2xl font-bold text-[#2B1A0E]">
                            Pusat Notifikasi
                        </h3>
                        <p class="text-sm text-[#675A4D] mt-2">
                            Pantau pembaruan artikel, ajaran baru, serta pengumuman kearifan lokal Bali langsung di sini.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-[#E5D6BF]">
                        <a href="{{ route('pengguna.notifikasi.index') }}" class="group w-full inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-[#8D2B1D] text-white text-xs font-semibold rounded-xl hover:bg-[#732216] transition shadow-sm cursor-pointer">
                            <span>Lihat Semua Notifikasi</span>
                            <span class="transition-transform group-hover:translate-x-1">&rarr;</span>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>