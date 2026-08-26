<!-- SIDEBAR PENULIS (TEMA PUTIH BERSIH) -->
<div class="w-64 bg-white text-[#1A110A] h-screen fixed top-0 left-0 z-50 overflow-y-auto border-r border-gray-200 flex flex-col justify-between select-none shadow-sm">

    <div>
        <!-- Header Sidebar (Logo Tanpa Background & Bingkai) -->
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <div class="flex items-center gap-3.5">
                <!-- Logo Lansung Tanpa Wrapper Bingkai -->
                <img src="{{ asset('images/logo.png') }}" alt="Logo Filsafat" class="w-12 h-12 object-contain shrink-0">
                
                <div>
                    <h1 class="text-xl font-bold text-[#992B20] leading-tight" style="font-family: 'Cormorant Garamond', serif;">
                        FilsafatBali
                    </h1>
                    <p class="text-[11px] text-[#C48D2D] font-semibold tracking-wide">
                        Panel Penulis
                    </p>
                </div>
            </div>

            <!-- Tombol Tutup Sidebar Khusus Layar HP (lg:hidden) -->
            <button type="button" @click="sidebarOpen = false" class="lg:hidden text-gray-400 hover:text-gray-700 p-1">
                <i data-feather="x" class="w-5 h-5"></i>
            </button>
        </div>

        <!-- Navigasi Menu -->
        <nav class="mt-3 pb-6 space-y-1 px-3">

            <!-- Dashboard -->
            <a href="{{ route('penulis.dashboard') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('penulis.dashboard') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="grid" class="w-4 h-4 {{ request()->routeIs('penulis.dashboard') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Dashboard</span>
            </a>

            <!-- Group: Kelola Konten -->
            <p class="px-4 pt-4 pb-1.5 text-[9px] uppercase text-gray-400 font-bold tracking-widest">
                Kelola Konten
            </p>

            <!-- Tambah Artikel -->
            <a href="{{ route('penulis.artikel.index') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('penulis.artikel.*') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="file-text" class="w-4 h-4 {{ request()->routeIs('penulis.artikel.*') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Tambah Artikel</span>
            </a>

            <!-- Tambah Filsafat -->
            <a href="{{ route('penulis.filsafat.index') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('penulis.filsafat.*') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="sun" class="w-4 h-4 {{ request()->routeIs('penulis.filsafat.*') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Tambah Filsafat</span>
            </a>

            <!-- Sorotan Ajaran Tertua -->
            <a href="{{ url('/penulis/ajaran-tertua') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->is('penulis/ajaran-tertua*') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="book-open" class="w-4 h-4 {{ request()->is('penulis/ajaran-tertua*') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Sorotan Ajaran Tertua</span>
            </a>

            <!-- Tambah Cecimpedan -->
            <a href="{{ route('penulis.cecimpedan.index') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('penulis.cecimpedan.*') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="help-circle" class="w-4 h-4 {{ request()->routeIs('penulis.cecimpedan.*') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Tambah Cecimpedan</span>
            </a>

            <!-- Tambah Satua -->
            <a href="{{ route('penulis.satua.index') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('penulis.satua.*') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="layers" class="w-4 h-4 {{ request()->routeIs('penulis.satua.*') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Tambah Satua</span>
            </a>

            <!-- Tambah Istilah -->
            <a href="{{ route('penulis.istilah.index') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('penulis.istilah.*') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="tag" class="w-4 h-4 {{ request()->routeIs('penulis.istilah.*') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Tambah Istilah</span>
            </a>

            <!-- Group: Aktivitas -->
            <p class="px-4 pt-4 pb-1.5 text-[9px] uppercase text-gray-400 font-bold tracking-widest">
                Aktivitas
            </p>

            <!-- Riwayat Kiriman -->
            <a href="{{ route('penulis.riwayat') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('penulis.riwayat*') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="clock" class="w-4 h-4 {{ request()->routeIs('penulis.riwayat*') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Riwayat Kiriman</span>
            </a>

        </nav>
    </div>

</div>

<!-- Inisialisasi Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>