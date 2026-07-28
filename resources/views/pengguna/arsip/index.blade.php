<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-[#2B1A0E] leading-tight"
                style="font-family: 'Cormorant Garamond', serif;">
                {{ __('Koleksi Arsip Kebudayaan Bali') }}
            </h2>
            <a href="{{ route('pengguna.dashboard') }}" class="text-sm font-semibold text-[#8D2B1D] hover:underline">
                &larr; Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Filter Pencarian -->
            <div
                class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm flex flex-col md:flex-row items-center justify-between gap-4">
                <input type="text" placeholder="Cari naskah, satua, atau istilah..."
                    class="w-full md:w-1/2 rounded-xl border-[#E5D6BF] text-sm focus:ring-[#8D2B1D] focus:border-[#8D2B1D]">
                <select
                    class="w-full md:w-auto rounded-xl border-[#E5D6BF] text-sm focus:ring-[#8D2B1D] focus:border-[#8D2B1D]">
                    <option value="">Semua Kategori</option>
                    <option value="ajaran">Ajaran & Naskah Kuno</option>
                    <option value="arsitektur">Arsitektur</option>
                    <option value="satua">Satua Bali</option>
                </select>
            </div>

            <!-- List Arsip -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($arsips as $arsip)
                    <div
                        class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm flex flex-col justify-between hover:border-[#8D2B1D] transition">
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <span class="bg-[#EFE4D3] text-[#8D2B1D] text-xs font-semibold px-2.5 py-1 rounded-md">
                                    {{ $arsip['kategori'] }}
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-[#2B1A0E] mb-1"
                                style="font-family: 'Cormorant Garamond', serif;">{{ $arsip['judul'] }}</h3>
                            <p class="text-xs text-[#675A4D] mb-3">Penulis: {{ $arsip['penulis'] }}</p>
                            <p class="text-sm text-[#675A4D] mb-4">{{ $arsip['deskripsi'] }}</p>
                        </div>
                        <div class="pt-4 border-t border-[#E5D6BF] flex justify-between items-center">
                            <a href="#" class="text-sm font-semibold text-[#8D2B1D] hover:text-[#732216]">Baca
                                Selengkapnya &rarr;</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
