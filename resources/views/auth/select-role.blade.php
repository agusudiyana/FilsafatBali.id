<x-guest-layout>
    <div class="py-1" x-data="{ role: '{{ request()->query('role', 'pengguna') }}' }">
        
        <!-- Header Judul yang Lebih Elegan & Menarik -->
        <div class="text-center mb-5">
            <h2 class="text-2xl font-bold text-[#8D2B1D] tracking-tight" style="font-family: 'Cormorant Garamond', serif;">
                Registrasi Akun
            </h2>
            <p class="text-xs text-[#8C7A65] mt-1 font-medium">
                Pilih akses Anda untuk menjelajahi arsip kebudayaan
            </p>
        </div>

        <!-- TAB SEGMENTED CONTROL (2 Persegi Panjang Sejajar dengan Warna Emas & Maroon) -->
        <div class="p-1.5 bg-[#FAF5ED] rounded-xl border border-[#EADCC9] grid grid-cols-2 gap-1.5 mb-5 shadow-sm">
            <!-- Persegi Panjang 1: Pengunjung -->
            <button type="button" 
                    @click="role = 'pengguna'"
                    :class="role === 'pengguna' ? 'bg-[#8D2B1D] text-[#FFF9F0] shadow-md font-bold' : 'text-[#6B4A2B] hover:text-[#8D2B1D] hover:bg-[#F3ECE0] font-semibold'"
                    class="py-2.5 px-3 rounded-lg text-xs tracking-wider transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0 transition-transform duration-300" :class="role === 'pengguna' ? 'scale-110' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span>Pengunjung</span>
            </button>

            <!-- Persegi Panjang 2: Penulis -->
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

        <!-- FORM ISIAN COMPACT & MEWAH -->
        <form method="POST" action="{{ route('register') }}" class="space-y-3.5">
            @csrf

            <!-- Role Hidden Input -->
            <input type="hidden" name="role" :value="role">

            <!-- Field Nama -->
            <div>
                <x-input-label for="name" :value="__('Nama Lengkap')" class="text-xs font-semibold text-[#23160E]" />
                <x-text-input id="name" class="block mt-1 w-full text-xs py-2.5 px-3.5 border-[#EADCC9] bg-[#FAF5ED]/50 focus:bg-white focus:border-[#C8A45A] focus:ring-[#C8A45A]/20 rounded-xl transition-all" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Masukkan nama lengkap Anda" />
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-[11px]" />
            </div>

            <!-- Field Email -->
            <div>
                <x-input-label for="email" :value="__('Alamat Email')" class="text-xs font-semibold text-[#23160E]" />
                <x-text-input id="email" class="block mt-1 w-full text-xs py-2.5 px-3.5 border-[#EADCC9] bg-[#FAF5ED]/50 focus:bg-white focus:border-[#C8A45A] focus:ring-[#C8A45A]/20 rounded-xl transition-all" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="nama@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-[11px]" />
            </div>

            <!-- TAB 1: ISIAN KHUSUS PENGUNJUNG -->
            <div x-show="role === 'pengguna'" 
                 x-transition:enter="transition ease-out duration-300 transform opacity-0 -translate-y-2"
                 x-transition:enter-start="opacity-0 -translate-y-2 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 class="space-y-3.5">
                
                <!-- Field Password -->
                <div>
                    <x-input-label for="password" :value="__('Kata Sandi')" class="text-xs font-semibold text-[#23160E]" />
                    <div class="relative mt-1">
                        <x-text-input id="password" class="block w-full text-xs py-2.5 pr-10 px-3.5 border-[#EADCC9] bg-[#FAF5ED]/50 focus:bg-white focus:border-[#C8A45A] focus:ring-[#C8A45A]/20 rounded-xl transition-all" type="password" name="password" ::required="role === 'pengguna'" autocomplete="new-password" placeholder="••••••••" />
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-[#8C7A65] hover:text-[#8D2B1D] focus:outline-none">
                            <svg id="eyeIcon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            <svg id="eyeOffIcon" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a10.018 10.018 0 014.122-.963c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m-2.181 1.258A3.001 3.001 0 0112 15a2.996 2.996 0 01-2.828-2M3 3l18 18"/></svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-[11px]" />
                </div>

                <!-- Field Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" class="text-xs font-semibold text-[#23160E]" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full text-xs py-2.5 px-3.5 border-[#EADCC9] bg-[#FAF5ED]/50 focus:bg-white focus:border-[#C8A45A] focus:ring-[#C8A45A]/20 rounded-xl transition-all" type="password" name="password_confirmation" ::required="role === 'pengguna'" autocomplete="new-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-[11px]" />
                </div>
            </div>

            <!-- TAB 2: CATATAN KHUSUS PENULIS -->
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

            <!-- Tombol Submit & Link Login -->
            <div class="flex items-center justify-between pt-2">
                <a class="text-xs text-[#8C7A65] hover:text-[#8D2B1D] font-semibold transition-colors" href="{{ route('login') }}">
                    Sudah punya akun?
                </a>

                <button type="submit" class="bg-[#8D2B1D] hover:bg-[#A93226] text-white font-bold text-xs py-2.5 px-5 rounded-xl shadow-md hover:shadow-lg transition-all duration-200 active:scale-95 cursor-pointer">
                    <span x-text="role === 'penulis' ? 'DAFTAR PENULIS' : 'DAFTAR PENGGUNA'"></span>
                </button>
            </div>
        </form>
    </div>

    <!-- Script Toggle Eye Password -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.getElementById('togglePassword');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeOffIcon = document.getElementById('eyeOffIcon');

            if (toggleButton && passwordInput) {
                toggleButton.addEventListener('click', function () {
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                    if (isPassword) {
                        eyeIcon.classList.add('hidden');
                        eyeOffIcon.classList.remove('hidden');
                    } else {
                        eyeIcon.classList.remove('hidden');
                        eyeOffIcon.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</x-guest-layout>