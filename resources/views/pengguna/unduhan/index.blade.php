<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-[#2B1A0E] leading-tight" style="font-family: 'Cormorant Garamond', serif;">
                {{ __('Pusat Unduhan Konten Pilihan') }}
            </h2>
            <a href="{{ route('pengguna.dashboard') }}" class="text-sm font-semibold text-[#8D2B1D] hover:underline">
                &larr; Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($unduhans as $item)
                    <div class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm flex flex-col justify-between hover:border-[#8D2B1D] transition">
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <span class="bg-[#EFE4D3] text-[#8D2B1D] text-xs font-semibold px-2.5 py-1 rounded-md">
                                    {{ $item['format'] }}
                                </span>
                                <span class="text-xs text-[#675A4D]">{{ $item['ukuran'] }}</span>
                            </div>
                            <h3 class="text-lg font-bold text-[#2B1A0E] mb-2" style="font-family: 'Cormorant Garamond', serif;">{{ $item['judul'] }}</h3>
                            <p class="text-sm text-[#675A4D] mb-4">{{ $item['deskripsi'] }}</p>
                        </div>
                        
                        <div class="pt-4 border-t border-[#E5D6BF] flex justify-end">
                            <a href="{{ route('pengguna.unduhan.download', $item['id']) }}" class="px-5 py-2.5 bg-[#8D2B1D] hover:bg-[#732216] text-white font-semibold text-sm rounded-xl shadow-sm flex items-center gap-2">
                                📥 Unduh Berkas
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>