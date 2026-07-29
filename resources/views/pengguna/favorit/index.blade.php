<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-[#2B1A0E] leading-tight" style="font-family: 'Cormorant Garamond', serif;">
                {{ __('Artikel & Naskah Favorit Saya') }}
            </h2>
            <a href="{{ route('home') }}" class="text-sm font-semibold text-[#8D2B1D] hover:underline">
                &larr; Kembali ke Beranda
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative text-sm" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @php
                $items = isset($favorites) ? $favorites : (isset($favorits) ? $favorits : []);
            @endphp

            @if (count($items) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($items as $item)
                        @php
                            $id = is_array($item) ? ($item['id'] ?? null) : ($item->id ?? null);
                            $title = is_array($item) ? ($item['judul'] ?? $item['article_title'] ?? 'Tanpa Judul') : ($item->article_title ?? $item->judul ?? 'Tanpa Judul');
                            $category = is_array($item) ? ($item['kategori'] ?? 'Artikel') : ($item->kategori ?? 'Artikel');
                            $deskripsi = is_array($item) ? ($item['deskripsi'] ?? 'Naskah kebudayaan dan filsafat Bali favorit.') : ($item->deskripsi ?? 'Naskah kebudayaan dan filsafat Bali favorit.');
                            $url = is_array($item) ? ($item['url'] ?? $item['article_url'] ?? '#') : ($item->article_url ?? '#');
                            
                            $rawDate = is_array($item) ? ($item['tanggal_disimpan'] ?? $item['created_at'] ?? null) : ($item->created_at ?? null);
                            $dateFormatted = $rawDate ? \Carbon\Carbon::parse($rawDate)->format('d M Y') : date('d M Y');
                        @endphp

                        <div class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm flex flex-col justify-between hover:border-[#8D2B1D] transition">
                            <div>
                                <div class="flex justify-between items-center mb-3">
                                    <span class="bg-[#EFE4D3] text-[#8D2B1D] text-xs font-semibold px-2.5 py-1 rounded-md">
                                        {{ $category }}
                                    </span>
                                    <span class="text-xs text-[#675A4D]">
                                        Disimpan: {{ $dateFormatted }}
                                    </span>
                                </div>
                                <h3 class="text-lg font-bold text-[#2B1A0E] mb-2" style="font-family: 'Cormorant Garamond', serif;">
                                    {{ $title }}
                                </h3>
                                <p class="text-sm text-[#675A4D] mb-4">{{ $deskripsi }}</p>
                            </div>

                            <div class="pt-4 border-t border-[#E5D6BF] flex justify-between items-center">
                                <a href="{{ $url }}" class="text-sm font-semibold text-[#8D2B1D] hover:text-[#732216]">
                                    Baca &rarr;
                                </a>

                                @if($id && Route::has('pengguna.favorit.toggle'))
                                    <form action="{{ route('pengguna.favorit.toggle', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-xs text-red-600 hover:text-red-800 font-medium">
                                            ❌ Hapus Favorit
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white border border-[#E5D6BF] p-12 text-center rounded-2xl shadow-sm">
                    <div class="text-4xl mb-3">⭐</div>
                    <h3 class="text-lg font-bold text-[#2B1A0E]" style="font-family: 'Cormorant Garamond', serif;">Belum Ada Artikel Favorit</h3>
                    <p class="text-sm text-[#675A4D] mt-1">Anda belum menandai artikel atau naskah apapun.</p>
                    <a href="{{ route('pengguna.arsip.index') }}" class="mt-4 inline-block px-6 py-2.5 bg-[#8D2B1D] hover:bg-[#732216] text-white rounded-xl text-sm font-semibold transition">
                        Cari di Koleksi Arsip
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>