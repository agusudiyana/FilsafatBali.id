<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-[#2B1A0E] leading-tight"
                style="font-family: 'Cormorant Garamond', serif;">
                {{ __('Artikel & Naskah Favorit Saya') }}
            </h2>
            <a href="{{ route('pengguna.dashboard') }}" class="text-sm font-semibold text-[#8D2B1D] hover:underline">
                &larr; Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative text-sm"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (count($favorits) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($favorits as $item)
                        <div
                            class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm flex flex-col justify-between hover:border-[#8D2B1D] transition">
                            <div>
                                <div class="flex justify-between items-center mb-3">
                                    <span
                                        class="bg-[#EFE4D3] text-[#8D2B1D] text-xs font-semibold px-2.5 py-1 rounded-md">
                                        {{ $item['kategori'] }}
                                    </span>
                                    <span class="text-xs text-[#675A4D]">Disimpan:
                                        {{ $item['tanggal_disimpan'] }}</span>
                                </div>
                                <h3 class="text-lg font-bold text-[#2B1A0E] mb-2"
                                    style="font-family: 'Cormorant Garamond', serif;">{{ $item['judul'] }}</h3>
                                <p class="text-sm text-[#675A4D] mb-4">{{ $item['deskripsi'] }}</p>
                            </div>

                            <div class="pt-4 border-t border-[#E5D6BF] flex justify-between items-center">
                                <a href="#" class="text-sm font-semibold text-[#8D2B1D] hover:text-[#732216]">Baca
                                    &rarr;</a>

                                <form action="{{ route('pengguna.favorit.toggle', $item['id']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-xs text-red-600 hover:text-red-800 font-medium">
                                        ❌ Hapus Favorit
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white border border-[#E5D6BF] p-12 text-center rounded-2xl shadow-sm">
                    <h3 class="text-lg font-bold text-[#2B1A0E]">Belum Ada Artikel Favorit</h3>
                    <p class="text-sm text-[#675A4D] mt-1">Anda belum menandai artikel atau naskah apapun.</p>
                    <a href="{{ route('pengguna.arsip.index') }}"
                        class="mt-4 inline-block px-6 py-2.5 bg-[#8D2B1D] text-white rounded-xl text-sm font-semibold">
                        Cari di Koleksi Arsip
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
