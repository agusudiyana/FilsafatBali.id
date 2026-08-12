@extends('admin.layouts.app')

@section('content')
    <!-- Header Dashboard -->
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl lg:text-4xl font-extrabold text-[#1A110A] tracking-tight">
                Dashboard Admin
            </h1>
            <p class="text-gray-500 mt-1 text-sm md:text-base">
                Selamat datang kembali di Panel Administrasi <span
                    class="font-semibold text-[#992B20]">FilsafatBali.id</span>
            </p>
        </div>
        <div
            class="flex items-center gap-2 text-xs font-medium text-gray-500 bg-white border border-gray-200 shadow-sm rounded-lg px-3 py-2 w-fit">
            <svg class="w-4 h-4 text-[#C48D2D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
        </div>
    </div>

    <!-- Grid Statistik Utama (5 Kolom) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-5 mb-8">

        <!-- 1. Total Ajaran -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 transition-all duration-200 hover:-translate-y-1 hover:shadow-md relative overflow-hidden group">
            <div class="absolute top-0 left-0 right-0 h-1 bg-[#992B20]"></div>
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500">Total Ajaran</span>
                <div
                    class="w-10 h-10 rounded-xl bg-[#992B20]/10 flex items-center justify-center text-[#992B20] group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                </div>
            </div>
            <h2 class="text-3xl lg:text-4xl font-extrabold text-[#992B20] tracking-tight">
                {{ number_format($totalAjaran ?? 0) }}
            </h2>
            <p class="text-xs text-gray-400 mt-2">Artikel & Kumpulan ajaran</p>
        </div>

        <!-- 2. Menunggu Verifikasi -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 transition-all duration-200 hover:-translate-y-1 hover:shadow-md relative overflow-hidden group">
            <div class="absolute top-0 left-0 right-0 h-1 bg-[#C48D2D]"></div>
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500">Verifikasi</span>
                <div
                    class="w-10 h-10 rounded-xl bg-[#C48D2D]/10 flex items-center justify-center text-[#C48D2D] group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <h2 class="text-3xl lg:text-4xl font-extrabold text-[#C48D2D] tracking-tight">
                {{ number_format($pending ?? 0) }}
            </h2>
            <p class="text-xs text-gray-400 mt-2">Perlu peninjauan admin</p>
        </div>

        <!-- 3. Total Disetujui -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 transition-all duration-200 hover:-translate-y-1 hover:shadow-md relative overflow-hidden group">
            <div class="absolute top-0 left-0 right-0 h-1 bg-emerald-600"></div>
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500">Disetujui</span>
                <div
                    class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <h2 class="text-3xl lg:text-4xl font-extrabold text-emerald-600 tracking-tight">
                {{ number_format($disetujui ?? 0) }}
            </h2>
            <p class="text-xs text-gray-400 mt-2">Terpublikasi di platform</p>
        </div>

        <!-- 4. Total Penulis -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 transition-all duration-200 hover:-translate-y-1 hover:shadow-md relative overflow-hidden group">
            <div class="absolute top-0 left-0 right-0 h-1 bg-amber-700"></div>
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500">Total Penulis</span>
                <div
                    class="w-10 h-10 rounded-xl bg-amber-100/60 flex items-center justify-center text-amber-800 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                </div>
            </div>
            <h2 class="text-3xl lg:text-4xl font-extrabold text-amber-800 tracking-tight">
                {{ number_format($totalPenulis ?? 0) }}
            </h2>
            <p class="text-xs text-gray-400 mt-2">Kontributor aktif</p>
        </div>

        <!-- 5. Total Pengguna -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 transition-all duration-200 hover:-translate-y-1 hover:shadow-md relative overflow-hidden group">
            <div class="absolute top-0 left-0 right-0 h-1 bg-[#1A110A]"></div>
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold uppercase tracking-wider text-gray-500">Total Pengguna</span>
                <div
                    class="w-10 h-10 rounded-xl bg-stone-100 flex items-center justify-center text-[#1A110A] group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 100 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </div>
            </div>
            <h2 class="text-3xl lg:text-4xl font-extrabold text-[#1A110A] tracking-tight">
                {{ number_format($totalPengguna ?? 0) }}
            </h2>
            <p class="text-xs text-gray-400 mt-2">Akun terdaftar</p>
        </div>

    </div>

    <!-- Pintasan Aksi Cepat & Manajemen Komunitas -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Pintasan Verifikasi / Akses Cepat -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-[#1A110A] mb-4 flex items-center gap-2">
                <i data-feather="zap" class="w-5 h-5 text-[#C48D2D]"></i>
                Aksi & Verifikasi Cepat
            </h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                <a href="{{ route('admin.verifikasi.artikel') }}" class="p-3.5 rounded-xl border border-gray-100 bg-[#FBF9F5] hover:bg-[#F3E7D0]/40 transition-colors flex items-center gap-3">
                    <div class="p-2 rounded-lg bg-[#2C221E] text-white">
                        <i data-feather="file-text" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <span class="block text-xs font-bold text-gray-800">Artikel</span>
                        <span class="text-[10px] text-gray-500">Verifikasi kiriman</span>
                    </div>
                </a>

                <a href="{{ route('admin.verifikasi.filsafat') }}" class="p-3.5 rounded-xl border border-gray-100 bg-[#FBF9F5] hover:bg-[#F3E7D0]/40 transition-colors flex items-center gap-3">
                    <div class="p-2 rounded-lg bg-[#2C221E] text-white">
                        <i data-feather="sun" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <span class="block text-xs font-bold text-gray-800">Filsafat</span>
                        <span class="text-[10px] text-gray-500">Verifikasi filsafat</span>
                    </div>
                </a>

                <a href="{{ route('admin.verifikasi.ajaran-tertua') }}" class="p-3.5 rounded-xl border border-gray-100 bg-[#FBF9F5] hover:bg-[#F3E7D0]/40 transition-colors flex items-center gap-3">
                    <div class="p-2 rounded-lg bg-[#2C221E] text-white">
                        <i data-feather="book-open" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <span class="block text-xs font-bold text-gray-800">Ajaran Tetua</span>
                        <span class="text-[10px] text-gray-500">Verifikasi ajaran</span>
                    </div>
                </a>

                <a href="{{ route('admin.verifikasi.cecimpedan') }}" class="p-3.5 rounded-xl border border-gray-100 bg-[#FBF9F5] hover:bg-[#F3E7D0]/40 transition-colors flex items-center gap-3">
                    <div class="p-2 rounded-lg bg-[#2C221E] text-white">
                        <i data-feather="help-circle" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <span class="block text-xs font-bold text-gray-800">Cecimpedan</span>
                        <span class="text-[10px] text-gray-500">Tinjau cecimpedan</span>
                    </div>
                </a>

                <a href="{{ route('admin.verifikasi.satua') }}" class="p-3.5 rounded-xl border border-gray-100 bg-[#FBF9F5] hover:bg-[#F3E7D0]/40 transition-colors flex items-center gap-3">
                    <div class="p-2 rounded-lg bg-[#2C221E] text-white">
                        <i data-feather="layers" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <span class="block text-xs font-bold text-gray-800">Satua Bali</span>
                        <span class="text-[10px] text-gray-500">Tinjau cerita</span>
                    </div>
                </a>

                <a href="{{ route('admin.verifikasi.istilah') }}" class="p-3.5 rounded-xl border border-gray-100 bg-[#FBF9F5] hover:bg-[#F3E7D0]/40 transition-colors flex items-center gap-3">
                    <div class="p-2 rounded-lg bg-[#2C221E] text-white">
                        <i data-feather="tag" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <span class="block text-xs font-bold text-gray-800">Istilah Bali</span>
                        <span class="text-[10px] text-gray-500">Tinjau istilah</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Ringkasan Kelola Pengguna & Penulis -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between">
            <div>
                <h3 class="text-lg font-bold text-[#1A110A] mb-2 flex items-center gap-2">
                    <i data-feather="users" class="w-5 h-5 text-[#992B20]"></i>
                    Pengelolaan Komunitas
                </h3>
                <p class="text-xs text-gray-500 mb-4">Akses cepat manajemen hak akses dan kontributor platform.</p>
            </div>
            
            <div class="space-y-3">
                <a href="{{ route('admin.penulis.index') }}" class="flex items-center justify-between p-3 rounded-xl border border-gray-100 hover:border-[#C48D2D] transition-colors group">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-amber-50 text-amber-800 rounded-lg group-hover:bg-[#C48D2D] group-hover:text-white transition-colors">
                            <i data-feather="user-check" class="w-4 h-4"></i>
                        </div>
                        <span class="text-xs font-bold text-gray-700">Manajemen Penulis</span>
                    </div>
                    <i data-feather="chevron-right" class="w-4 h-4 text-gray-400 group-hover:translate-x-1 transition-transform"></i>
                </a>

                <a href="{{ route('admin.pengguna.index') }}" class="flex items-center justify-between p-3 rounded-xl border border-gray-100 hover:border-[#C48D2D] transition-colors group">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-stone-100 text-gray-800 rounded-lg group-hover:bg-[#1A110A] group-hover:text-white transition-colors">
                            <i data-feather="users" class="w-4 h-4"></i>
                        </div>
                        <span class="text-xs font-bold text-gray-700">Manajemen Pengguna</span>
                    </div>
                    <i data-feather="chevron-right" class="w-4 h-4 text-gray-400 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>

    </div>
@endsection