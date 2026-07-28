<x-app-layout>
    <div class="py-12 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Header Kartu Akun & Tombol Keluar -->
            <div
                class="bg-white border border-[#E5D6BF] rounded-2xl p-8 shadow-sm flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-5">
                    <div class="w-16 h-16 rounded-2xl bg-[#F4EAD8] border border-[#E5D6BF] overflow-hidden flex items-center justify-center text-[#9B3B24] font-bold text-2xl shrink-0 shadow-inner"
                        style="font-family: 'Cormorant Garamond', serif;">
                        @if (isset(Auth::user()->avatar) && Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}"
                                class="w-full h-full object-cover">
                        @else
                            {{ substr(Auth::user()->name, 0, 1) }}
                        @endif
                    </div>
                    <div>
                        <span
                            class="bg-[#F4EAD8] text-[#9B3B24] text-[10px] tracking-[2px] uppercase font-semibold px-3 py-1 rounded-md border border-[#E5D6BF]">
                            {{ ucfirst(Auth::user()->role) }} Terdaftar
                        </span>
                        <h3 class="text-2xl font-bold text-[#2B1A0E] mt-2"
                            style="font-family: 'Cormorant Garamond', serif;">
                            {{ Auth::user()->name }}
                        </h3>
                        <p class="text-sm text-[#7A624A]">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <!-- Akses Kembali & Tombol Keluar (Logout) -->
                <div class="flex items-center gap-4 shrink-0">
                    <a href="{{ route('home') }}"
                        class="text-xs uppercase tracking-widest font-bold text-[#7A624A] hover:text-[#9B3B24] transition flex items-center gap-1.5">
                        &larr; Beranda
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="px-5 py-2.5 bg-[#FFF5F2] text-[#9B3B24] hover:bg-[#9B3B24] hover:text-white border border-[#F0C8BC] text-xs font-semibold uppercase tracking-wider rounded-xl transition duration-300 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Keluar
                        </button>
                    </form>
                </div>
            </div>

            <!-- Pintasan Menu Fitur Pengguna -->
            @if (Auth::user()->role == 'pengguna')
                <div class="bg-white border border-[#E5D6BF] rounded-2xl p-6 shadow-sm">
                    <h4 class="text-base font-bold text-[#2B1A0E] mb-5 tracking-wide uppercase text-[12px]"
                        style="font-family: 'Cormorant Garamond', serif;">
                        Pintasan Menu Utama Anda
                    </h4>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                        <!-- 1. DISIMPAN -->
                        <a href="{{ Route::has('pengguna.arsip.index') ? route('pengguna.arsip.index') : '#' }}"
                            class="p-5 rounded-xl bg-[#FAF6F0] border border-[#E5D6BF] hover:border-[#9B3B24] hover:bg-white transition-all text-center group flex flex-col items-center justify-center gap-2">
                            <div
                                class="w-10 h-10 rounded-full bg-[#F4EAD8] text-[#9B3B24] flex items-center justify-center group-hover:bg-[#9B3B24] group-hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                </svg>
                            </div>
                            <span
                                class="text-xs font-bold text-[#2B1A0E] group-hover:text-[#9B3B24] transition tracking-wider uppercase">Disimpan</span>
                        </a>

                        <!-- 2. ARTIKEL FAVORIT -->
                        <a href="{{ Route::has('pengguna.favorit.index') ? route('pengguna.favorit.index') : '#' }}"
                            class="p-5 rounded-xl bg-[#FAF6F0] border border-[#E5D6BF] hover:border-[#9B3B24] hover:bg-white transition-all text-center group flex flex-col items-center justify-center gap-2">
                            <div
                                class="w-10 h-10 rounded-full bg-[#F4EAD8] text-[#9B3B24] flex items-center justify-center group-hover:bg-[#9B3B24] group-hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                            </div>
                            <span
                                class="text-xs font-bold text-[#2B1A0E] group-hover:text-[#9B3B24] transition tracking-wider uppercase">Artikel
                                Favorit</span>
                        </a>

                        <!-- 3. DISKUSI KOMUNITAS -->
                        <a href="{{ Route::has('pengguna.komunitas.index') ? route('pengguna.komunitas.index') : '#' }}"
                            class="p-5 rounded-xl bg-[#FAF6F0] border border-[#E5D6BF] hover:border-[#9B3B24] hover:bg-white transition-all text-center group flex flex-col items-center justify-center gap-2">
                            <div
                                class="w-10 h-10 rounded-full bg-[#F4EAD8] text-[#9B3B24] flex items-center justify-center group-hover:bg-[#9B3B24] group-hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                            <span
                                class="text-xs font-bold text-[#2B1A0E] group-hover:text-[#9B3B24] transition tracking-wider uppercase">Diskusi
                                Komunitas</span>
                        </a>

                        <!-- 4. PUSAT UNDUHAN -->
                        <a href="{{ Route::has('pengguna.unduhan.index') ? route('pengguna.unduhan.index') : '#' }}"
                            class="p-5 rounded-xl bg-[#FAF6F0] border border-[#E5D6BF] hover:border-[#9B3B24] hover:bg-white transition-all text-center group flex flex-col items-center justify-center gap-2">
                            <div
                                class="w-10 h-10 rounded-full bg-[#F4EAD8] text-[#9B3B24] flex items-center justify-center group-hover:bg-[#9B3B24] group-hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </div>
                            <span
                                class="text-xs font-bold text-[#2B1A0E] group-hover:text-[#9B3B24] transition tracking-wider uppercase">Pusat
                                Unduhan</span>
                        </a>

                    </div>
                </div>
            @endif

            <!-- Form Edit Profil & Password -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
