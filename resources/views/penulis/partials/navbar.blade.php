<header class="relative bg-[#52130D] border-b border-[#3D0C07] px-8 py-3.5 flex justify-end items-center" x-data="{ open: false }">

    <!-- 1. ORNAMEN RANTING POHON ELEGAN -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        
        <svg class="absolute top-0 left-0 h-full w-[80%] sm:w-[65%] md:w-[55%]" viewBox="0 0 700 100" preserveAspectRatio="none">
            <g fill="#1A110A" stroke="none">
                <path d="M0,0 L600,0 C500,8 400,18 310,28 C220,38 120,65 0,100 Z" />
                <path d="M180,38 C280,32 380,24 480,18 C540,14 610,12 670,2 C600,8 520,12 450,20 C360,28 260,38 160,52 Z" opacity="0.95" />
                <path d="M90,70 C180,58 270,46 360,38 C430,32 500,28 580,18 C510,24 430,30 350,38 C250,48 150,62 70,80 Z" opacity="0.9" />
                <path d="M320,28 C340,18 355,22 345,30 C335,28 325,30 320,28 Z" opacity="0.8" />
                <path d="M480,18 C500,8 515,12 505,20 C495,18 485,20 480,18 Z" opacity="0.8" />
            </g>
        </svg>

        <!-- Pudar Halus di Kanan -->
        <div class="absolute inset-y-0 right-0 w-1/2 bg-gradient-to-l from-[#52130D] via-[#52130D]/80 to-transparent"></div>
    </div>

    <!-- 2. AKSEN 4 SPEKTRUM PITA TIPIS (SUDAH DIPERBAIKI AGAR TIDAK BOCOR) -->
    <div class="absolute bottom-0 left-0 right-0 w-full pointer-events-none flex flex-col z-10 overflow-hidden">
        <div class="h-[1px] w-full bg-[#7A2219]"></div>
        <div class="h-[1px] w-full bg-[#992B20]"></div>
        <div class="h-[1px] w-full bg-[#B83E31]"></div>
        <div class="h-[1.5px] w-full bg-[#D4A64A]"></div>
    </div>

    <!-- 3. TOMBOL & PROFIL ADMIN/PENULIS -->
    <div class="relative z-20 flex items-center gap-3.5">

        <!-- Tombol Quick Link: Lihat Website Utama -->
        <a href="{{ url('/') }}" target="_blank"
            class="hidden sm:inline-flex items-center gap-2 bg-[#C48D2D] hover:bg-[#A67320] text-white text-xs font-bold uppercase tracking-wider px-4 py-2 rounded-xl shadow-md transition-all duration-200 hover:scale-[1.02]">
            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
            </svg>
            <span>Lihat Website</span>
        </a>

        <!-- Separator -->
        <div class="h-5 w-[1px] bg-[#8B2D24] hidden sm:block"></div>

        <!-- Profil User -->
        <div class="relative">
            <button @click="open = !open" @click.away="open = false" type="button"
                class="flex items-center gap-3 focus:outline-none bg-[#F7F0E7] hover:bg-[#EFE3CC] border border-[#E6D5B8] px-3.5 py-1.5 rounded-xl shadow-md transition-all duration-200">

                <div class="w-8 h-8 rounded-lg bg-[#52130D] text-[#D4A64A] flex items-center justify-center font-bold text-sm shadow-sm">
                    {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
                </div>

                <div class="text-left hidden sm:block">
                    <h3 class="font-bold text-[#1A110A] text-sm">
                        {{ auth()->user()->name ?? 'Penulis' }}
                    </h3>
                </div>

                <svg class="w-3.5 h-3.5 text-[#52130D] transition-transform duration-200" :class="{ 'rotate-180': open }"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- Dropdown Menu Box -->
            <div x-show="open" 
                x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-95 -translate-y-1"
                class="absolute right-0 mt-2 w-60 bg-white border border-[#E6D5B8] rounded-xl shadow-2xl p-3 z-50"
                style="display: none;">

                <div class="pb-2.5 border-b border-gray-100 px-1">
                    <p class="text-[11px] text-gray-400 font-normal">Masuk sebagai</p>
                    <p class="text-xs font-semibold text-[#1A110A] truncate mt-0.5">
                        {{ auth()->user()->email ?? 'penulis@filsafatbali.id' }}
                    </p>
                </div>

                <div class="py-1.5 border-b border-gray-100">
                    <a href="{{ url('/') }}" target="_blank"
                        class="flex items-center gap-2.5 text-xs font-medium text-gray-700 hover:text-[#992B20] transition-colors px-1 py-1.5 rounded-lg hover:bg-gray-50">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                        <span>Kunjungi Website</span>
                    </a>
                </div>

                <div class="pt-1.5">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-2.5 text-xs font-medium text-gray-700 hover:text-red-600 transition-colors px-1 py-1.5 rounded-lg hover:bg-red-50/50">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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