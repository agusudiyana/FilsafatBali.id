<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#FAF6F0] px-4 py-12">
        <div class="max-w-md w-full bg-white border border-[#E5D6BF] rounded-2xl p-8 shadow-sm text-center">

            <!-- Icon Surat -->
            <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-[#EFE4D3] flex items-center justify-center text-[#8D2B1D]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
            </div>

            <h3 class="text-2xl font-bold text-[#2B1A0E]" style="font-family: 'Cormorant Garamond', serif;">
                Verifikasi Email Anda
            </h3>

            <p class="text-[#675A4D] text-sm mt-3 leading-relaxed">
                Terima kasih telah mendaftar! Sebelum mulai, silakan verifikasi alamat email Anda dengan mengklik tautan
                yang baru saja kami kirimkan.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 mt-4">
                    Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.
                </div>
            @endif

            <div class="mt-8 space-y-3">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                        class="w-full py-3 px-6 text-center text-white bg-[#8D2B1D] hover:bg-[#732216] font-medium rounded-xl transition duration-300 text-sm shadow-sm">
                        Kirim Ulang Email Verifikasi
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full py-2.5 px-6 text-center text-[#8C7A65] hover:text-[#2B1A0E] text-sm font-medium transition">
                        Keluar
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-guest-layout>
