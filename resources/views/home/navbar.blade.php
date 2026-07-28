<nav id="navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-transparent">

    <div class="max-w-[1440px] mx-auto flex items-center justify-between px-6 sm:px-10 lg:px-16 py-4">

        <!-- Logo -->
        <div class="leading-none">
            <a href="{{ route('home') }}">
                <h1 style="font-family:'Cormorant Garamond',serif;"
                    class="text-[26px] md:text-[28px] font-bold text-[#A73D1F] leading-none">
                    FilsafatBali.id
                </h1>
                <p class="text-[#D8B15A] tracking-[4px] text-[8px] mt-1">
                    ARSIPAN BUDAYA
                </p>
            </a>
        </div>

        <!-- Menu -->
        <ul id="menu"
            class="hidden lg:flex items-center text-[11px] uppercase tracking-[3px] font-medium text-[#6B4A2B]">

            <li class="mr-8">
                <a href="#jenis-filsafat" class="hover:text-[#992B20] transition">
                    FILSAFAT
                </a>
            </li>

            <li class="mr-8">
                <a href="#ajaran" class="hover:text-[#992B20] transition">
                    AJARAN TETUA
                </a>
            </li>

            <li class="mr-8">
                <a href="#cecimpedan" class="hover:text-[#992B20] transition">
                    CECIMPEDAN
                </a>
            </li>

            <li class="mr-8">
                <a href="#sectionSatua" class="hover:text-[#992B20] transition">
                    SATUA & ISTILAH
                </a>
            </li>

            <li>
                <a href="#kontributor" class="hover:text-[#992B20] transition">
                    KONTRIBUTOR
                </a>
            </li>

        </ul>


        <!-- Auth Button / User Profile Section -->
        <div class="flex items-center gap-3">
            @auth
                <!-- TAMPILAN JIKA SUDAH LOGIN: Nama di Kiri, Foto di Kanan (Tanpa Background) -->
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center gap-3 py-1 px-2 hover:opacity-85 transition group">
                    <span class="text-[14px] font-medium text-[#2B1A0E] group-hover:text-[#9B3B24] transition">
                        {{ Auth::user()->name }}
                    </span>
                    <div class="w-10 h-10 rounded-full bg-[#EFE4D3] border border-[#E5D6BF] overflow-hidden flex items-center justify-center text-[#9B3B24] font-bold text-sm uppercase shadow-sm shrink-0"
                        style="font-family:'Cormorant Garamond',serif;">
                        @if (isset(Auth::user()->avatar) && Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}"
                                class="w-full h-full object-cover">
                        @else
                            {{ substr(Auth::user()->name, 0, 1) }}
                        @endif
                    </div>
                </a>
            @else
                <!-- TAMPILAN JIKA BELUM LOGIN -->
                <a href="{{ route('login') }}"
                    class="px-5 py-2 text-[13px] font-medium rounded-md border border-[#C8A45A] text-[#C8A45A] hover:bg-[#C8A45A] hover:text-white transition">
                    Masuk
                </a>

                <a href="{{ route('register') }}"
                    class="px-5 py-2 text-[13px] font-medium rounded-md bg-[#9B3B24] text-white hover:bg-[#82311E] transition">
                    Daftar
                </a>
            @endauth
        </div>

    </div>

</nav>
