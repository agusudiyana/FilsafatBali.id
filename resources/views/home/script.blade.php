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
            alert("Silakan login terlebih dahulu untuk menyimpan satua ini ke arsip!");
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
                    item_url: window.location.href.split('#')[0] + '#sectionSatua'
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
    // 1. INITIALIZATION & GLOBAL EVENT LISTENERS
    // ==========================================
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }

        const overlayDetail = document.getElementById("overlay");
        if (overlayDetail) {
            overlayDetail.onclick = closeDetail;
        }

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

        // AMAN: Cek keberadaan fungsi sebelum dipanggil
        if (typeof changeSlide === 'function') {
            changeSlide(1);
        }
        if (typeof startAutoSlide === 'function') {
            startAutoSlide();
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
    // 4. FILTER ARTIKEL & FITUR LIVE SEARCH
    // ==========================================
    function filterArtikel(kategori) {
        const allButtons = document.querySelectorAll('#artikel button[id^="btn-"], .filter-tab-btn, .tab-btn');
        allButtons.forEach(function(btn) {
            btn.classList.remove("tab-active");
        });

        const activeBtn = document.getElementById("btn-" + kategori);
        if (activeBtn) {
            activeBtn.classList.add("tab-active");
        }

        const cards = document.querySelectorAll(".card-artikel");
        cards.forEach(function(card) {
            card.classList.remove("card-appear-anim");

            if (kategori === "semua" || card.classList.contains(kategori)) {
                card.style.display = "block";
                void card.offsetWidth;
                card.classList.add("card-appear-anim");
            } else {
                card.style.display = "none";
            }
        });
    }

    const databaseSearch = [{
            id: 1,
            judul: "Tri Hita Karana",
            kategori: "AJARAN",
            penulis: "I Wayan Sadia"
        },
        {
            id: 2,
            judul: "Tat Twam Asi",
            kategori: "AJARAN",
            penulis: "Ida Bagus Mantra"
        },
        {
            id: 3,
            judul: "I Siap Selem",
            kategori: "SATUA BALI",
            penulis: "Ketut Suardana"
        },
        {
            id: 4,
            judul: "Sor Singgih Basa Bali",
            kategori: "ISTILAH BALI",
            penulis: "Ida Bagus Komang"
        },
        {
            id: 5,
            judul: "Rwa Bhineda",
            kategori: "AJARAN",
            penulis: "Gede Sukarma"
        },
        {
            id: 6,
            judul: "Cecimpedan Bali",
            kategori: "CECIMPEDAN",
            penulis: "Made Sudiarta"
        },
        {
            id: 7,
            judul: "Ngaben: Upacara Pitra Yadnya",
            kategori: "ISTILAH BALI",
            penulis: "I Putu Gede"
        },
        {
            id: 8,
            judul: "Taksu: Pancaran Karisma Budaya Bali",
            kategori: "ISTILAH BALI",
            penulis: "I Nyoman Suartha"
        },
        {
            id: 9,
            judul: "Subak: Demokrasi Air dalam Peradaban Bali",
            kategori: "AJARAN TETUA",
            penulis: "Ni Luh Putu Ariani"
        }
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

        results.sort((a, b) => {
            const aTitleMatch = a.judul.toLowerCase().startsWith(query);
            const bTitleMatch = b.judul.toLowerCase().startsWith(query);
            if (aTitleMatch && !bTitleMatch) return -1;
            if (!aTitleMatch && bTitleMatch) return 1;
            return 0;
        });

        if (results.length > 0) {
            if (hasilCari) {
                hasilCari.classList.remove("hidden");
                hasilCari.innerHTML = results.map(item => `
                    <div onclick="pilihHasilSearch(${item.id}, '${item.judul.toLowerCase()}', '${item.kategori.toLowerCase()}')" class="flex items-center gap-4 px-6 py-4 hover:bg-[#F0E6D8] transition duration-200 cursor-pointer text-left">
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

        if (input) {
            input.value = "";
            input.blur();
        }

        if (hasilCari) hasilCari.classList.add("hidden");
        if (btnClear) btnClear.classList.add("hidden");

        hilangkanBorderMerah();
    }

    function pilihHasilSearch(idArtikel, judul, kategori) {
        const hasilCari = document.getElementById("hasilCari");
        if (hasilCari) hasilCari.classList.add("hidden");

        hilangkanBorderMerah();

        if (judul.includes("tri hita karana")) {
            if (typeof changeSlide === 'function') changeSlide(1);
            scrollToTarget("ajaran-tetua");
        } else if (judul.includes("i siap selem") || kategori.includes("satua")) {
            if (typeof showSatua === 'function') showSatua();
            scrollToTarget("sectionSatua");
        } else if (judul.includes("ngaben") || judul.includes("taksu") || judul.includes("subak") || kategori.includes(
                "istilah")) {
            if (typeof showIstilah === 'function') showIstilah();
            scrollToTarget("sectionIstilah");
        } else if (kategori.includes("tradisi")) {
            if (typeof filterArtikel === 'function') filterArtikel('tradisi');
            scrollToTarget("artikel");
        } else if (kategori.includes("ajaran")) {
            if (typeof filterArtikel === 'function') filterArtikel('ajaran');
            scrollToTarget("artikel");
        } else {
            scrollToTarget("artikel");
            if (typeof filterArtikel === 'function') filterArtikel('semua');
        }
    }

    function cariKeyword(event, keyword) {
        if (event) {
            event.stopPropagation();
            event.preventDefault();
        }

        const searchInput = document.getElementById("searchInput");
        if (searchInput) {
            searchInput.value = keyword;
            liveSearch(keyword);
            searchInput.focus();
        }

        const keyLower = keyword.toLowerCase();

        if (keyLower.includes("tri hita karana")) {
            if (typeof changeSlide === 'function') changeSlide(1);
            scrollToTarget("ajaran-tetua");
        } else if (keyLower.includes("i siap selem")) {
            if (typeof showSatua === 'function') showSatua();
            scrollToTarget("sectionSatua");
        } else if (keyLower.includes("ngaben") || keyLower.includes("taksu") || keyLower.includes("subak")) {
            if (typeof showIstilah === 'function') showIstilah();
            scrollToTarget("sectionIstilah");
        } else if (keyLower.includes("rwa bhineda")) {
            if (typeof filterArtikel === 'function') filterArtikel('ajaran');
            scrollToTarget("artikel");
        } else {
            scrollToTarget("artikel");
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
    // 5. DATA & MODAL DETAIL BACA ARTIKEL PILIHAN
    // ==========================================
    const dataArtikelPilihan = {
        1: {
            title: "Filosofi Subak: Demokrasi Air dalam Peradaban Bali",
            kategori: "AJARAN TETUA",
            bgKategori: "bg-[#992B20]",
            image: "{{ asset('images/subak.jpeg') }}",
            penulis: "Ni Luh Putu Ariani",
            avatar: "N",
            tgl: "12 JUNI 2025",
            waktu: "8 MENIT",
            isi: `<p>Subak adalah sistem irigasi pertanian yang telah ada di Bali selama lebih dari seribu tahun. Lebih dari sekedar teknik pengairan, Subak adalah lembaga sosial, spiritual, dan demokratis yang mengatur penggunaan air di antara para petani dengan cara yang adil dan berkelanjutan.</p>`,
            kesimpulan: "Subak adalah bukti bahwa kearifan lokal Bali tidak hanya indah secara filosofis, tetapi juga efektif secara praktis. UNESCO mengakuisisinya sebagai Warisan Budaya Dunia pada tahun 2012."
        },
        2: {
            title: "Cecimpedan Bali sebagai Media Pendidikan Karakter Anak",
            kategori: "CECIMPEDAN",
            bgKategori: "bg-[#D9A441]",
            image: "{{ asset('images/cecimpedan.jpeg') }}",
            penulis: "I Wayan Koster",
            avatar: "W",
            tgl: "10 JUNI 2025",
            waktu: "6 MENIT",
            isi: `<p>Teka-teki tradisional Bali (Cecimpedan) bukan sekadar permainan kata sederhana untuk anak-anak. Di dalam struktur pertanyaan dan jawabannya, tersimpan nilai-nilai pemikiran kritis, pengamatan alam, dan etika dasar bermasyarakat.</p>`,
            kesimpulan: "Pelestarian cecimpedan penting untuk menjaga kemampuan nalar kritis anak berbasis kebudayaan lokal di tengah gempuran teknologi digital."
        }
    };

    function openDetailArtikel(id) {
        const data = dataArtikelPilihan[id];
        if (!data) return;

        if (document.getElementById("artTitle")) document.getElementById("artTitle").innerText = data.title;
        if (document.getElementById("artImage")) document.getElementById("artImage").src = data.image;
        if (document.getElementById("artPenulis")) document.getElementById("artPenulis").innerText = data.penulis;
        if (document.getElementById("artAvatar")) document.getElementById("artAvatar").innerText = data.avatar;
        if (document.getElementById("artMeta")) document.getElementById("artMeta").innerText =
            `${data.tgl} • ${data.waktu}`;
        if (document.getElementById("artIsi")) document.getElementById("artIsi").innerHTML = data.isi;
        if (document.getElementById("artKesimpulan")) document.getElementById("artKesimpulan").innerText = data
            .kesimpulan;

        const badge = document.getElementById("artKategoriBadge");
        if (badge) {
            badge.innerText = data.kategori;
            badge.className =
                `text-white text-[10px] tracking-[2px] uppercase font-semibold px-3 py-1.5 rounded-full ${data.bgKategori}`;
        }

        const overlay = document.getElementById("overlayArtikel");
        const panel = document.getElementById("panelArtikel");

        if (!overlay || !panel) return;

        document.body.style.overflow = "hidden";
        overlay.classList.remove("hidden");

        setTimeout(() => {
            overlay.classList.remove("opacity-0");
            panel.classList.remove("translate-x-full");
        }, 10);

        if (typeof feather !== 'undefined') feather.replace();
    }

    function closeDetailArtikel() {
        const overlay = document.getElementById("overlayArtikel");
        const panel = document.getElementById("panelArtikel");

        if (!overlay || !panel) return;

        panel.classList.add("translate-x-full");
        overlay.classList.add("opacity-0");

        setTimeout(() => {
            overlay.classList.add("hidden");
            document.body.style.overflow = "auto";
        }, 300);
    }

    // ==========================================
    // 6. TOGGLE SATUA & ISTILAH
    // ==========================================
    function showSatua() {
        const secSatua = document.getElementById("sectionSatua");
        const secIstilah = document.getElementById("sectionIstilah");
        if (secSatua) secSatua.classList.remove("hidden");
        if (secIstilah) secIstilah.classList.add("hidden");

        const btnsSatua = document.querySelectorAll("#sectionSatua #btnSatua, #sectionSatua #btnIstilah");
        btnsSatua.forEach(btn => {
            if (btn.id === "btnSatua") {
                btn.className =
                    "w-36 md:w-40 py-3 bg-[#C58A3C] text-white uppercase tracking-[2px] text-xs font-semibold text-center shrink-0 transition-all";
            } else {
                btn.className =
                    "w-36 md:w-40 py-3 bg-transparent text-[#C58A3C] uppercase tracking-[2px] text-xs font-semibold text-center shrink-0 transition-all";
            }
        });
    }

    function showIstilah() {
        const secSatua = document.getElementById("sectionSatua");
        const secIstilah = document.getElementById("sectionIstilah");
        if (secSatua) secSatua.classList.add("hidden");
        if (secIstilah) secIstilah.classList.remove("hidden");

        const btnsIstilah = document.querySelectorAll("#sectionIstilah #btnSatua, #sectionIstilah #btnIstilah");
        btnsIstilah.forEach(btn => {
            if (btn.id === "btnIstilah") {
                btn.className =
                    "w-36 md:w-40 py-3 bg-[#C58A3C] text-white uppercase tracking-[2px] text-xs font-semibold text-center shrink-0 transition-all";
            } else {
                btn.className =
                    "w-36 md:w-40 py-3 bg-transparent text-[#C58A3C] uppercase tracking-[2px] text-xs font-semibold text-center shrink-0 transition-all";
            }
        });
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
    }

    function closeDetail() {
        const overlay = document.getElementById("overlay");
        const detailPanel = document.getElementById("detailPanel");
        if (overlay) overlay.classList.add("hidden");
        if (detailPanel) detailPanel.classList.add("translate-x-full");
    }

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

    // ==========================================
    // 7. SECTION CECIMPEDAN (ACCORDION & SLIDER)
    // ==========================================
    let isFilosofiOpen = false;

    let activeCards = {
        1: false,
        2: false,
        3: false,
        4: false,
        5: false
    };

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

    function pauseSlide() {
        isUserInteracting = true;
    }

    function resumeSlide() {
        isUserInteracting = false;
        startAutoSlide();
    }

    if (wrapper) {
        wrapper.addEventListener("mouseenter", pauseSlide);
        wrapper.addEventListener("mouseleave", resumeSlide);
        wrapper.addEventListener("touchstart", pauseSlide, {
            passive: true
        });
        wrapper.addEventListener("touchend", resumeSlide);
        wrapper.addEventListener("scroll", () => {
            pauseSlide();
            clearTimeout(resumeTimeout);
            resumeTimeout = setTimeout(resumeSlide, 2000);
        }, {
            passive: true
        });
    }

    // ==========================================
    // 8. PANEL FILSAFAT (BARAT, TIMUR, MORAL, DLL)
    // ==========================================
    function openFilsafat(jenis) {
        const overlay = document.getElementById("overlayBarat");
        const panel = document.getElementById("panelBarat");

        if (overlay) overlay.classList.remove("hidden");
        setTimeout(function() {
            if (panel) panel.classList.remove("translate-x-full");
        }, 10);

        if (jenis === "barat") {
            if (document.getElementById("judulFilsafat")) document.getElementById("judulFilsafat").innerHTML =
                "Filsafat Barat";
            if (document.getElementById("ringkasanFilsafat")) document.getElementById("ringkasanFilsafat").innerHTML =
                "Filsafat Barat berkembang sejak Yunani Kuno dan menjadi dasar lahirnya ilmu pengetahuan modern, logika, etika, politik, serta pemikiran rasional.";
            if (document.getElementById("asalFilsafat")) document.getElementById("asalFilsafat").innerHTML =
                "Yunani Kuno";
            if (document.getElementById("fokusFilsafat")) document.getElementById("fokusFilsafat").innerHTML =
                "Logika & Rasionalitas";
            if (document.getElementById("tokohFilsafat")) {
                document.getElementById("tokohFilsafat").innerHTML = `
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#992B20]">Socrates</h4>
                        <p class="mt-2 text-[#675A4D] text-sm">Mengajarkan pentingnya berpikir kritis melalui dialog.</p>
                    </div>
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#992B20]">Plato</h4>
                        <p class="mt-2 text-[#675A4D] text-sm">Pendiri Akademi dan pencetus teori dunia ide.</p>
                    </div>
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#992B20]">Aristoteles</h4>
                        <p class="mt-2 text-[#675A4D] text-sm">Mengembangkan logika, etika, politik, dan ilmu alam.</p>
                    </div>
                `;
            }
            if (document.getElementById("karakteristikFilsafat")) {
                document.getElementById("karakteristikFilsafat").innerHTML = `
                    <ul class="list-disc pl-5 space-y-1 text-sm text-[#675A4D]">
                        <li>Berpikir logis dan analitis.</li>
                        <li>Argumentasi rasional mendalam.</li>
                        <li>Penggunaan metode ilmiah.</li>
                        <li>Pencarian kebenaran universal.</li>
                    </ul>
                `;
            }
            if (document.getElementById("pengaruhFilsafat")) document.getElementById("pengaruhFilsafat").innerHTML =
                "Menjadi dasar perkembangan ilmu pengetahuan, demokrasi, pendidikan, hukum, dan teknologi modern.";

        } else if (jenis === "timur") {
            if (document.getElementById("judulFilsafat")) document.getElementById("judulFilsafat").innerHTML =
                "Filsafat Timur";
            if (document.getElementById("ringkasanFilsafat")) document.getElementById("ringkasanFilsafat").innerHTML =
                "Filsafat Timur berkembang di Asia dan menekankan keseimbangan hidup, spiritualitas, serta keharmonisan manusia dengan alam.";
            if (document.getElementById("asalFilsafat")) document.getElementById("asalFilsafat").innerHTML =
                "Asia (India, Tiongkok, Jepang)";
            if (document.getElementById("fokusFilsafat")) document.getElementById("fokusFilsafat").innerHTML =
                "Spiritualitas & Keharmonisan";
            if (document.getElementById("tokohFilsafat")) {
                document.getElementById("tokohFilsafat").innerHTML = `
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#2F7D4B]">Konfusius</h4>
                        <p class="mt-2 text-[#675A4D] text-sm">Mengajarkan moralitas, etika, dan tata krama dalam kehidupan bermasyarakat.</p>
                    </div>
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#2F7D4B]">Laozi</h4>
                        <p class="mt-2 text-[#675A4D] text-sm">Pendiri Taoisme yang mengajarkan hidup menyatu dengan jalan alam (Tao).</p>
                    </div>
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#2F7D4B]">Siddhartha Gautama</h4>
                        <p class="mt-2 text-[#675A4D] text-sm">Mengajarkan jalan pencerahan dan kebebasan dari penderitaan.</p>
                    </div>
                `;
            }
            if (document.getElementById("karakteristikFilsafat")) {
                document.getElementById("karakteristikFilsafat").innerHTML = `
                    <ul class="list-disc pl-5 space-y-1 text-sm text-[#675A4D]">
                        <li>Keharmonisan hidup dengan alam.</li>
                        <li>Keseimbangan kosmis (Yin & Yang).</li>
                        <li>Kedalaman spiritualitas dan introspeksi.</li>
                        <li>Pengendalian diri dan kebijaksanaan batin.</li>
                    </ul>
                `;
            }
            if (document.getElementById("pengaruhFilsafat")) document.getElementById("pengaruhFilsafat").innerHTML =
                "Mempengaruhi budaya Asia, praktik meditasi, etika keluarga, pandangan agama, dan kearifan hidup sehari-hari.";

        } else if (jenis === "moral") {
            if (document.getElementById("judulFilsafat")) document.getElementById("judulFilsafat").innerHTML =
                "Filsafat Moral";
            if (document.getElementById("ringkasanFilsafat")) document.getElementById("ringkasanFilsafat").innerHTML =
                "Filsafat Moral (Etika) mengkaji nilai baik dan buruk, serta membimbing bagaimana manusia seharusnya bertindak secara bijaksana dan bertanggung jawab.";
            if (document.getElementById("asalFilsafat")) document.getElementById("asalFilsafat").innerHTML =
            "Universal";
            if (document.getElementById("fokusFilsafat")) document.getElementById("fokusFilsafat").innerHTML =
                "Etika & Nilai Kebaikan";
            if (document.getElementById("tokohFilsafat")) {
                document.getElementById("tokohFilsafat").innerHTML = `
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#C58A3C]">Immanuel Kant</h4>
                        <p class="mt-2 text-[#675A4D] text-sm">Mengembangkan etika deontologi (kewajiban moral mutlak).</p>
                    </div>
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#C58A3C]">John Stuart Mill</h4>
                        <p class="mt-2 text-[#675A4D] text-sm">Tokoh Utilitarianisme (tindakan terbaik memberi manfaat terbanyak).</p>
                    </div>
                `;
            }
            if (document.getElementById("karakteristikFilsafat")) {
                document.getElementById("karakteristikFilsafat").innerHTML = `
                    <ul class="list-disc pl-5 space-y-1 text-sm text-[#675A4D]">
                        <li>Penilaian tindakan baik vs buruk.</li>
                        <li>Penekanan pada etika dan integritas.</li>
                        <li>Prinsip kewajiban dan hak asasi.</li>
                        <li>Tanggung jawab moral individu.</li>
                    </ul>
                `;
            }
            if (document.getElementById("pengaruhFilsafat")) document.getElementById("pengaruhFilsafat").innerHTML =
                "Menjadi dasar hukum etika profesi, norma sosial, pendidikan karakter, dan hak asasi manusia.";

        } else if (jenis === "politik") {
            if (document.getElementById("judulFilsafat")) document.getElementById("judulFilsafat").innerHTML =
                "Filsafat Politik";
            if (document.getElementById("ringkasanFilsafat")) document.getElementById("ringkasanFilsafat").innerHTML =
                "Membahas konsep negara, kekuasaan, keadilan, hukum, serta hubungan ideal antara pemerintah dengan rakyat.";
            if (document.getElementById("asalFilsafat")) document.getElementById("asalFilsafat").innerHTML =
                "Yunani Kuno & Modern";
            if (document.getElementById("fokusFilsafat")) document.getElementById("fokusFilsafat").innerHTML =
                "Negara & Keadilan Sosial";
            if (document.getElementById("tokohFilsafat")) {
                document.getElementById("tokohFilsafat").innerHTML = `
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#305F9E]">Niccolò Machiavelli</h4>
                        <p class="mt-2 text-[#675A4D] text-sm">Pemikir realisme politik tentang kekuasaan dan negara.</p>
                    </div>
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#305F9E]">John Locke</h4>
                        <p class="mt-2 text-[#675A4D] text-sm">Pencetus teori kontrak sosial dan hak asasi individu.</p>
                    </div>
                `;
            }
            if (document.getElementById("karakteristikFilsafat")) {
                document.getElementById("karakteristikFilsafat").innerHTML = `
                    <ul class="list-disc pl-5 space-y-1 text-sm text-[#675A4D]">
                        <li>Prinsip keadilan dan hukum.</li>
                        <li>Pembagian kekuasaan negara.</li>
                        <li>Perlindungan hak-hak masyarakat.</li>
                        <li>Sistem tata kelola pemerintahan.</li>
                    </ul>
                `;
            }
            if (document.getElementById("pengaruhFilsafat")) document.getElementById("pengaruhFilsafat").innerHTML =
                "Melandasi lahirnya sistem demokrasi, konstitusi negara, hukum internasional, dan kebebasan sipil.";

        } else if (jenis === "ilmu") {
            if (document.getElementById("judulFilsafat")) document.getElementById("judulFilsafat").innerHTML =
                "Filsafat Ilmu";
            if (document.getElementById("ringkasanFilsafat")) document.getElementById("ringkasanFilsafat").innerHTML =
                "Mempelajari hakikat ilmu pengetahuan, metode ilmiah, kebenaran bukti, serta batasan kemampuan berpikir manusia.";
            if (document.getElementById("asalFilsafat")) document.getElementById("asalFilsafat").innerHTML =
                "Era Modern";
            if (document.getElementById("fokusFilsafat")) document.getElementById("fokusFilsafat").innerHTML =
                "Metodologi & Kebenaran Ilmiah";
            if (document.getElementById("tokohFilsafat")) {
                document.getElementById("tokohFilsafat").innerHTML = `
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#D9B35D]">Karl Popper</h4>
                        <p class="mt-2 text-[#675A4D] text-sm">Mengembangkan prinsip falsifikasi dalam pengujian sains.</p>
                    </div>
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#D9B35D]">Thomas Kuhn</h4>
                        <p class="mt-2 text-[#675A4D] text-sm">Memperkenalkan teori pergeseran paradigma ilmiah.</p>
                    </div>
                `;
            }
            if (document.getElementById("karakteristikFilsafat")) {
                document.getElementById("karakteristikFilsafat").innerHTML = `
                    <ul class="list-disc pl-5 space-y-1 text-sm text-[#675A4D]">
                        <li>Penggunaan metode ilmiah ketat.</li>
                        <li>Pembuktian empiris dan observasi.</li>
                        <li>Logika deduktif dan induktif.</li>
                        <li>Evaluasi kritis terhadap teori.</li>
                    </ul>
                `;
            }
            if (document.getElementById("pengaruhFilsafat")) document.getElementById("pengaruhFilsafat").innerHTML =
                "Menjadi fondasi utama penelitian akademik, teknologi modern, riset medis, dan perkembangan sains.";

        } else if (jenis === "agama") {
            if (document.getElementById("judulFilsafat")) document.getElementById("judulFilsafat").innerHTML =
                "Filsafat Agama";
            if (document.getElementById("ringkasanFilsafat")) document.getElementById("ringkasanFilsafat").innerHTML =
                "Mengkaji makna keberadaan Ketuhanan, hubungan antara akal pikiran dan keimanan, serta tujuan hakiki kehidupan.";
            if (document.getElementById("asalFilsafat")) document.getElementById("asalFilsafat").innerHTML =
            "Universal";
            if (document.getElementById("fokusFilsafat")) document.getElementById("fokusFilsafat").innerHTML =
                "Ketuhanan & Keimanan";
            if (document.getElementById("tokohFilsafat")) {
                document.getElementById("tokohFilsafat").innerHTML = `
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#6B4A8E]">Thomas Aquinas</h4>
                        <p class="mt-2 text-[#675A4D] text-sm">Menyelaraskan ajaran iman dengan rasionalitas filsafat.</p>
                    </div>
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#6B4A8E]">Al-Ghazali</h4>
                        <p class="mt-2 text-[#675A4D] text-sm">Menggabungkan logika, ajaran agama, dan kedalaman sufisme.</p>
                    </div>
                `;
            }
            if (document.getElementById("karakteristikFilsafat")) {
                document.getElementById("karakteristikFilsafat").innerHTML = `
                    <ul class="list-disc pl-5 space-y-1 text-sm text-[#675A4D]">
                        <li>Perenungan tentang Ketuhanan.</li>
                        <li>Pencarian makna dan tujuan hidup.</li>
                        <li>Penyelarasan wahyu dan akal budi.</li>
                        <li>Refleksi atas kehidupan setelah kematian.</li>
                    </ul>
                `;
            }
            if (document.getElementById("pengaruhFilsafat")) document.getElementById("pengaruhFilsafat").innerHTML =
                "Memberikan kedalaman pemahaman spiritual, kerukunan beragama, serta landasan etika moral bermasyarakat.";
        }

        if (typeof feather !== 'undefined') feather.replace();
    }

    function closeBarat() {
        const panel = document.getElementById("panelBarat");
        const overlay = document.getElementById("overlayBarat");

        if (panel) panel.classList.add("translate-x-full");
        setTimeout(function() {
            if (overlay) overlay.classList.add("hidden");
            document.body.style.overflow = "auto";
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
