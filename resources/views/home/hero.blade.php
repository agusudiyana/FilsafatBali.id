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
    /* 1. Garis Merah Underline Eksklusif */
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

    /* 2. Keyframes Animasi Efek Foto / Kartu Artikel Muncul */
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

    /* Class Animasi Kartu Artikel */
    .card-appear-anim {
        animation: cardAppear 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    /* Isolasi Klik Icon Bookmark */
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
    // Ambil status login user untuk fitur Bookmark
    const USER_LOGGED_IN = @json(auth()->check());

    // ==========================================
    // LOGIKA RIWAYAT PENCARIAN (FIFO MAX 6 ITEM)
    // ==========================================
    var DEFAULT_KEYWORDS = [
        "TRI HITA KARANA", 
        "DESA KALA PATRA", 
        "I SIAP SELEM", 
        "I BELOG", 
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
    // ARRAY SINKRONISASI DATABASE FILSAFATBALI_DB
    // ==========================================
    const databaseSearch = [
        // 1. Tabel satuas (I Belog, I Siap Selem, dll)
        @if(isset($satuas))
            @foreach($satuas as $s)
                {
                    id: @json($s->id),
                    judul: @json($s->judul ?? $s->nama ?? $s->judul_satua ?? $s->title ?? 'Satua Bali'),
                    kategori: 'SATUA BALI',
                    target_type: 'satua',
                    penulis: @json($s->penulis ?? $s->pengarang ?? ($s->user->name ?? 'Masyarakat Bali')),
                    latin: @json($s->latin ?? $s->subtitle ?? 'The Fool'),
                    status: @json($s->status ?? 'Lestari'),
                    gambar: @json(isset($s->gambar) ? asset('storage/' . $s->gambar) : (isset($s->image) ? asset($s->image) : asset('images/i-belog.jpg'))),
                    ringkasan: @json($s->ringkasan ?? $s->deskripsi ?? 'Satua Bali yang menceritakan kisah tradisional dengan nilai-nilai kehidupan.'),
                    tokoh: @json($s->tokoh ?? $s->tokoh_utama ?? 'I Belog<br>Ibu'),
                    alur: @json($s->alur ?? $s->alur_cerita ?? '1. Nasihat ibu.<br>2. Salah paham.<br>3. Kejadian lucu.'),
                    moral: @json($s->moral ?? $s->pesan_moral ?? 'Pentingnya memahami maksud perintah dengan bijak.'),
                    filosofi: @json($s->filosofi ?? 'Nilai nalar kritis dalam budaya Bali.')
                },
            @endforeach
        @endif

        // 2. Tabel istilahs (Pura, Taksu, Subak, dll)
        @if(isset($istilahs))
            @foreach($istilahs as $i)
                {
                    id: @json($i->id),
                    judul: @json($i->istilah ?? $i->judul ?? $i->nama ?? 'Istilah Bali'),
                    kategori: 'ISTILAH BALI',
                    target_type: 'istilah',
                    penulis: @json($i->penulis ?? ($i->user->name ?? 'Budayawan')),
                    deskripsi: @json($i->deskripsi ?? $i->penjelasan ?? 'Penjelasan istilah kebudayaan Bali.'),
                    sejarah: @json($i->sejarah ?? 'Sejarah dan asal-usul istilah.'),
                    contoh: @json($i->contoh ?? 'Penerapan dalam tradisi.'),
                    padanan: @json($i->padanan ?? 'Padanan kata/istilah'),
                    konteks: @json($i->konteks ?? 'Konteks kehidupan masyarakat Bali')
                },
            @endforeach
        @endif

        // 3. Tabel ajaran_tertua (Desa Kala Patra, Tri Hita Karana, Sad Kerthi, dll)
        @if(isset($ajarans))
            @foreach($ajarans as $aj)
                {
                    id: @json($aj->id),
                    judul: @json($aj->judul ?? $aj->nama ?? $aj->title ?? 'Ajaran Tertua'),
                    kategori: 'AJARAN',
                    target_type: 'ajaran',
                    penulis: @json($aj->penulis ?? ($aj->user->name ?? 'Tetua Bali'))
                },
            @endforeach
        @endif

        // 4. Tabel artikels
        @if(isset($artikels))
            @foreach($artikels as $a)
                {
                    id: @json($a->id),
                    judul: @json($a->judul ?? $a->title ?? 'Artikel'),
                    kategori: @json(strtoupper($a->kategori ?? 'AJARAN')),
                    target_type: 'artikel',
                    penulis: @json($a->penulis ?? ($a->user->name ?? 'Penulis'))
                },
            @endforeach
        @endif

        // 5. Tabel cecimpedans
        @if(isset($cecimpedans))
            @foreach($cecimpedans as $c)
                {
                    id: @json($c->id),
                    judul: @json($c->judul ?? $c->pertanyaan ?? $c->nama ?? 'Cecimpedan'),
                    kategori: 'CECIMPEDAN',
                    target_type: 'cecimpedan',
                    penulis: @json($c->penulis ?? ($c->user->name ?? 'Anonim'))
                },
            @endforeach
        @endif

        // 6. Tabel filsafat
        @if(isset($filsafats))
            @foreach($filsafats as $f)
                {
                    id: @json($f->id),
                    judul: @json($f->judul ?? $f->nama ?? 'Filsafat'),
                    kategori: 'FILSAFAT',
                    target_type: 'filsafat',
                    penulis: @json($f->penulis ?? ($f->user->name ?? 'Filsuf'))
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

    function scrollToTarget(targetId) {
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }
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
                    <div onclick="bukaDetailMateri('${item.id}', '${encodeURIComponent(item.judul)}', '${item.target_type || item.kategori.toLowerCase()}')" class="flex items-center gap-4 px-6 py-4 hover:bg-[#F0E6D8] transition duration-200 cursor-pointer text-left border-b border-[#EADCC9]">
                        <span class="bg-[#8D2B1D] text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded shrink-0">
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

    // =========================================================================
    // FUNGSI UTAMA HASIL PENCARIAN (PENCACAHAN PRESISI ID AGAR TIDAK KEBALIK)
    // =========================================================================
    function bukaDetailMateri(id, encodedJudul, targetType) {
        pilihHasilSearch(id, decodeURIComponent(encodedJudul), targetType);
    }

    function pilihHasilSearch(idArtikel, judul, kategori) {
        const hasilCari = document.getElementById("hasilCari");
        if (hasilCari) hasilCari.classList.add("hidden");

        hilangkanBorderMerah();
        simpanKeRiwayat(judul);

        const keyLower = judul.toLowerCase().trim();
        const katLower = (kategori || '').toLowerCase().trim();

        // MATCHING PRESISI: Cari dulu berdasarkan ID dan Target Type unik agar Desa Kala Patra & Tri Hita Karana tidak tertukar!
        let dataObj = databaseSearch.find(item => 
            String(item.id) === String(idArtikel) && item.target_type === katLower
        );

        // Fallback jika ID tidak cocok persis, cari berdasarkan Judul
        if (!dataObj) {
            dataObj = databaseSearch.find(item => item.judul.toLowerCase().trim() === keyLower);
        }

        // 1. KATEGORI: SATUA BALI (I BELOG, I SIAP SELEM, DLL)
        if (katLower.includes("satua")) {
            if (typeof showSatua === 'function') showSatua();
            scrollToTarget("sectionSatua");

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
                } else {
                    var overlaySatua = document.getElementById("overlaySatua");
                    var panelSatua = document.getElementById("panelSatua");
                    if (overlaySatua && panelSatua) {
                        if (document.getElementById("satuaNama")) document.getElementById("satuaNama").innerHTML = dataObj ? dataObj.judul : judul;
                        overlaySatua.classList.remove("hidden");
                        panelSatua.classList.remove("translate-x-full");
                        document.body.style.overflow = "hidden";
                    }
                }
            }, 450);

        // 2. KATEGORI: ISTILAH BALI (PURA, TAKSU, SUBAK, DLL)
        } else if (katLower.includes("istilah")) {
            if (typeof showIstilah === 'function') showIstilah();
            scrollToTarget("sectionIstilah");

            setTimeout(() => {
                if (typeof openIstilah === 'function') {
                    openIstilah(
                        dataObj ? dataObj.judul : judul,
                        dataObj ? dataObj.kategori : 'Istilah Bali',
                        dataObj ? dataObj.deskripsi : 'Penjelasan istilah ' + judul,
                        dataObj ? dataObj.sejarah : 'Sejarah istilah',
                        dataObj ? dataObj.contoh : 'Contoh penerapan tradisi',
                        dataObj ? dataObj.padanan : 'Padanan kata',
                        dataObj ? dataObj.konteks : 'Konteks budaya'
                    );
                }
            }, 450);

        // 3. KATEGORI: AJARAN TETUA (DESA KALA PATRA, TRI HITA KARANA, SAD KERTHI, DLL)
        } else if (katLower.includes("ajaran") || keyLower.includes("tri hita karana") || keyLower.includes("desa kala patra")) {
            const targetSec = document.getElementById("ajaran") || document.getElementById("ajaran-tetua") || document.getElementById("sectionAjaran") || document.getElementById("artikel");
            if (targetSec) targetSec.scrollIntoView({ behavior: 'smooth', block: 'center' });

            setTimeout(() => {
                if (typeof openAjaran === 'function') {
                    openAjaran(dataObj ? dataObj.id : idArtikel);
                } else if (typeof openDetailArtikel === 'function') {
                    openDetailArtikel(dataObj ? dataObj.id : (idArtikel && idArtikel !== 'undefined' ? idArtikel : 1));
                } else {
                    var overlayAjaran = document.getElementById("overlayAjaran");
                    var panelAjaran = document.getElementById("panelAjaran");
                    if (overlayAjaran && panelAjaran) {
                        if (document.getElementById("ajaranJudul")) {
                            document.getElementById("ajaranJudul").innerHTML = dataObj ? dataObj.judul : judul;
                        }
                        overlayAjaran.classList.remove("hidden");
                        panelAjaran.classList.remove("translate-x-full");
                        document.body.style.overflow = "hidden";
                    }
                }
            }, 450);

        // 4. KATEGORI: CECIMPEDAN
        } else if (katLower.includes("cecimpedan")) {
            scrollToTarget("cecimpedan");
            setTimeout(() => {
                if (typeof toggleCard === 'function') toggleCard(1);
            }, 450);

        // 5. KATEGORI: FILSAFAT
        } else if (katLower.includes("filsafat")) {
            scrollToTarget("filsafat");
            setTimeout(() => {
                if (typeof openFilsafat === 'function') openFilsafat("barat");
            }, 450);

        // 6. KATEGORI: ARTIKEL UMUM
        } else {
            scrollToTarget("artikel");
            setTimeout(() => {
                if (typeof openDetailArtikel === 'function') {
                    openDetailArtikel(dataObj ? dataObj.id : (idArtikel && idArtikel !== 'undefined' ? idArtikel : 1));
                }
            }, 450);
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
        document.body.style.overflow = "hidden";
    }

    function closeSatua() {
        const overlay = document.getElementById("overlaySatua");
        const panel = document.getElementById("panelSatua");
        if (overlay) overlay.classList.add("hidden");
        if (panel) panel.classList.add("translate-x-full");
        document.body.style.overflow = "auto";
    }

    function openIstilah(judul, kategori, deskripsi, sejarah, contoh, padanan, konteks) {
        if (document.getElementById("detailTitle")) document.getElementById("detailTitle").innerHTML = judul;
        if (document.getElementById("detailKategori")) document.getElementById("detailKategori").innerHTML = kategori;
        if (document.getElementById("detailDesc")) document.getElementById("detailDesc").innerHTML = deskripsi;
        if (document.getElementById("detailSejarah")) document.getElementById("detailSejarah").innerHTML = sejarah;
        if (document.getElementById("detailContoh")) document.getElementById("detailContoh").innerHTML = contoh;
        if (document.getElementById("detailPadanan")) document.getElementById("detailPadanan").innerHTML = padanan;
        if (document.getElementById("detailKonteks")) document.getElementById("detailKonteks").innerHTML = konteks;

        const overlay = document.getElementById("overlay");
        const detailPanel = document.getElementById("detailPanel");
        if (overlay) overlay.classList.remove("hidden");
        if (detailPanel) detailPanel.classList.remove("translate-x-full");
        document.body.style.overflow = "hidden";
    }

    function closeDetail() {
        const overlay = document.getElementById("overlay");
        const detailPanel = document.getElementById("detailPanel");
        if (overlay) overlay.classList.add("hidden");
        if (detailPanel) detailPanel.classList.add("translate-x-full");
        document.body.style.overflow = "auto";
    }

    function closeAjaran() {
        const overlay = document.getElementById("overlayAjaran");
        const panel = document.getElementById("panelAjaran");
        if (overlay) overlay.classList.add("hidden");
        if (panel) panel.classList.add("translate-x-full");
        document.body.style.overflow = "auto";
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
        if (secSatua) secSatua.classList.add("hidden");
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