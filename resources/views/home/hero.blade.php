<!-- Swiper JS Library -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- ========================================== -->
<!-- SECTION HERO (FIX DROPDOWN OVERLAP Z-INDEX)-->
<!-- ========================================== -->
<section id="filsafat" class="relative z-30 min-h-screen flex items-start justify-center overflow-visible">

    <!-- Swiper Background Container -->
    <div class="swiper heroSwiper absolute inset-0 w-full h-full -z-10">
        <div class="swiper-wrapper">
            <!-- Slide 1 (hero.png) -->
            <div class="swiper-slide relative overflow-hidden">
                <img src="{{ asset('images/hero.png') }}" alt="Hero Background 1" class="w-full h-full object-cover hero-kenburns">
            </div>
            <!-- Slide 2 (hero1.png) -->
            <div class="swiper-slide relative overflow-hidden">
                <img src="{{ asset('images/hero1.png') }}" alt="Hero Background 2" class="w-full h-full object-cover hero-kenburns">
            </div>
        </div>
    </div>

    <!-- Overlay Gelap Utama -->
    <div class="absolute inset-0 bg-black/55 pointer-events-none z-0"></div>

    <!-- Gradient Transition Bottom (Hitam Transparan) -->
    <div class="absolute bottom-0 left-0 w-full h-64 bg-gradient-to-t from-black via-black/60 to-transparent pointer-events-none z-0"></div>

    <!-- Konten Utama Hero -->
    <div class="relative z-10 text-center max-w-4xl mx-auto px-6 pt-40">

        <!-- Subtitle Header (DIKUNCI KE WARNA KUNING #E2B75B) -->
        <div class="anim-hero-tag max-w-lg mx-auto mb-10">
            <p id="heroTagline" class="uppercase tracking-[8px] text-[9px] font-medium text-center whitespace-nowrap !text-[#E2B75B]" style="color: #E2B75B !important;">
                Arsip Digital Filsafat & Budaya Bali
            </p>
        </div>

        <!-- Judul Utama Hero -->
        <h1 style="font-family:'Cormorant Garamond',serif;" class="anim-hero-title font-bold leading-[0.9]">
            <span class="block text-white text-[58px]">
                Menjaga Warisan,
            </span>
            <span id="heroTitleAccent" class="block text-[66px] mt-1 transition-colors duration-500 text-[#E2B75B]">
                Menerangi Masa Depan
            </span>
        </h1>

        <!-- Deskripsi Singkat -->
        <p class="anim-hero-sub mt-8 max-w-2xl mx-auto text-center text-[17px] md:text-[18px] font-normal leading-[36px] text-[#F3F1EC]"
            style="font-family:'Inter', sans-serif;">
            Platform digital untuk mengakses, mempelajari, dan
            <br>
            melestarikan kearifan lokal Bali.
        </p>

        <!-- KOTAK PENCARIAN (STACKING CONTEXT UTAMA) -->
        <div class="anim-hero-search mt-8 max-w-2xl mx-auto relative z-50">

            <!-- Field Input Search -->
            <div id="searchBoxContainer"
                class="bg-[#FAF5ED] rounded-xl px-5 h-[54px] flex items-center shadow-2xl transition-all duration-200 w-full shrink-0 ring-2 ring-transparent">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#8C7A65] mr-3 shrink-0" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>

                <input id="searchInput" type="text" placeholder="Cari ajaran, istilah, satua, filsafat..."
                    class="bg-transparent flex-1 w-full outline-none text-[16px] text-[#2B1A0E] placeholder-[#A0907E] font-medium h-full"
                    onfocus="aktifkanBorderMerah()" oninput="liveSearch(this.value)">

                <button id="btnClearSearch" type="button" onclick="clearSearch()"
                    class="hidden text-[#8C7A65] hover:text-[#8D2B1D] font-bold text-lg px-2 shrink-0 transition cursor-pointer">
                    ✕
                </button>
            </div>

            <!-- DROPDOWN HASIL PENCARIAN -->
            <div id="hasilCari"
                class="hidden absolute left-0 top-full mt-2 w-full bg-[#FAF5ED] rounded-xl border border-[#E5D6BF] shadow-2xl overflow-y-auto max-h-[280px] divide-y divide-[#EADCC9] z-[100] text-left">
            </div>

        </div>

        <!-- KEYWORD CHIPS -->
        <div id="keywordBox" class="anim-hero-chips mt-5 flex justify-center items-center flex-nowrap gap-2 md:gap-3 max-w-3xl mx-auto px-2 overflow-hidden">
        </div>

    </div>

</section>


<!-- ========================================== -->
<!-- CSS STYLES UNTUK ANIMASI                  -->
<!-- ========================================== -->
<style>
    /* Swiper Ken Burns Zoom Effect */
    .heroSwiper .swiper-slide-active .hero-kenburns {
        animation: kenburnsZoom 6s ease-out forwards;
    }

    @keyframes kenburnsZoom {
        from { transform: scale(1); }
        to { transform: scale(1.08); }
    }

    /* Animasi Teks Masuk Slide-Up & Fade-In */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(28px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .anim-hero-tag {
        animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    .anim-hero-title {
        opacity: 0;
        animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.15s forwards;
    }

    .anim-hero-sub {
        opacity: 0;
        animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.3s forwards;
    }

    .anim-hero-search {
        opacity: 0;
        animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.45s forwards;
    }

    .anim-hero-chips {
        opacity: 0;
        animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.6s forwards;
    }

    /* Tab & Card Styling */
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

    #artikel button[id^="btn-"].tab-active,
    .filter-tab-btn.tab-active,
    .tab-btn.tab-active {
        color: #992B20 !important;
        font-weight: 700;
    }

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

    #artikel button[id^="btn-"].tab-active::after,
    .filter-tab-btn.tab-active::after,
    .tab-btn.tab-active::after {
        transform: scaleX(1);
    }

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
<!-- SCRIPT JAVASCRIPT GABUNGAN PRESISI         -->
<!-- ========================================== -->
<script>
    const USER_LOGGED_IN = @json(auth()->check());
    window.currentHeroAccentColor = '#E2B75B';

    // FUNGSI MENGUBAH WARNA AKSEN HERO (TAGLINE ARSIP DIGITAL DIKUNCI DI KUNING #E2B75B)
    function updateAccentColors(slideIndex) {
        const tag = document.getElementById('heroTagline');
        const title = document.getElementById('heroTitleAccent');

        // Tagline selalu dikunci kuning emas
        if (tag) tag.style.color = '#E2B75B';
        
        // Judul aksen slide 0 = Emas (#E2B75B) | Slide 1 = Hijau (#4ADE80)
        if (title) title.style.color = slideIndex === 0 ? '#E2B75B' : '#4ADE80';

        // NAVBAR DIKUNCI: Tetap selalu menggunakan warna Emas/Kuning
        window.currentHeroAccentColor = '#E2B75B';

        if (typeof updateNavbarOnScroll === 'function') {
            updateNavbarOnScroll();
        }
    }

    // FUNGSI UPDATE NAVBAR PADA SCROLL
    function updateNavbarOnScroll() {
        var navbar = document.getElementById("navbar");
        if (!navbar) return;

        var navLogo = document.getElementById("navLogo");
        var dynamicElements = document.querySelectorAll(".nav-dynamic-color");

        if (window.scrollY > 30) {
            navbar.classList.remove("bg-transparent");
            navbar.style.backgroundColor = "#F7F0E7";
            navbar.style.boxShadow = "0 4px 15px rgba(0,0,0,.10)";
            navbar.style.paddingTop = "8px";
            navbar.style.paddingBottom = "8px";

            dynamicElements.forEach(function(el) {
                if (el.tagName === 'A') {
                    el.style.color = "#6B4A2B";
                } else {
                    el.style.color = "#23160E";
                }
            });

            if (navLogo) navLogo.style.color = "#8D2B1D";

        } else {
            navbar.classList.add("bg-transparent");
            navbar.style.backgroundColor = "transparent";
            navbar.style.boxShadow = "none";
            navbar.style.paddingTop = "16px";
            navbar.style.paddingBottom = "16px";

            // DIKUNCI MATI: Warna teks dynamic di navbar tetap Kuning (#E2B75B)
            dynamicElements.forEach(function(el) {
                el.style.color = "#E2B75B";
            });

            if (navLogo) navLogo.style.color = "#A73D1F";
        }
    }

    function toggleUserDropdown(e) {
        if (e) {
            e.preventDefault();
            e.stopPropagation();
        }

        var dropdown = document.getElementById("userDropdown");
        if (!dropdown) return;

        if (dropdown.classList.contains("hidden")) {
            dropdown.classList.remove("hidden");
            setTimeout(function() {
                dropdown.classList.remove("opacity-0", "scale-95");
                dropdown.classList.add("opacity-100", "scale-100");
            }, 10);
        } else {
            dropdown.classList.remove("opacity-100", "scale-100");
            dropdown.classList.add("opacity-0", "scale-95");
            setTimeout(function() {
                dropdown.classList.add("hidden");
            }, 200);
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Init Swiper JS
        const heroSwiper = new Swiper('.heroSwiper', {
            loop: true,
            effect: 'fade',
            fadeEffect: { crossFade: true },
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            on: {
                init: function () {
                    updateAccentColors(this.realIndex);
                },
                slideChange: function () {
                    updateAccentColors(this.realIndex);
                }
            }
        });

        renderKeywordChips();

        if (typeof feather !== 'undefined') {
            feather.replace();
        }

        const overlayDetail = document.getElementById("overlay");
        if (overlayDetail) overlayDetail.onclick = closeDetail;

        const overlayAjaran = document.getElementById("overlayAjaran");
        if (overlayAjaran) {
            overlayAjaran.addEventListener("click", function(e) {
                if (e.target === this) closeAjaran();
            });
        }

        // PENANGANAN OTOMATIS SAAT USER KLIK NOTIFIKASI ("BACA SEKARANG")
        const urlParams = new URLSearchParams(window.location.search);
        const shouldOpenOverlay = urlParams.get('open_overlay');
        const articleId = urlParams.get('article_id');
        const articleTitle = urlParams.get('title');

        if (shouldOpenOverlay === 'true' && (articleId || articleTitle)) {
            const targetId = articleId || '';
            const targetTitle = articleTitle ? decodeURIComponent(articleTitle) : '';
            pilihHasilSearch(targetId, targetTitle, 'artikel');
            window.history.replaceState({}, document.title, window.location.pathname);
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

            const sampleKeywords = [
                "ajaran, istilah, satua, filsafat...",
                "\"Tri Hita Karana\"...",
                "\"Desa Kala Patra\"...",
                "\"Ngaben\"...",
                "\"I Belog\"...",
                "\"Rwa Bhineda\"..."
            ];

            let wordIndex = 0;
            let charIndex = 0;
            let isDeleting = false;

            function startTypeEffect() {
                if (document.activeElement === searchInput || searchInput.value !== "") {
                    setTimeout(startTypeEffect, 1000);
                    return;
                }

                const currentWord = sampleKeywords[wordIndex];
                
                if (isDeleting) {
                    searchInput.placeholder = "Cari " + currentWord.substring(0, charIndex - 1);
                    charIndex--;
                } else {
                    searchInput.placeholder = "Cari " + currentWord.substring(0, charIndex + 1);
                    charIndex++;
                }

                let speed = isDeleting ? 40 : 80;

                if (!isDeleting && charIndex === currentWord.length) {
                    speed = 2200;
                    isDeleting = true;
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    wordIndex = (wordIndex + 1) % sampleKeywords.length;
                    speed = 400;
                }

                setTimeout(startTypeEffect, speed);
            }

            startTypeEffect();
        }
    });

    window.addEventListener("scroll", updateNavbarOnScroll);

    document.addEventListener("click", function(e) {
        var dropdown = document.getElementById("userDropdown");
        var btn = document.getElementById("userProfileBtn");

        if (dropdown && !dropdown.classList.contains("hidden")) {
            if (btn && btn.contains(e.target)) return;

            dropdown.classList.remove("opacity-100", "scale-100");
            dropdown.classList.add("opacity-0", "scale-95");
            setTimeout(function() {
                dropdown.classList.add("hidden");
            }, 200);
        }

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

    var DEFAULT_KEYWORDS = [
        "TRI HITA KARANA", 
        "DESA KALA PATRA", 
        "TAT TWAM ASI", 
        "NGABEN", 
        "TAKSU"
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

        if (history.length > 5) {
            history = history.slice(0, 5);
        }

        localStorage.setItem("balinesia_search_history", JSON.stringify(history));
        renderKeywordChips();
    }

    function renderKeywordChips() {
        var keywordBox = document.getElementById("keywordBox");
        if (!keywordBox) return;

        var history = getSearchHistory();
        history = history.slice(0, 5);
        
        keywordBox.innerHTML = "";

        history.forEach(function(text) {
            var a = document.createElement("a");
            a.href = "#";
            a.className = "inline-block max-w-[120px] md:max-w-[150px] truncate border border-white/40 rounded-md px-3 py-1.5 text-[10px] uppercase tracking-[2px] text-white font-medium hover:bg-white hover:text-black transition cursor-pointer shrink-0 text-center align-middle";
            a.innerText = text;
            a.title = text;
            
            a.onclick = function(e) {
                cariKeyword(e, text);
                return false;
            };

            keywordBox.appendChild(a);
        });
    }

    const databaseSearch = [
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

        @if(isset($satuas))
            @foreach($satuas as $s)
                @php
                    $isiAwal = $s->isi ?? $s->cerita ?? $s->isi_cerita ?? $s->deskripsi ?? $s->ringkasan ?? '';
                @endphp
                {
                    id: @json("satua_" . $s->id),
                    raw_id: @json($s->id),
                    judul: @json($s->judul ?? $s->nama ?? 'Satua Bali'),
                    kategori: 'SATUA BALI',
                    target_type: 'satua',
                    penulis: @json($s->penulis ?? 'Masyarakat Bali'),
                    latin: @json($s->sub_judul ?? $s->terjemahan ?? $s->latin ?? ''),
                    gambar: @json(!empty($s->gambar) ? asset('storage/' . $s->gambar) : asset('images/default.jpg')),
                    isi: @json($isiAwal),
                    tokoh: @json($s->tokoh ?? '-'),
                    alur: @json($s->alur ?? '-'),
                    moral: @json($s->moral ?? '-'),
                    filosofi: @json($s->filosofi ?? '-')
                },
            @endforeach
        @endif

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

    function getCategoryBadgeColor(kategori) {
        const kat = kategori.toUpperCase();
        if (kat.includes('AJARAN')) return 'bg-[#A33B20] text-white';
        if (kat.includes('SATUA')) return 'bg-[#2D6C3F] text-white';
        if (kat.includes('ISTILAH')) return 'bg-[#3C6E71] text-white';
        if (kat.includes('CECIMPEDAN')) return 'bg-[#C7962B] text-white';
        if (kat.includes('FILSAFAT')) return 'bg-[#5C4033] text-white';
        return 'bg-[#8D2B1D] text-white';
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
            item.judul.toLowerCase().startsWith(query) ||
            item.kategori.toLowerCase().startsWith(query) ||
            item.penulis.toLowerCase().startsWith(query)
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

    function scrollToElement(id1, id2) {
        let el = document.getElementById(id1);
        if (!el && id2) el = document.getElementById(id2);
        if (el) {
            el.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    function bukaDetailMateri(id, encodedJudul, targetType) {
        pilihHasilSearch(id, decodeURIComponent(encodedJudul), targetType);
    }

    function pilihHasilSearch(idArtikel, judul, kategori) {
        const hasilCari = document.getElementById("hasilCari");
        if (hasilCari) hasilCari.classList.add("hidden");

        hilangkanBorderMerah();
        simpanKeRiwayat(judul);

        let dataObj = databaseSearch.find(item => String(item.id) === String(idArtikel));

        if (!dataObj) {
            const cleanTitle = judul.toLowerCase().replace(/\s+/g, ' ').trim();
            dataObj = databaseSearch.find(item => item.judul.toLowerCase().replace(/\s+/g, ' ').trim() === cleanTitle);
        }

        const targetType = dataObj ? dataObj.target_type : (kategori || '').toLowerCase().trim();

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

        } else if (targetType.includes("satua")) {
            if (typeof showSatua === 'function') showSatua();
            scrollToElement("sectionSatua");

            setTimeout(() => {
                const searchJudul = judul.trim().toLowerCase();
                const cards = document.querySelectorAll('#sectionSatua [data-nama]');
                let matchedCard = null;

                cards.forEach(card => {
                    const cardTitle = card.dataset.nama ? card.dataset.nama.trim().toLowerCase() : '';
                    if (cardTitle === searchJudul || cardTitle.includes(searchJudul)) {
                        matchedCard = card;
                    }
                });

                if (matchedCard && typeof openSatuaCard === 'function') {
                    openSatuaCard(matchedCard);
                    setTimeout(() => {
                        const satuaIsiEl = document.getElementById("satuaIsi");
                        if (satuaIsiEl && (satuaIsiEl.innerText === "" || satuaIsiEl.innerText === "-")) {
                            if (matchedCard.dataset.isi && matchedCard.dataset.isi !== "-") {
                                satuaIsiEl.innerText = matchedCard.dataset.isi;
                            } else if (dataObj && dataObj.isi) {
                                satuaIsiEl.innerText = dataObj.isi;
                            }
                        }
                    }, 50);

                } else if (typeof openSatuaCard === 'function') {
                    let isiTeks = dataObj ? dataObj.isi : '';
                    
                    const dummyCard = document.createElement('div');
                    dummyCard.dataset.nama = dataObj ? dataObj.judul : judul;
                    dummyCard.dataset.latin = dataObj ? dataObj.latin : '';
                    dummyCard.dataset.img = dataObj ? dataObj.gambar : "{{ asset('images/default.jpg') }}";
                    dummyCard.dataset.isi = (isiTeks && isiTeks !== '-') ? isiTeks : (judul + ' adalah satua Bali tradisional.');
                    dummyCard.dataset.tokoh = dataObj ? dataObj.tokoh : '-';
                    dummyCard.dataset.alur = dataObj ? dataObj.alur : '-';
                    dummyCard.dataset.moral = dataObj ? dataObj.moral : '-';
                    dummyCard.dataset.filosofi = dataObj ? dataObj.filosofi : '-';

                    openSatuaCard(dummyCard);
                }
            }, 250);

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

        } else if (targetType.includes("cecimpedan")) {
            scrollToElement("cecimpedan", "sectionCecimpedan");
            setTimeout(() => {
                if (typeof window.openCecimpedanById === 'function') {
                    window.openCecimpedanById(dataObj ? dataObj.raw_id : '', judul);
                }
            }, 200);

        } else if (targetType.includes("filsafat")) {
            scrollToElement("sectionFilsafat", "jenis-filsafat");
            setTimeout(() => {
                if (dataObj && dataObj.raw_id !== undefined) {
                    openFilsafat(dataObj.raw_id);
                } else {
                    const matchedKey = Object.keys(DB_FILSAFAT).find(key => 
                        DB_FILSAFAT[key].judul.toLowerCase() === judul.toLowerCase()
                    );
                    if (matchedKey) {
                        openFilsafat(matchedKey);
                    }
                }
            }, 300);

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
</script>