<header class="bg-white shadow px-8 py-5 flex justify-between items-center relative" x-data="{ open: false }">

    <div>
        <h1 class="text-3xl font-bold">
            Dashboard Penulis
        </h1>

        <p class="text-gray-500">
            Selamat datang di Panel Penulis
        </p>
    </div>

    <!-- Tombol Profil (Bisa Diklik) -->
    <div class="relative">
        <button @click="open = !open" @click.away="open = false" 
                class="flex items-center gap-4 focus:outline-none bg-gray-50 hover:bg-gray-100 px-3 py-2 rounded-xl transition">
            
            <!-- Inisial Nama -->
            <div class="w-12 h-12 rounded-full bg-[#D4A64A] text-white flex items-center justify-center font-bold text-lg shadow-sm">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <!-- Nama (Tulisan "Penulis" telah dihapus) -->
            <div class="text-left hidden sm:block">
                <h3 class="font-semibold text-gray-800">
                    {{ auth()->user()->name }}
                </h3>
            </div>

            <!-- Ikon Panah Kecil -->
            <svg class="w-4 h-4 text-gray-500 ml-1 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>

        <!-- Dropdown Menu Logout -->
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="absolute right-0 mt-2 w-56 bg-white border border-gray-100 rounded-xl shadow-xl py-2 z-50" 
             style="display: none;">
            
            <div class="px-4 py-2 border-b border-gray-100">
                <p class="text-xs text-gray-400">Masuk sebagai</p>
                <p class="text-sm font-semibold text-gray-800 truncate">{{ auth()->user()->email }}</p>
            </div>

            <!-- Form Logout (Warna diubah menjadi abu-abu netral) -->
            <form method="POST" action="{{ route('logout') }}" class="mt-1">
                @csrf
                <button type="submit" 
                        class="w-full text-left px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 flex items-center gap-2 transition font-medium">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>

</header>