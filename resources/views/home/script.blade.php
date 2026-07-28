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
</style>

<!-- ========================================== -->
<!-- SCRIPT LOGIC UTAMA GABUNGAN                -->
<!-- ========================================== -->
<script>
    // ==========================================
    // 1. INITIALIZATION & GLOBAL EVENT LISTENERS
    // ==========================================
    document.addEventListener("DOMContentLoaded", function() {
        // Inisialisasi Feather Icons
        if (typeof feather !== 'undefined') {
            feather.replace();
        }

        // Event Overlay Istilah
        const overlayDetail = document.getElementById("overlay");
        if (overlayDetail) {
            overlayDetail.onclick = closeDetail;
        }

        // Event Overlay Satua
        const overlaySatua = document.getElementById("overlaySatua");
        if (overlaySatua) {
            overlaySatua.addEventListener("click", function(e) {
                if (e.target === this) closeSatua();
            });
        }

        // Event Overlay Filosofi (Cecimpedan)
        const overlayFilosofi = document.getElementById("overlayFilosofi");
        if (overlayFilosofi) {
            overlayFilosofi.addEventListener("click", function(e) {
                if (e.target === overlayFilosofi) closeFilosofi();
            });
        }

        // Event Overlay Filsafat Barat/Umum
        const overlayBarat = document.getElementById("overlayBarat");
        if (overlayBarat) {
            overlayBarat.addEventListener("click", function(e) {
                if (e.target === this) closeBarat();
            });
        }

        // Event Overlay Ajaran Tetua
        const overlayAjaran = document.getElementById("overlayAjaran");
        if (overlayAjaran) {
            overlayAjaran.addEventListener("click", function(e) {
                if (e.target === overlayAjaran) closeAjaran();
            });
        }

        // Event Overlay Detail Artikel Pilihan
        const overlayArtikel = document.getElementById("overlayArtikel");
        if (overlayArtikel) {
            overlayArtikel.addEventListener("click", function(e) {
                if (e.target === overlayArtikel) closeDetailArtikel();
            });
        }

        // Jalankan slide awal untuk Ajaran Tetua & Cecimpedan
        changeSlide(1);
        startAutoSlide();
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
    // 4. SLIDER & MODAL AJARAN TETUA (DINAMIS)
    // ==========================================
    let currentSlide = 1;

    const dataAjaranTetua = {
        1: {
            title: "Tri Hita Karana",
            tags: ["FILOSOFI", "HARMONI"],
            subHeader: "📍 UBUD, GIANYAR • DIDIRIKAN TAHUN 1965",
            image: "{{ asset('images/ajaran.jpeg') }}",
            penjelasan: "<p>Tri Hita Karana berasal dari bahasa Sanskerta: tri (tiga), hita (kebahagiaan/keselamatan), karana (penyebab). Falsafah ini adalah landasan kehidupan masyarakat Bali yang mengajarkan keharmonisan hubungan manusia dengan Tuhan, sesama manusia, dan alam semesta.</p>",
            prinsip: `
                <div><h4 class="font-bold text-[#23160E] text-lg" style="font-family:'Cormorant Garamond',serif;">Parhyangan</h4><p class="text-sm text-[#675A4D] mt-1">Hubungan harmonis antara manusia dan Tuhan (Ida Sang Hyang Widhi Wasa).</p></div>
                <div><h4 class="font-bold text-[#23160E] text-lg" style="font-family:'Cormorant Garamond',serif;">Pawongan</h4><p class="text-sm text-[#675A4D] mt-1">Hubungan harmonis antar sesama manusia melalui gotong royong dan sistem banjar.</p></div>
                <div><h4 class="font-bold text-[#23160E] text-lg" style="font-family:'Cormorant Garamond',serif;">Palemahan</h4><p class="text-sm text-[#675A4D] mt-1">Hubungan harmonis antara manusia dengan alam sekitar dan lingkungan hidup.</p></div>
            `,
            penerapan: '"Sistem Subak Bali yang mengatur irigasi sawah secara kolektif adalah contoh nyata penerapan Tri Hita Karana — meliputi ritual keagamaan, kerja sama petani, dan pengelolaan alam berkelanjutan."',
            sumber: "Sadia, I.W. (1965). Tri Hita Karana dalam Kehidupan Orang Bali. Denpasar: Pustaka Bali."
        },
        2: {
            title: "Tat Twam Asi",
            tags: ["KEMANUSIAAN", "EMPATI"],
            subHeader: "📍 TABANAN • AJARAN MORAL BALI",
            image: "{{ asset('images/tat twam asi.jpeg') }}",
            penjelasan: "<p>Tat Twam Asi adalah ajaran moral Hindu-Bali yang berasal dari Chandogya Upanishad, berakar dari kata <i>Tat</i> (itu), <i>Twam</i> (kamu), dan <i>Asi</i> (adalah). Secara harfiah berarti <b>'Aku adalah Kamu, Kamu adalah Aku'</b>.</p><p>Ajaran ini merupakan landasan etika tertinggi yang menuntun manusia untuk merasakan penderitaan dan kebahagiaan orang lain seolah-olah dialami oleh diri sendiri.</p>",
            prinsip: `
                <div><h4 class="font-bold text-[#23160E] text-lg" style="font-family:'Cormorant Garamond',serif;">Empati Sejati (Saling Mengasihi)</h4><p class="text-sm text-[#675A4D] mt-1">Menyakiti orang lain sama artinya dengan menyakiti diri sendiri. Menolong orang lain sama artinya dengan menolong diri sendiri.</p></div>
                <div><h4 class="font-bold text-[#23160E] text-lg" style="font-family:'Cormorant Garamond',serif;">Penghapusan Diskriminasi</h4><p class="text-sm text-[#675A4D] mt-1">Melihat jiwatman (jiwa) yang suci pada setiap makhluk tanpa membeda-bedakan kasta, ras, atau status sosial.</p></div>
            `,
            penerapan: '"Menolong sesama yang tertimpa musibah tanpa memandang latar belakang, serta menjaga tutur kata dan tindakan agar tidak menyakiti perasaan orang lain."',
            sumber: "Mantra, I.B. (1996). Tat Twam Asi dan Etika Kemanusiaan. Denpasar: Balai Pustaka."
        },
        3: {
            title: "Desa Kala Patra",
            tags: ["KEARIFAN LOKAL", "ADAPTASI"],
            subHeader: "📍 BADUNG • FLEKSIBILITAS BUDAYA",
            image: "{{ asset('images/desa kala patra.jpeg') }}",
            penjelasan: "<p>Desa Kala Patra merupakan kearifan lokal Bali tentang fleksibilitas dan kepatuhan hukum adat. Ajaran ini menekankan bahwa penerapan norma, aturan, dan tradisi harus selalu disesuaikan dengan situasi, tempat, waktu, dan keadaan yang dihadapi.</p>",
            prinsip: `
                <div><h4 class="font-bold text-[#23160E] text-lg" style="font-family:'Cormorant Garamond',serif;">Desa (Tempat)</h4><p class="text-sm text-[#675A4D] mt-1">Menghormati aturan, norma, dan tradisi setempat di mana kita berada.</p></div>
                <div><h4 class="font-bold text-[#23160E] text-lg" style="font-family:'Cormorant Garamond',serif;">Kala (Waktu)</h4><p class="text-sm text-[#675A4D] mt-1">Mampu beradaptasi dengan perkembangan zaman dan era tanpa kehilangan nilai dasar kebaikan.</p></div>
                <div><h4 class="font-bold text-[#23160E] text-lg" style="font-family:'Cormorant Garamond',serif;">Patra (Keadaan)</h4><p class="text-sm text-[#675A4D] mt-1">Bertindak sesuai dengan kapasitas, kondisi, dan situasi riil yang sedang terjadi.</p></div>
            `,
            penerapan: '"Kemampuan masyarakat Bali dalam menerima perkembangan zaman dan pariwisata modern tanpa mengorbankan akar tradisi kebudayaan."',
            sumber: "Ngurah, I.G. (1988). Desa Kala Patra dalam Tata Hukum Adat Bali. Denpasar."
        }
    };

    function changeSlide(no) {
        currentSlide = no;

        // Reset semua thumbnail & dot
        [1, 2, 3].forEach(i => {
            const thumb = document.getElementById("thumb" + i);
            const dot = document.getElementById("dot" + i);

            if (thumb) {
                thumb.classList.remove("border-[#D4A64A]");
                thumb.classList.add("border-transparent");
            }
            if (dot) {
                dot.classList.remove("bg-[#D9B35D]");
                dot.classList.add("bg-[#665548]");
            }
        });

        // Set thumbnail & dot aktif
        const activeThumb = document.getElementById("thumb" + no);
        const activeDot = document.getElementById("dot" + no);

        if (activeThumb) {
            activeThumb.classList.remove("border-transparent");
            activeThumb.classList.add("border-[#D4A64A]");
        }
        if (activeDot) {
            activeDot.classList.remove("bg-[#665548]");
            activeDot.classList.add("bg-[#D9B35D]");
        }

        // Perbarui konten Hero
        if (no == 1) {
            if (document.getElementById("mainImage")) document.getElementById("mainImage").src =
                "{{ asset('images/ajaran.jpeg') }}";
            if (document.getElementById("mainTitle")) document.getElementById("mainTitle").innerHTML =
                "Tri Hita Karana";
            if (document.getElementById("mainDesc")) document.getElementById("mainDesc").innerHTML =
                "Tri Hita Karana merupakan filosofi kehidupan masyarakat Bali yang mengajarkan keharmonisan hubungan manusia dengan Tuhan, sesama manusia, dan alam.";
            if (document.getElementById("mainAuthor")) document.getElementById("mainAuthor").innerHTML =
                "Tim FilsafatBali";
            if (document.getElementById("mainTag")) document.getElementById("mainTag").innerHTML = "FILSAFAT KEHIDUPAN";
        } else if (no == 2) {
            if (document.getElementById("mainImage")) document.getElementById("mainImage").src =
                "{{ asset('images/tat twam asi.jpeg') }}";
            if (document.getElementById("mainTitle")) document.getElementById("mainTitle").innerHTML = "Tat Twam Asi";
            if (document.getElementById("mainDesc")) document.getElementById("mainDesc").innerHTML =
                "Tat Twam Asi berarti 'Aku adalah kamu'. Filosofi ini mengajarkan empati dan menghormati sesama manusia.";
            if (document.getElementById("mainAuthor")) document.getElementById("mainAuthor").innerHTML =
                "Ida Bagus Mantra";
            if (document.getElementById("mainTag")) document.getElementById("mainTag").innerHTML = "KEMANUSIAAN";
        } else if (no == 3) {
            if (document.getElementById("mainImage")) document.getElementById("mainImage").src =
                "{{ asset('images/desa kala patra.jpeg') }}";
            if (document.getElementById("mainTitle")) document.getElementById("mainTitle").innerHTML =
                "Desa Kala Patra";
            if (document.getElementById("mainDesc")) document.getElementById("mainDesc").innerHTML =
                "Desa Kala Patra mengajarkan bahwa setiap tindakan harus mempertimbangkan tempat, waktu, dan keadaan.";
            if (document.getElementById("mainAuthor")) document.getElementById("mainAuthor").innerHTML =
                "I Gusti Ngurah";
            if (document.getElementById("mainTag")) document.getElementById("mainTag").innerHTML = "KEARIFAN LOKAL";
        }

        // Efek Animasi Fade-Up
        const animatedElements = ["mainImage", "mainTag", "mainTitle", "mainDesc", "mainProfile", "mainButton"];
        animatedElements.forEach(id => {
            const el = document.getElementById(id);
            if (el) el.classList.remove("fade-up");
        });

        setTimeout(function() {
            animatedElements.forEach(id => {
                const el = document.getElementById(id);
                if (el) el.classList.add("fade-up");
            });
        }, 20);
    }

    function autoSlide() {
        currentSlide++;
        if (currentSlide > 3) currentSlide = 1;
        changeSlide(currentSlide);
    }

    setInterval(autoSlide, 4000);

    function openAjaran() {
        const data = dataAjaranTetua[currentSlide];
        if (!data) return;

        if (document.getElementById("panelTitle")) document.getElementById("panelTitle").innerText = data.title;
        if (document.getElementById("panelImage")) document.getElementById("panelImage").src = data.image;
        if (document.getElementById("panelSubHeader")) document.getElementById("panelSubHeader").innerText = data
            .subHeader;
        if (document.getElementById("panelPenjelasan")) document.getElementById("panelPenjelasan").innerHTML = data
            .penjelasan;
        if (document.getElementById("panelPrinsip")) document.getElementById("panelPrinsip").innerHTML = data.prinsip;
        if (document.getElementById("panelPenerapan")) document.getElementById("panelPenerapan").innerText = data
            .penerapan;
        if (document.getElementById("panelSumber")) document.getElementById("panelSumber").innerText = data.sumber;

        if (document.getElementById("panelTags")) {
            document.getElementById("panelTags").innerHTML = data.tags.map(t =>
                `<span class="bg-[#C7962B]/80 text-white text-[9px] tracking-[2px] uppercase px-3 py-1 rounded backdrop-blur-sm font-semibold">${t}</span>`
            ).join("");
        }

        const overlay = document.getElementById("overlayAjaran");
        const panel = document.getElementById("panelAjaran");

        if (!overlay || !panel) return;

        document.body.style.overflow = "hidden";
        overlay.classList.remove("hidden");

        setTimeout(() => {
            overlay.classList.remove("opacity-0");
            panel.classList.remove("translate-x-full");
        }, 10);

        if (typeof feather !== 'undefined') feather.replace();
    }

    function closeAjaran() {
        const overlay = document.getElementById("overlayAjaran");
        const panel = document.getElementById("panelAjaran");

        if (!overlay || !panel) return;

        panel.classList.add("translate-x-full");
        overlay.classList.add("opacity-0");

        setTimeout(() => {
            overlay.classList.add("hidden");
            document.body.style.overflow = "auto";
        }, 300);
    }

    // ==========================================
    // 5. FILTER ARTIKEL & FITUR LIVE SEARCH
    // ==========================================
    function filterArtikel(kategori) {
        // 1. Lepas kelas 'tab-active' dari SELURUH tombol filter
        const allButtons = document.querySelectorAll('#artikel button[id^="btn-"], .filter-tab-btn, .tab-btn');
        allButtons.forEach(function(btn) {
            btn.classList.remove("tab-active");
        });

        // 2. Pasang kelas 'tab-active' HANYA ke tombol yang diklik
        const activeBtn = document.getElementById("btn-" + kategori);
        if (activeBtn) {
            activeBtn.classList.add("tab-active");
        }

        // 3. Filter Kartu & Picu Animasi Gambar (Zoom + Fade-In)
        const cards = document.querySelectorAll(".card-artikel");
        cards.forEach(function(card) {
            card.classList.remove("card-appear-anim");

            if (kategori === "semua" || card.classList.contains(kategori)) {
                card.style.display = "block";
                void card.offsetWidth; // Reflow DOM
                card.classList.add("card-appear-anim");
            } else {
                card.style.display = "none";
            }
        });
    }

    // Database Konten untuk Fitur Live Search Utama
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

    // Helper: Pasang Ring Merah tanpa mengubah ukuran container
    function aktifkanBorderMerah() {
        const boxContainer = document.getElementById("searchBoxContainer");
        if (boxContainer) {
            boxContainer.classList.remove("ring-transparent");
            boxContainer.classList.add("ring-[#8D2B1D]");
        }
    }

    // Helper: Lepas Ring Merah
    function hilangkanBorderMerah() {
        const boxContainer = document.getElementById("searchBoxContainer");
        if (boxContainer) {
            boxContainer.classList.remove("ring-[#8D2B1D]");
            boxContainer.classList.add("ring-transparent");
        }
    }

    // HELPER AUTO-SCROLL KE DAERAH TUJUAN
    function scrollToTarget(targetId) {
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }
    }

    // Fungsi Live Search saat Pengguna Mengetik
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

        // Filter fleksibel: Mencari di Judul, Kategori, atau Penulis
        const results = databaseSearch.filter(item =>
            item.judul.toLowerCase().includes(query) ||
            item.kategori.toLowerCase().includes(query) ||
            item.penulis.toLowerCase().includes(query)
        );

        // Urutkan hasil agar yang cocok dengan awal JUDUL diprioritaskan di paling atas
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

    // Fungsi Membersihkan Kolom Pencarian Utama (Tombol X)
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

    // Fungsi Pilih Hasil dari Dropdown Search Utama
    function pilihHasilSearch(idArtikel, judul, kategori) {
        const hasilCari = document.getElementById("hasilCari");
        if (hasilCari) hasilCari.classList.add("hidden");

        hilangkanBorderMerah();

        // Navigasi yang disesuaikan untuk Istilah Bali (Ngaben, Taksu, dll)
        if (judul.includes("tri hita karana")) {
            changeSlide(1);
            scrollToTarget("ajaran-tetua");
        } else if (judul.includes("i siap selem") || kategori.includes("satua")) {
            if (typeof showSatua === 'function') {
                showSatua();
            }
            scrollToTarget("sectionSatua");
        } else if (judul.includes("ngaben") || judul.includes("taksu") || judul.includes("subak") || kategori.includes(
                "istilah")) {
            if (typeof showIstilah === 'function') {
                showIstilah();
            }
            scrollToTarget("sectionIstilah");
        } else if (kategori.includes("tradisi")) {
            if (typeof filterArtikel === 'function') {
                filterArtikel('tradisi');
            }
            scrollToTarget("artikel");
        } else if (kategori.includes("ajaran")) {
            if (typeof filterArtikel === 'function') {
                filterArtikel('ajaran');
            }
            scrollToTarget("artikel");
        } else {
            scrollToTarget("artikel");
            if (typeof filterArtikel === 'function') {
                filterArtikel('semua');
            }
        }
    }

    // Fungsi Klik Keyword Cepat di Bawah Input Search
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
            changeSlide(1);
            scrollToTarget("ajaran-tetua");
        } else if (keyLower.includes("i siap selem")) {
            if (typeof showSatua === 'function') {
                showSatua();
            }
            scrollToTarget("sectionSatua");
        } else if (keyLower.includes("ngaben") || keyLower.includes("taksu") || keyLower.includes("subak")) {
            if (typeof showIstilah === 'function') {
                showIstilah();
            }
            scrollToTarget("sectionIstilah");
        } else if (keyLower.includes("rwa bhineda")) {
            if (typeof filterArtikel === 'function') {
                filterArtikel('ajaran');
            }
            scrollToTarget("artikel");
        } else {
            scrollToTarget("artikel");
        }
    }

    // Sembunyikan Dropdown Saat Klik di Luar Search Box
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
    // DATA & MODAL DETAIL BACA ARTIKEL PILIHAN
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
            isi: `
                <p>Subak adalah sistem irigasi pertanian yang telah ada di Bali selama lebih dari seribu tahun. Lebih dari sekedar teknik pengairan, Subak adalah lembaga sosial, spiritual, dan demokratis yang mengatur penggunaan air di antara para petani dengan cara yang adil dan berkelanjutan.</p>
                <p>Setiap Subak dikelola oleh anggota petani yang memilih pemimpin (pekaseh) secara demokratis. Keputusan tentang jadwal tanam, pembagian air, dan upacara dilakukan bersama. Tidak ada petani yang bisa mengambil lebih banyak dari jatahya — sistem ini mengklaim bukan hanya oleh manusia, tapi juga oleh ritual keagamaan.</p>
            `,
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
            isi: `
                <p>Teka-teki tradisional Bali (Cecimpedan) bukan sekadar permainan kata sederhana untuk anak-anak. Di dalam struktur pertanyaan dan jawabannya, tersimpan nilai-nilai pemikiran kritis, pengamatan alam, dan etika dasar bermasyarakat.</p>
                <p>Melalui cecimpedan, generasi muda diajak memahami simbolisme flora, fauna, serta peralatan sehari-hari dalam konteks filosofis yang mudah dicerna.</p>
            `,
            kesimpulan: "Pelestarian cecimpedan penting untuk menjaga kemampuan nalar kritis anak berbasis kebudayaan lokal di tengah gempuran teknologi digital."
        },
        3: {
            title: "I Siap Selem: Simbol Kesetiaan dan Kecerdikan",
            kategori: "SATUA BALI",
            bgKategori: "bg-[#2F7D4B]",
            image: "{{ asset('images/jalak bali.jpeg') }}",
            penulis: "Ketut Suardana",
            avatar: "K",
            tgl: "8 JUNI 2025",
            waktu: "5 MENIT",
            isi: `
                <p>Satua Bali I Siap Selem mengisahkan seekor induk ayam hitam yang cerdik dalam melindungi anak-anaknya dari ancaman I Kedis Blibis atau I Bikul.</p>
                <p>Cerita rakyat ini sarat dengan pesan moral tentang pentingnya kerja keras, kewaspadaan, dan kasih sayang orang tua terhadap anak-anaknya.</p>
            `,
            kesimpulan: "Kisah I Siap Selem merupakan warisan sastra lisan yang terus hidup untuk menanamkan nilai moral kepada generasi muda."
        },
        4: {
            title: "Sor Singgih: Hierarki Bahasa sebagai Cermin Tatanan Sosial",
            kategori: "ISTILAH BALI",
            bgKategori: "bg-[#305F9E]",
            image: "{{ asset('images/sor singgih.jpeg') }}",
            penulis: "Ida Bagus Komang",
            avatar: "I",
            tgl: "7 JUNI 2025",
            waktu: "7 MENIT",
            isi: `
                <p>Bahasa Bali mengenal tingkatan tutur—Alus, Madya, dan Kasar—yang dikenal dengan sebutan Sor Singgih Basa. Tingkatan ini bukan diciptakan untuk membeda-bedakan kasta secara kaku, melainkan sebagai norma rasa hormat dan etika bertutur kata.</p>
                <p>Memahami sor singgih membantu seseorang menempatkan diri dengan santun saat berbicara kepada sesama, tetangga, pejabat, maupun tokoh agama.</p>
            `,
            kesimpulan: "Sor Singgih Basa Bali merupakan cerminan kehalusan budi pekerti dan rasa saling menghormati dalam komunikasi sosial."
        },
        5: {
            title: "Rwa Bhineda, Keseimbangan Kehidupan",
            kategori: "AJARAN TETUA",
            bgKategori: "bg-[#992B20]",
            image: "{{ asset('images/rwa_bhineda.jpg') }}",
            penulis: "Gede Sukarma",
            avatar: "G",
            tgl: "5 JUNI 2025",
            waktu: "8 MENIT",
            isi: `
                <p>Rwa Bhineda mengajarkan dualitas kehidupan: baik-buruk, siang-malam, duka-suka. Kedua hal berlawanan ini tidak untuk dihilangkan salah satunya, melainkan diselaraskan agar tercipta keseimbangan kosmis.</p>
            `,
            kesimpulan: "Memahami Rwa Bhineda membuat manusia lebih tenang dan bijaksana dalam menghadapi pasang surut dinamika kehidupan."
        },
        6: {
            title: "Makna Tersembunyi di Balik Cecimpedan tentang Alam",
            kategori: "CECIMPEDAN",
            bgKategori: "bg-[#D9A441]",
            image: "{{ asset('images/cecimpedan.jpeg') }}",
            penulis: "Made Sudiarta",
            avatar: "M",
            tgl: "2 JUNI 2025",
            waktu: "9 MENIT",
            isi: `
                <p>Banyak cecimpedan mengambil objek tumbuhan, sungai, dan binatang. Hal ini melatih kepekaan inderawi anak-anak zaman dahulu terhadap kondisi alam sekitar mereka.</p>
            `,
            kesimpulan: "Cecimpedan alam memupuk rasa cinta lingkungan sejak usia dini."
        },
        7: {
            title: "Ngaben: Upacara Pitra Yadnya",
            kategori: "TRADISI",
            bgKategori: "bg-[#992B20]",
            image: "{{ asset('images/ngaben.jpeg') }}",
            penulis: "I Putu Gede",
            avatar: "P",
            tgl: "15 JUNI 2025",
            waktu: "7 MENIT",
            isi: `<p>Ngaben merupakan upacara kremasi jenazah umat Hindu di Bali untuk mengembalikan unsur Panca Maha Bhuta...</p>`,
            kesimpulan: "Ngaben melambangkan keikhlasan melepaskan ikatan duniawi."
        },
        8: {
            title: "Taksu: Pancaran Karisma Budaya Bali",
            kategori: "ISTILAH BALI",
            bgKategori: "bg-[#305F9E]",
            image: "{{ asset('images/taksu.jpeg') }}",
            penulis: "I Nyoman Suartha",
            avatar: "N",
            tgl: "18 JUNI 2025",
            waktu: "5 MENIT",
            isi: `<p>Taksu adalah kekuatan spiritual yang memberi jiwa, karisma, dan daya pikat pada seniman maupun karya seni Bali...</p>`,
            kesimpulan: "Taksu menghubungkan antara keterampilan teknis dengan kedalaman spiritual."
        },
        9: {
            title: "Subak: Demokrasi Air dalam Peradaban Bali",
            kategori: "AJARAN TETUA",
            bgKategori: "bg-[#992B20]",
            image: "{{ asset('images/subak.jpeg') }}",
            penulis: "Ni Luh Putu Ariani",
            avatar: "N",
            tgl: "12 JUNI 2025",
            waktu: "8 MENIT",
            isi: `<p>Subak adalah sistem irigasi pertanian tradisional Bali yang berlandaskan Tri Hita Karana...</p>`,
            kesimpulan: "Subak diakui UNESCO sebagai warisan budaya dunia."
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
    // 6. TOGGLE SATUA & ISTILAH (DENGAN UKURAN TAB TERKUNCI)
    // ==========================================
    function showSatua() {
        const secSatua = document.getElementById("sectionSatua");
        const secIstilah = document.getElementById("sectionIstilah");
        if (secSatua) secSatua.classList.remove("hidden");
        if (secIstilah) secIstilah.classList.add("hidden");

        // Menyamakan ukuran tombol tab agar stabil (w-36 md:w-40)
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

        // Menyamakan ukuran tombol tab agar stabil (w-36 md:w-40)
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

    const dataFilosofi = {
        1: {
            tingkat: "SEDANG",
            bgTingkat: "bg-[#C7962B]",
            nomor: "CECIMPEDAN #001",
            teks: '"Bungkusne putih, isine abang, sabilang karohne makejang ilang."',
            arti: "Bungkusnya putih, isinya merah, setiap kali dibuka semuanya habis.",
            jawaban: "Buah Semangka",
            list: [
                "Kerelaan memberi tanpa mengharapkan kembali.",
                "Keindahan yang baru terungkap saat dibuka — seperti kepribadian manusia.",
                "Paradoks: semakin diberikan, semakin bernilai."
            ],
            variasi: "Di beberapa daerah, cecimpedan ini juga dijawab dengan 'buah delima' karena kemiripan deskripsinya.",
            asal: "Gianyar, Bali Tengah",
            rekaman: "Direkam tahun 1982 oleh Balai Bahasa Bali"
        },
        2: {
            tingkat: "SULIT",
            bgTingkat: "bg-[#8F2318]",
            nomor: "CECIMPEDAN #002",
            teks: '"Adanne luh, avakne besik, ngalih ya dini ditu, pesu ya di tengah."',
            arti: "Namanya banyak, badannya satu, mencarinya ke sana ke sini, keluarnya di tengah.",
            jawaban: "Jarum Jahit / Jarum Bedah",
            list: [
                "Ketekunan dalam menyelesaikan atau menyatukan sesuatu yang terpisah.",
                "Fokus pada tujuan utama meski harus menembus berbagai rintangan.",
                "Simbol kerapian dan keharmonisan hasil karya."
            ],
            variasi: "Sering dijadikan petuah tradisional untuk melatih ketelitian anak-anak Bali zaman dahulu.",
            asal: "Badung, Bali Selatan",
            rekaman: "Arsipan Dokumentasi Kebudayaan Bali"
        },
        3: {
            tingkat: "MUDAH",
            bgTingkat: "bg-[#2D6C3F]",
            nomor: "CECIMPEDAN #003",
            teks: '"Nongos di tegale, ngelah baju liu pesan, nanging sing taen nganggo."',
            arti: "Tinggal di ladang, punya baju banyak sekali, tetapi tidak pernah memakainya.",
            jawaban: "Pohon Pisang (Pah-pah / Pelepah)",
            list: [
                "Kedermawanan alam yang selalu memberikan perlindungan.",
                "Kesederhanaan hidup: memiliki banyak hal namun tidak tinggi hati.",
                "Filosofi pisang yang baru mati setelah memberikan manfaat (buah)."
            ],
            variasi: "Kadang disebut juga melambangkan tanaman bambu di beberapa wilayah pesisir.",
            asal: "Tabanan, Bali Barat",
            rekaman: "Balai Bahasa Provinsi Bali"
        },
        4: {
            tingkat: "SULIT",
            bgTingkat: "bg-[#8F2318]",
            nomor: "CECIMPEDAN #004",
            teks: '"Cangak maid baut, awakne bek baan adep."',
            arti: "Burung cangak menarik tali, badannya penuh dengan jualan/barang dagangan.",
            jawaban: "Pena / Bunga Pandan",
            list: [
                "Ketelitian dan kesabaran dalam merajai ilmu pengetahuan.",
                "Setiap tarikan garis kehidupan membutuhkan fokus dan tujuan jernih.",
                "Mementingkan isi karya dibandingkan sekadar penampilan."
            ],
            variasi: "Bisa ditafsirkan sebagai alat tenun tradisional di kawasan perajin kain Bali.",
            asal: "Karangasem, Bali Timur",
            rekaman: "Balai Bahasa Provinsi Bali"
        },
        5: {
            tingkat: "MUDAH",
            bgTingkat: "bg-[#2D6C3F]",
            nomor: "CECIMPEDAN #005",
            teks: '"Tekek baet, gembuk melah, jalanne ngengkebang awak."',
            arti: "Keras dan berat di luar, empuk dan bagus di dalam, jalannya selalu bersembunyi.",
            jawaban: "Buah Durian / Kelapa",
            list: [
                "Pentingnya melihat kebaikan hati tanpa menghakimi tampilan fisik.",
                "Perlindungan diri yang kuat untuk menjaga keaslian nilai kebajikan.",
                "Kerendahan hati: tidak memamerkan kebaikan di depan umum."
            ],
            variasi: "Sering dipakai sebagai metafora dalam pengajaran etika dan karakter murid.",
            asal: "Buleleng, Bali Utara",
            rekaman: "Arsipan Kebudayaan Bali"
        }
    };

    function openFilosofi(no) {
        const data = dataFilosofi[no];
        if (!data) return;

        isFilosofiOpen = true;

        const badgeTingkat = document.getElementById("filosofiTingkat");
        if (badgeTingkat) {
            badgeTingkat.innerText = "TINGKAT: " + data.tingkat;
            badgeTingkat.className =
                `inline-block text-white text-[10px] tracking-[2px] uppercase px-4 py-1.5 rounded font-semibold ${data.bgTingkat}`;
        }

        if (document.getElementById("filosofiNomor")) document.getElementById("filosofiNomor").innerText = data.nomor;
        if (document.getElementById("filosofiTeks")) document.getElementById("filosofiTeks").innerText = data.teks;
        if (document.getElementById("filosofiArti")) document.getElementById("filosofiArti").innerText = data.arti;
        if (document.getElementById("jawabanPanelText")) document.getElementById("jawabanPanelText").innerText = data
            .jawaban;
        if (document.getElementById("filosofiVariasi")) document.getElementById("filosofiVariasi").innerText = data
            .variasi;
        if (document.getElementById("filosofiAsal")) document.getElementById("filosofiAsal").innerText = data.asal;
        if (document.getElementById("filosofiRekaman")) document.getElementById("filosofiRekaman").innerText = data
            .rekaman;

        const listContainer = document.getElementById("filosofiList");
        if (listContainer) {
            listContainer.innerHTML = data.list.map(item => `<li>${item}</li>`).join("");
        }

        const boxJawaban = document.getElementById("boxJawabanPanel");
        const textJawaban = document.getElementById("textJawabanPanel");
        if (boxJawaban) boxJawaban.classList.add("hidden");
        if (textJawaban) textJawaban.innerText = "TAMPILKAN JAWABAN";

        document.body.style.overflow = "hidden";

        const overlay = document.getElementById("overlayFilosofi");
        const panel = document.getElementById("panelFilosofi");

        if (overlay && panel) {
            overlay.classList.remove("hidden");
            setTimeout(() => {
                overlay.classList.remove("opacity-0");
                panel.classList.remove("translate-x-full");
            }, 10);
        }

        if (typeof feather !== 'undefined') feather.replace();
    }

    function closeFilosofi() {
        const overlay = document.getElementById("overlayFilosofi");
        const panel = document.getElementById("panelFilosofi");

        if (panel && overlay) {
            panel.classList.add("translate-x-full");
            overlay.classList.add("opacity-0");

            setTimeout(() => {
                overlay.classList.add("hidden");
                const boxJawaban = document.getElementById("boxJawabanPanel");
                const textJawaban = document.getElementById("textJawabanPanel");
                if (boxJawaban) boxJawaban.classList.add("hidden");
                if (textJawaban) textJawaban.innerText = "TAMPILKAN JAWABAN";

                document.body.style.overflow = "auto";
                isFilosofiOpen = false;
            }, 500);
        }
    }

    function toggleJawabanPanel() {
        const box = document.getElementById("boxJawabanPanel");
        const text = document.getElementById("textJawabanPanel");

        if (box && text) {
            if (box.classList.contains("hidden")) {
                box.classList.remove("hidden");
                text.innerText = "SEMBUNYIKAN JAWABAN";
            } else {
                box.classList.add("hidden");
                text.innerText = "TAMPILKAN JAWABAN";
            }
        }
    }

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

    function toggleCard1() {
        toggleCard(1);
    }

    function showJawaban1() {
        showJawaban(1);
    }

    function hideJawaban1() {
        hideJawaban(1);
    }

    function toggleCard2() {
        toggleCard(2);
    }

    function showJawaban2() {
        showJawaban(2);
    }

    function hideJawaban2() {
        hideJawaban(2);
    }

    function toggleCard3() {
        toggleCard(3);
    }

    function showJawaban3() {
        showJawaban(3);
    }

    function hideJawaban3() {
        hideJawaban(3);
    }

    function toggleCard4() {
        toggleCard(4);
    }

    function showJawaban4() {
        showJawaban(4);
    }

    function hideJawaban4() {
        hideJawaban(4);
    }

    function toggleCard5() {
        toggleCard(5);
    }

    function showJawaban5() {
        showJawaban(5);
    }

    function hideJawaban5() {
        hideJawaban(5);
    }

    // Auto-scroll Horizontal Slider Cecimpedan
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
                        <p class="mt-2 text-[#675A4D]">Mengajarkan pentingnya berpikir kritis melalui dialog.</p>
                    </div>
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#992B20]">Plato</h4>
                        <p class="mt-2 text-[#675A4D]">Pendiri Akademi dan pencetus teori dunia ide.</p>
                    </div>
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#992B20]">Aristoteles</h4>
                        <p class="mt-2 text-[#675A4D]">Mengembangkan logika, etika, politik, dan ilmu alam.</p>
                    </div>
                `;
            }
            if (document.getElementById("karakteristikFilsafat")) {
                document.getElementById("karakteristikFilsafat").innerHTML = `
                    <li>Berpikir logis.</li>
                    <li>Argumentasi rasional.</li>
                    <li>Metode ilmiah.</li>
                    <li>Pencarian kebenaran.</li>
                `;
            }
            if (document.getElementById("pengaruhFilsafat")) document.getElementById("pengaruhFilsafat").innerHTML =
                "Menjadi dasar perkembangan ilmu pengetahuan, demokrasi, pendidikan, hukum, dan teknologi modern.";
        } else if (jenis === "timur") {
            if (document.getElementById("judulFilsafat")) document.getElementById("judulFilsafat").innerHTML =
                "Filsafat Timur";
            if (document.getElementById("ringkasanFilsafat")) document.getElementById("ringkasanFilsafat").innerHTML =
                "Filsafat Timur berkembang di Asia dan menekankan keseimbangan hidup, spiritualitas, serta keharmonisan manusia dengan alam.";
            if (document.getElementById("asalFilsafat")) document.getElementById("asalFilsafat").innerHTML = "Asia";
            if (document.getElementById("fokusFilsafat")) document.getElementById("fokusFilsafat").innerHTML =
                "Spiritualitas";
            if (document.getElementById("tokohFilsafat")) {
                document.getElementById("tokohFilsafat").innerHTML = `
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#2F7D4B]">Konfusius</h4>
                        <p class="mt-2 text-[#675A4D]">Mengajarkan moral dan etika.</p>
                    </div>
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#2F7D4B]">Laozi</h4>
                        <p class="mt-2 text-[#675A4D]">Pendiri Taoisme.</p>
                    </div>
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#2F7D4B]">Buddha</h4>
                        <p class="mt-2 text-[#675A4D]">Mengajarkan jalan menuju kebijaksanaan.</p>
                    </div>
                `;
            }
            if (document.getElementById("karakteristikFilsafat")) {
                document.getElementById("karakteristikFilsafat").innerHTML = `
                    <li>Keharmonisan hidup.</li>
                    <li>Keseimbangan alam.</li>
                    <li>Spiritualitas.</li>
                    <li>Pengendalian diri.</li>
                `;
            }
            if (document.getElementById("pengaruhFilsafat")) document.getElementById("pengaruhFilsafat").innerHTML =
                "Mempengaruhi budaya Asia, meditasi, etika, agama, dan kehidupan sehari-hari.";
        } else if (jenis === "moral") {
            if (document.getElementById("judulFilsafat")) document.getElementById("judulFilsafat").innerHTML =
                "Filsafat Moral";
            if (document.getElementById("ringkasanFilsafat")) document.getElementById("ringkasanFilsafat").innerHTML =
                "Mengkaji nilai baik dan buruk serta bagaimana manusia bertindak secara etis.";
            if (document.getElementById("asalFilsafat")) document.getElementById("asalFilsafat").innerHTML =
                "Universal";
            if (document.getElementById("fokusFilsafat")) document.getElementById("fokusFilsafat").innerHTML = "Etika";
            if (document.getElementById("tokohFilsafat")) {
                document.getElementById("tokohFilsafat").innerHTML = `
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#C58A3C]">Immanuel Kant</h4>
                        <p class="mt-2 text-[#675A4D]">Mengembangkan etika kewajiban.</p>
                    </div>
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#C58A3C]">John Stuart Mill</h4>
                        <p class="mt-2 text-[#675A4D]">Tokoh utilitarianisme.</p>
                    </div>
                `;
            }
            if (document.getElementById("karakteristikFilsafat")) {
                document.getElementById("karakteristikFilsafat").innerHTML = `
                    <li>Baik dan buruk.</li>
                    <li>Etika.</li>
                    <li>Kewajiban.</li>
                    <li>Tanggung jawab.</li>
                `;
            }
            if (document.getElementById("pengaruhFilsafat")) document.getElementById("pengaruhFilsafat").innerHTML =
                "Menjadi dasar pendidikan karakter, profesi, hukum, dan kehidupan sosial.";
        } else if (jenis === "politik") {
            if (document.getElementById("judulFilsafat")) document.getElementById("judulFilsafat").innerHTML =
                "Filsafat Politik";
            if (document.getElementById("ringkasanFilsafat")) document.getElementById("ringkasanFilsafat").innerHTML =
                "Membahas negara, kekuasaan, keadilan, hukum, dan hubungan antara pemerintah dengan masyarakat.";
            if (document.getElementById("asalFilsafat")) document.getElementById("asalFilsafat").innerHTML =
                "Yunani Kuno";
            if (document.getElementById("fokusFilsafat")) document.getElementById("fokusFilsafat").innerHTML =
                "Negara & Kekuasaan";
            if (document.getElementById("tokohFilsafat")) {
                document.getElementById("tokohFilsafat").innerHTML = `
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#355C9A]">Plato</h4>
                        <p class="mt-2 text-[#675A4D]">Menggagas konsep negara ideal dalam karya Republic.</p>
                    </div>
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#355C9A]">John Locke</h4>
                        <p class="mt-2 text-[#675A4D]">Mengembangkan teori hak asasi manusia dan pemerintahan.</p>
                    </div>
                `;
            }
            if (document.getElementById("karakteristikFilsafat")) {
                document.getElementById("karakteristikFilsafat").innerHTML = `
                    <li>Keadilan.</li>
                    <li>Kekuasaan.</li>
                    <li>Hak masyarakat.</li>
                    <li>Sistem pemerintahan.</li>
                `;
            }
            if (document.getElementById("pengaruhFilsafat")) document.getElementById("pengaruhFilsafat").innerHTML =
                "Menjadi dasar berkembangnya demokrasi, hukum, hak asasi manusia, dan sistem pemerintahan modern.";
        } else if (jenis === "ilmu") {
            if (document.getElementById("judulFilsafat")) document.getElementById("judulFilsafat").innerHTML =
                "Filsafat Ilmu";
            if (document.getElementById("ringkasanFilsafat")) document.getElementById("ringkasanFilsafat").innerHTML =
                "Mempelajari hakikat ilmu pengetahuan, metode ilmiah, serta cara memperoleh dan mengembangkan pengetahuan.";
            if (document.getElementById("asalFilsafat")) document.getElementById("asalFilsafat").innerHTML = "Modern";
            if (document.getElementById("fokusFilsafat")) document.getElementById("fokusFilsafat").innerHTML =
                "Ilmu Pengetahuan";
            if (document.getElementById("tokohFilsafat")) {
                document.getElementById("tokohFilsafat").innerHTML = `
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#D9B35D]">Karl Popper</h4>
                        <p class="mt-2 text-[#675A4D]">Mengembangkan teori falsifikasi dalam ilmu pengetahuan.</p>
                    </div>
                    <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#D9B35D]">Thomas Kuhn</h4>
                        <p class="mt-2 text-[#675A4D]">Memperkenalkan konsep revolusi paradigma ilmiah.</p>
                    </div>
                `;
            }
            if (document.getElementById("karakteristikFilsafat")) {
                document.getElementById("karakteristikFilsafat").innerHTML = `
                    <li>Metode ilmiah.</li>
                    <li>Pembuktian.</li>
                    <li>Logika.</li>
                    <li>Pengembangan ilmu.</li>
                `;
            }
            if (document.getElementById("pengaruhFilsafat")) document.getElementById("pengaruhFilsafat").innerHTML =
                "Menjadi landasan penelitian ilmiah, pendidikan, teknologi, dan perkembangan sains modern.";
        } else if (jenis === "agama") {
            if (document.getElementById("judulFilsafat")) document.getElementById("judulFilsafat").innerHTML =
                "Filsafat Agama";
            if (document.getElementById("ringkasanFilsafat")) document.getElementById("ringkasanFilsafat").innerHTML =
                "Mengkaji hubungan manusia dengan Tuhan, iman, akal, serta makna kehidupan dan keberadaan manusia.";
            if (document.getElementById("asalFilsafat")) document.getElementById("asalFilsafat").innerHTML =
                "Universal";
            if (document.getElementById("fokusFilsafat")) document.getElementById("fokusFilsafat").innerHTML =
                "Ketuhanan";
            if (document.getElementById("tokohFilsafat")) {
                document.getElementById("tokohFilsafat").innerHTML = `
                    <div class="bg-[#FAF6F0] border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#6B4A8E]">Thomas Aquinas</h4>
                        <p class="mt-2 text-[#675A4D]">Menggabungkan pemikiran filsafat dengan ajaran agama.</p>
                    </div>
                    <div class="bg-[#FAF6F0] border border-[#E5D6BF] rounded-lg p-5">
                        <h4 class="font-semibold text-[#6B4A8E]">Al-Ghazali</h4>
                        <p class="mt-2 text-[#675A4D]">Mengembangkan pemikiran filsafat Islam dan spiritualitas.</p>
                    </div>
                `;
            }
            if (document.getElementById("karakteristikFilsafat")) {
                document.getElementById("karakteristikFilsafat").innerHTML = `
                    <li>Keimanan.</li>
                    <li>Ketuhanan.</li>
                    <li>Makna kehidupan.</li>
                    <li>Hubungan manusia dengan Tuhan.</li>
                `;
            }
            if (document.getElementById("pengaruhFilsafat")) document.getElementById("pengaruhFilsafat").innerHTML =
                "Memberikan dasar pemikiran mengenai kepercayaan, moral, spiritualitas, dan hubungan manusia dengan Tuhan.";
        }

        if (typeof feather !== 'undefined') feather.replace();
    }

    function closeBarat() {
        const panel = document.getElementById("panelBarat");
        const overlay = document.getElementById("overlayBarat");

        if (panel) {
            panel.classList.add("translate-x-full");
        }

        setTimeout(function() {
            if (overlay) {
                overlay.classList.add("hidden");
            }
            // Mengaktifkan kembali scroll pada body website
            document.body.style.overflow = "auto";
        }, 300);
    }

    // ==========================================
    // 9. LIVE SEARCH SATUA BALI & ISTILAH BALI
    // ==========================================

    // A. Fungsi Pencarian SATUA BALI
    function filterSatuaCards(keyword) {
        const query = keyword.trim().toLowerCase();
        const btnClear = document.getElementById("btnClearSearchSatua");

        // Tampilkan / Sembunyikan tombol X
        if (btnClear) {
            if (query.length > 0) {
                btnClear.classList.remove("hidden");
            } else {
                btnClear.classList.add("hidden");
            }
        }

        // Ambil semua card di dalam sectionSatua yang ada di dalam .grid
        const cards = document.querySelectorAll("#sectionSatua .grid > div");
        cards.forEach(card => {
            const textContent = card.innerText.toLowerCase();
            if (textContent.includes(query)) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    }

    // Fungsi Membersihkan Pencarian SATUA BALI
    function clearSearchSatua() {
        const input = document.getElementById("searchSatuaInput");
        if (input) {
            input.value = "";
            filterSatuaCards("");
            input.focus();
        }
    }

    // B. Fungsi Pencarian ISTILAH BALI
    function filterIstilahList(keyword) {
        const query = keyword.trim().toLowerCase();
        const btnClear = document.getElementById("btnClearSearchIstilah");

        // Tampilkan / Sembunyikan tombol X
        if (btnClear) {
            if (query.length > 0) {
                btnClear.classList.remove("hidden");
            } else {
                btnClear.classList.add("hidden");
            }
        }

        // Ambil semua div dengan class 'item-istilah' di dalam wadahnya
        const items = document.querySelectorAll("#listIstilahContainer .item-istilah");
        items.forEach(item => {
            const textContent = item.innerText.toLowerCase();
            if (textContent.includes(query)) {
                item.style.display = "grid";
            } else {
                item.style.display = "none";
            }
        });
    }

    // Fungsi Membersihkan Pencarian ISTILAH BALI
    function clearSearchIstilah() {
        const input = document.getElementById("searchIstilahInput");
        if (input) {
            input.value = "";
            filterIstilahList("");
            input.focus();
        }
    }
</script>
