<section>
    <header>
        <h2 class="text-lg font-bold text-[#8D2B1D]">
            {{ !Auth::user()->password ? __('Buat Kata Sandi Akun') : __('Pembaruan Kata Sandi') }}
        </h2>

        <p class="mt-1 text-xs text-[#8C7A65]">
            @if (!Auth::user()->password)
                {{ __('Anda terhubung menggunakan akun Google dan belum memiliki kata sandi. Silakan buat kata sandi untuk login manual tanpa Google.') }}
            @else
                {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.') }}
            @endif
        </p>
    </header>

    <!-- NOTIFIKASI BERHASIL DISIMPAN -->
    @if (session('status') === 'password-updated')
        <div class="mt-4 p-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-xs font-semibold flex items-center gap-2">
            <svg class="w-4 h-4 shrink-0 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>Kata sandi berhasil disimpan dan diperbarui!</span>
        </div>
    @endif

    <form method="post" action="{{ route('password.update') }}" class="mt-5 space-y-4">
        @csrf
        @method('put')

        <!-- Field Current Password HANYA TAMPIL jika Pengguna SUDAH MEMILIKI Password -->
        @if (Auth::user()->password)
            <div>
                <x-input-label for="update_password_current_password" :value="__('Kata Sandi Saat Ini')" class="text-xs font-semibold text-[#23160E]" />
                <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full text-xs py-2.5 px-3.5 border-[#EADCC9] bg-[#FAF5ED]/50 focus:bg-white focus:border-[#C8A45A] focus:ring-[#C8A45A]/20 rounded-xl transition-all" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1 text-[11px]" />
            </div>
        @endif

        <!-- Kata Sandi Baru -->
        <div>
            <x-input-label for="update_password_password" :value="__('Kata Sandi Baru')" class="text-xs font-semibold text-[#23160E]" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full text-xs py-2.5 px-3.5 border-[#EADCC9] bg-[#FAF5ED]/50 focus:bg-white focus:border-[#C8A45A] focus:ring-[#C8A45A]/20 rounded-xl transition-all" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1 text-[11px]" />
        </div>

        <!-- Konfirmasi Kata Sandi Baru -->
        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Kata Sandi Baru')" class="text-xs font-semibold text-[#23160E]" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full text-xs py-2.5 px-3.5 border-[#EADCC9] bg-[#FAF5ED]/50 focus:bg-white focus:border-[#C8A45A] focus:ring-[#C8A45A]/20 rounded-xl transition-all" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1 text-[11px]" />
        </div>

        <div class="pt-2">
            <button type="submit" class="bg-[#8D2B1D] hover:bg-[#A93226] text-white font-bold text-xs py-2.5 px-5 rounded-xl shadow-md hover:shadow-lg transition-all duration-200 active:scale-95 cursor-pointer">
                {{ !Auth::user()->password ? __('SIMPAN KATA SANDI') : __('SIMPAN PERUBAHAN') }}
            </button>
        </div>
    </form>
</section>