<div class="w-64 bg-[#1A110A] text-white h-screen fixed top-0 left-0 z-50 overflow-y-auto border-r border-[#3A2A1A] flex flex-col justify-between">

    <div>
        <!-- Header Sidebar dengan Logo Besar Terang (Seragam dengan Penulis) -->
        <div class="p-5 border-b border-[#3A2A1A]">
            <div class="flex items-center gap-3.5">
                <!-- Wrapper Bingkai Terang Logo (Ukuran w-16 h-16 agar pas dan menonjol) -->
                <div class="w-16 h-16 rounded-2xl bg-[#FBF5ED] border border-[#D4A64A]/60 flex items-center justify-center p-1 shadow-md shrink-0">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Filsafat" class="w-full h-full object-contain filter drop-shadow-sm">
                </div>
                
                <div>
                    <h1 class="text-xl font-bold text-[#D4A64A] leading-tight" style="font-family: 'Cormorant Garamond', serif;">
                        FilsafatBali
                    </h1>
                    <p class="text-[11px] text-[#C7A56A] font-medium tracking-wide">
                        Panel Admin
                    </p>
                </div>
            </div>
        </div>

        <!-- Navigasi Menu (Compact Mode) -->
        <nav class="mt-3 pb-6 space-y-0.5">

            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center gap-2.5 px-5 py-2.5 text-xs font-medium transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="grid" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Dashboard</span>
            </a>

            <!-- Group: Verifikasi Konten -->
            <p class="px-5 pt-4 pb-1.5 text-[9px] uppercase text-[#C7A56A] font-bold tracking-widest">
                Verifikasi Konten
            </p>

            <!-- Verifikasi Artikel -->
            <a href="{{ route('admin.verifikasi.artikel') }}" 
               class="flex items-center gap-2.5 px-5 py-2 text-xs font-medium transition-colors {{ request()->routeIs('admin.verifikasi.artikel*') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="file-text" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Artikel</span>
            </a>

            <!-- Verifikasi Filsafat -->
            <a href="{{ route('admin.verifikasi.filsafat') }}" 
               class="flex items-center gap-2.5 px-5 py-2 text-xs font-medium transition-colors {{ request()->routeIs('admin.verifikasi.filsafat*') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="sun" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Filsafat</span>
            </a>

            <!-- Verifikasi Sorotan Ajaran Tetua -->
            <a href="{{ route('admin.verifikasi.ajaran-tertua') }}" 
               class="flex items-center gap-2.5 px-5 py-2 text-xs font-medium transition-colors {{ request()->routeIs('admin.verifikasi.ajaran-tertua*') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="book-open" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Ajaran Tetua</span>
            </a>

            <!-- Cecimpedan -->
            <a href="{{ route('admin.verifikasi.cecimpedan') }}"
               class="flex items-center gap-2.5 px-5 py-2 text-xs font-medium transition-colors {{ request()->routeIs('admin.verifikasi.cecimpedan*') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="help-circle" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Cecimpedan</span>
            </a>

            <!-- Satua Bali -->
            <a href="{{ route('admin.verifikasi.satua') }}" 
               class="flex items-center gap-2.5 px-5 py-2 text-xs font-medium transition-colors {{ request()->routeIs('admin.verifikasi.satua*') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="layers" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Satua Bali</span>
            </a>

            <!-- Istilah Bali -->
            <a href="{{ route('admin.verifikasi.istilah') }}" 
               class="flex items-center gap-2.5 px-5 py-2 text-xs font-medium transition-colors {{ request()->routeIs('admin.verifikasi.istilah*') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="tag" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Istilah Bali</span>
            </a>

            <!-- Group: Manajemen -->
            <p class="px-5 pt-4 pb-1.5 text-[9px] uppercase text-[#C7A56A] font-bold tracking-widest">
                Manajemen
            </p>

            <!-- Penulis -->
            <a href="{{ route('admin.penulis.index') }}" 
               class="flex items-center gap-2.5 px-5 py-2 text-xs font-medium transition-colors {{ request()->routeIs('admin.penulis.*') || request()->routeIs('admin.kelola.penulis') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="user-check" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Penulis</span>
            </a>

            <!-- Pengguna -->
            <a href="{{ route('admin.pengguna.index') }}" 
               class="flex items-center gap-2.5 px-5 py-2 text-xs font-medium transition-colors {{ request()->routeIs('admin.pengguna.*') || request()->routeIs('admin.kelola.pengguna') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="users" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Pengguna</span>
            </a>

            <!-- Kelola Statistik -->
            <a href="{{ route('admin.statistik.index') }}" 
               class="flex items-center gap-2.5 px-5 py-2 text-xs font-medium transition-colors {{ request()->routeIs('admin.statistik.*') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="bar-chart-2" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Kelola Statistik</span>
            </a>

        </nav>
    </div>

</div>

<!-- Script Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>