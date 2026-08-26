<div class="w-64 bg-white text-[#1A110A] h-screen fixed top-0 left-0 z-50 overflow-y-auto border-r border-gray-200 flex flex-col justify-between select-none shadow-sm">

    <div>
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <div class="flex items-center gap-3.5">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Filsafat" class="w-12 h-12 object-contain shrink-0">
                
                <div>
                    <h1 class="text-xl font-bold text-[#992B20] leading-tight" style="font-family: 'Cormorant Garamond', serif;">
                        FilsafatBali
                    </h1>
                    <p class="text-[11px] text-[#C48D2D] font-semibold tracking-wide">
                        Panel Admin
                    </p>
                </div>
            </div>

            <button type="button" @click="sidebarOpen = false" class="lg:hidden text-gray-400 hover:text-gray-700 p-1">
                <i data-feather="x" class="w-5 h-5"></i>
            </button>
        </div>

        <nav class="mt-3 pb-6 space-y-1 px-3">

            <a href="{{ route('admin.dashboard') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="grid" class="w-4 h-4 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Dashboard</span>
            </a>

            <p class="px-4 pt-4 pb-1.5 text-[9px] uppercase text-gray-400 font-bold tracking-widest">
                Verifikasi Konten
            </p>

            <a href="{{ route('admin.verifikasi.artikel') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.verifikasi.artikel*') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="file-text" class="w-4 h-4 {{ request()->routeIs('admin.verifikasi.artikel*') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Artikel</span>
            </a>

            <a href="{{ route('admin.verifikasi.filsafat') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.verifikasi.filsafat*') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="sun" class="w-4 h-4 {{ request()->routeIs('admin.verifikasi.filsafat*') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Filsafat</span>
            </a>

            <a href="{{ route('admin.verifikasi.ajaran-tertua') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.verifikasi.ajaran-tertua*') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="book-open" class="w-4 h-4 {{ request()->routeIs('admin.verifikasi.ajaran-tertua*') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Ajaran Tetua</span>
            </a>

            <a href="{{ route('admin.verifikasi.cecimpedan') }}"
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.verifikasi.cecimpedan*') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="help-circle" class="w-4 h-4 {{ request()->routeIs('admin.verifikasi.cecimpedan*') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Cecimpedan</span>
            </a>

            <a href="{{ route('admin.verifikasi.satua') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.verifikasi.satua*') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="layers" class="w-4 h-4 {{ request()->routeIs('admin.verifikasi.satua*') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Satua Bali</span>
            </a>

            <a href="{{ route('admin.verifikasi.istilah') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.verifikasi.istilah*') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="tag" class="w-4 h-4 {{ request()->routeIs('admin.verifikasi.istilah*') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Istilah Bali</span>
            </a>

            <p class="px-4 pt-4 pb-1.5 text-[9px] uppercase text-gray-400 font-bold tracking-widest">
                Manajemen
            </p>

            <a href="{{ route('admin.penulis.index') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.penulis.*') || request()->routeIs('admin.kelola.penulis') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="user-check" class="w-4 h-4 {{ request()->routeIs('admin.penulis.*') || request()->routeIs('admin.kelola.penulis') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Penulis</span>
            </a>

            <a href="{{ route('admin.pengguna.index') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.pengguna.*') || request()->routeIs('admin.kelola.pengguna') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="users" class="w-4 h-4 {{ request()->routeIs('admin.pengguna.*') || request()->routeIs('admin.kelola.pengguna') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Pengguna</span>
            </a>

            <a href="{{ route('admin.statistik.index') }}" 
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.statistik.*') ? 'bg-[#992B20] text-white shadow-sm' : 'text-gray-600 hover:bg-[#FBF7F0] hover:text-[#992B20]' }}">
                <i data-feather="bar-chart-2" class="w-4 h-4 {{ request()->routeIs('admin.statistik.*') ? 'text-white' : 'text-[#C48D2D]' }}"></i>
                <span>Kelola Statistik</span>
            </a>

        </nav>
    </div>

</div>

<script src="https://unpkg.com/feather-icons"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>