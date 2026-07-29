<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-[#2B1A0E] leading-tight" style="font-family: 'Cormorant Garamond', serif;">
                {{ __('Koleksi Arsip Kebudayaan Bali') }}
            </h2>
            <a href="{{ route('home') }}" class="text-sm font-semibold text-[#8D2B1D] hover:underline">
                &larr; Kembali ke Beranda
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Filter Pencarian -->
            <div class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm flex flex-col md:flex-row items-center justify-between gap-4">
                <input type="text" placeholder="Cari naskah, satua, atau istilah..." class="w-full md:w-1/2 rounded-xl border-[#E5D6BF] text-sm focus:ring-[#8D2B1D] focus:border-[#8D2B1D]">
                <select class="w-full md:w-auto rounded-xl border-[#E5D6BF] text-sm focus:ring-[#8D2B1D] focus:border-[#8D2B1D]">
                    <option value="">Semua Kategori</option>
                    <option value="ajaran">Ajaran & Naskah Kuno</option>
                    <option value="arsitektur">Arsitektur</option>
                    <option value="satua">Satua Bali</option>
                </select>
            </div>

            <!-- List Arsip / Disimpan -->
            @php
                $items = isset($bookmarks) ? $bookmarks : (isset($arsips) ? $arsips : []);
            @endphp

            @if(count($items) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($items as $arsip)
                        @php
                            $title = is_array($arsip) ? ($arsip['judul'] ?? $arsip['item_title'] ?? 'Tanpa Judul') : ($arsip->item_title ?? $arsip->judul ?? 'Tanpa Judul');
                            $category = is_array($arsip) ? ($arsip['kategori'] ?? $arsip['item_type'] ?? 'Arsip') : ($arsip->item_type ?? $arsip->kategori ?? 'Arsip');
                            $penulis = is_array($arsip) ? ($arsip['penulis'] ?? 'Penulis') : ($arsip->penulis ?? 'Penulis');
                            $deskripsi = is_array($arsip) ? ($arsip['deskripsi'] ?? 'Naskah kebudayaan dan filsafat Bali.') : ($arsip->deskripsi ?? 'Naskah kebudayaan dan filsafat Bali.');
                            $url = is_array($arsip) ? ($arsip['url'] ?? $arsip['item_url'] ?? '#') : ($arsip->item_url ?? '#');
                            $id = is_array($arsip) ? ($arsip['id'] ?? null) : ($arsip->id ?? null);
                        @endphp

                        <div class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm flex flex-col justify-between hover:border-[#8D2B1D] transition">
                            <div>
                                <div class="flex justify-between items-center mb-3">
                                    <span class="bg-[#EFE4D3] text-[#8D2B1D] text-xs font-semibold px-2.5 py-1 rounded-md">
                                        {{ $category }}
                                    </span>

                                    @if($id && Route::has('pengguna.arsip.destroy'))
                                        <form action="{{ route('pengguna.arsip.destroy', $id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs text-red-500 hover:underline" title="Hapus dari Simpanan">
                                                ✕ Hapus
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <h3 class="text-lg font-bold text-[#2B1A0E] mb-1" style="font-family: 'Cormorant Garamond', serif;">
                                    {{ $title }}
                                </h3>
                                <p class="text-xs text-[#675A4D] mb-3">Penulis: {{ $penulis }}</p>
                                <p class="text-sm text-[#675A4D] mb-4">{{ $deskripsi }}</p>
                            </div>
                            <div class="pt-4 border-t border-[#E5D6BF] flex justify-between items-center">
                                <a href="{{ $url }}" class="text-sm font-semibold text-[#8D2B1D] hover:text-[#732216]">
                                    Baca Selengkapnya &rarr;
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white border border-[#E5D6BF] p-12 rounded-2xl text-center shadow-sm">
                    <div class="text-4xl mb-3">📚</div>
                    <h3 class="text-lg font-bold text-[#2B1A0E]" style="font-family: 'Cormorant Garamond', serif;">Belum Ada Koleksi Arsip</h3>
                    <p class="text-sm text-[#675A4D] mt-1">Simpan naskah atau cerita favorit Anda saat menjelajahi beranda.</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>