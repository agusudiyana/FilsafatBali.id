<div class="bg-white border-b border-gray-100 px-8 py-4 flex justify-between items-center">

    <!-- Judul Halaman / Dashboard -->
    <div>
        <h2 class="text-2xl font-bold text-[#1A110A]">
            Dashboard
        </h2>
        <p class="text-gray-500 text-sm">
            Selamat datang di Panel Admin
        </p>
    </div>

    <!-- User Profile Dropdown Component -->
    <div x-data="{ open: false }" class="relative">
        
        <!-- Trigger Button -->
        <button @click="open = !open" 
                @click.outside="open = false"
                type="button" 
                class="flex items-center gap-3 bg-[#F2F4F7] hover:bg-gray-200 px-4 py-2 rounded-2xl transition-all duration-200 focus:outline-none">
            
            <!-- Inisial Avatar Bulat Emas -->
            <div class="w-10 h-10 rounded-full bg-[#D4A64A] text-white font-bold flex items-center justify-center text-lg shadow-sm">
                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
            </div>

            <!-- Nama User -->
            <span class="font-semibold text-gray-800 text-base">
                {{ Auth::user()->name ?? 'Admin' }}
            </span>

            <!-- Icon Panah (Chevron) -->
            <svg class="w-4 h-4 text-gray-600 transition-transform duration-200" 
                 :class="{ 'rotate-180': open }"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <!-- Dropdown Menu Box -->
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
             class="absolute right-0 mt-2 w-64 bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden z-50 p-4"
             style="display: none;">
            
            <!-- Section Status Email -->
            <div class="pb-3 border-b border-gray-100">
                <p class="text-xs text-gray-400 font-normal">Masuk sebagai</p>
                <p class="text-sm font-semibold text-gray-900 truncate mt-0.5">
                    {{ Auth::user()->email ?? 'admin@filsafatbali.id' }}
                </p>
            </div>

            <!-- Action Logout -->
            <div class="pt-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="w-full flex items-center gap-3 text-sm font-semibold text-gray-700 hover:text-red-600 transition-colors py-1">
                        <!-- Icon Door Logout -->
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>

        </div>

    </div>

</div>