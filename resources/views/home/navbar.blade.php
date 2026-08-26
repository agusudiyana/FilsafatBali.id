<!-- ========================================== -->
<!-- NAVBAR UTUH (RESPONSIF HP + MOBILE MENU)   -->
<!-- ========================================== -->
<nav id="navbar" class="fixed top-0 left-0 w-full z-50 bg-transparent transition-all duration-300 py-3 md:py-4">
    <div class="max-w-[1380px] mx-auto px-4 md:px-8 flex items-center justify-between relative">

        <!-- BRAND LOGO -->
        <a href="{{ url('/') }}" class="flex items-center gap-2 md:gap-2.5 shrink-0 group">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Filsafat Bali"
                class="w-7 h-7 sm:w-8 sm:h-8 md:w-10 md:h-10 object-contain transition-transform duration-300 group-hover:scale-105">

            <div class="flex flex-col">
                <span id="navLogo" style="font-family: 'Cormorant Garamond', serif;"
                    class="text-xl sm:text-2xl md:text-[26px] font-bold tracking-tight text-[#A73D1F] transition-colors leading-none">
                    FilsafatBali.id
                </span>
                <!-- TEKS ARSIPAN BUDAYA (DIKUNCI WARNA KUNING EMAS #E2B75B) -->
                <span id="navSubLogo"
                    class="text-[7.5px] sm:text-[8.5px] md:text-[9px] tracking-[2px] sm:tracking-[2.5px] uppercase font-semibold text-[#E2B75B] mt-0.5">
                    ARSIPAN BUDAYA
                </span>
            </div>
        </a>

        <!-- MENU NAVIGASI UTAMA (DESKTOP) -->
        <div id="menu"
            class="hidden md:flex items-center gap-4 lg:gap-6 font-semibold text-[11px] lg:text-[12px] tracking-[1.5px] uppercase">
            <a href="#jenis-filsafat"
                class="nav-dynamic-color text-[#E2B75B] hover:!text-[#8D2B1D] transition-colors duration-500 py-1 whitespace-nowrap">Filsafat</a>
            <a href="#ajaran"
                class="nav-dynamic-color text-[#E2B75B] hover:!text-[#8D2B1D] transition-colors duration-500 py-1 whitespace-nowrap">Ajaran Tetua</a>
            <a href="#cecimpedan"
                class="nav-dynamic-color text-[#E2B75B] hover:!text-[#8D2B1D] transition-colors duration-500 py-1 whitespace-nowrap">Cecimpedan</a>
            
            <!-- LINK FIX SATUA & ISTILAH DENGAN HANDLER NAVTOSATUA -->
            <a href="#sectionSatua" onclick="navToSatua(event)"
                class="nav-dynamic-color text-[#E2B75B] hover:!text-[#8D2B1D] transition-colors duration-500 py-1 whitespace-nowrap">Satua & Istilah</a>
            
            <a href="#kontributor"
                class="nav-dynamic-color text-[#E2B75B] hover:!text-[#8D2B1D] transition-colors duration-500 py-1 whitespace-nowrap">Kontributor</a>
        </div>

        <!-- PROFILE DROPDOWN / TOMBOL AKSI & HAMBURGER HP -->
        <div class="flex items-center gap-2 sm:gap-3 shrink-0 relative">
            @auth
                <!-- BUTTON PROFILE USER -->
                <button type="button" id="userProfileBtn" onclick="toggleUserDropdown(event)"
                    class="flex items-center gap-1.5 sm:gap-2 p-1 sm:p-1.5 rounded-xl hover:bg-black/10 transition-all duration-200 outline-none cursor-pointer group/user border border-transparent hover:border-[#C8A45A]/40">

                    <div class="w-7 h-7 sm:w-9 sm:h-9 rounded-full border-2 border-[#E2B75B] bg-[#8D2B1D] text-white overflow-hidden flex items-center justify-center font-bold text-xs sm:text-sm shadow-sm shrink-0 group-hover/user:scale-105 transition-transform">
                        @if (auth()->user()->foto ?? false)
                            <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="{{ auth()->user()->name }}"
                                class="w-full h-full object-cover">
                        @else
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        @endif
                    </div>

                    <span id="navUsername" 
                        class="nav-dynamic-color hidden sm:inline-block text-[13px] sm:text-[14px] font-medium text-[#E2B75B] tracking-wide capitalize transition-colors duration-500"
                        style="font-family: 'Inter', sans-serif;">
                        {{ auth()->user()->name }}
                    </span>

                    <svg id="navUserChevron" xmlns="http://www.w3.org/2000/svg"
                        class="nav-dynamic-color w-3.5 h-3.5 sm:w-4 sm:h-4 text-[#E2B75B] transition-all duration-500 group-hover/user:translate-y-0.5"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- DROPDOWN MENU USER -->
                <div id="userDropdown"
                    class="hidden absolute right-0 top-full mt-3 w-56 sm:w-60 bg-[#FAF5ED] border border-[#E5D6BF] rounded-2xl shadow-2xl overflow-hidden text-left transition-all duration-200 transform opacity-0 scale-95"
                    style="z-index: 9999;" onclick="event.stopPropagation()">

                    <div class="px-4 sm:px-5 py-3 sm:py-4 border-b border-[#EADCC9] bg-[#F3ECE0]">
                        <p class="text-[9px] sm:text-[10px] uppercase tracking-widest font-bold text-[#C8A45A]">
                            Login Sebagai
                            {{ auth()->user()->role ?? (auth()->user()->is_admin || auth()->user()->email === 'admin@filsafatbali.id' ? 'Admin' : 'Pengguna') }}
                        </p>
                        <p class="text-xs sm:text-sm font-bold text-[#23160E] truncate mt-0.5">{{ auth()->user()->name }}</p>
                        <p class="text-[10px] sm:text-[11px] text-[#8C7A65] truncate">{{ auth()->user()->email }}</p>
                    </div>

                    <div class="p-2 space-y-1">
                        @if (auth()->user()->role === 'admin' || auth()->user()->is_admin || auth()->user()->email === 'admin@filsafatbali.id')
                            <a href="{{ Route::has('admin.dashboard') ? route('admin.dashboard') : (Route::has('dashboard') ? route('dashboard') : url('/admin')) }}"
                                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-[#23160E] hover:bg-[#8D2B1D] hover:text-white transition-all group/item cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#8D2B1D] group-hover/item:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                                <span>Dashboard Admin</span>
                            </a>
                        @elseif(auth()->user()->role === 'penulis')
                            <a href="{{ Route::has('penulis.dashboard') ? route('penulis.dashboard') : url('/penulis') }}"
                                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-[#23160E] hover:bg-[#8D2B1D] hover:text-white transition-all group/item cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#8D2B1D] group-hover/item:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <span>Ruang Penulis</span>
                            </a>
                        @else
                            <a href="{{ route('pengguna.dashboard') }}"
                                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-[#23160E] hover:bg-[#8D2B1D] hover:text-white transition-all group/item cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#8D2B1D] group-hover/item:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span>Dashboard Pengguna</span>
                            </a>
                        @endif

                        <div class="border-t border-[#EADCC9] my-1"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-[#8D2B1D] hover:bg-[#8D2B1D] hover:text-white transition-all group/item cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#8D2B1D] group-hover/item:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <!-- TOMBOL MASUK (DIKUNCI WARNA KUNING EMAS #E2B75B) -->
                <a id="navBtnMasuk" href="{{ route('login') }}"
                    class="group/btn border border-[#E2B75B] text-[#E2B75B] bg-transparent px-2.5 sm:px-3.5 py-1 sm:py-1.5 rounded-lg text-[10px] sm:text-[11px] font-bold tracking-wide flex items-center gap-1 sm:gap-1.5 hover:bg-[#E2B75B] hover:text-[#23160E] transition-all duration-200 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 sm:w-3.5 sm:h-3.5 text-[#E2B75B] group-hover/btn:text-[#23160E] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    <span>Masuk</span>
                </a>

                @if (Route::has('register'))
                    <a id="navBtnDaftar" href="{{ route('register') }}"
                        class="hidden sm:flex bg-[#8D2B1D] text-white px-3.5 py-1.5 rounded-lg text-[11px] font-bold tracking-wide items-center gap-1.5 hover:bg-[#A93226] transition-all shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        <span>Daftar</span>
                    </a>
                @endif
            @endauth

            <!-- HAMBURGER BUTTON (MOBILE LAYAR SMALL) -->
            <button type="button" id="mobileMenuBtn" onclick="toggleMobileNav()"
                class="md:hidden p-1.5 rounded-lg text-[#E2B75B] hover:bg-black/10 transition-colors focus:outline-none">
                <svg id="hamburgerIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

    </div>

    <!-- MOBILE MENU DRAWER SLIDE-OVER -->
    <div id="mobileDrawer" class="fixed inset-x-0 top-[60px] bg-[#1B1108]/95 backdrop-blur-md border-b border-[#3B2A1C] shadow-2xl transition-all duration-300 ease-in-out max-h-0 overflow-hidden md:hidden opacity-0">
        <div class="px-6 py-6 flex flex-col gap-4 font-semibold text-xs tracking-[2px] uppercase text-left">
            <a href="#jenis-filsafat" onclick="closeMobileNav()" class="text-[#E2B75B] hover:text-[#8D2B1D] transition-colors py-2 border-b border-[#3B2A1C]/50">Filsafat</a>
            <a href="#ajaran" onclick="closeMobileNav()" class="text-[#E2B75B] hover:text-[#8D2B1D] transition-colors py-2 border-b border-[#3B2A1C]/50">Ajaran Tetua</a>
            <a href="#cecimpedan" onclick="closeMobileNav()" class="text-[#E2B75B] hover:text-[#8D2B1D] transition-colors py-2 border-b border-[#3B2A1C]/50">Cecimpedan</a>
            <a href="#sectionSatua" onclick="handleMobileSatuaClick(event)" class="text-[#E2B75B] hover:text-[#8D2B1D] transition-colors py-2 border-b border-[#3B2A1C]/50">Satua & Istilah</a>
            <a href="#kontributor" onclick="closeMobileNav()" class="text-[#E2B75B] hover:text-[#8D2B1D] transition-colors py-2">Kontributor</a>

            @guest
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" onclick="closeMobileNav()" class="mt-2 text-center bg-[#8D2B1D] text-white py-2.5 rounded-lg text-xs font-bold tracking-wider">
                        Daftar Akun Baru
                    </a>
                @endif
            @endguest
        </div>
    </div>
</nav>

<!-- ========================================== -->
<!-- SCRIPT JS HANDLER NAVIGASI & MOBILE DRAWER -->
<!-- ========================================== -->
<script>
    // 1. Fungsi Toggle User Dropdown
    function toggleUserDropdown(event) {
        if (event) event.stopPropagation();
        const dropdown = document.getElementById('userDropdown');
        if (!dropdown) return;

        const isHidden = dropdown.classList.contains('hidden');
        if (isHidden) {
            dropdown.classList.remove('hidden');
            setTimeout(() => {
                dropdown.classList.remove('opacity-0', 'scale-95');
                dropdown.classList.add('opacity-100', 'scale-100');
            }, 10);
        } else {
            dropdown.classList.remove('opacity-100', 'scale-100');
            dropdown.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                dropdown.classList.add('hidden');
            }, 200);
        }
    }

    // Tutup User Dropdown saat klik di luar
    document.addEventListener('click', function (e) {
        const dropdown = document.getElementById('userDropdown');
        const btn = document.getElementById('userProfileBtn');
        if (dropdown && !dropdown.classList.contains('hidden')) {
            if (btn && !btn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.remove('opacity-100', 'scale-100');
                dropdown.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    dropdown.classList.add('hidden');
                }, 200);
            }
        }
    });

    // 2. Fungsi Toggle Mobile Drawer (HP)
    function toggleMobileNav() {
        const drawer = document.getElementById('mobileDrawer');
        const hIcon = document.getElementById('hamburgerIcon');
        const cIcon = document.getElementById('closeIcon');

        if (!drawer) return;

        const isOpen = drawer.style.maxHeight && drawer.style.maxHeight !== '0px';

        if (isOpen) {
            closeMobileNav();
        } else {
            drawer.style.maxHeight = drawer.scrollHeight + "px";
            drawer.classList.remove('opacity-0');
            drawer.classList.add('opacity-100');
            if (hIcon) hIcon.classList.add('hidden');
            if (cIcon) cIcon.classList.remove('hidden');
        }
    }

    function closeMobileNav() {
        const drawer = document.getElementById('mobileDrawer');
        const hIcon = document.getElementById('hamburgerIcon');
        const cIcon = document.getElementById('closeIcon');

        if (!drawer) return;

        drawer.style.maxHeight = "0px";
        drawer.classList.remove('opacity-100');
        drawer.classList.add('opacity-0');
        if (hIcon) hIcon.classList.remove('hidden');
        if (cIcon) cIcon.classList.add('hidden');
    }

    // 3. Handler Navigasi Satua & Istilah (Kombinasi Mobile & Desktop)
    function navToSatua(event) {
        if (event) event.preventDefault();

        if (typeof showSatua === 'function') {
            showSatua();
        } else {
            const secSatua = document.getElementById("sectionSatua");
            const secIstilah = document.getElementById("sectionIstilah");
            if (secSatua) secSatua.classList.remove("hidden");
            if (secIstilah) secIstilah.classList.add("hidden");
        }

        const el = document.getElementById("sectionSatua");
        if (el) {
            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    function handleMobileSatuaClick(event) {
        closeMobileNav();
        navToSatua(event);
    }
</script>