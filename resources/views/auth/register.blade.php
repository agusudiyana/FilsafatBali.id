<x-guest-layout>
    <div class="py-1" x-data="{ role: '{{ request()->query('role', 'pengguna') }}' }">
        
        <!-- Header Judul -->
        <div class="text-center mb-5">
            <h2 class="text-2xl font-bold text-[#8D2B1D] tracking-tight" style="font-family: 'Cormorant Garamond', serif;">
                Registrasi Akun
            </h2>
            <p class="text-xs text-[#8C7A65] mt-1 font-medium">
                Pilih akses Anda untuk menjelajahi arsip kebudayaan
            </p>
        </div>

        <!-- TAB SEGMENTED CONTROL (Pengguna / Penulis) -->
        <div class="p-1.5 bg-[#FAF5ED] rounded-xl border border-[#EADCC9] grid grid-cols-2 gap-1.5 mb-5 shadow-sm">
            <!-- Tombol Pengguna -->
            <button type="button" 
                    @click="role = 'pengguna'"
                    :class="role === 'pengguna' ? 'bg-[#8D2B1D] text-[#FFF9F0] shadow-md font-bold' : 'text-[#6B4A2B] hover:text-[#8D2B1D] hover:bg-[#F3ECE0] font-semibold'"
                    class="py-2.5 px-3 rounded-lg text-xs tracking-wider transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0 transition-transform duration-300" :class="role === 'pengguna' ? 'scale-110' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span>Pengguna</span>
            </button>

            <!-- Tombol Penulis -->
            <button type="button" 
                    @click="role = 'penulis'"
                    :class="role === 'penulis' ? 'bg-[#8D2B1D] text-[#FFF9F0] shadow-md font-bold' : 'text-[#6B4A2B] hover:text-[#8D2B1D] hover:bg-[#F3ECE0] font-semibold'"
                    class="py-2.5 px-3 rounded-lg text-xs tracking-wider transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0 transition-transform duration-300" :class="role === 'penulis' ? 'scale-110' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
                <span>Penulis</span>
            </button>
        </div>

        <!-- FORM ISIAN -->
        <form method="POST" action="{{ route('register') }}" class="space-y-3.5">
            @csrf

            <!-- Role Hidden Input -->
            <input type="hidden" name="role" :value="role">

            <!-- 1. FIELD NAMA LENGKAP -->
            <div>
                <x-input-label for="name" :value="__('Nama Lengkap')" class="text-xs font-semibold text-[#23160E]" />
                <x-text-input id="name" class="block mt-1 w-full text-xs py-2.5 px-3.5 border-[#EADCC9] bg-[#FAF5ED]/50 focus:bg-white focus:border-[#C8A45A] focus:ring-[#C8A45A]/20 rounded-xl transition-all" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Masukkan nama lengkap Anda" />
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-[11px]" />
            </div>

            <!-- 2. FIELD ALAMAT EMAIL -->
            <div>
                <x-input-label for="email" :value="__('Alamat Email')" class="text-xs font-semibold text-[#23160E]" />
                <x-text-input id="email" class="block mt-1 w-full text-xs py-2.5 px-3.5 border-[#EADCC9] bg-[#FAF5ED]/50 focus:bg-white focus:border-[#C8A45A] focus:ring-[#C8A45A]/20 rounded-xl transition-all" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="nama@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-[11px]" />
            </div>

            <!-- 3. FIELD KATA SANDI (HANYA UNTUK PENGGUNA) -->
            <div x-show="role === 'pengguna'" 
                 x-transition:enter="transition ease-out duration-300 transform opacity-0 -translate-y-2"
                 x-transition:enter-start="opacity-0 -translate-y-2 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100">
                <div>
                    <x-input-label for="password" :value="__('Kata Sandi')" class="text-xs font-semibold text-[#23160E]" />
                    <div class="relative mt-1 flex items-center">
                        <x-text-input id="password" class="block w-full text-xs py-2.5 pl-3.5 pr-10 border-[#EADCC9] bg-[#FAF5ED]/50 focus:bg-white focus:border-[#C8A45A] focus:ring-[#C8A45A]/20 rounded-xl transition-all" type="password" name="password" ::required="role === 'pengguna'" autocomplete="new-password" placeholder="••••••••" />
                        <button type="button" onclick="togglePassVisibility('password', 'eyeIcon', 'eyeOffIcon')" class="absolute right-3 flex items-center text-[#8C7A65] hover:text-[#8D2B1D] focus:outline-none cursor-pointer">
                            <svg id="eyeIcon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            <svg id="eyeOffIcon" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a10.018 10.018 0 014.122-.963c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m-2.181 1.258A3.001 3.001 0 0112 15a2.996 2.996 0 01-2.828-2M3 3l18 18"/></svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-[11px]" />
                </div>
            </div>

            <!-- 4. CATATAN KETENTUAN PENULIS -->
            <div x-show="role === 'penulis'" 
                 x-transition:enter="transition ease-out duration-300 transform opacity-0 translate-y-2"
                 x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 class="pt-1">
                <div class="p-3.5 bg-[#FAF5ED] border border-[#EADCC9] rounded-xl text-xs text-[#6B4A2B] leading-relaxed shadow-sm flex items-start gap-2.5">
                    <svg class="w-4 h-4 text-[#C8A45A] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <p class="font-bold text-[#8D2B1D]">Ketentuan Pendaftaran Penulis</p>
                        <p class="text-[11px] text-[#8C7A65] mt-0.5">Password login akan dikirim secara otomatis ke email Anda. Pendaftaran memerlukan <strong>persetujuan Admin</strong> sebelum akun dapat digunakan.</p>
                    </div>
                </div>
            </div>

            <!-- TOMBOL DAFTAR UTAMA -->
            <div class="pt-2">
                <button type="submit" class="w-full bg-[#8D2B1D] hover:bg-[#A93226] text-white font-bold text-xs py-2.5 px-5 rounded-xl shadow-md hover:shadow-lg transition-all duration-200 active:scale-95 cursor-pointer">
                    <span x-text="role === 'penulis' ? 'DAFTAR PENULIS' : 'DAFTAR PENGGUNA'"></span>
                </button>
            </div>
        </form>

        <!-- BAGIAN GOOGLE SOCIALITE (Tampil Simetris di Bawah Form Pengguna) -->
        <div x-show="role === 'pengguna'" x-transition class="mt-4 space-y-3">
            <!-- Garis Pembatas "atau daftar dengan" -->
            <div class="relative flex items-center justify-center my-2">
                <div class="border-t border-[#EADCC9] w-full"></div>
                <span class="bg-white px-3 text-[10px] font-semibold text-[#8C7A65] uppercase tracking-wider absolute">
                    atau daftar dengan
                </span>
            </div>

            <!-- Tombol Google Full Width Elegan -->
            <a href="{{ url('/auth/google') }}" 
               class="w-full py-2.5 px-4 bg-white border border-[#EADCC9] hover:border-[#C8A45A] hover:bg-[#FAF5ED] rounded-xl text-xs font-semibold text-[#23160E] shadow-sm transition-all duration-200 flex items-center justify-center gap-2.5 cursor-pointer">
                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                </svg>
                <span>Google</span>
            </a>
        </div>

        <!-- LINK SUDAH PUNYA AKUN -->
        <div class="text-center mt-4">
            <a class="text-xs text-[#8C7A65] hover:text-[#8D2B1D] font-semibold transition-colors" href="{{ route('login') }}">
                Sudah punya akun? Masuk
            </a>
        </div>

    </div>

    <!-- Script Toggle Pass Visibility -->
    <script>
        function togglePassVisibility(inputId, eyeOpenId, eyeClosedId) {
            const input = document.getElementById(inputId);
            const eyeOpen = document.getElementById(eyeOpenId);
            const eyeClosed = document.getElementById(eyeClosedId);

            if (input && eyeOpen && eyeClosed) {
                if (input.type === 'password') {
                    input.type = 'text';
                    eyeOpen.classList.add('hidden');
                    eyeClosed.classList.remove('hidden');
                } else {
                    input.type = 'password';
                    eyeOpen.classList.remove('hidden');
                    eyeClosed.classList.add('hidden');
                }
            }
        }
    </script>
</x-guest-layout>