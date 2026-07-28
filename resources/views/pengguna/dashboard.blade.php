<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#2B1A0E] leading-tight" style="font-family: 'Cormorant Garamond', serif;">
            {{ __('Dashboard Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Banner Sambutan Selamat Datang -->
            <div class="bg-white border border-[#E5D6BF] rounded-2xl p-8 shadow-sm flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <span class="bg-[#EFE4D3] text-[#8D2B1D] text-[10px] tracking-[2px] uppercase font-semibold px-3 py-1 rounded-md">
                        Akun Pelajar & Masyarakat
                    </span>
                    <h3 class="text-3xl font-bold text-[#2B1A0E] mt-3" style="font-family: 'Cormorant Garamond', serif;">
                        Om Swastyastu, {{ Auth::user()->name }}!
                    </h3>
                    <p class="text-[#675A4D] text-sm mt-1">
                        Selamat datang kembali di pusat arsip dan pelestarian filosofi budaya Bali. Jelajahi koleksi sastra, ajaran tetua, dan satua dengan akses penuh.
                    </p>
                </div>
                <div class="shrink-0">
                    <a href="{{ url('/') }}" class="inline-block px-6 py-3 bg-[#8D2B1D] text-white text-sm font-medium rounded-xl hover:bg-[#732216] transition duration-300">
                        Jelajahi Beranda Utama
                    </a>
                </div>
            </div>

            <!-- Grid 5 Fitur Utama Pengguna -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- 1. Akses Seluruh Koleksi Arsip -->
                <div class="bg-white border border-[#E5D6BF] rounded-2xl p-6 shadow-sm flex flex-col justify-between hover:border-[#8D2B1D] transition duration-300">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-[#EFE4D3] flex items-center justify-center text-[#8D2B1D] mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-[#2B1A0E]">Akses Seluruh Koleksi Arsip</h4>
                        <p class="text-sm text-[#675A4D] mt-1 mb-6">Akses penuh ke seluruh koleksi naskah Ajaran, Satua, Cecimpedan, dan Istilah Bali.</p>
                    </div>
                    <a href="{{ route('pengguna.arsip.index') }}" class="inline-flex items-center text-sm font-semibold text-[#8D2B1D] hover:text-[#732216]">
                        Buka Koleksi Arsip &rarr;
                    </a>
                </div>

                <!-- 2. Simpan Artikel Favorit -->
                <div class="bg-white border border-[#E5D6BF] rounded-2xl p-6 shadow-sm flex flex-col justify-between hover:border-[#8D2B1D] transition duration-300">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-[#EFE4D3] flex items-center justify-center text-[#8D2B1D] mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-[#2B1A0E]">Simpan Artikel Favorit</h4>
                        <p class="text-sm text-[#675A4D] mt-1 mb-6">Kelola dan simpan bacaan favorit Anda untuk dibaca kembali secara cepat kapan saja.</p>
                    </div>
                    <a href="{{ route('pengguna.favorit.index') }}" class="inline-flex items-center text-sm font-semibold text-[#8D2B1D] hover:text-[#732216]">
                        Lihat Artikel Favorit &rarr;
                    </a>
                </div>

                <!-- 3. Ikuti Diskusi Komunitas -->
                <div class="bg-white border border-[#E5D6BF] rounded-2xl p-6 shadow-sm flex flex-col justify-between hover:border-[#8D2B1D] transition duration-300">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-[#EFE4D3] flex items-center justify-center text-[#8D2B1D] mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-[#2B1A0E]">Ikuti Diskusi Komunitas</h4>
                        <p class="text-sm text-[#675A4D] mt-1 mb-6">Bergabung dalam ruang diskusi dan bertukar pemikiran kebudayaan antar sesama anggota.</p>
                    </div>
                    <a href="{{ route('pengguna.komunitas.index') }}" class="inline-flex items-center text-sm font-semibold text-[#8D2B1D] hover:text-[#732216]">
                        Masuk Forum Diskusi &rarr;
                    </a>
                </div>

                <!-- 4. Unduh Konten Pilihan -->
                <div class="bg-white border border-[#E5D6BF] rounded-2xl p-6 shadow-sm flex flex-col justify-between hover:border-[#8D2B1D] transition duration-300">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-[#EFE4D3] flex items-center justify-center text-[#8D2B1D] mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-[#2B1A0E]">Unduh Konten Pilihan</h4>
                        <p class="text-sm text-[#675A4D] mt-1 mb-6">Unduh berkas PDF, e-book, atau ringkasan dokumen materi untuk dibaca secara offline.</p>
                    </div>
                    <a href="{{ route('pengguna.unduhan.index') }}" class="inline-flex items-center text-sm font-semibold text-[#8D2B1D] hover:text-[#732216]">
                        Pusat Unduhan &rarr;
                    </a>
                </div>

                <!-- 5. Pengaturan Akun -->
                <div class="bg-white border border-[#E5D6BF] rounded-2xl p-6 shadow-sm flex flex-col justify-between hover:border-[#8D2B1D] transition duration-300">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-[#EFE4D3] flex items-center justify-center text-[#8D2B1D] mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-[#2B1A0E]">Pengaturan Akun</h4>
                        <p class="text-sm text-[#675A4D] mt-1 mb-6">Perbarui profil, kata sandi, dan informasi data diri Anda dengan mudah.</p>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center text-sm font-semibold text-[#8D2B1D] hover:text-[#732216]">
                        Edit Profil &rarr;
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>