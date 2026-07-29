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
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative text-sm" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Pengecekan variabel secara otomatis --}}
            @php
                $items = $downloads ?? $unduhans ?? [];
            @endphp

            @if(count($items) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($items as $item)
                        @php
                            $judul = is_array($item) ? ($item['judul'] ?? $item['file_name'] ?? 'Dokumen Budaya') : ($item->file_name ?? $item->judul ?? 'Dokumen Budaya');
                            $deskripsi = is_array($item) ? ($item['deskripsi'] ?? 'Naskah dan materi kebudayaan Bali.') : ($item->deskripsi ?? 'Naskah dan materi kebudayaan Bali.');
                            $format = is_array($item) ? ($item['format'] ?? 'PDF') : 'PDF';
                            $ukuran = is_array($item) ? ($item['ukuran'] ?? 'Unduhan') : 'Unduhan';
                            $filePath = is_array($item) ? ($item['file_path'] ?? '#') : ($item->file_path ?? '#');
                        @endphp

                        <div class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm flex flex-col justify-between hover:border-[#8D2B1D] transition">
                            <div>
                                <div class="flex justify-between items-center mb-3">
                                    <span class="bg-[#EFE4D3] text-[#8D2B1D] text-xs font-semibold px-2.5 py-1 rounded-md">
                                        {{ $format }}
                                    </span>
                                    <span class="text-xs text-[#675A4D]">{{ $ukuran }}</span>
                                </div>
                                <h3 class="text-lg font-bold text-[#2B1A0E] mb-2" style="font-family: 'Cormorant Garamond', serif;">
                                    {{ $judul }}
                                </h3>
                                <p class="text-sm text-[#675A4D] mb-4">{{ $deskripsi }}</p>
                            </div>

                            <div class="pt-4 border-t border-[#E5D6BF] flex justify-between items-center">
                                <a href="{{ asset($filePath) }}" download class="px-4 py-2 bg-[#8D2B1D] hover:bg-[#732216] text-white text-xs font-semibold rounded-xl transition shadow-sm">
                                    Unduh Berkas &darr;
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white border border-[#E5D6BF] p-12 text-center rounded-2xl shadow-sm">
                    <div class="text-4xl mb-3">📥</div>
                    <h3 class="text-lg font-bold text-[#2B1A0E]" style="font-family: 'Cormorant Garamond', serif;">Belum Ada Riwayat Unduhan</h3>
                    <p class="text-sm text-[#675A4D] mt-1">Anda belum pernah mengunduh naskah atau ringkasan dokumen materi apapun.</p>
                    <a href="{{ route('pengguna.arsip.index') }}" class="mt-4 inline-block px-6 py-2.5 bg-[#8D2B1D] hover:bg-[#732216] text-white rounded-xl text-sm font-semibold transition">
                        Jelajahi Koleksi Arsip
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>