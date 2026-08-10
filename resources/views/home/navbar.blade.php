<!-- ========================================== -->
<!-- NAVBAR UTUH & FINAL                        -->
<!-- ========================================== -->
<nav id="navbar" class="fixed top-0 left-0 w-full z-50 bg-transparent transition-all duration-300 py-4">
    <div class="max-w-[1380px] mx-auto px-4 md:px-8 flex items-center justify-between relative">

        <!-- BRAND LOGO -->
        <a href="{{ url('/') }}" class="flex items-center gap-2.5 shrink-0 group">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Filsafat Bali"
                class="w-8 h-8 md:w-10 md:h-10 object-contain transition-transform duration-300 group-hover:scale-105">

            <div class="flex flex-col">
                <span id="navLogo" style="font-family: 'Cormorant Garamond', serif;"
                    class="text-2xl md:text-[26px] font-bold tracking-tight text-[#A73D1F] transition-colors leading-none">
                    FilsafatBali.id
                </span>
                <span id="navSubLogo"
                    class="text-[8.5px] md:text-[9px] tracking-[2.5px] uppercase font-semibold text-[#C8A45A] transition-colors mt-0.5">
                    ARSIPAN BUDAYA
                </span>
            </div>
        </a>

        <!-- MENU NAVIGASI UTAMA -->
        <div id="menu"
            class="hidden md:flex items-center gap-4 lg:gap-6 font-semibold text-[11px] lg:text-[12px] tracking-[1.5px] uppercase">
            <a href="#jenis-filsafat"
                class="text-[#B28B51] hover:!text-[#8D2B1D] transition-colors duration-200 py-1 whitespace-nowrap">Filsafat</a>
            <a href="#ajaran"
                class="text-[#B28B51] hover:!text-[#8D2B1D] transition-colors duration-200 py-1 whitespace-nowrap">Ajaran
                Tetua</a>
            <a href="#cecimpedan"
                class="text-[#B28B51] hover:!text-[#8D2B1D] transition-colors duration-200 py-1 whitespace-nowrap">Cecimpedan</a>
            <a href="#sectionSatua"
                class="text-[#B28B51] hover:!text-[#8D2B1D] transition-colors duration-200 py-1 whitespace-nowrap">Satua
                & Istilah</a>
            <a href="#kontributor"
                class="text-[#B28B51] hover:!text-[#8D2B1D] transition-colors duration-200 py-1 whitespace-nowrap">Kontributor</a>
        </div>

        <!-- PROFILE DROPDOWN / TOMBOL AKSI -->
        <div class="flex items-center gap-3 shrink-0 relative">
            @auth
                <!-- BUTTON PROFILE USER -->
                <button type="button" id="userProfileBtn" onclick="toggleUserDropdown(event)"
                    class="flex items-center gap-2 p-1.5 rounded-xl hover:bg-black/10 transition-all duration-200 outline-none cursor-pointer group/user border border-transparent hover:border-[#C8A45A]/40">

                    <!-- Avatar Profil -->
                    <div
                        class="w-9 h-9 rounded-full border-2 border-[#E2B75B] bg-[#8D2B1D] text-white overflow-hidden flex items-center justify-center font-bold text-sm shadow-sm shrink-0 group-hover/user:scale-105 transition-transform">
                        @if (auth()->user()->foto ?? false)
                            <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="{{ auth()->user()->name }}"
                                class="w-full h-full object-cover">
                        @else
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        @endif
                    </div>

                    <!-- TEKS NAMA USER (Warna Dinamis + Font Ditingkatkan) -->
                    <span id="navUsername" 
                        class="hidden sm:inline-block text-[14px] font-medium text-[#E2B75B] tracking-wide capitalize transition-colors duration-300"
                        style="font-family: 'Inter', sans-serif;">
                        {{ auth()->user()->name }}
                    </span>

                    <!-- Chevron Arrow (Warna Dinamis) -->
                    <svg id="navUserChevron" xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4 text-[#E2B75B] transition-all duration-300 group-hover/user:translate-y-0.5"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- DROPDOWN MENU DINAMIS -->
                <div id="userDropdown"
                    class="hidden absolute right-0 top-full mt-3 w-60 bg-[#FAF5ED] border border-[#E5D6BF] rounded-2xl shadow-2xl overflow-hidden text-left transition-all duration-200 transform opacity-0 scale-95"
                    style="z-index: 9999;" onclick="event.stopPropagation()">

                    <!-- Header Info User -->
                    <div class="px-5 py-4 border-b border-[#EADCC9] bg-[#F3ECE0]">
                        <p class="text-[10px] uppercase tracking-widest font-bold text-[#C8A45A]">
                            Login Sebagai
                            {{ auth()->user()->role ?? (auth()->user()->is_admin || auth()->user()->email === 'admin@filsafatbali.id' ? 'Admin' : 'Pengguna') }}
                        </p>
                        <p class="text-sm font-bold text-[#23160E] truncate mt-0.5">{{ auth()->user()->name }}</p>
                        <p class="text-[11px] text-[#8C7A65] truncate">{{ auth()->user()->email }}</p>
                    </div>

                    <div class="p-2 space-y-1">

                        <!-- 1. JIKA ADMIN -->
                        @if (auth()->user()->role === 'admin' || auth()->user()->is_admin || auth()->user()->email === 'admin@filsafatbali.id')
                            <a href="{{ Route::has('admin.dashboard') ? route('admin.dashboard') : (Route::has('dashboard') ? route('dashboard') : url('/admin')) }}"
                                onclick="window.location.href='{{ Route::has('admin.dashboard') ? route('admin.dashboard') : (Route::has('dashboard') ? route('dashboard') : url('/admin')) }}';"
                                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-[#23160E] hover:bg-[#8D2B1D] hover:text-white transition-all group/item cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 text-[#8D2B1D] group-hover/item:text-white transition-colors"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                                <span>Dashboard Admin</span>
                            </a>

                            <!-- 2. JIKA PENULIS -->
                        @elseif(auth()->user()->role === 'penulis')
                            <a href="{{ Route::has('penulis.dashboard') ? route('penulis.dashboard') : url('/penulis') }}"
                                onclick="window.location.href='{{ Route::has('penulis.dashboard') ? route('penulis.dashboard') : url('/penulis') }}';"
                                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-[#23160E] hover:bg-[#8D2B1D] hover:text-white transition-all group/item cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 text-[#8D2B1D] group-hover/item:text-white transition-colors"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <span>Ruang Penulis</span>
                            </a>

                            <!-- 3. JIKA PENGGUNA BIASA -->
                        @else
                            <a href="{{ route('pengguna.dashboard') }}"
                                onclick="window.location.href='{{ route('pengguna.dashboard') }}';"
                                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-[#23160E] hover:bg-[#8D2B1D] hover:text-white transition-all group/item cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 text-[#8D2B1D] group-hover/item:text-white transition-colors"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span>Dashboard Pengguna</span>
                            </a>
                        @endif

                        <div class="border-t border-[#EADCC9] my-1"></div>

                        <!-- Form Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-[#8D2B1D] hover:bg-[#8D2B1D] hover:text-white transition-all group/item cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 text-[#8D2B1D] group-hover/item:text-white transition-colors"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span>Keluar / Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a id="navBtnMasuk" href="{{ route('login') }}"
                    class="group/btn border border-[#23160E]/30 text-[#23160E] bg-transparent px-3.5 py-1.5 rounded-lg text-[11px] font-bold tracking-wide flex items-center gap-1.5 hover:border-[#8D2B1D] hover:text-[#8D2B1D] transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-3.5 h-3.5 text-[#23160E] group-hover/btn:text-[#8D2B1D] transition-colors" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    <span>Masuk</span>
                </a>

                @if (Route::has('register'))
                    <a id="navBtnDaftar" href="{{ route('register') }}"
                        class="bg-[#8D2B1D] text-white px-3.5 py-1.5 rounded-lg text-[11px] font-bold tracking-wide flex items-center gap-1.5 hover:bg-[#A93226] transition-all shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        <span>Daftar</span>
                    </a>
                @endif
            @endauth
        </div>

    </div>
</nav>

<!-- ========================================== -->
<!-- SCRIPT JS FIX DROPDOWN & SCROLL            -->
<!-- ========================================== -->
<script>
    function toggleUserDropdown(e) {
        if (e) {
            e.preventDefault();
            e.stopPropagation();
        }

        var dropdown = document.getElementById("userDropdown");
        if (!dropdown) return;

        if (dropdown.classList.contains("hidden")) {
            dropdown.classList.remove("hidden");
            setTimeout(function() {
                dropdown.classList.remove("opacity-0", "scale-95");
                dropdown.classList.add("opacity-100", "scale-100");
            }, 10);
        } else {
            dropdown.classList.remove("opacity-100", "scale-100");
            dropdown.classList.add("opacity-0", "scale-95");
            setTimeout(function() {
                dropdown.classList.add("hidden");
            }, 200);
        }
    }

    document.addEventListener("click", function(e) {
        var dropdown = document.getElementById("userDropdown");
        var btn = document.getElementById("userProfileBtn");

        if (dropdown && !dropdown.classList.contains("hidden")) {
            if (btn && btn.contains(e.target)) return;

            dropdown.classList.remove("opacity-100", "scale-100");
            dropdown.classList.add("opacity-0", "scale-95");
            setTimeout(function() {
                dropdown.classList.add("hidden");
            }, 200);
        }
    });

    function updateNavbarOnScroll() {
        var navbar = document.getElementById("navbar");
        if (!navbar) return;

        var menuLinks = document.querySelectorAll("#menu a");
        var navLogo = document.getElementById("navLogo");
        var navSubLogo = document.getElementById("navSubLogo");
        var navUsername = document.getElementById("navUsername");
        var navUserChevron = document.getElementById("navUserChevron");

        if (window.scrollY > 30) {
            // SAAT DI-SCROLL KE BAWAH (Navbar Terang / Krem / Putih)
            navbar.classList.remove("bg-transparent");
            navbar.style.backgroundColor = "#F7F0E7";
            navbar.style.boxShadow = "0 4px 15px rgba(0,0,0,.10)";
            navbar.style.paddingTop = "8px";
            navbar.style.paddingBottom = "8px";

            menuLinks.forEach(function(link) {
                link.style.color = "#6B4A2B";
            });
            if (navLogo) navLogo.style.color = "#8D2B1D";
            if (navSubLogo) navSubLogo.style.color = "#C8A45A";

            // Ubah Warna Teks Nama & Panah ke Cokelat Gelap
            if (navUsername) navUsername.style.color = "#23160E";
            if (navUserChevron) navUserChevron.style.color = "#23160E";

        } else {
            // SAAT DI PALING ATAS (Navbar Transparan)
            navbar.classList.add("bg-transparent");
            navbar.style.backgroundColor = "transparent";
            navbar.style.boxShadow = "none";
            navbar.style.paddingTop = "16px";
            navbar.style.paddingBottom = "16px";

            menuLinks.forEach(function(link) {
                link.style.color = "#B28B51";
            });
            if (navLogo) navLogo.style.color = "#A73D1F";
            if (navSubLogo) navSubLogo.style.color = "#C8A45A";

            // Ubah Warna Teks Nama & Panah Kembali ke Kuning Emas Keemasan
            if (navUsername) navUsername.style.color = "#E2B75B";
            if (navUserChevron) navUserChevron.style.color = "#E2B75B";
        }
    }

    window.addEventListener("scroll", updateNavbarOnScroll);
    document.addEventListener("DOMContentLoaded", updateNavbarOnScroll);
</script>