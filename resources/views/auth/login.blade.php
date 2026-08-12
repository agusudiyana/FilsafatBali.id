<x-guest-layout>
    {{-- Header Judul --}}
    <div class="mb-5 text-center">
        <h2 class="text-xl font-bold text-gray-800">Masuk ke FilsafatBali</h2>
        <p class="text-xs text-gray-500 mt-0.5">Silakan masukkan email dan kata sandi Anda</p>
    </div>

    {{-- Session Status / Notifikasi Informasif --}}
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

        <!-- Password dengan Fitur Toggle Mata -->
        <div class="mt-3.5">
            <x-input-label for="password" :value="__('Password')" />
            
            <div class="relative mt-1">
                <x-text-input id="password" class="block w-full text-sm pr-10" type="password" name="password" required autocomplete="current-password" />
                
                <!-- Tombol Ikon Mata -->
                <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                    <!-- Ikon Mata Terbuka (Default) -->
                    <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <!-- Ikon Mata Tertutup/Coret (Tersembunyi) -->
                    <svg id="eyeOffIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a10.018 10.018 0 014.122-.963c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m-2.181 1.258A3.001 3.001 0 0112 15a2.996 2.996 0 01-2.828-2M3 3l18 18" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-3.5">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#C48D2D] shadow-sm focus:ring-[#C48D2D]" name="remember">
                <span class="ms-2 text-xs text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-5">
            @if (Route::has('password.request'))
                <a class="underline text-xs text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#C48D2D]" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 bg-[#C48D2D] hover:bg-[#B27C20] text-xs py-2 px-4 transition duration-150 ease-in-out">
                {{ __('LOG IN') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Script JavaScript Toggle Password -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.getElementById('togglePassword');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeOffIcon = document.getElementById('eyeOffIcon');

            if (toggleButton && passwordInput) {
                toggleButton.addEventListener('click', function () {
                    // Cek tipe input saat ini
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    
                    // Ubah tipe input
                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                    
                    // Berganti Tampilan Ikon
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