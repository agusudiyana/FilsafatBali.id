<x-app-layout>
    <div class="py-10 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Header Kartu Akun & Navigasi Kembali -->
            <div class="bg-white border border-[#E5D6BF] rounded-2xl p-8 shadow-sm flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-5">
                    <!-- Avatar Profil -->
                    <div class="w-16 h-16 rounded-2xl bg-[#8D2B1D] text-[#FAF6F0] border-2 border-[#C8A45A] overflow-hidden flex items-center justify-center font-bold text-2xl shrink-0 shadow-sm">
                        @if (isset(Auth::user()->avatar) && Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}"
                                class="w-full h-full object-cover">
                        @elseif (isset(Auth::user()->foto) && Auth::user()->foto)
                            <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="{{ Auth::user()->name }}"
                                class="w-full h-full object-cover">
                        @else
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        @endif
                    </div>

                    <!-- Informasi User -->
                    <div>
                        <span class="bg-[#EFE4D3] text-[#8D2B1D] text-[10px] tracking-[2px] uppercase font-bold px-3 py-1 rounded-md border border-[#E5D6BF]">
                            {{ ucfirst(Auth::user()->role ?? 'Pengguna') }} Terdaftar
                        </span>
                        <h3 class="text-2xl font-bold text-[#2B1A0E] mt-2"
                            style="font-family: 'Cormorant Garamond', serif;">
                            {{ Auth::user()->name }}
                        </h3>
                        <p class="text-sm text-[#675A4D]">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <!-- Tombol Navigasi Kembali ke Dashboard Pengguna -->
                <div class="flex items-center gap-4 shrink-0">
                    <a href="{{ route('pengguna.dashboard') }}"
                        class="inline-flex items-center gap-2 text-xs font-bold tracking-wider uppercase text-[#8D2B1D] bg-[#EFE4D3]/60 hover:bg-[#8D2B1D] hover:text-white px-5 py-2.5 rounded-xl transition-all duration-300 border border-[#C8A45A]/30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span>Dashboard Pengguna</span>
                    </a>
                </div>
            </div>

            <!-- Form Edit Profil & Password -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm hover:border-[#C8A45A]/50 transition-colors">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm hover:border-[#C8A45A]/50 transition-colors">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>