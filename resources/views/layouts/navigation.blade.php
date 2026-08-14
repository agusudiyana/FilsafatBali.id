<nav x-data="{ open: false }" class="bg-white/90 backdrop-blur-md border-b border-[#E5D6BF] sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo Utama FilsafatBali.id + Gambar Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <!-- Gambar Logo dari folder public/images/logo.png -->
                        <img src="{{ asset('images/logo.png') }}" 
                             alt="Logo FilsafatBali" 
                             class="h-9 w-auto object-contain">

                        <!-- Teks Brand & Subtitle -->
                        <div class="flex flex-col">
                            <span class="text-xl font-bold text-[#9B3B24] leading-none" style="font-family: 'Cormorant Garamond', serif;">
                                FilsafatBali.id
                            </span>
                            <span class="text-[9px] font-semibold tracking-[0.2em] text-[#C8A45A] uppercase mt-0.5">
                                ARSIPAN BUDAYA
                            </span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown / Auth Check -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="60" contentClasses="py-0 bg-[#FAF5ED] rounded-2xl border border-[#EADCC9] shadow-xl overflow-hidden">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center gap-2.5 px-3 py-2 border border-[#E5D6BF] text-sm leading-4 font-medium rounded-xl text-[#2B1A0E] bg-[#FAF6F0] hover:border-[#9B3B24] focus:outline-none transition ease-in-out duration-150 cursor-pointer">
                                <!-- Avatar Pengguna -->
                                <div class="w-7 h-7 rounded-full bg-[#EFE4D3] overflow-hidden flex items-center justify-center text-[#9B3B24] font-bold text-xs shrink-0"
                                    style="font-family:'Cormorant Garamond',serif;">
                                    @if (isset(Auth::user()->avatar) && Auth::user()->avatar)
                                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                            alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                                    @else
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    @endif
                                </div>

                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4 text-[#7A624A]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <!-- ISI DROPDOWN DENGAN IKON SESUAI WADAH -->
                        <x-slot name="content">
                            <!-- Header Info User -->
                            <div class="p-4 bg-[#F5EBDC]/60 border-b border-[#EADCC9]">
                                <p class="text-[10px] font-bold text-[#C8A45A] uppercase tracking-widest mb-1">
                                    LOGIN SEBAGAI {{ strtoupper(Auth::user()->role ?? 'PENGGUNA') }}
                                </p>
                                <p class="font-bold text-[#23160E] text-base leading-snug truncate">
                                    {{ Auth::user()->name }}
                                </p>
                                <p class="text-xs text-[#8C7A65] truncate font-medium mt-0.5">
                                    {{ Auth::user()->email }}
                                </p>
                            </div>

                            <!-- Menu Pengaturan Profil -->
                            <div class="py-1.5 border-b border-[#EADCC9]/70">
                                <a href="{{ route('profile.edit') }}" 
                                   class="flex items-center gap-2.5 px-4 py-2.5 text-xs font-bold text-[#23160E] hover:bg-[#EFE4D3]/50 hover:text-[#8D2B1D] transition-colors">
                                    <!-- Ikon Pengaturan / User Profile -->
                                    <svg class="w-4 h-4 text-[#8C7A65] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>Pengaturan Profil</span>
                                </a>
                            </div>

                            <!-- Tombol Logout -->
                            <div class="py-1.5 bg-[#FAF5ED]">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" 
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="w-full flex items-center gap-2.5 px-4 py-2.5 text-xs font-bold text-[#8D2B1D] hover:bg-[#8D2B1D]/10 transition-colors cursor-pointer text-left">
                                        <!-- Ikon Logout -->
                                        <svg class="w-4 h-4 text-[#8D2B1D] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                @else
                    <!-- Tampilan Tombol Masuk/Daftar Jika Tamu Belum Login -->
                    <div class="flex items-center gap-3">
                        <a href="{{ route('login') }}" class="text-xs uppercase tracking-widest font-bold text-[#9B3B24] hover:underline px-3 py-2">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-[#9B3B24] text-white rounded-xl text-xs font-bold uppercase tracking-widest hover:bg-[#2B1A0E] transition">
                            Daftar
                        </a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger (Tampilan Mobile) -->
            @auth
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-[#7A624A] hover:text-[#9B3B24] hover:bg-[#FAF6F0] focus:outline-none transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @else
                <div class="flex items-center sm:hidden gap-2">
                    <a href="{{ route('login') }}" class="text-xs uppercase tracking-widest font-bold text-[#9B3B24]">Masuk</a>
                </div>
            @endauth
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    @auth
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-[#FAF6F0] border-t border-[#E5D6BF]">
            <div class="pt-4 pb-1 border-t border-[#E5D6BF]">
                <div class="px-4 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#EFE4D3] border border-[#E5D6BF] overflow-hidden flex items-center justify-center text-[#9B3B24] font-bold text-sm shrink-0"
                        style="font-family:'Cormorant Garamond',serif;">
                        @if (isset(Auth::user()->avatar) && Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                        @else
                            {{ substr(Auth::user()->name, 0, 1) }}
                        @endif
                    </div>
                    <div>
                        <div class="font-bold text-base text-[#2B1A0E]">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-xs text-[#7A624A]">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#8C7A65]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>{{ __('Pengaturan Profil') }}</span>
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="text-red-600 flex items-center gap-2">
                            <svg class="w-4 h-4 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span>{{ __('Logout') }}</span>
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    @endauth
</nav>