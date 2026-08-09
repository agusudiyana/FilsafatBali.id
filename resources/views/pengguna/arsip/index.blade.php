<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-7 bg-[#8D2B1D] rounded-full inline-block"></span>
                <h2 class="font-bold text-2xl text-[#2B1A0E] tracking-tight leading-tight" style="font-family: 'Cormorant Garamond', serif;">
                    {{ __('Koleksi Arsip Kebudayaan Disimpan') }}
                </h2>
            </div>
            <a href="{{ route('pengguna.dashboard') }}" 
               class="inline-flex items-center gap-2 text-xs font-bold tracking-wider uppercase text-[#8D2B1D] bg-[#EFE4D3]/60 hover:bg-[#8D2B1D] hover:text-white px-4 py-2 rounded-xl transition-all duration-300 border border-[#C8A45A]/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Dashboard Pengguna</span>
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- PESAN NOTIFIKASI SUKSES -->
            @if(session('success'))
                <div class="bg-[#EFE4D3] border border-[#C8A45A] text-[#8D2B1D] px-5 py-3.5 rounded-2xl relative text-sm font-semibold flex items-center justify-between shadow-sm" role="alert">
                    <span class="block sm:inline">✨ {{ session('success') }}</span>
                    <button type="button" onclick="this.parentElement.remove()" class="text-[#8D2B1D] font-bold text-lg hover:opacity-75">&times;</button>
                </div>
            @endif

            <!-- FILTER PENCARIAN & KATEGORI -->
            <div class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="relative w-full md:w-1/2">
                    <input type="text" id="searchInput" oninput="filterArsip()" placeholder="Ketik huruf awal atau judul naskah..." class="w-full pl-10 pr-4 py-2.5 rounded-xl border-[#E5D6BF] text-sm focus:ring-[#8D2B1D] focus:border-[#8D2B1D] bg-[#FAF6F0]/50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#8C7A65] absolute left-3.5 top-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                
                <select id="categorySelect" onchange="filterArsip()" class="w-full md:w-auto rounded-xl border-[#E5D6BF] text-sm focus:ring-[#8D2B1D] focus:border-[#8D2B1D] bg-[#FAF6F0]/50 py-2.5 px-4 font-semibold text-[#2B1A0E]">
                    <option value="semua">Semua Kategori</option>
                    <option value="artikel">Artikel</option>
                    <option value="satua">Satua Bali</option>
                    <option value="istilah">Istilah Bali</option>
                </select>
            </div>

            <!-- LIST ARSIP TERSIMPAN -->
            @php
                $items = isset($bookmarks) ? $bookmarks : (isset($arsips) ? $arsips : []);
            @endphp

            @if(count($items) > 0)
                <div id="arsipGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($items as $arsip)
                        @php
                            $title = is_array($arsip) ? ($arsip['judul'] ?? $arsip['item_title'] ?? 'Tanpa Judul') : ($arsip->item_title ?? $arsip->judul ?? 'Tanpa Judul');
                            $category = is_array($arsip) ? ($arsip['kategori'] ?? $arsip['item_type'] ?? 'Artikel') : ($arsip->item_type ?? $arsip->kategori ?? 'Artikel');
                            $penulis = is_array($arsip) ? ($arsip['penulis'] ?? 'Penulis') : ($arsip->penulis ?? 'Penulis');
                            $deskripsi = is_array($arsip) ? ($arsip['deskripsi'] ?? 'Naskah kebudayaan dan filsafat Bali.') : ($arsip->deskripsi ?? 'Naskah kebudayaan dan filsafat Bali.');
                            $dbUrl = is_array($arsip) ? ($arsip['url'] ?? $arsip['item_url'] ?? '#') : ($arsip->item_url ?? '#');
                            $id = is_array($arsip) ? ($arsip['id'] ?? null) : ($arsip->id ?? null);

                            $catLower = strtolower($category);
                            if (str_contains($catLower, 'satua')) {
                                $filterCat = 'satua';
                                $labelBadge = 'Satua Bali';
                                $redirectUrl = url('/') . '?open=' . urlencode($title) . '#sectionSatua';
                            } elseif (str_contains($catLower, 'istilah')) {
                                $filterCat = 'istilah';
                                $labelBadge = 'Istilah Bali';
                                $redirectUrl = url('/') . '?open=' . urlencode($title) . '#sectionIstilah';
                            } else {
                                $filterCat = 'artikel';
                                $labelBadge = 'Artikel';
                                $redirectUrl = url('/') . '?open=' . urlencode($title) . '#artikel';
                            }

                            // Jika ada item_url riil dari database gunakan item_url, jika tidak pakai redirectUrl otomatis
                            $finalUrl = (!empty($dbUrl) && $dbUrl !== '#') ? $dbUrl : $redirectUrl;
                        @endphp

                        <div class="arsip-card bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm flex flex-col justify-between hover:border-[#8D2B1D] hover:shadow-md transition-all duration-300 group"
                             data-title="{{ strtolower($title) }}" 
                             data-category="{{ $filterCat }}">
                            <div>
                                <!-- Header Kartu -->
                                <div class="flex justify-between items-center mb-4">
                                    <span class="bg-[#EFE4D3] text-[#8D2B1D] text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-md border border-[#C8A45A]/30">
                                        {{ $labelBadge }}
                                    </span>

                                    @if($id && Route::has('pengguna.arsip.destroy'))
                                        <form action="{{ route('pengguna.arsip.destroy', $id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $title }} dari simpanan?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center gap-1 text-xs font-bold text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 px-2.5 py-1 rounded-lg border border-red-200 transition-colors" title="Hapus dari Simpanan">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    @endif
                                </div>

                                <!-- Konten Naskah -->
                                <h3 class="text-xl font-bold text-[#2B1A0E] mb-1 group-hover:text-[#8D2B1D] transition-colors" style="font-family: 'Cormorant Garamond', serif;">
                                    {{ $title }}
                                </h3>
                                <p class="text-xs font-medium text-[#8C7A65] mb-3">Penulis: {{ $penulis }}</p>
                                <p class="text-xs text-[#675A4D] leading-relaxed mb-4 line-clamp-3">{{ $deskripsi }}</p>
                            </div>

                            <!-- Tombol Baca Selengkapnya Berfungsi Sebagai Link Penghubung -->
                            <div class="pt-4 border-t border-[#FAF6F0] flex justify-between items-center">
                                <a href="{{ $finalUrl }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#8D2B1D] hover:underline group-hover:translate-x-1 transition-transform">
                                    <span>Baca Selengkapnya</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="noResults" class="hidden bg-white border border-[#E5D6BF] p-12 rounded-2xl text-center shadow-sm">
                    <div class="w-16 h-16 bg-[#EFE4D3] text-[#8D2B1D] rounded-2xl flex items-center justify-center mx-auto text-3xl mb-4 border border-[#C8A45A]/30">🔍</div>
                    <h3 class="text-2xl font-bold text-[#2B1A0E]" style="font-family: 'Cormorant Garamond', serif;">Arsip Tidak Ditemukan</h3>
                    <p class="text-xs text-[#675A4D] mt-2 max-w-md mx-auto">Tidak ada arsip yang cocok dengan kata kunci atau kategori yang Anda pilih.</p>
                </div>
            @else
                <div class="bg-white border border-[#E5D6BF] p-12 rounded-2xl text-center shadow-sm">
                    <div class="w-16 h-16 bg-[#EFE4D3] text-[#8D2B1D] rounded-2xl flex items-center justify-center mx-auto text-3xl mb-4 border border-[#C8A45A]/30">📚</div>
                    <h3 class="text-2xl font-bold text-[#2B1A0E]" style="font-family: 'Cormorant Garamond', serif;">Belum Ada Koleksi Tersimpan</h3>
                    <p class="text-xs text-[#675A4D] mt-2 max-w-md mx-auto">Anda belum menyimpan naskah atau kisah satua favorit. Jelajahi beranda dan tekan tombol simpan untuk menambahkannya ke sini.</p>
                    <a href="{{ url('/') }}" class="mt-6 inline-flex items-center gap-2 px-6 py-2.5 bg-[#8D2B1D] hover:bg-[#732216] text-white rounded-xl text-xs font-bold uppercase tracking-wider transition-all shadow-md">
                        <span>Jelajahi Beranda Utama</span>
                    </a>
                </div>
            @endif

        </div>
    </div>

    <script>
        function filterArsip() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase().trim();
            const categorySelect = document.getElementById('categorySelect').value.toLowerCase();
            const cards = document.querySelectorAll('.arsip-card');
            let visibleCount = 0;

            cards.forEach(card => {
                const title = card.getAttribute('data-title');
                const category = card.getAttribute('data-category');

                const matchesSearch = searchInput === '' || title.startsWith(searchInput) || title.includes(searchInput);
                const matchesCategory = categorySelect === 'semua' || category === categorySelect;

                if (matchesSearch && matchesCategory) {
                    card.style.display = 'flex';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            const noResults = document.getElementById('noResults');
            if (noResults) {
                if (visibleCount === 0 && cards.length > 0) {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            }
        }
    </script>
</x-app-layout>