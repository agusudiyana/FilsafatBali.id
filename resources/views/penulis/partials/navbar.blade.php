<header class="bg-white shadow px-8 py-5 flex justify-between items-center relative" x-data="{ open: false }">

    <!-- Judul Halaman / Dashboard Penulis -->
    <div>
        <h1 class="text-3xl font-bold text-[#1A110A]">
            Dashboard Penulis
        </h1>

        <p class="text-gray-500 text-sm">
            Selamat datang di Panel Penulis
        </p>
    </div>

    <!-- Bagian Kanan Header: Tombol Lihat Website & Profile Dropdown -->
    <div class="flex items-center gap-4">

        <!-- Tombol Quick Link: Lihat Website Utama -->
        <a href="{{ url('/') }}" target="_blank"
            class="hidden sm:flex items-center gap-2 bg-[#992B20] hover:bg-[#7A2219] text-white text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-2xl shadow-sm transition-all duration-200">
            <!-- Icon External Link -->
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
            </svg>
            <span>Lihat Website</span>
        </a>

        <!-- Tombol Profil (Bisa Diklik) -->
        <div class="relative">
            <button @click="open = !open" @click.away="open = false" type="button"
                class="flex items-center gap-3 focus:outline-none bg-gray-50 hover:bg-gray-100 px-3 py-2 rounded-2xl transition-all duration-200">

                <!-- Inisial Nama -->
                <div
                    class="w-10 h-10 rounded-full bg-[#D4A64A] text-white flex items-center justify-center font-bold text-lg shadow-sm">
                    {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
                </div>

                <!-- Nama Penulis -->
                <div class="text-left hidden sm:block">
                    <h3 class="font-semibold text-gray-800 text-base">
                        {{ auth()->user()->name ?? 'Penulis' }}
                    </h3>
                </div>

                <!-- Ikon Panah Kecil (Chevron) -->
                <svg class="w-4 h-4 text-gray-500 ml-1 transition-transform duration-200" :class="{ 'rotate-180': open }"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- Dropdown Menu Box -->
            <div x-show="open" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 transform scale-95 -translate-y-2"
                x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 transform scale-95 -translate-y-2"
                class="absolute right-0 mt-2 w-64 bg-white border border-gray-100 rounded-2xl shadow-xl p-4 z-50"
                style="display: none;">

                <!-- Section Status Email -->
                <div class="pb-3 border-b border-gray-100">
                    <p class="text-xs text-gray-400 font-normal">Masuk sebagai</p>
                    <p class="text-sm font-semibold text-gray-800 truncate mt-0.5">
                        {{ auth()->user()->email ?? 'penulis@filsafatbali.id' }}
                    </p>
                </div>

                <!-- Shortcut Menu di Dalam Dropdown -->
                <div class="py-2 border-b border-gray-100">
                    <a href="{{ url('/') }}" target="_blank"
                        class="flex items-center gap-3 text-sm font-semibold text-gray-700 hover:text-[#992B20] transition-colors py-1.5">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                        <span>Kunjungi Website</span>
                    </a>
                </div>

                <!-- Action Logout -->
                <div class="pt-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-3 text-sm font-semibold text-gray-700 hover:text-red-600 transition-colors py-1">
                            <!-- Icon Door Logout -->
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>

            </div>
        </div>

    </div>

</header>
