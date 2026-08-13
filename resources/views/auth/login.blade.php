<x-guest-layout>
    {{-- Header Judul --}}
    <div class="mb-5 text-center">
        <h2 class="text-xl font-bold text-gray-800">Masuk ke FilsafatBali</h2>
        <p class="text-xs text-gray-500 mt-0.5">Silakan masukkan email dan kata sandi Anda</p>
    </div>

    {{-- Session Status / Notifikasi Informatif --}}
    @if (session('status'))
        <div class="mb-4 px-3.5 py-2.5 bg-amber-50/90 border-l-4 border-[#C48D2D] text-amber-900 rounded-r-lg shadow-sm transition-all duration-200 hover:shadow">
            <div class="flex items-center gap-2.5">
                <svg class="w-4 h-4 text-[#C48D2D] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-xs leading-snug text-amber-900/90">
                    {{ session('status') }}
                </p>
            </div>
        </div>
    @endif

    {{-- Session Notifikasi Error / Penolakan --}}
    @if (session('error'))
        <div class="mb-4 px-3.5 py-2.5 bg-rose-50/90 border-l-4 border-rose-500 text-rose-900 rounded-r-lg shadow-sm">
            <div class="flex items-center gap-2.5">
                <svg class="w-4 h-4 text-rose-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-xs leading-snug text-rose-800">
                    {{ session('error') }}
                </p>
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full text-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs" />
        </div>

        <!-- Password dengan Fitur Toggle Mata Pas Posisi -->
        <div class="mt-3.5">
            <x-input-label for="password" :value="__('Password')" />
            
            <div class="relative mt-1">
                <x-text-input id="password" class="block w-full text-sm pr-10" type="password" name="password" required autocomplete="current-password" />
                
                <!-- Tombol Ikon Mata -->
                <button type="button" id="togglePassword" class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none cursor-pointer">
                    <!-- Ikon Mata Terbuka (Default) -->
                    <svg id="eyeIcon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <!-- Ikon Mata Tertutup/Coret (Tersembunyi) -->
                    <svg id="eyeOffIcon" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a10.018 10.018 0 014.122-.963c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m-2.181 1.258A3.001 3.001 0 0112 15a2.996 2.996 0 01-2.828-2M3 3l18 18" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-3.5">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#8D2B1D] shadow-sm focus:ring-[#8D2B1D]" name="remember">
                <span class="ms-2 text-xs text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Link Lupa Password -->
        <div class="mt-3 text-right">
            @if (Route::has('password.request'))
                <a class="underline text-xs text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#8D2B1D]" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Tombol LOG IN Merah di Tengah -->
        <div class="mt-4">
            <button type="submit" class="w-full flex justify-center items-center bg-[#8D2B1D] hover:bg-[#732216] text-white text-xs font-bold py-2.5 px-4 rounded-xl shadow-sm transition duration-150 ease-in-out cursor-pointer uppercase tracking-wider">
                {{ __('LOG IN') }}
            </button>
        </div>
    </form>

    <!-- Pembatas ATAU -->
    <div class="relative my-5">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-200"></div>
        </div>
        <div class="relative flex justify-center text-xs uppercase">
            <span class="bg-white px-3 text-gray-500 font-medium">atau masuk dengan</span>
        </div>
    </div>

    <!-- Tombol Google Login di Tengah -->
    <a href="{{ route('auth.google') }}" 
       class="w-full flex items-center justify-center gap-3 px-4 py-2.5 border border-gray-300 rounded-xl text-xs font-bold text-gray-700 bg-gray-50 hover:bg-gray-100 transition duration-150 cursor-pointer shadow-sm">
        <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24">
            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
        </svg>
        <span>Masuk dengan Google</span>
    </a>

    <!-- Script JavaScript Toggle Password -->
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