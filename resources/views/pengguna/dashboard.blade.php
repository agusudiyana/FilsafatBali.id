<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-[#2B1A0E] leading-tight" style="font-family: 'Cormorant Garamond', serif;">
                {{ __('Dashboard Pengguna') }}
            </h2>
            <a href="{{ url('/') }}" class="text-sm font-semibold text-[#8D2B1D] hover:underline">
                &larr; Kembali ke Beranda
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- SAMBUTAN & INFORMASI USER -->
            <div class="bg-white border border-[#E5D6BF] p-8 rounded-2xl shadow-sm flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-5">
                    <div class="w-16 h-16 rounded-full bg-[#8D2B1D] text-white flex items-center justify-center font-bold text-2xl border-2 border-[#C8A45A] shrink-0">
                        @if(auth()->user()->foto ?? false)
                            <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="{{ auth()->user()->name }}" class="w-full h-full object-cover rounded-full">
                        @else
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        @endif
                    </div>
                    <div>
                        <h1 style="font-family:'Cormorant Garamond',serif;" class="text-3xl font-bold text-[#2B1A0E]">
                            Rahajeng Rauh, {{ auth()->user()->name }}!
                        </h1>
                        <p class="text-[#675A4D] text-sm mt-1">
                            Selamat datang di Ruang Pengguna Arsipan Budaya FilsafatBali.id. Kelola koleksi arsip tersimpan dan materi unduhan Anda di sini.
                        </p>
                    </div>
                </div>
                
                <form method="POST" action="{{ route('logout') }}" class="shrink-0">
                    @csrf
                    <button type="submit" class="px-5 py-2.5 rounded-xl border border-[#8D2B1D] text-[#8D2B1D] hover:bg-[#8D2B1D] hover:text-white text-xs font-semibold tracking-wider uppercase transition">
                        Keluar / Logout
                    </button>
                </form>
            </div>

            <!-- KARTU NAVIGASI UTAMA (MENU AKSI PENGGUNA) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- KARTU 1: ARSIP TERSIMPAN -->
                <div class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm hover:border-[#8D2B1D] transition flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-[#EFE4D3] text-[#8D2B1D] flex items-center justify-center text-2xl font-bold">
                                📚
                            </div>
                            <span class="text-xs font-semibold bg-[#FAF6F0] text-[#8D2B1D] px-3 py-1 rounded-full border border-[#E5D6BF]">
                                {{ isset($bookmarks) ? count($bookmarks) : (isset($arsips) ? count($arsips) : 0) }} Item
                            </span>
                        </div>
                        <h3 style="font-family:'Cormorant Garamond',serif;" class="text-2xl font-bold text-[#2B1A0E]">
                            Koleksi Arsip Tersimpan
                        </h3>
                        <p class="text-sm text-[#675A4D] mt-2">
                            Akses kembali naskah kebudayaan, satua, dan artikel filsafat favorit yang telah Anda simpan.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-[#E5D6BF]">
                        @if(Route::has('pengguna.arsip.index'))
                            <a href="{{ route('pengguna.arsip.index') }}" class="inline-flex items-center text-sm font-semibold text-[#8D2B1D] hover:text-[#732216]">
                                Buka Koleksi Tersimpan &rarr;
                            </a>
                        @else
                            <a href="{{ url('/') }}#jenis-filsafat" class="inline-flex items-center text-sm font-semibold text-[#8D2B1D] hover:text-[#732216]">
                                Jelajahi Beranda &rarr;
                            </a>
                        @endif
                    </div>
                </div>

               
            <!-- PRATINJAU DOKUMEN / ARSIP TERAKHIR -->
            <div class="bg-white border border-[#E5D6BF] p-8 rounded-2xl shadow-sm">
                <div class="flex justify-between items-center mb-6">
                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-2xl font-bold text-[#2B1A0E]">
                        Arsip Kebudayaan Terbaru
                    </h3>
                    @if(Route::has('pengguna.arsip.index'))
                        <a href="{{ route('pengguna.arsip.index') }}" class="text-xs font-semibold text-[#8D2B1D] hover:underline">
                            Lihat Semua
                        </a>
                    @endif
                </div>

                @php
                    $previewItems = isset($bookmarks) ? $bookmarks : (isset($arsips) ? $arsips : []);
                @endphp

                @if(count($previewItems) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach(array_slice(is_array($previewItems) ? $previewItems : $previewItems->toArray(), 0, 3) as $arsip)
                            @php
                                $title = is_array($arsip) ? ($arsip['judul'] ?? $arsip['item_title'] ?? 'Tanpa Judul') : ($arsip->item_title ?? $arsip->judul ?? 'Tanpa Judul');
                                $category = is_array($arsip) ? ($arsip['kategori'] ?? $arsip['item_type'] ?? 'Arsip') : ($arsip->item_type ?? $arsip->kategori ?? 'Arsip');
                                $deskripsi = is_array($arsip) ? ($arsip['deskripsi'] ?? 'Naskah kebudayaan dan filsafat Bali.') : ($arsip->deskripsi ?? 'Naskah kebudayaan dan filsafat Bali.');
                                $url = is_array($arsip) ? ($arsip['url'] ?? $arsip['item_url'] ?? '#') : ($arsip->item_url ?? '#');
                            @endphp

                            <div class="bg-[#FAF6F0] border border-[#E5D6BF] p-5 rounded-xl shadow-sm flex flex-col justify-between">
                                <div>
                                    <span class="bg-[#EFE4D3] text-[#8D2B1D] text-[10px] font-bold uppercase px-2.5 py-1 rounded-md">
                                        {{ $category }}
                                    </span>
                                    <h4 style="font-family:'Cormorant Garamond',serif;" class="text-lg font-bold text-[#2B1A0E] mt-2 mb-1">
                                        {{ $title }}
                                    </h4>
                                    <p class="text-xs text-[#675A4D] line-clamp-2 mb-4">
                                        {{ $deskripsi }}
                                    </p>
                                </div>
                                <a href="{{ $url }}" class="text-xs font-bold text-[#8D2B1D] hover:underline">
                                    Baca Selengkapnya &rarr;
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 border border-dashed border-[#E5D6BF] rounded-xl">
                        <div class="text-3xl mb-2">📖</div>
                        <p class="text-sm text-[#675A4D]">Belum ada arsip yang disimpannya.</p>
                        <a href="{{ url('/') }}#jenis-filsafat" class="mt-3 inline-block px-5 py-2 bg-[#8D2B1D] text-white text-xs font-semibold rounded-xl hover:bg-[#732216] transition">
                            Jelajahi Wawasan Filsafat
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>