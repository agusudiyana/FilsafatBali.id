<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-7 bg-[#8D2B1D] rounded-full inline-block"></span>
                <h2 class="font-bold text-2xl text-[#2B1A0E] tracking-tight leading-tight" style="font-family: 'Cormorant Garamond', serif;">
                    {{ __('Ruang Anggota Arsipan Budaya') }}
                </h2>
            </div>
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-xs font-bold tracking-wider uppercase text-[#8D2B1D] bg-[#EFE4D3]/60 hover:bg-[#8D2B1D] hover:text-white px-4 py-2 rounded-xl transition-all duration-300 border border-[#C8A45A]/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- BANNER WELCOME & PROFILE HEADER -->
            <div class="relative overflow-hidden bg-gradient-to-r from-[#2B1A0E] to-[#4A2E1A] rounded-3xl p-8 shadow-xl border border-[#C8A45A]/30 text-white">
                <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-[#C8A45A]/10 rounded-full blur-2xl pointer-events-none"></div>
                
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="flex items-center gap-6">
                        <div class="w-20 h-20 rounded-2xl bg-[#8D2B1D] text-[#FAF6F0] border-2 border-[#C8A45A] flex items-center justify-center font-bold text-3xl shadow-lg shrink-0">
                            @if(auth()->user()->foto ?? false)
                                <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="{{ auth()->user()->name }}" class="w-full h-full object-cover rounded-2xl">
                            @else
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            @endif
                        </div>

                        <div>
                            <span class="text-[10px] uppercase font-bold tracking-[3px] text-[#C8A45A]">Selamat Datang</span>
                            <h1 style="font-family:'Cormorant Garamond', serif;" class="text-3xl md:text-4xl font-bold tracking-tight text-white mt-0.5">
                                Rahajeng Rauh, {{ auth()->user()->name }}!
                            </h1>
                            <p class="text-xs md:text-sm text-[#D8C9B9] mt-1 font-light">
                                {{ auth()->user()->email }} • Member Penjelajah Kebudayaan Bali
                            </p>
                        </div>
                    </div>

                    <div class="px-5 py-2.5 rounded-2xl bg-black/30 border border-[#C8A45A]/40 backdrop-blur-md flex items-center gap-3 shrink-0">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span class="text-xs font-semibold text-[#D8C9B9] uppercase tracking-widest">Akun Aktif</span>
                    </div>
                </div>
            </div>

            <!-- GRID KARTU LAYANAN (FULL CLICKABLE) -->
            <div>
                <div class="flex items-center justify-between mb-6">
                    <h3 style="font-family:'Cormorant Garamond', serif;" class="text-2xl font-bold text-[#2B1A0E]">
                        Pusat Layanan & Akses Fitur
                    </h3>
                    <span class="text-xs font-semibold text-[#8C7A65]">Pilih layanan yang ingin Anda akses</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- 1. KARTU ARSIP DISIMPAN / FAVORIT -->
                    <a href="{{ Route::has('pengguna.arsip.index') ? route('pengguna.arsip.index') : (Route::has('pengguna.favorit.index') ? route('pengguna.favorit.index') : url('/pengguna/arsip')) }}" 
                       class="group bg-white rounded-2xl p-6 border border-[#E5D6BF] shadow-sm hover:shadow-xl hover:border-[#8D2B1D] hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between block cursor-pointer">
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-[#FAF6F0] border border-[#E5D6BF] text-[#8D2B1D] flex items-center justify-center mb-5 group-hover:bg-[#8D2B1D] group-hover:text-white transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                </svg>
                            </div>
                            <h4 style="font-family:'Cormorant Garamond', serif;" class="text-2xl font-bold text-[#2B1A0E] group-hover:text-[#8D2B1D] transition-colors">
                                Disimpan
                            </h4>
                            <p class="text-xs text-[#675A4D] leading-relaxed mt-2">
                                Akses kembali artikel, naskah, dan satua favorit yang telah Anda tandai sebelumnya.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-[#FAF6F0] flex items-center justify-between">
                            <span class="text-xs font-bold text-[#8D2B1D] group-hover:translate-x-1 transition-transform inline-flex items-center gap-2">
                                Lihat Artikel Favorit
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </span>
                        </div>
                    </a>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>