<!-- Swiper JS Library -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- ========================================== -->
<!-- SECTION HERO                               -->
<!-- ========================================== -->
<section id="filsafat" class="relative min-h-screen flex items-start justify-center">

    <!-- Background Image -->
    <img src="{{ asset('images/hero.png') }}" alt="Hero Background" class="absolute inset-0 w-full h-full object-cover">

    <!-- Overlay Gelap -->
    <div class="absolute inset-0 bg-black/55"></div>

    <!-- Gradient Transition Bottom -->
    <div class="absolute bottom-0 left-0 w-full h-64 bg-gradient-to-t from-[#F5F0E8] to-transparent"></div>

    <!-- Konten Utama Hero -->
    <div class="relative z-10 text-center max-w-4xl mx-auto px-6 pt-40">

        <!-- Subtitle Header -->
        <div class="max-w-lg mx-auto mb-10">
            <p class="uppercase tracking-[8px] text-[#E2B75B] text-[9px] font-medium text-center whitespace-nowrap">
                Arsip Digital Filsafat & Budaya Bali
            </p>
        </div>

        <!-- Judul Utama Hero -->
        <h1 style="font-family:'Cormorant Garamond',serif;" class="font-bold leading-[0.9]">
            <span class="block text-white text-[58px]">
                Menjaga Warisan,
            </span>
            <span class="block text-[#E2B75B] text-[66px] mt-1">
                Menerangi Masa Depan
            </span>
        </h1>

        <!-- Deskripsi Singkat -->
        <p class="mt-8 max-w-2xl mx-auto text-center text-[17px] md:text-[18px] font-normal leading-[36px] text-[#F3F1EC]"
            style="font-family:'Inter', sans-serif;">
            Platform digital untuk mengakses, mempelajari, dan
            <br>
            melestarikan kearifan lokal Bali.
        </p>

        <!-- KOTAK PENCARIAN (SEARCH CONTAINER) -->
        <div class="mt-8 max-w-2xl mx-auto relative z-[9999]">

            <!-- Field Input Search -->
            <div id="searchBoxContainer"
                class="bg-[#FAF5ED] rounded-xl px-5 h-[54px] flex items-center shadow-2xl transition-all duration-200 w-full shrink-0 ring-2 ring-transparent">

                <!-- Icon Kaca Pembesar -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#8C7A65] mr-3 shrink-0" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>

                <!-- Input Teks Live Search -->
                <input id="searchInput" type="text" placeholder="Cari ajaran, istilah, satua, filsafat..."
                    class="bg-transparent flex-1 w-full outline-none text-[16px] text-[#2B1A0E] placeholder-[#A0907E] font-medium h-full"
                    onfocus="aktifkanBorderMerah()" oninput="liveSearch(this.value)">

                <!-- Tombol Clear Teks (X) -->
                <button id="btnClearSearch" type="button" onclick="clearSearch()"
                    class="hidden text-[#8C7A65] hover:text-[#8D2B1D] font-bold text-lg px-2 shrink-0 transition cursor-pointer">
                    ✕
                </button>
            </div>

            <!-- DROPDOWN HASIL PENCARIAN LIVE DARI DATABASE -->
            <div id="hasilCari"
                class="hidden absolute left-0 top-full mt-2 w-full bg-[#FAF5ED] rounded-xl border border-[#E5D6BF] shadow-2xl overflow-y-auto max-h-[320px] divide-y divide-[#EADCC9] z-[99999] text-left">
            </div>

        </div>

        <!-- KEYWORD CHIPS / RIWAYAT PENCARIAN DINAMIS -->
        <div id="keywordBox" class="mt-5 flex justify-center flex-wrap gap-3">
            <!-- Diisi otomatis oleh JavaScript renderKeywordChips() -->
        </div>

    </div>

</section>

