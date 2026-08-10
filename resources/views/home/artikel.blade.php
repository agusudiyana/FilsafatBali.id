<style>
    /* Styling Garis Aktif Tab Filter & Animasi Card Transisi */
    .filter-tab-btn {
        position: relative;
        transition: color 0.3s ease;
    }

    .filter-tab-btn::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 3px;
        background-color: #992B20;
        transform: scaleX(0);
        transform-origin: center;
        transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .filter-tab-btn.tab-active::after {
        transform: scaleX(1);
    }

    /* EFEK KARTU TERANGKAT SAAT HOVER KURSOR */
    .card-artikel {
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        will-change: transform, box-shadow;
    }

    .card-artikel:hover {
        transform: translateY(-10px) !important;
        box-shadow: 0 20px 30px -10px rgba(43, 26, 18, 0.18) !important;
    }

    /* Keyframes Animasi Kartu saat Filter Diklik */
    @keyframes filterCardReveal {
        0% {
            opacity: 0;
            transform: translateY(20px) scale(0.95);
            filter: blur(4px);
        }

        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
            filter: blur(0);
        }
    }

    .card-reveal-anim {
        animation: filterCardReveal 0.45s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    /* STYLING TOMBOL BOOKMARK */
    .btn-bookmark {
        background-color: transparent !important;
        border: 1px solid #DCCCB4;
        color: #8C7A65;
        transition: all 0.25s ease-in-out;
        cursor: pointer !important;
    }

    .btn-bookmark * {
        pointer-events: none !important;
    }

    /* HOVER STATE */
    .btn-bookmark:hover {
        background-color: transparent !important;
        border-color: #B8863B !important;
        color: #B8863B !important;
    }

    /* IS-SAVED STATE */
    .btn-bookmark.is-saved {
        background-color: transparent !important;
        border-color: #B8863B !important;
        color: #B8863B !important;
    }

    .btn-bookmark.is-saved svg,
    .btn-bookmark.is-saved i {
        stroke: #B8863B !important;
        fill: #B8863B !important;
        color: #B8863B !important;
    }

    .btn-bookmark:not(.is-saved) svg,
    .btn-bookmark:not(.is-saved) i {
        stroke: currentColor;
        fill: none !important;
    }
</style>

<!-- SECTION ARTIKEL PILIHAN -->
<section id="artikel" class="bg-[#F7F0E7] py-24">
    <div class="max-w-7xl mx-auto px-8">

        <p class="uppercase tracking-[6px] text-[#B8863B] text-xs mb-3">TERBARU</p>
        <h2 style="font-family:'Cormorant Garamond',serif;"
            class="text-[64px] leading-none font-bold text-[#23160E] mb-12">
            Artikel Pilihan
        </h2>

        <!-- MENU TAB FILTER KATEGORI -->
        <div class="filter-tab-container flex gap-10 border-b border-[#DCCCB4] relative">
            <button type="button" data-kategori="semua"
                class="filter-tab-btn tab-btn-action tab-active pb-4 text-xs tracking-[2px] uppercase font-bold text-[#992B20]">Semua</button>
            <button type="button" data-kategori="ajaran"
                class="filter-tab-btn tab-btn-action pb-4 text-xs tracking-[2px] uppercase font-medium text-[#8C7A65] hover:text-[#992B20]">Ajaran
                Tetua</button>
            <button type="button" data-kategori="cecimpedan"
                class="filter-tab-btn tab-btn-action pb-4 text-xs tracking-[2px] uppercase font-medium text-[#8C7A65] hover:text-[#992B20]">Cecimpedan</button>
            <button type="button" data-kategori="satua"
                class="filter-tab-btn tab-btn-action pb-4 text-xs tracking-[2px] uppercase font-medium text-[#8C7A65] hover:text-[#992B20]">Satua
                Bali</button>
            <button type="button" data-kategori="istilah"
                class="filter-tab-btn tab-btn-action pb-4 text-xs tracking-[2px] uppercase font-medium text-[#8C7A65] hover:text-[#992B20]">Istilah
                Bali</button>
        </div>

        <!-- Grid Cards Artikel -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">

            @forelse($artikels as $item)
                @php
                    // Ambil Data dari Database
                    $judulText = $item->judul ?? 'Tanpa Judul';
                    $kategoriText = $item->kategori ?? 'AJARAN TETUA';
                    $isiText = $item->isi ?? ($item->deskripsi ?? ($item->konten ?? ''));
                    $penulisText = $item->penulis ?? ($item->user->name ?? 'Tim Balinesia');
                    $kesimpulanText = $item->kesimpulan ?? '';

                    // LOGIKA KATEGORI & WARNA BADGE
                    $katRaw = strtolower(trim($kategoriText));

                    if (str_contains($katRaw, 'cecimpedan')) {
                        $katClass = 'cecimpedan';
                        $badgeBg = 'bg-[#D9A441]';
                        $colorHex = '#D9A441';
                    } elseif (str_contains($katRaw, 'satua')) {
                        $katClass = 'satua';
                        $badgeBg = 'bg-[#2F7D4B]';
                        $colorHex = '#2F7D4B';
                    } elseif (str_contains($katRaw, 'istilah')) {
                        $katClass = 'istilah';
                        $badgeBg = 'bg-[#305F9E]';
                        $colorHex = '#305F9E';
                    } else {
                        $katClass = 'ajaran';
                        $badgeBg = 'bg-[#992B20]';
                        $colorHex = '#992B20';
                    }

                    // Pemrosesan Gambar
                    $img = $item->gambar ?? ($item->foto ?? null);
                    if (!empty($img)) {
                        if (\Illuminate\Support\Str::startsWith($img, ['http://', 'https://'])) {
                            $gambarUrl = $img;
                        } else {
                            $cleanPath = ltrim(str_replace(['public/', 'storage/'], '', $img), '/');
                            $gambarUrl = asset('storage/' . $cleanPath);
                        }
                    } else {
                        $gambarUrl = asset('images/subak.jpeg');
                    }

                    $tanggal = $item->created_at
                        ? \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y')
                        : date('d F Y');
                    $ringkasan = \Illuminate\Support\Str::limit(strip_tags($isiText), 110);

                    // Cek Status Simpan User Secara Riil
                    $isSaved = false;
                    if (auth()->check()) {
                        $isSaved = \App\Models\Bookmark::where('user_id', auth()->id())
                            ->where('item_title', $judulText)
                            ->exists();
                    }
                @endphp

                <!-- CARD ARTIKEL DENGAN ONCLICK DIRECT -->
                <div onclick="openModalForCard(this)"
                    class="card-artikel js-open-modal {{ $katClass }} bg-white rounded-xl overflow-hidden shadow duration-300 cursor-pointer group flex flex-col justify-between"
                    data-id="{{ $item->id ?? '' }}"
                    data-judul="{{ e($judulText) }}" 
                    data-penulis="{{ e($penulisText) }}"
                    data-tanggal="{{ strtoupper($tanggal) }}" 
                    data-kategori="{{ strtoupper($kategoriText) }}"
                    data-badge-color="{{ $colorHex }}" 
                    data-gambar="{{ $gambarUrl }}"
                    data-kesimpulan="{{ e($kesimpulanText) }}">

                    <div>
                        <!-- Header Gambar + Badge -->
                        <div class="relative overflow-hidden">
                            <img src="{{ $gambarUrl }}"
                                onerror="this.onerror=null;this.src='{{ asset('images/subak.jpeg') }}';"
                                class="w-full h-60 object-cover group-hover:scale-105 transition duration-500"
                                alt="{{ $judulText }}">

                            <div
                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300">
                            </div>

                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 transform group-hover:scale-100 scale-95 z-10">
                                <span
                                    class="bg-[#FAF5ED] text-[#2B1A12] border border-[#D6C5AE] text-[11px] font-bold tracking-[2px] uppercase px-5 py-2.5 rounded-lg shadow-lg">
                                    BACA ARTIKEL
                                </span>
                            </div>

                            <!-- Badge Warna Sesuai Kategori -->
                            <span
                                class="absolute top-4 left-4 {{ $badgeBg }} text-white text-[11px] tracking-[2px] uppercase font-semibold px-4 py-2 rounded-full z-10 shadow-sm">
                                {{ strtoupper($kategoriText) }}
                            </span>

                            <span
                                class="absolute top-4 right-4 bg-white/90 text-[#B8863B] text-[10px] tracking-[1px] font-bold px-3 py-1 rounded-full z-10 shadow-sm">
                                Terverifikasi
                            </span>
                        </div>

                        <!-- Judul dan Ringkasan -->
                        <div class="p-6">
                            <h3 style="font-family:'Cormorant Garamond',serif;"
                                class="text-[28px] leading-snug font-bold text-[#2B1A12] group-hover:text-[#B8863B] transition line-clamp-2">
                                {{ $judulText }}
                            </h3>

                            <p class="mt-3 text-[#675A4D] leading-relaxed text-sm line-clamp-3">
                                {{ $ringkasan }}
                            </p>
                        </div>
                    </div>

                    <!-- Footer Kartu -->
                    <div
                        class="px-6 pb-6 pt-2 flex items-center justify-between text-[13px] text-[#8C7A65] border-t border-[#F3EBE0]">
                        <span>{{ $tanggal }} &nbsp;•&nbsp; 5 Menit</span>

                        <!-- COVER ICON SIMPAN KOTAK -->
                        <button type="button" 
                            onclick="handleBookmark(event, this, '{{ e($judulText) }}', 'artikel')"
                            class="btn-bookmark w-9 h-9 rounded-lg flex items-center justify-center shadow-sm relative z-20 {{ $isSaved ? 'is-saved' : '' }}"
                            title="{{ $isSaved ? 'Batal Simpan' : 'Simpan Artikel' }}">
                            <i data-feather="bookmark" class="w-4 h-4"></i>
                        </button>
                    </div>

                    <!-- Hidden Content untuk Pop-up Detail -->
                    <div class="hidden-isi-content hidden">{!! $isiText !!}</div>
                </div>

            @empty
                <div class="col-span-full py-12 text-center text-[#8C7A65]">
                    Belum ada data artikel yang disetujui.
                </div>
            @endforelse

        </div>
    </div>
</section>

<!-- MODAL OVERLAY DETAIL BACA ARTIKEL -->
<div id="overlayArtikel" onclick="closeModalArtikelGlobal()"
    class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden opacity-0 pointer-events-none transition-opacity duration-300 cursor-pointer">
    
    <!-- Panel Isi Artikel -->
    <div id="panelArtikel" onclick="event.stopPropagation()"
        class="fixed inset-y-0 right-0 w-full max-w-2xl bg-[#FAF6F0] shadow-2xl p-8 overflow-y-auto transform translate-x-full transition-transform duration-300 ease-in-out border-l border-[#D6C5AE] cursor-default">

        <!-- Tombol Tutup -->
        <button id="closeModalBtn" type="button" onclick="closeModalArtikelGlobal()"
            class="absolute top-6 right-6 w-10 h-10 rounded-full bg-[#EFE6D8] text-[#2B1A12] flex items-center justify-center hover:bg-[#992B20] hover:text-white transition duration-300 font-bold cursor-pointer">✕</button>

        <div class="mb-4">
            <span id="artKategoriBadge"
                class="text-white text-[11px] tracking-[2px] uppercase font-semibold px-4 py-2 rounded-full">KATEGORI</span>
        </div>

        <h2 id="artTitle" style="font-family:'Cormorant Garamond',serif;"
            class="text-3xl md:text-4xl font-bold text-[#2B1A12] leading-tight mb-4">Judul Artikel</h2>

        <div class="flex items-center gap-3 pb-6 mb-6 border-b border-[#E5D8C5]">
            <div id="artAvatar"
                class="w-10 h-10 rounded-full bg-[#992B20] text-white font-bold flex items-center justify-center text-sm">
                A</div>
            <div>
                <h4 id="artPenulis" class="text-sm font-bold text-[#2B1A12]">Nama Penulis</h4>
                <p id="artMeta" class="text-xs text-[#8C7A65]"></p>
            </div>
        </div>

        <div class="rounded-xl overflow-hidden mb-6 shadow-md bg-[#EFE6D8]">
            <img id="artImage" src="" onerror="this.onerror=null;this.src='{{ asset('images/subak.jpeg') }}';"
                class="w-full h-64 object-cover" alt="Gambar Artikel">
        </div>

        <div id="artIsi" class="text-[#4A3E35] leading-relaxed space-y-4 text-base"></div>

        <div id="boxKesimpulan" class="mt-8 p-5 bg-[#EFE4D3] border-l-4 border-[#992B20] rounded-r-lg">
            <h4 class="font-bold text-[#2B1A12] text-sm uppercase tracking-wider mb-1">Kesimpulan / Filosofi</h4>
            <p id="artKesimpulan" class="text-sm text-[#675A4D] italic"></p>
        </div>
    </div>
</div>

<script>
    // Status Login User
    const IS_USER_LOGGED_IN = @json(auth()->check());
    const LOGIN_URL = "{{ route('login') }}";

    // Handle Klik Bookmark
    function handleBookmark(event, btnElement, title, type) {
        if (event) {
            event.stopPropagation();
            event.preventDefault();
        }

        if (!IS_USER_LOGGED_IN) {
            alert("Silakan login terlebih dahulu untuk menyimpan " + type + " ini ke arsip!");
            window.location.href = LOGIN_URL;
            return false;
        }

        const itemUrl = "{{ url('/') }}?open=" + encodeURIComponent(title) + "#artikel";

        fetch("{{ route('pengguna.arsip.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    item_title: title,
                    item_type: type,
                    item_url: itemUrl
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'saved') {
                    btnElement.classList.add('is-saved');
                    btnElement.setAttribute('title', 'Batal Simpan');
                } else if (data.status === 'removed') {
                    btnElement.classList.remove('is-saved');
                    btnElement.setAttribute('title', 'Simpan Artikel');
                }

                if (typeof feather !== 'undefined') {
                    feather.replace();
                }
            })
            .catch(err => {
                console.error('Error:', err);
            });

        return false;
    }

    // ==========================================
    // BUKA MODAL ARTIKEL (LEBIH FLEKSIBEL & PASTI BUKA)
    // ==========================================
    function openModalForCard(elementData) {
        if (!elementData) return;

        let ds = {};
        let isiHtml = '';

        // Jika dipanggil dari kartu HTML
        if (elementData instanceof HTMLElement) {
            const cardElement = elementData.closest('.card-artikel') || elementData;
            ds = cardElement.dataset || {};
            isiHtml = cardElement.querySelector('.hidden-isi-content') ? cardElement.querySelector('.hidden-isi-content').innerHTML : '';
        } else {
            // Jika dipanggil langsung dari objek JS (Live Search)
            ds = elementData;
            isiHtml = elementData.isi || '';
        }

        const judulText = ds.judul || 'Tanpa Judul';
        const penulisText = ds.penulis || 'Tim Balinesia';
        const tanggalText = ds.tanggal || '';
        const kategoriText = ds.kategori || 'AJARAN TETUA';
        const badgeColorHex = ds.badgeColor || ds.badge_color || '#992B20';
        const gambarSrc = ds.gambar || '{{ asset("images/subak.jpeg") }}';
        const kesimpulanText = ds.kesimpulan || '';

        // Tembak Data ke Elemen Overlay Modal
        if (document.getElementById('artTitle')) document.getElementById('artTitle').innerText = judulText;
        if (document.getElementById('artPenulis')) document.getElementById('artPenulis').innerText = penulisText;
        if (document.getElementById('artMeta')) document.getElementById('artMeta').innerText = tanggalText + (tanggalText ? ' • BALINESIA' : 'BALINESIA');
        if (document.getElementById('artIsi')) document.getElementById('artIsi').innerHTML = isiHtml;
        if (document.getElementById('artAvatar')) document.getElementById('artAvatar').innerText = (penulisText ? penulisText.charAt(0) : 'A').toUpperCase();

        const badge = document.getElementById('artKategoriBadge');
        if (badge) {
            badge.innerText = kategoriText;
            badge.style.backgroundColor = badgeColorHex;
        }

        const img = document.getElementById('artImage');
        if (img) img.src = gambarSrc;

        const kesimpulanBox = document.getElementById('boxKesimpulan');
        if (kesimpulanBox) {
            if (kesimpulanText && kesimpulanText.trim() !== '') {
                kesimpulanBox.classList.remove('hidden');
                document.getElementById('artKesimpulan').innerText = kesimpulanText;
            } else {
                kesimpulanBox.classList.add('hidden');
            }
        }

        const overlay = document.getElementById('overlayArtikel');
        const panel = document.getElementById('panelArtikel');

        // Kunci Scroll Layar
        document.body.style.overflow = "hidden";
        document.documentElement.style.overflow = "hidden";

        // EKSEKUSI TAMPILKAN OVERLAY (FORCE SHOW)
        if (overlay) {
            overlay.style.display = 'block';
            overlay.classList.remove('hidden', 'pointer-events-none', 'opacity-0');
            overlay.classList.add('pointer-events-auto', 'opacity-100');
        }
        if (panel) {
            setTimeout(() => {
                panel.classList.remove('translate-x-full');
            }, 10);
        }
    }

    // TUTUP MODAL ARTIKEL (PENYATUAN FUNGSI GLOBAL)
    function closeModalArtikelGlobal() {
        const overlay = document.getElementById('overlayArtikel');
        const panel = document.getElementById('panelArtikel');

        if (panel) panel.classList.add('translate-x-full');

        if (overlay) {
            overlay.classList.remove('opacity-100', 'pointer-events-auto');
            overlay.classList.add('opacity-0', 'pointer-events-none');
        }

        // Buka Scroll Kembali
        document.body.style.removeProperty("overflow");
        document.body.style.overflow = "auto";
        document.documentElement.style.removeProperty("overflow");
        document.documentElement.style.overflow = "auto";

        setTimeout(() => {
            if (overlay) {
                overlay.classList.add('hidden');
                overlay.style.removeProperty('display');
            }
        }, 300);
    }

    // Alias Fungsi agar kompatibel jika dipanggil dengan nama berbeda
    function closeArtikelModal() { closeModalArtikelGlobal(); }
    function closeDetailArtikel() { closeModalArtikelGlobal(); }

    document.addEventListener('DOMContentLoaded', function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }

        // Filter Tab JS Action + Efek Animasi Reveal
        document.querySelectorAll('.tab-btn-action').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.tab-btn-action').forEach(b => {
                    b.classList.remove('tab-active', 'font-bold', 'text-[#992B20]');
                    b.classList.add('font-medium', 'text-[#8C7A65]');
                });
                this.classList.add('tab-active', 'font-bold', 'text-[#992B20]');
                this.classList.remove('font-medium', 'text-[#8C7A65]');

                const kategori = this.dataset.kategori;
                const cards = document.querySelectorAll('.card-artikel');

                cards.forEach(card => {
                    card.classList.remove('card-reveal-anim');

                    if (kategori === 'semua' || card.classList.contains(kategori)) {
                        card.style.display = 'flex';
                        void card.offsetWidth;
                        card.classList.add('card-reveal-anim');

                        setTimeout(() => {
                            card.classList.remove('card-reveal-anim');
                        }, 500);
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // AUTO-OPEN MODAL DARI ARSIP
        const urlParams = new URLSearchParams(window.location.search);
        const itemToOpen = urlParams.get('open');

        if (itemToOpen && window.location.hash === '#artikel') {
            const decodedTitle = decodeURIComponent(itemToOpen).trim().toLowerCase();

            setTimeout(() => {
                const cards = document.querySelectorAll('.card-artikel');
                cards.forEach(card => {
                    if (card.dataset.judul && card.dataset.judul.trim().toLowerCase() === decodedTitle) {
                        openModalForCard(card);
                    }
                });
            }, 400);
        }
    });
</script>