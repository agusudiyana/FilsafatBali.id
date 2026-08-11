<div class="w-64 bg-[#1A110A] text-white h-screen fixed top-0 left-0 z-50 overflow-y-auto border-r border-[#3A2A1A] flex flex-col justify-between">

    <div>
        <!-- Header Sidebar -->
        <div class="p-5 border-b border-[#3A2A1A]">
            <h1 class="text-xl font-bold text-[#D4A64A]" style="font-family: 'Cormorant Garamond', serif;">
                FilsafatBali
            </h1>
            <p class="text-[11px] text-[#C7A56A] mt-0.5 font-medium tracking-wide">
                Panel Penulis
            </p>
        </div>

        <!-- Navigasi Menu (Compact Mode) -->
        <nav class="mt-3 pb-6 space-y-0.5">

            <!-- Dashboard -->
            <a href="{{ route('penulis.dashboard') }}" 
               class="flex items-center gap-2.5 px-5 py-2.5 text-xs font-medium transition-colors {{ request()->routeIs('penulis.dashboard') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="grid" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Dashboard</span>
            </a>

            <!-- Group: Kelola Konten -->
            <p class="px-5 pt-4 pb-1.5 text-[9px] uppercase text-[#C7A56A] font-bold tracking-widest">
                Kelola Konten
            </p>

            <!-- Tambah Artikel -->
            <a href="{{ route('penulis.artikel.index') }}" 
               class="flex items-center gap-2.5 px-5 py-2 text-xs font-medium transition-colors {{ request()->routeIs('penulis.artikel.*') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="file-text" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Tambah Artikel</span>
            </a>

            <!-- Tambah Filsafat -->
            <a href="{{ route('penulis.filsafat.index') }}" 
               class="flex items-center gap-2.5 px-5 py-2 text-xs font-medium transition-colors {{ request()->routeIs('penulis.filsafat.*') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="sun" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Tambah Filsafat</span>
            </a>

            <!-- Sorotan Ajaran Tertua -->
            <a href="{{ url('/penulis/ajaran-tertua') }}" 
               class="flex items-center gap-2.5 px-5 py-2 text-xs font-medium transition-colors {{ request()->is('penulis/ajaran-tertua*') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="book-open" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Sorotan Ajaran Tertua</span>
            </a>

            <!-- Tambah Cecimpedan -->
            <a href="{{ route('penulis.cecimpedan.index') }}" 
               class="flex items-center gap-2.5 px-5 py-2 text-xs font-medium transition-colors {{ request()->routeIs('penulis.cecimpedan.*') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="help-circle" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Tambah Cecimpedan</span>
            </a>

            <!-- Tambah Satua -->
            <a href="{{ route('penulis.satua.index') }}" 
               class="flex items-center gap-2.5 px-5 py-2 text-xs font-medium transition-colors {{ request()->routeIs('penulis.satua.*') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="layers" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Tambah Satua</span>
            </a>

            <!-- Tambah Istilah -->
            <a href="{{ route('penulis.istilah.index') }}" 
               class="flex items-center gap-2.5 px-5 py-2 text-xs font-medium transition-colors {{ request()->routeIs('penulis.istilah.*') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="tag" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Tambah Istilah</span>
            </a>

            <!-- Group: Riwayat -->
            <p class="px-5 pt-4 pb-1.5 text-[9px] uppercase text-[#C7A56A] font-bold tracking-widest">
                Aktivitas
            </p>

            <!-- Riwayat Kiriman -->
            <a href="{{ route('penulis.riwayat') }}" 
               class="flex items-center gap-2.5 px-5 py-2 text-xs font-medium transition-colors {{ request()->routeIs('penulis.riwayat*') ? 'bg-[#C48D2D] text-white' : 'text-[#EFE3CC] hover:bg-[#C48D2D]/20 hover:text-[#D4A64A]' }}">
                <i data-feather="clock" class="w-4 h-4 text-[#C7A56A]"></i>
                <span>Riwayat Kiriman</span>
            </a>

        </nav>
    </div>

</div>

<!-- Inisialisasi Feather Icons CDN & Render -->
<script src="https://unpkg.com/feather-icons"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>