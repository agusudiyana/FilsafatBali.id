<!-- Swiper JS Library -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- ========================================== -->
<!-- CSS ANIMASI GAMBAR & GARIS TAB EXCLUSIVE   -->
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
<!-- SCRIPT LOGIC UTAMA GABUNGAN                -->
<!-- ========================================== -->
<script>
    // Ambil status login user untuk fitur Bookmark
    const USER_LOGGED_IN = @json(auth()->check());

    // Helper Unlocking Scroll
    function unlockGlobalScroll() {
        document.body.style.removeProperty("overflow");
        document.body.style.overflow = "auto";
        document.documentElement.style.removeProperty("overflow");
        document.documentElement.style.overflow = "auto";
    }

    function lockGlobalScroll() {
        document.body.style.overflow = "hidden";
        document.documentElement.style.overflow = "hidden";
    }

    // ==========================================
    // LOGIKA RIWAYAT PENCARIAN (FIFO MAX 6 ITEM)
    // ==========================================
    var DEFAULT_KEYWORDS = [
        "TRI HITA KARANA", 
        "NGABEN", 
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
    // 0. FITUR ARSIP / BOOKMARK
    // ==========================================
    function handleBookmarkAction(evt, element, title, type) {
        if (evt) {
            evt.preventDefault();
            evt.stopPropagation();
            if (evt.stopImmediatePropagation) {
                evt.stopImmediatePropagation();
            }
        }

        if (!USER_LOGGED_IN) {
            alert("Silakan login terlebih dahulu untuk menyimpan " + type + " ini ke arsip!");
            window.location.href = "{{ route('login') }}";
            return false;
        }

        const isSaved = element.getAttribute('data-saved') === 'true';
        const icon = element.querySelector('svg') || element.querySelector('i');

        if (isSaved) {
            element.setAttribute('data-saved', 'false');
            element.setAttribute('title', 'Simpan ke Arsip');
            if (icon) {
                icon.style.fill = 'none';
                icon.style.color = '#8F7A61';
            }
        } else {
            element.setAttribute('data-saved', 'true');
            element.setAttribute('title', 'Batal Simpan');
            if (icon) {
                icon.style.fill = '#C58A3C';
                icon.style.color = '#C58A3C';
            }
        }

        let targetHash = '#sectionSatua';
        if (type.toLowerCase().includes('istilah')) targetHash = '#sectionIstilah';
        if (type.toLowerCase().includes('artikel')) targetHash = '#artikel';

        const itemUrl = window.location.href.split('#')[0] + '?open=' + encodeURIComponent(title) + targetHash;

        const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : '';

        fetch("{{ route('pengguna.arsip.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    item_title: title,
                    item_type: type,
                    item_url: itemUrl
                })
            })
            .then(response => response.json())
            .then(data => {
                if (isSaved && window.location.pathname.includes('/arsip')) {
                    const cardElement = element.closest('.group');
                    if (cardElement) {
                        cardElement.style.transition = 'all 0.4s ease';
                        cardElement.style.opacity = '0';
                        cardElement.style.transform = 'scale(0.9)';
                        setTimeout(() => cardElement.remove(), 400);
                    }
                }
            })
            .catch(err => {
                console.error('Terjadi kesalahan saat memperbarui arsip:', err);
            });

        return false;
    }

    // ==========================================
    // 1. INITIALIZATION & LISTENERS
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

        const overlayFilosofi = document.getElementById("overlayFilosofi");
        if (overlayFilosofi) {
            overlayFilosofi.addEventListener("click", function(e) {
                if (e.target === overlayFilosofi) closeFilosofi();
            });
        }

        const overlayBarat = document.getElementById("overlayBarat");
        if (overlayBarat) {
            overlayBarat.addEventListener("click", function(e) {
                if (e.target === this) closeBarat();
            });
        }

        const overlayAjaran = document.getElementById("overlayAjaran");
        if (overlayAjaran) {
            overlayAjaran.addEventListener("click", function(e) {
                if (e.target === overlayAjaran) closeAjaran();
            });
        }

        const overlayArtikel = document.getElementById("overlayArtikel");
        if (overlayArtikel) {
            overlayArtikel.addEventListener("click", function(e) {
                if (e.target === overlayArtikel) closeDetailArtikel();
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

        if (typeof changeSlide === 'function') changeSlide(1);
        if (typeof startAutoSlide === 'function') startAutoSlide();

        // ==========================================
        // FITUR OTOMATIS BUKA POP-UP / MODAL DARI NOTIFIKASI
        // ==========================================
        const urlParams = new URLSearchParams(window.location.search);
        const openModalId = urlParams.get('open_modal');
        const modalType   = urlParams.get('type');

        if (openModalId) {
            setTimeout(function() {
                // 1. KATEGORI ARTIKEL / AJARAN
                if (modalType === 'artikel' || modalType === 'ajaran') {
                    scrollToTarget("artikel");
                    openDetailArtikel(openModalId);
                } 
                // 2. KATEGORI SATUA BALI
                else if (modalType === 'satua') {
                    if (typeof showSatua === 'function') showSatua();
                    scrollToTarget("sectionSatua");
                    const cardSatua = document.querySelector(`#sectionSatua [data-id="${openModalId}"]`) || 
                                      document.querySelector(`#sectionSatua [data-nama]`);
                    if (cardSatua && typeof openSatuaCard === 'function') {
                        openSatuaCard(cardSatua);
                    }
                } 
                // 3. KATEGORI CECIMPEDAN
                else if (modalType === 'cecimpedan') {
                    scrollToTarget("cecimpedan");
                    if (typeof toggleCard === 'function') toggleCard(1);
                } 
                // 4. KATEGORI ISTILAH BALI
                else if (modalType === 'istilah') {
                    if (typeof showIstilah === 'function') showIstilah();
                    scrollToTarget("sectionIstilah");
                    const itemIstilah = document.querySelector("#listIstilahContainer .item-istilah");
                    if (itemIstilah) itemIstilah.click();
                }
                // 5. KATEGORI FILSAFAT
                else if (modalType === 'filsafat') {
                    scrollToTarget("filsafat");
                    if (typeof openFilsafat === 'function') openFilsafat("barat");
                }
            }, 600);
        }
    });

    // ==========================================
    // 2. NAVBAR SCROLL EFFECT
    // ==========================================
    const navbar = document.getElementById("navbar");
    window.addEventListener("scroll", function() {
        if (!navbar) return;
        if (window.scrollY > 30) {
            navbar.style.backgroundColor = "#F7F0E7";
            navbar.style.boxShadow = "0 4px 15px rgba(0,0,0,.10)";
            navbar.style.paddingTop = "10px";
            navbar.style.paddingBottom = "10px";
        } else {
            navbar.style.backgroundColor = "transparent";
            navbar.style.boxShadow = "none";
            navbar.style.paddingTop = "20px";
            navbar.style.paddingBottom = "20px";
        }
    });

    // ==========================================
    // 3. SWIPER SLIDER INITIALIZATION
    // ==========================================
    if (document.querySelector(".mySwiper")) {
        const swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            speed: 800,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    }

    // ==========================================
    // 4. DATABASE SEARCH (MAPPING UNIK VIA RAW_ID)
    // ==========================================
    function filterArtikel(kategori) {
        const allButtons = document.querySelectorAll('#artikel button[id^="btn-"], .filter-tab-btn, .tab-btn');
        allButtons.forEach(function(btn) {
            btn.classList.remove("tab-active");
        });

        const activeBtn = document.getElementById("btn-" + kategori);
        if (activeBtn) activeBtn.classList.add("tab-active");

        const cards = document.querySelectorAll(".card-artikel");
        cards.forEach(function(card) {
            card.classList.remove("card-appear-anim");

            if (kategori === "semua" || card.classList.contains(kategori)) {
                card.style.display = "flex";
                void card.offsetWidth;
                card.classList.add("card-appear-anim");
            } else {
                card.style.display = "none";
            }
        });
    }

    const databaseSearch = [
        @if(isset($satuas))
            @foreach($satuas as $s)
                {
                    id: @json("satua_" . $s->id),
                    raw_id: @json($s->id),
                    judul: @json($s->judul ?? $s->nama ?? $s->judul_satua ?? $s->title ?? 'Satua Bali'),
                    kategori: 'SATUA BALI',
                    target_type: 'satua',
                    penulis: @json($s->penulis ?? $s->pengarang ?? ($s->user->name ?? 'Masyarakat Bali'))
                },
            @endforeach
        @endif

        @if(isset($ajarans))
            @foreach($ajarans as $aj)
                {
                    id: @json("ajaran_" . $aj->id),
                    raw_id: @json($aj->id),
                    judul: @json($aj->judul ?? $aj->nama ?? $aj->title ?? 'Ajaran Tertua'),
                    kategori: 'AJARAN',
                    target_type: 'ajaran',
                    penulis: @json($aj->penulis ?? ($aj->user->name ?? 'Tetua Bali'))
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
                    judul: @json($a->judul ?? $a->title ?? 'Artikel'),
                    kategori: @json(strtoupper($a->kategori ?? 'AJARAN TETUA')),
                    target_type: 'artikel',
                    penulis: @json($a->penulis ?? ($a->user->name ?? 'Tim Balinesia')),
                    tanggal: @json(strtoupper($tgl)),
                    isi: @json($a->isi ?? ($a->deskripsi ?? ($a->konten ?? ''))),
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
                    judul: @json($c->judul ?? $c->pertanyaan ?? $c->nama ?? 'Cecimpedan'),
                    kategori: 'CECIMPEDAN',
                    target_type: 'cecimpedan',
                    penulis: @json($c->penulis ?? ($c->user->name ?? 'Anonim'))
                },
            @endforeach
        @endif

        @if(isset($istilahs))
            @foreach($istilahs as $i)
                {
                    id: @json("istilah_" . $i->id),
                    raw_id: @json($i->id),
                    judul: @json($i->istilah ?? $i->judul ?? $i->nama ?? 'Istilah Bali'),
                    kategori: 'ISTILAH BALI',
                    target_type: 'istilah',
                    penulis: @json($i->penulis ?? ($i->user->name ?? 'Budayawan'))
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
                    penulis: @json($f->penulis ?? ($f->user->name ?? 'Filsuf'))
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

    function scrollToTarget(targetId) {
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }
    }

    // ==========================================
    // LOGIKA PENCARIAN & DIRECT OPEN SLIDE-OVER
    // ==========================================
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
            String(item.judul).toLowerCase().includes(query) ||
            String(item.kategori).toLowerCase().includes(query) ||
            String(item.penulis).toLowerCase().includes(query)
        );

        if (results.length > 0) {
            if (hasilCari) {
                hasilCari.classList.remove("hidden");
                hasilCari.innerHTML = results.map((item) => `
                    <div onclick="pilihHasilSearchById('${item.id}')" class="flex items-center gap-4 px-6 py-4 hover:bg-[#F0E6D8] transition duration-200 cursor-pointer text-left border-b border-[#EADCC9]">
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
                        Tidak ada hasil ditemukan di database untuk "<span class="font-semibold">${keyword}</span>"
                    </div>
                `;
            }
        }
    }

    function clearSearch() {
        const input = document.getElementById("searchInput");
        const hasilCari = document.getElementById("hasilCari");
        const btnClear = document.getElementById("btnClearSearch");

        if (input) {
            input.value = "";
            input.blur();
        }

        if (hasilCari) hasilCari.classList.add("hidden");
        if (btnClear) btnClear.classList.add("hidden");

        hilangkanBorderMerah();
    }

    // ==========================================
    // SELEKSI PENCARIAN PRESISI DENGAN ID UNIK
    // ==========================================
    function pilihHasilSearchById(uniqueId) {
        const hasilCari = document.getElementById("hasilCari");
        if (hasilCari) hasilCari.classList.add("hidden");
        hilangkanBorderMerah();

        const itemData = databaseSearch.find(item => String(item.id) === String(uniqueId));
        if (!itemData) return;

        simpanKeRiwayat(itemData.judul);

        const targetType = (itemData.target_type || itemData.kategori || '').toLowerCase().trim();

        // 1. KATEGORI AJARAN TETUA (SLIDER SLIDE)
        if (targetType.includes("ajaran")) {
            scrollToTarget("ajaran");
            setTimeout(() => {
                if (typeof openAjaran === 'function') {
                    openAjaran(itemData.raw_id || itemData.judul);
                }
            }, 300);

        // 2. KATEGORI SATUA BALI
        } else if (targetType.includes("satua")) {
            if (typeof showSatua === 'function') showSatua();
            scrollToTarget("sectionSatua");
            setTimeout(() => {
                const cardsSatua = document.querySelectorAll('#sectionSatua [data-nama]');
                let targetCard = null;
                cardsSatua.forEach(card => {
                    const dJudul = card.dataset.nama ? card.dataset.nama.toLowerCase() : '';
                    if (dJudul.includes(itemData.judul.toLowerCase())) targetCard = card;
                });
                if (targetCard && typeof openSatuaCard === 'function') openSatuaCard(targetCard);
            }, 300);

        // 3. KATEGORI ISTILAH BALI
        } else if (targetType.includes("istilah")) {
            if (typeof showIstilah === 'function') showIstilah();
            scrollToTarget("sectionIstilah");
            setTimeout(() => {
                const itemsIstilah = document.querySelectorAll("#listIstilahContainer .item-istilah");
                itemsIstilah.forEach(item => {
                    if (item.innerText.toLowerCase().includes(itemData.judul.toLowerCase())) {
                        const clickArea = item.querySelector('[onclick*="openIstilah"]') || item;
                        clickArea.click();
                    }
                });
            }, 300);

        // 4. KATEGORI CECIMPEDAN
        } else if (targetType.includes("cecimpedan")) {
            scrollToTarget("cecimpedan");
            setTimeout(() => {
                if (typeof toggleCard === 'function') toggleCard(1);
            }, 300);

        // 5. KATEGORI FILSAFAT
        } else if (targetType.includes("filsafat")) {
            scrollToTarget("filsafat");
            setTimeout(() => {
                if (typeof openFilsafat === 'function') openFilsafat("barat");
            }, 300);

        // 6. ARTIKEL UMUM
        } else {
            scrollToTarget("artikel");
            setTimeout(() => {
                if (typeof openDetailArtikel === 'function') openDetailArtikel(itemData.raw_id);
            }, 300);
        }
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

    // ==========================================
    // 5. HELPER ALIAS UNTUK BUKA/TUTUP ARTIKEL
    // ==========================================
    function closeDetailArtikel() { 
        if (typeof closeModalArtikelGlobal === 'function') {
            closeModalArtikelGlobal();
        } 
    }

    function openDetailArtikel(id) {
        const cards = document.querySelectorAll('.card-artikel');
        let targetCard = null;

        cards.forEach(card => {
            if (card.dataset.id == id) targetCard = card;
        });

        if (targetCard && typeof openModalForCard === 'function') {
            openModalForCard(targetCard);
        }
    }

    // ==========================================
    // 6. TOGGLE SATUA & ISTILAH BALI
    // ==========================================
    function showSatua() {
        const secSatua = document.getElementById("sectionSatua");
        const secIstilah = document.getElementById("sectionIstilah");
        if (secSatua) secSatua.classList.remove("hidden");
        if (secIstilah) secIstilah.classList.add("hidden");

        const btnsSatua = document.querySelectorAll("#btnSatua");
        const btnsIstilah = document.querySelectorAll("#btnIstilah");
        
        btnsSatua.forEach(b => b.className = "w-36 md:w-40 py-3 bg-[#C58A3C] text-white uppercase tracking-[2px] text-xs font-semibold text-center shrink-0 transition-all");
        btnsIstilah.forEach(b => b.className = "w-36 md:w-40 py-3 bg-transparent text-[#C58A3C] uppercase tracking-[2px] text-xs font-semibold text-center shrink-0 transition-all");
    }

    function showIstilah() {
        const secSatua = document.getElementById("sectionSatua");
        const secIstilah = document.getElementById("sectionIstilah");
        if (secSatua) secSatua.classList.add("hidden");
        if (secIstilah) secIstilah.classList.remove("hidden");

        const btnsSatua = document.querySelectorAll("#btnSatua");
        const btnsIstilah = document.querySelectorAll("#btnIstilah");

        btnsIstilah.forEach(b => b.className = "w-36 md:w-40 py-3 bg-[#C58A3C] text-white uppercase tracking-[2px] text-xs font-semibold text-center shrink-0 transition-all");
        btnsSatua.forEach(b => b.className = "w-36 md:w-40 py-3 bg-transparent text-[#C58A3C] uppercase tracking-[2px] text-xs font-semibold text-center shrink-0 transition-all");
    }

    // OPEN DRAWER ISTILAH
    function openIstilah(judul, kategori, deskripsi, sejarah, contoh, padanan, konteks) {
        if (document.getElementById("detailTitle")) document.getElementById("detailTitle").innerHTML = judul || '-';
        if (document.getElementById("detailKategori")) document.getElementById("detailKategori").innerHTML = kategori || 'Umum';
        if (document.getElementById("detailDesc")) document.getElementById("detailDesc").innerHTML = deskripsi || '-';
        if (document.getElementById("detailSejarah")) document.getElementById("detailSejarah").innerHTML = sejarah || '-';
        if (document.getElementById("detailContoh")) document.getElementById("detailContoh").innerHTML = contoh || '-';
        if (document.getElementById("detailPadanan")) document.getElementById("detailPadanan").innerHTML = padanan || '-';
        if (document.getElementById("detailKonteks")) document.getElementById("detailKonteks").innerHTML = konteks || '-';

        lockGlobalScroll();

        const overlay = document.getElementById("overlay");
        const detailPanel = document.getElementById("detailPanel");
        if (overlay) overlay.classList.remove("hidden");
        if (detailPanel) detailPanel.classList.remove("translate-x-full");
    }

    function closeDetail() {
        const overlay = document.getElementById("overlay");
        const detailPanel = document.getElementById("detailPanel");
        
        if (detailPanel) detailPanel.classList.add("translate-x-full");

        unlockGlobalScroll();

        setTimeout(() => {
            if (overlay) overlay.classList.add("hidden");
        }, 300);
    }

    // OPEN DRAWER SATUA
    function openSatuaCard(element) {
        if (!element) return;
        const card = element.closest('[data-nama]') || element;
        const ds = card.dataset;

        if (!ds || !ds.nama) return;

        if (document.getElementById("satuaNama")) document.getElementById("satuaNama").innerText = ds.nama || '-';
        if (document.getElementById("satuaLatin")) document.getElementById("satuaLatin").innerText = ds.latin || '';
        if (document.getElementById("satuaImage")) document.getElementById("satuaImage").src = ds.img || '';

        if (document.getElementById("satuaRingkasan")) document.getElementById("satuaRingkasan").innerText = ds.ringkasan || '-';
        if (document.getElementById("satuaTokoh")) document.getElementById("satuaTokoh").innerText = ds.tokoh || '-';
        if (document.getElementById("satuaAlur")) document.getElementById("satuaAlur").innerText = ds.alur || '-';
        if (document.getElementById("satuaMoral")) document.getElementById("satuaMoral").innerText = ds.moral || '-';
        if (document.getElementById("satuaFilosofi")) document.getElementById("satuaFilosofi").innerText = ds.filosofi || '-';

        lockGlobalScroll();

        const overlay = document.getElementById("overlaySatua");
        const panel = document.getElementById("panelSatua");
        if (overlay) overlay.classList.remove("hidden");
        setTimeout(() => {
            if (panel) panel.classList.remove("translate-x-full");
        }, 10);
    }

    function closeSatua() {
        const overlay = document.getElementById("overlaySatua");
        const panel = document.getElementById("panelSatua");

        if (panel) panel.classList.add("translate-x-full");

        unlockGlobalScroll();

        setTimeout(() => {
            if (overlay) overlay.classList.add("hidden");
        }, 300);
    }

    // ==========================================
    // 7. SECTION CECIMPEDAN
    // ==========================================
    let isFilosofiOpen = false;
    let activeCards = { 1: false, 2: false, 3: false, 4: false, 5: false };

    function toggleCard(no) {
        const detail = document.getElementById(`detailCard${no}`);
        const btn = document.getElementById(`btnJawab${no}`);

        if (!detail || !btn) return;

        if (activeCards[no]) {
            detail.classList.remove("max-h-[1000px]", "opacity-100", "pt-6");
            detail.classList.add("max-h-0", "opacity-0");
            hideJawaban(no);
            btn.innerHTML = `<i data-feather="chevron-right" class="w-4 h-4"></i> Jawab Teka-Teki`;
            activeCards[no] = false;
        } else {
            detail.classList.remove("max-h-0", "opacity-0");
            detail.classList.add("max-h-[1000px]", "opacity-100", "pt-6");
            btn.innerHTML = `<i data-feather="chevron-down" class="w-4 h-4"></i> Tutup`;
            activeCards[no] = true;
        }
        if (typeof feather !== 'undefined') feather.replace();
    }

    function showJawaban(no) {
        const jawaban = document.getElementById(`jawabanCard${no}`);
        const btnShow = document.getElementById(`btnShowJawaban${no}`);
        const btnHide = document.getElementById(`btnHideJawaban${no}`);

        if (jawaban) jawaban.classList.remove("hidden");
        if (btnShow) btnShow.classList.add("hidden");
        if (btnHide) btnHide.classList.remove("hidden");
        if (typeof feather !== 'undefined') feather.replace();
    }

    function hideJawaban(no) {
        const jawaban = document.getElementById(`jawabanCard${no}`);
        const btnShow = document.getElementById(`btnShowJawaban${no}`);
        const btnHide = document.getElementById(`btnHideJawaban${no}`);

        if (jawaban) jawaban.classList.add("hidden");
        if (btnShow) btnShow.classList.remove("hidden");
        if (btnHide) btnHide.classList.add("hidden");
        if (typeof feather !== 'undefined') feather.replace();
    }

    const wrapper = document.getElementById("sliderWrapper");
    let autoSlideTimer;
    let isUserInteracting = false;
    let resumeTimeout;

    function smoothScrollTo(element, targetPosition, duration) {
        const startPosition = element.scrollLeft;
        const distance = targetPosition - startPosition;
        let startTime = null;

        function easeOutQuart(t) {
            return 1 - (--t) * t * t * t;
        }

        function animation(currentTime) {
            if (startTime === null) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            const progress = Math.min(timeElapsed / duration, 1);
            element.scrollLeft = startPosition + (distance * easeOutQuart(progress));

            if (timeElapsed < duration) {
                requestAnimationFrame(animation);
            }
        }
        requestAnimationFrame(animation);
    }

    function startAutoSlide() {
        clearInterval(autoSlideTimer);
        autoSlideTimer = setInterval(() => {
            const isAnyCardOpen = Object.values(activeCards).some(val => val === true);
            if (isUserInteracting || isAnyCardOpen || isFilosofiOpen || !wrapper) return;

            const firstCard = wrapper.querySelector('.cardCecimpedan');
            if (!firstCard) return;

            const cardWidth = firstCard.offsetWidth + 32;
            const maxScrollLeft = wrapper.scrollWidth - wrapper.clientWidth;

            let targetScroll = wrapper.scrollLeft + cardWidth;
            if (wrapper.scrollLeft >= maxScrollLeft - 10) {
                targetScroll = 0;
            }

            smoothScrollTo(wrapper, targetScroll, 600);
        }, 2500);
    }

    function pauseSlide() { isUserInteracting = true; }
    function resumeSlide() { isUserInteracting = false; startAutoSlide(); }

    if (wrapper) {
        wrapper.addEventListener("mouseenter", pauseSlide);
        wrapper.addEventListener("mouseleave", resumeSlide);
        wrapper.addEventListener("touchstart", pauseSlide, { passive: true });
        wrapper.addEventListener("touchend", resumeSlide);
        wrapper.addEventListener("scroll", () => {
            pauseSlide();
            clearTimeout(resumeTimeout);
            resumeTimeout = setTimeout(resumeSlide, 2000);
        }, { passive: true });
    }

    // ==========================================
    // 8. PANEL FILSAFAT
    // ==========================================
    function openFilsafat(jenis) {
        const overlay = document.getElementById("overlayBarat");
        const panel = document.getElementById("panelBarat");

        lockGlobalScroll();

        if (overlay) overlay.classList.remove("hidden");
        setTimeout(function() {
            if (panel) panel.classList.remove("translate-x-full");
        }, 10);

        if (jenis === "barat") {
            if (document.getElementById("judulFilsafat")) document.getElementById("judulFilsafat").innerHTML = "Filsafat Barat";
            if (document.getElementById("ringkasanFilsafat")) document.getElementById("ringkasanFilsafat").innerHTML = "Filsafat Barat berkembang sejak Yunani Kuno dan menjadi dasar lahirnya ilmu pengetahuan modern, logika, etika, politik, serta pemikiran rasional.";
            if (document.getElementById("asalFilsafat")) document.getElementById("asalFilsafat").innerHTML = "Yunani Kuno";
            if (document.getElementById("fokusFilsafat")) document.getElementById("fokusFilsafat").innerHTML = "Logika & Rasionalitas";
        }
        if (typeof feather !== 'undefined') feather.replace();
    }

    function closeBarat() {
        const panel = document.getElementById("panelBarat");
        const overlay = document.getElementById("overlayBarat");

        if (panel) panel.classList.add("translate-x-full");

        unlockGlobalScroll();

        setTimeout(function() {
            if (overlay) overlay.classList.add("hidden");
        }, 300);
    }

    // ==========================================
    // 9. LIVE SEARCH SATUA BALI & ISTILAH BALI
    // ==========================================
    function filterSatuaCards(keyword) {
        const query = keyword.trim().toLowerCase();
        const btnClear = document.getElementById("btnClearSearchSatua");

        if (btnClear) {
            if (query.length > 0) btnClear.classList.remove("hidden");
            else btnClear.classList.add("hidden");
        }

        const cards = document.querySelectorAll("#sectionSatua .grid > div");
        cards.forEach(card => {
            const textContent = card.innerText.toLowerCase();
            if (textContent.includes(query)) card.style.display = "block";
            else card.style.display = "none";
        });
    }

    function clearSearchSatua() {
        const input = document.getElementById("searchSatuaInput");
        if (input) {
            input.value = "";
            filterSatuaCards("");
            input.focus();
        }
    }

    function filterIstilahList(keyword) {
        const query = keyword.trim().toLowerCase();
        const btnClear = document.getElementById("btnClearSearchIstilah");

        if (btnClear) {
            if (query.length > 0) btnClear.classList.remove("hidden");
            else btnClear.classList.add("hidden");
        }

        const items = document.querySelectorAll("#listIstilahContainer .item-istilah");
        items.forEach(item => {
            const textContent = item.innerText.toLowerCase();
            if (textContent.includes(query)) item.style.display = "grid";
            else item.style.display = "none";
        });
    }

    function clearSearchIstilah() {
        const input = document.getElementById("searchIstilahInput");
        if (input) {
            input.value = "";
            filterIstilahList("");
            input.focus();
        }
    }
</script>