<!-- ========================================== -->
<!-- CSS STYLES UNTUK ANIMASI & TAB MERAH      -->
<!-- ========================================== -->
<style>
    /* Garis Merah Underline Eksklusif */
    #artikel button[id^="btn-"],
    .filter-tab-btn,
    .tab-btn {
        position: relative;
        padding-bottom: 12px;
        color: #8C7A65;
        transition: color 0.3s ease;
        background: transparent;
        border: none;
        cursor: pointer;
    }

    #artikel button[id^="btn-"]:hover,
    .filter-tab-btn:hover,
    .tab-btn:hover {
        color: #992B20;
    }

    /* Kondisi Tombol Aktif */
    #artikel button[id^="btn-"].tab-active,
    .filter-tab-btn.tab-active,
    .tab-btn.tab-active {
        color: #992B20 !important;
        font-weight: 700;
    }

    /* Garis Merah Sembunyi secara Default */
    #artikel button[id^="btn-"]::after,
    .filter-tab-btn::after,
    .tab-btn::after {
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

    /* Garis Merah Melebar HANYA jika Memiliki Class .tab-active */
    #artikel button[id^="btn-"].tab-active::after,
    .filter-tab-btn.tab-active::after,
    .tab-btn.tab-active::after {
        transform: scaleX(1);
    }

    /* Keyframes Animasi Efek Foto / Kartu Artikel Muncul */
    @keyframes cardAppear {
        0% {
            opacity: 0;
            transform: scale(0.88) translateY(20px);
            filter: blur(4px);
        }
        100% {
            opacity: 1;
            transform: scale(1) translateY(0);
            filter: blur(0);
        }
    }

    .card-appear-anim {
        animation: cardAppear 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    .btn-bookmark-custom {
        cursor: pointer !important;
    }

    .btn-bookmark-custom * {
        pointer-events: none !important;
    }
</style>

<!-- ========================================== -->
<!-- SCRIPT JAVASCRIPT GABUNGAN PRESISI & UTUH  -->
<!-- ========================================== -->
<script>
    const USER_LOGGED_IN = @json(auth()->check());

    // ==========================================
    // LOGIKA RIWAYAT PENCARIAN (FIFO MAX 6 ITEM)
    // ==========================================
    var DEFAULT_KEYWORDS = [
        "TRI HITA KARANA", 
        "DESA KALA PATRA", 
        "TAT TWAM ASI", 
        "NGABEN", 
        "TAKSU", 
        "SUBAK"
    ];

    function getSearchHistory() {
        var saved = localStorage.getItem("balinesia_search_history");
        if (saved) {
            try {
                var parsed = JSON.parse(saved);
                return Array.isArray(parsed) && parsed.length > 0 ? parsed : DEFAULT_KEYWORDS;
            } catch (e) {
                return DEFAULT_KEYWORDS;
            }
        }
        return DEFAULT_KEYWORDS;
    }

    function simpanKeRiwayat(keyword) {
        if (!keyword || keyword.trim() === "") return;
        
        var history = getSearchHistory();
        var cleanKeyword = keyword.trim().toUpperCase();

        history = history.filter(function(item) {
            return item.toUpperCase() !== cleanKeyword;
        });

        history.unshift(cleanKeyword);

        if (history.length > 6) {
            history = history.slice(0, 6);
        }

        localStorage.setItem("balinesia_search_history", JSON.stringify(history));
        renderKeywordChips();
    }

    function renderKeywordChips() {
        var keywordBox = document.getElementById("keywordBox");
        if (!keywordBox) return;

        var history = getSearchHistory();
        keywordBox.innerHTML = "";

        history.forEach(function(text) {
            var a = document.createElement("a");
            a.href = "#";
            a.className = "border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium hover:bg-white hover:text-black transition cursor-pointer shrink-0";
            a.innerText = text;
            
            a.onclick = function(e) {
                cariKeyword(e, text);
                return false;
            };

            keywordBox.appendChild(a);
        });
    }

    // ==========================================
    // ARRAY DATABASE PENCARIAN (LENGKAP FIELD MAPPING)
    // ==========================================
    const databaseSearch = [
        // 1. TABEL ajaran_tertua
        @if(isset($ajarans))
            @foreach($ajarans as $aj)
                @php
                    $imgAj = $aj->gambar ?? null;
                    if (!empty($imgAj)) {
                        if (\Illuminate\Support\Str::startsWith($imgAj, ['http://', 'https://'])) {
                            $gAjUrl = $imgAj;
                        } else {
                            $cleanP = ltrim(str_replace(['public/', 'storage/'], '', $imgAj), '/');
                            $gAjUrl = asset('storage/' . $cleanP);
                        }
                    } else {
                        $gAjUrl = asset('images/subak.jpeg');
                    }
                @endphp
                {
                    id: @json("ajaran_" . $aj->id),
                    raw_id: @json($aj->id),
                    judul: @json($aj->judul ?? 'Ajaran Tertua'),
                    kategori: 'AJARAN TETUA',
                    target_type: 'ajaran',
                    penulis: @json($aj->penulis ?? 'Tetua Bali'),
                    lokasi: @json(strtoupper($aj->lokasi ?? 'BALI')),
                    tanggal: @json(strtoupper($aj->tahun ?? '')),
                    isi: @json($aj->deskripsi ?? ''),
                    gambar: @json($gAjUrl)
                },
            @endforeach
        @endif

        // 2. Tabel satuas
        @if(isset($satuas))
            @foreach($satuas as $s)
                {
                    id: @json("satua_" . $s->id),
                    raw_id: @json($s->id),
                    judul: @json($s->judul ?? $s->nama ?? 'Satua Bali'),
                    kategori: 'SATUA BALI',
                    target_type: 'satua',
                    penulis: @json($s->penulis ?? 'Masyarakat Bali'),
                    latin: @json($s->latin ?? 'Satua Bali'),
                    status: @json($s->status ?? 'Lestari'),
                    gambar: @json(isset($s->gambar) ? asset('storage/' . $s->gambar) : asset('images/i-belog.jpg')),
                    ringkasan: @json($s->ringkasan ?? $s->deskripsi ?? ''),
                    tokoh: @json($s->tokoh ?? 'Tokoh Utama'),
                    alur: @json($s->alur ?? 'Alur Cerita'),
                    moral: @json($s->moral ?? 'Pesan Moral'),
                    filosofi: @json($s->filosofi ?? 'Nilai Filosofis')
                },
            @endforeach
        @endif

        // 3. TABEL istilahs
        @if(isset($istilahs))
            @foreach($istilahs as $i)
                {
                    id: @json("istilah_" . $i->id),
                    raw_id: @json($i->id),
                    judul: @json($i->istilah ?? $i->judul ?? 'Istilah Bali'),
                    kategori: 'ISTILAH BALI',
                    target_type: 'istilah',
                    penulis: @json($i->penulis ?? 'Budayawan'),
                    deskripsi: @json($i->deskripsi ?? $i->penjelasan ?? $i->arti ?? ''),
                    sejarah: @json($i->sejarah ?? $i->sejarah_singkat ?? $i->asal_usul ?? ''),
                    contoh: @json($i->contoh ?? $i->contoh_penggunaan ?? $i->penerapan ?? ''),
                    padanan: @json($i->padanan ?? $i->padanan_kata ?? $i->persamaan ?? ''),
                    konteks: @json($i->konteks ?? $i->konteks_budaya ?? '')
                },
            @endforeach
        @endif

        // 4. Tabel artikels
        @if(isset($artikels))
            @foreach($artikels as $a)
                @php
                    $img = $a->gambar ?? ($a->foto ?? null);
                    if (!empty($img)) {
                        if (\Illuminate\Support\Str::startsWith($img, ['http://', 'https://'])) {
                            $gUrl = $img;
                        } else {
                            $cleanP = ltrim(str_replace(['public/', 'storage/'], '', $img), '/');
                            $gUrl = asset('storage/' . $cleanP);
                        }
                    } else {
                        $gUrl = asset('images/subak.jpeg');
                    }
                    $tgl = $a->created_at ? \Carbon\Carbon::parse($a->created_at)->translatedFormat('d F Y') : date('d F Y');
                @endphp
                {
                    id: @json("artikel_" . $a->id),
                    raw_id: @json($a->id),
                    judul: @json($a->judul ?? 'Artikel'),
                    kategori: @json(strtoupper($a->kategori ?? 'ARTIKEL')),
                    target_type: 'artikel',
                    penulis: @json($a->penulis ?? 'Tim Balinesia'),
                    tanggal: @json(strtoupper($tgl)),
                    isi: @json($a->isi ?? ($a->deskripsi ?? '')),
                    gambar: @json($gUrl),
                    kesimpulan: @json($a->kesimpulan ?? '')
                },
            @endforeach
        @endif

        // 5. Tabel cecimpedans
        @if(isset($cecimpedans))
            @foreach($cecimpedans as $c)
                {
                    id: @json("cecimpedan_" . $c->id),
                    raw_id: @json($c->id),
                    judul: @json($c->pertanyaan ?? $c->soal ?? $c->teks ?? $c->judul ?? 'Cecimpedan Bali'),
                    kategori: 'CECIMPEDAN',
                    target_type: 'cecimpedan',
                    penulis: @json($c->penulis ?? $c->pembuat ?? $c->creator ?? 'Sastra Tradisional Bali')
                },
            @endforeach
        @endif

        // 6. TABEL filsafats
        @if(isset($filsafats))
            @foreach($filsafats as $f)
                {
                    id: @json("filsafat_" . $f->id),
                    raw_id: @json($f->id),
                    judul: @json($f->judul ?? $f->nama ?? 'Filsafat'),
                    kategori: 'FILSAFAT',
                    target_type: 'filsafat',
                    penulis: @json($f->penulis ?? $f->tokoh ?? 'Filsuf'),
                    deskripsi: @json($f->deskripsi ?? $f->penjelasan ?? ''),
                    sejarah: @json($f->sejarah ?? $f->asal_usul ?? ''),
                    contoh: @json($f->contoh ?? $f->penerapan ?? ''),
                    padanan: @json($f->padanan ?? ''),
                    konteks: @json($f->konteks ?? ''),
                    gambar: @json(isset($f->gambar) ? asset('storage/' . $f->gambar) : asset('images/hero.png'))
                },
            @endforeach
        @endif
    ];

    // ==========================================
    // INITIALIZATION & EVENT LISTENERS
    // ==========================================
    document.addEventListener("DOMContentLoaded", function() {
        renderKeywordChips();

        if (typeof feather !== 'undefined') {
            feather.replace();
        }

        const overlayDetail = document.getElementById("overlay");
        if (overlayDetail) overlayDetail.onclick = closeDetail;

        const overlaySatua = document.getElementById("overlaySatua");
        if (overlaySatua) {
            overlaySatua.addEventListener("click", function(e) {
                if (e.target === this) closeSatua();
            });
        }

        const overlayAjaran = document.getElementById("overlayAjaran");
        if (overlayAjaran) {
            overlayAjaran.addEventListener("click", function(e) {
                if (e.target === this) closeAjaran();
            });
        }

        const searchInput = document.getElementById("searchInput");
        if (searchInput) {
            searchInput.addEventListener("keypress", function(e) {
                if (e.key === "Enter") {
                    e.preventDefault();
                    const val = searchInput.value.trim();
                    if (val !== "") {
                        simpanKeRiwayat(val);
                        liveSearch(val);
                    }
                }
            });
        }
    });

    function aktifkanBorderMerah() {
        const boxContainer = document.getElementById("searchBoxContainer");
        if (boxContainer) {
            boxContainer.classList.remove("ring-transparent");
            boxContainer.classList.add("ring-[#8D2B1D]");
        }
    }

    function hilangkanBorderMerah() {
        const boxContainer = document.getElementById("searchBoxContainer");
        if (boxContainer) {
            boxContainer.classList.remove("ring-[#8D2B1D]");
            boxContainer.classList.add("ring-transparent");
        }
    }

    // Fungsi pemetaan warna badge kategori agar selaras dengan warna kartu di beranda
    function getCategoryBadgeColor(kategori) {
        const kat = kategori.toUpperCase();
        if (kat.includes('AJARAN')) {
            return 'bg-[#A33B20] text-white'; // Merah Bata (Ajaran Tetua)
        } else if (kat.includes('SATUA')) {
            return 'bg-[#2D6C3F] text-white'; // Hijau (Satua Bali)
        } else if (kat.includes('ISTILAH')) {
            return 'bg-[#3C6E71] text-white'; // Biru Toska (Istilah Bali)
        } else if (kat.includes('CECIMPEDAN')) {
            return 'bg-[#C7962B] text-white'; // Kuning Emas (Cecimpedan)
        } else if (kat.includes('FILSAFAT')) {
            return 'bg-[#5C4033] text-white'; // Cokelat Tua (Filsafat)
        }
        return 'bg-[#8D2B1D] text-white'; // Default Merah
    }

    function liveSearch(keyword) {
        const hasilCari = document.getElementById("hasilCari");
        const btnClear = document.getElementById("btnClearSearch");
        const query = keyword.trim().toLowerCase();

        aktifkanBorderMerah();

        if (query === "") {
            if (hasilCari) hasilCari.classList.add("hidden");
            if (btnClear) btnClear.classList.add("hidden");
            return;
        }

        if (btnClear) btnClear.classList.remove("hidden");

        const results = databaseSearch.filter(item =>
            item.judul.toLowerCase().includes(query) ||
            item.kategori.toLowerCase().includes(query) ||
            item.penulis.toLowerCase().includes(query)
        );

        if (results.length > 0) {
            if (hasilCari) {
                hasilCari.classList.remove("hidden");
                hasilCari.innerHTML = results.map(item => `
                    <div onclick="bukaDetailMateri('${item.id}', '${encodeURIComponent(item.judul)}', '${item.target_type}')" class="flex items-center gap-4 px-6 py-4 hover:bg-[#F0E6D8] transition duration-200 cursor-pointer text-left border-b border-[#EADCC9]">
                        <span class="${getCategoryBadgeColor(item.kategori)} text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded shrink-0 shadow-sm">
                            ${item.kategori}
                        </span>
                        <div>
                            <h4 class="text-[17px] font-bold text-[#2B1A0E] leading-tight">
                                ${item.judul}
                            </h4>
                            <p class="text-[13px] text-[#8C7A65] mt-0.5">
                                ${item.penulis}
                            </p>
                        </div>
                    </div>
                `).join("");
            }
        } else {
            if (hasilCari) {
                hasilCari.classList.remove("hidden");
                hasilCari.innerHTML = `
                    <div class="px-6 py-5 text-center text-[#8C7A65] text-sm italic">
                        Tidak ada hasil ditemukan untuk "<span class="font-semibold">${keyword}</span>"
                    </div>
                `;
            }
        }
    }

    function clearSearch() {
        const input = document.getElementById("searchInput");
        const hasilCari = document.getElementById("hasilCari");
        const btnClear = document.getElementById("btnClearSearch");

        if (input) input.value = "";
        if (hasilCari) hasilCari.classList.add("hidden");
        if (btnClear) btnClear.classList.add("hidden");

        hilangkanBorderMerah();
    }

    function cariKeyword(event, keyword) {
        if (event) {
            event.stopPropagation();
            event.preventDefault();
        }

        simpanKeRiwayat(keyword);

        const searchInput = document.getElementById("searchInput");
        if (searchInput) {
            searchInput.value = keyword;
            liveSearch(keyword);
            searchInput.focus();
        }
    }

    // Fungsi Pembantu yang Aman untuk Scrolling
    function scrollToElement(id1, id2) {
        let el = document.getElementById(id1);
        if (!el && id2) el = document.getElementById(id2);
        if (el) {
            el.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    // =========================================================================
    // FUNGSI UTAMA HASIL PENCARIAN (SCROLL MULUS + LANGSUNG BUKA MODAL/DRAWER)
    // =========================================================================
    function bukaDetailMateri(id, encodedJudul, targetType) {
        pilihHasilSearch(id, decodeURIComponent(encodedJudul), targetType);
    }

    function pilihHasilSearch(idArtikel, judul, kategori) {
        const hasilCari = document.getElementById("hasilCari");
        if (hasilCari) hasilCari.classList.add("hidden");

        hilangkanBorderMerah();
        simpanKeRiwayat(judul);

        // 1. Cari Presisi berdasarkan ID Unik String
        let dataObj = databaseSearch.find(item => String(item.id) === String(idArtikel));

        // 2. Jika ID tidak ditemukan, cari dengan toleransi teks judul
        if (!dataObj) {
            const cleanTitle = judul.toLowerCase().replace(/\s+/g, ' ').trim();
            dataObj = databaseSearch.find(item => item.judul.toLowerCase().replace(/\s+/g, ' ').trim() === cleanTitle);
        }

        const targetType = dataObj ? dataObj.target_type : (kategori || '').toLowerCase().trim();

        // A. KHUSUS AJARAN TETUA
        if (targetType === "ajaran" || targetType.includes("ajaran")) {
            scrollToElement("ajaran", "containerAjaranHero");
            
            setTimeout(() => {
                if (typeof openAjaran === 'function') {
                    if (dataObj && dataObj.raw_id !== undefined) {
                        openAjaran(dataObj.raw_id);
                    } else {
                        openAjaran(judul);
                    }
                }
            }, 200);

        // B. SATUA BALI
        } else if (targetType.includes("satua")) {
            if (typeof showSatua === 'function') showSatua();
            scrollToElement("sectionSatua");

            setTimeout(() => {
                if (typeof openSatua === 'function') {
                    openSatua(
                        dataObj ? dataObj.judul : judul,
                        dataObj ? dataObj.latin : 'Satua Bali',
                        dataObj ? dataObj.status : 'Lestari',
                        dataObj ? dataObj.gambar : "{{ asset('images/i-belog.jpg') }}",
                        dataObj ? dataObj.ringkasan : (judul + ' adalah satua Bali tradisional yang menceritakan nilai kehidupan.'),
                        dataObj ? dataObj.tokoh : 'Tokoh Utama',
                        dataObj ? dataObj.alur : '1. Pengenalan.<br>2. Konflik.<br>3. Penyelesaian.',
                        dataObj ? dataObj.moral : 'Pesan moral kehidupan.',
                        dataObj ? dataObj.filosofi : 'Nilai filosofis Bali.'
                    );
                }
            }, 200);

        // C. ISTILAH BALI
        } else if (targetType.includes("istilah")) {
            if (typeof showIstilah === 'function') showIstilah();
            scrollToElement("sectionIstilah");

            setTimeout(() => {
                if (typeof openIstilah === 'function') {
                    openIstilah(
                        dataObj ? dataObj.judul : judul,
                        dataObj ? dataObj.kategori : 'ISTILAH BALI',
                        dataObj ? dataObj.deskripsi : 'Penjelasan istilah ' + judul,
                        dataObj ? dataObj.sejarah : '',
                        dataObj ? dataObj.contoh : '',
                        dataObj ? dataObj.padanan : '',
                        dataObj ? dataObj.konteks : ''
                    );
                }
            }, 200);

        // D. CECIMPEDAN
        } else if (targetType.includes("cecimpedan")) {
            scrollToElement("cecimpedan", "sectionCecimpedan");
            
            setTimeout(() => {
                if (typeof window.openCecimpedanById === 'function') {
                    window.openCecimpedanById(dataObj ? dataObj.raw_id : '', judul);
                }
            }, 200);

        // E. FILSAFAT BALI
        } else if (targetType.includes("filsafat")) {
            scrollToElement("sectionFilsafat", "filsafat");
            
            setTimeout(() => {
                const titleVal = dataObj ? dataObj.judul : judul;
                const katVal = dataObj ? dataObj.kategori : 'FILSAFAT BALI';
                const descVal = dataObj ? (dataObj.deskripsi || dataObj.isi) : 'Penjelasan filsafat ' + judul;
                const sejVal = dataObj ? (dataObj.sejarah || '-') : '-';
                const conVal = dataObj ? (dataObj.contoh || '-') : '-';
                const padVal = dataObj ? (dataObj.padanan || '-') : '-';
                const konVal = dataObj ? (dataObj.konteks || '-') : '-';

                if (typeof openIstilah === 'function') {
                    openIstilah(titleVal, katVal, descVal, sejVal, conVal, padVal, konVal);
                } else if (typeof openFilsafat === 'function') {
                    openFilsafat(dataObj ? dataObj.raw_id : judul);
                } else {
                    if (document.getElementById("detailTitle")) document.getElementById("detailTitle").innerHTML = titleVal;
                    if (document.getElementById("detailKategori")) document.getElementById("detailKategori").innerHTML = katVal;
                    if (document.getElementById("detailDesc")) document.getElementById("detailDesc").innerHTML = descVal;
                    if (document.getElementById("detailSejarah")) document.getElementById("detailSejarah").innerHTML = sejVal;
                    if (document.getElementById("detailContoh")) document.getElementById("detailContoh").innerHTML = conVal;
                    if (document.getElementById("detailPadanan")) document.getElementById("detailPadanan").innerHTML = padVal;
                    if (document.getElementById("detailKonteks")) document.getElementById("detailKonteks").innerHTML = konVal;

                    const overlay = document.getElementById("overlay") || document.getElementById("overlayFilsafat");
                    const detailPanel = document.getElementById("detailPanel") || document.getElementById("panelFilsafat");
                    if (overlay) overlay.classList.remove("hidden");
                    if (detailPanel) detailPanel.classList.remove("translate-x-full");
                }
            }, 200);

        // F. ARTIKEL UMUM
        } else {
            scrollToElement("artikel");

            setTimeout(() => {
                if (dataObj) {
                    if (document.getElementById('artTitle')) document.getElementById('artTitle').innerText = dataObj.judul || judul;
                    if (document.getElementById('artPenulis')) document.getElementById('artPenulis').innerText = dataObj.penulis || 'Tim Balinesia';
                    if (document.getElementById('artMeta')) document.getElementById('artMeta').innerText = (dataObj.tanggal || '') + ' • BALINESIA';
                    if (document.getElementById('artIsi')) document.getElementById('artIsi').innerHTML = dataObj.isi || '';
                    
                    const writer = dataObj.penulis || 'A';
                    if (document.getElementById('artAvatar')) document.getElementById('artAvatar').innerText = writer.charAt(0).toUpperCase();

                    const badge = document.getElementById('artKategoriBadge');
                    if (badge) {
                        badge.innerText = dataObj.kategori || 'AJARAN TETUA';
                        badge.style.backgroundColor = '#992B20';
                    }

                    const img = document.getElementById('artImage');
                    if (img && dataObj.gambar) img.src = dataObj.gambar;

                    const kesimpulanBox = document.getElementById('boxKesimpulan');
                    if (kesimpulanBox) {
                        if (dataObj.kesimpulan && dataObj.kesimpulan.trim() !== '') {
                            kesimpulanBox.classList.remove('hidden');
                            document.getElementById('artKesimpulan').innerText = dataObj.kesimpulan;
                        } else {
                            kesimpulanBox.classList.add('hidden');
                        }
                    }
                }

                const overlay = document.getElementById('overlayArtikel');
                const panel = document.getElementById('panelArtikel');

                if (overlay) {
                    overlay.style.display = 'block';
                    overlay.classList.remove('hidden', 'pointer-events-none', 'opacity-0');
                    overlay.classList.add('pointer-events-auto', 'opacity-100');
                }

                if (panel) {
                    panel.classList.remove('translate-x-full');
                }
            }, 200);
        }
    }

    // ==========================================
    // BUKA & TUTUP MODAL DRAWER SEMUA KATEGORI
    // ==========================================
    function openSatua(nama, latin, status, gambar, ringkasan, tokoh, alur, moral, filosofi) {
        if (document.getElementById("satuaNama")) document.getElementById("satuaNama").innerHTML = nama;
        if (document.getElementById("satuaLatin")) document.getElementById("satuaLatin").innerHTML = latin;
        if (document.getElementById("satuaStatus")) document.getElementById("satuaStatus").innerHTML = status;
        if (document.getElementById("satuaImage")) document.getElementById("satuaImage").src = gambar;
        if (document.getElementById("satuaRingkasan")) document.getElementById("satuaRingkasan").innerHTML = ringkasan;
        if (document.getElementById("satuaTokoh")) document.getElementById("satuaTokoh").innerHTML = tokoh;
        if (document.getElementById("satuaAlur")) document.getElementById("satuaAlur").innerHTML = alur;
        if (document.getElementById("satuaMoral")) document.getElementById("satuaMoral").innerHTML = moral;
        if (document.getElementById("satuaFilosofi")) document.getElementById("satuaFilosofi").innerHTML = filosofi;

        const overlay = document.getElementById("overlaySatua");
        const panel = document.getElementById("panelSatua");
        if (overlay) overlay.classList.remove("hidden");
        if (panel) panel.classList.remove("translate-x-full");
    }

    function closeSatua() {
        const overlay = document.getElementById("overlaySatua");
        const panel = document.getElementById("panelSatua");
        if (overlay) overlay.classList.add("hidden");
        if (panel) panel.classList.add("translate-x-full");
    }

    function openIstilah(judul, kategori, deskripsi, sejarah, contoh, padanan, konteks) {
        if (document.getElementById("detailTitle")) document.getElementById("detailTitle").innerHTML = judul || '-';
        if (document.getElementById("detailKategori")) document.getElementById("detailKategori").innerHTML = kategori || 'Istilah Bali';
        if (document.getElementById("detailDesc")) document.getElementById("detailDesc").innerHTML = deskripsi || '-';
        if (document.getElementById("detailSejarah")) document.getElementById("detailSejarah").innerHTML = sejarah || '-';
        if (document.getElementById("detailContoh")) document.getElementById("detailContoh").innerHTML = contoh || '-';
        if (document.getElementById("detailPadanan")) document.getElementById("detailPadanan").innerHTML = padanan || '-';
        if (document.getElementById("detailKonteks")) document.getElementById("detailKonteks").innerHTML = konteks || '-';

        const overlay = document.getElementById("overlay");
        const detailPanel = document.getElementById("detailPanel");
        if (overlay) overlay.classList.remove("hidden");
        if (detailPanel) detailPanel.classList.remove("translate-x-full");
    }

    function closeDetail() {
        const overlay = document.getElementById("overlay");
        const detailPanel = document.getElementById("detailPanel");
        if (overlay) overlay.classList.add("hidden");
        if (detailPanel) detailPanel.classList.add("translate-x-full");
    }

    function closeAjaran() {
        const overlay = document.getElementById("overlayAjaran");
        const panel = document.getElementById("panelAjaran");
        if (overlay) overlay.classList.add("hidden");
        if (panel) panel.classList.add("translate-x-full");
    }

    function showSatua() {
        const secSatua = document.getElementById("sectionSatua");
        const secIstilah = document.getElementById("sectionIstilah");
        if (secSatua) secSatua.classList.remove("hidden");
        if (secIstilah) secIstilah.classList.add("hidden");
    }

    function showIstilah() {
        const secSatua = document.getElementById("sectionSatua");
        const secIstilah = document.getElementById("sectionIstilah");
        if (secSatua) secSatua.classList.remove("hidden");
        if (secIstilah) secIstilah.classList.remove("hidden");
    }

    document.addEventListener("click", function(e) {
        const searchInput = document.getElementById("searchInput");
        const hasilCari = document.getElementById("hasilCari");
        const keywordBox = document.getElementById("keywordBox");
        const boxContainer = document.getElementById("searchBoxContainer");

        if (
            boxContainer && !boxContainer.contains(e.target) &&
            (!hasilCari || !hasilCari.contains(e.target)) &&
            (!keywordBox || !keywordBox.contains(e.target))
        ) {
            if (hasilCari) hasilCari.classList.add("hidden");
            hilangkanBorderMerah();
        }
    });
</script>