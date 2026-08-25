<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Lupa kata sandi Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan kata sandi baru ke Gmail Anda untuk digunakan saat login.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" 
                          class="block mt-1 w-full !border-gray-300 focus:!border-[#8D2B1D] focus:!ring-[#8D2B1D]" 
                          type="email" 
                          name="email" 
                          :value="old('email')" 
                          required 
                          autofocus 
                          oninvalid="this.setCustomValidity('Silakan isi bidang ini.')" 
                          oninput="this.setCustomValidity('')" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="!bg-[#8D2B1D] hover:!bg-[#732216] focus:!ring-[#8D2B1D] active:!bg-[#5e1b12]">
                {{ __('KIRIM KATA SANDI BARU') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>