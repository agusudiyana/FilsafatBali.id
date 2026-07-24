<script>
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", function() {

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
</script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
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
</script>
<script>
    let currentSlide = 1;

    function changeSlide(no) {

        currentSlide = no;

        // Reset semua thumbnail
        document.getElementById("thumb1").classList.remove("border-[#D4A64A]");
        document.getElementById("thumb2").classList.remove("border-[#D4A64A]");
        document.getElementById("thumb3").classList.remove("border-[#D4A64A]");

        document.getElementById("thumb1").classList.add("border-transparent");
        document.getElementById("thumb2").classList.add("border-transparent");
        document.getElementById("thumb3").classList.add("border-transparent");

        // Thumbnail yang dipilih diberi border emas
        document.getElementById("thumb" + no).classList.remove("border-transparent");
        document.getElementById("thumb" + no).classList.add("border-[#D4A64A]");

        if (no == 1) {

            document.getElementById("mainImage").src = "/images/ajaran.jpeg";

            document.getElementById("mainTitle").innerHTML = "Tri Hita Karana";

            document.getElementById("mainDesc").innerHTML =
                "Tri Hita Karana merupakan filosofi kehidupan masyarakat Bali yang mengajarkan keharmonisan hubungan manusia dengan Tuhan, sesama manusia, dan alam.";

            document.getElementById("mainAuthor").innerHTML = "Tim FilsafatBali";

            document.getElementById("mainTag").innerHTML = "FILSAFAT KEHIDUPAN";

        }

        if (no == 2) {

            document.getElementById("mainImage").src = "/images/tat twam asi.jpeg";

            document.getElementById("mainTitle").innerHTML = "Tat Twam Asi";

            document.getElementById("mainDesc").innerHTML =
                "Tat Twam Asi berarti 'Aku adalah kamu'. Filosofi ini mengajarkan empati dan menghormati sesama manusia.";

            document.getElementById("mainAuthor").innerHTML = "Ida Bagus Mantra";

            document.getElementById("mainTag").innerHTML = "KEMANUSIAAN";

        }

        if (no == 3) {

            document.getElementById("mainImage").src = "/images/desa kala patra.jpeg";

            document.getElementById("mainTitle").innerHTML = "Desa Kala Patra";

            document.getElementById("mainDesc").innerHTML =
                "Desa Kala Patra mengajarkan bahwa setiap tindakan harus mempertimbangkan tempat, waktu, dan keadaan.";

            document.getElementById("mainAuthor").innerHTML = "I Gusti Ngurah";

            document.getElementById("mainTag").innerHTML = "KEARIFAN LOKAL";

        }

        // Reset semua dot
        document.getElementById("dot1").classList.remove("bg-[#D9B35D]");
        document.getElementById("dot2").classList.remove("bg-[#D9B35D]");
        document.getElementById("dot3").classList.remove("bg-[#D9B35D]");

        document.getElementById("dot1").classList.add("bg-[#665548]");
        document.getElementById("dot2").classList.add("bg-[#665548]");
        document.getElementById("dot3").classList.add("bg-[#665548]");

        // Dot yang aktif
        document.getElementById("dot" + no).classList.remove("bg-[#665548]");
        document.getElementById("dot" + no).classList.add("bg-[#D9B35D]");

        // Animasi
        document.getElementById("mainImage").classList.remove("fade-up");
        document.getElementById("mainTag").classList.remove("fade-up");
        document.getElementById("mainTitle").classList.remove("fade-up");
        document.getElementById("mainDesc").classList.remove("fade-up");
        document.getElementById("mainProfile").classList.remove("fade-up");
        document.getElementById("mainButton").classList.remove("fade-up");

        setTimeout(function() {

            document.getElementById("mainImage").classList.add("fade-up");
            document.getElementById("mainTag").classList.add("fade-up");
            document.getElementById("mainTitle").classList.add("fade-up");
            document.getElementById("mainDesc").classList.add("fade-up");
            document.getElementById("mainProfile").classList.add("fade-up");
            document.getElementById("mainButton").classList.add("fade-up");

        }, 20);
    }

    function autoSlide() {

        currentSlide++;

        if (currentSlide > 3) {
            currentSlide = 1;
        }

        changeSlide(currentSlide);

    }

    changeSlide(1);

    setInterval(autoSlide, 4000);
</script>
<script>
    function filterArtikel(kategori) {

        // tombol aktif
        document.querySelectorAll(".tab-active").forEach(function(btn) {
            btn.classList.remove("tab-active");
        });

        document.getElementById("btn-" + kategori).classList.add("tab-active");

        // semua card
        const cards = document.querySelectorAll(".card-artikel");

        cards.forEach(function(card) {

            if (kategori == "semua") {

                card.style.display = "block";

            } else {

                if (card.classList.contains(kategori)) {

                    card.style.display = "block";

                } else {

                    card.style.display = "none";

                }

            }

        });

    }
</script>

<script>
    function cariKeyword(keyword, kategori, deskripsi) {

        const input = document.getElementById("searchInput");
        const hasil = document.getElementById("hasilCari");
        const keywordBox = document.getElementById("keywordBox");

        input.value = keyword;

        if (keywordBox) {
            keywordBox.classList.add("hidden");
        }

        hasil.classList.remove("hidden");

        hasil.innerHTML = `
    <div class="bg-[#F8F0E4] rounded-b-lg border border-[#E5D6BF] shadow-md overflow-hidden">

        <a href="#" class="flex items-center gap-4 px-5 py-4 hover:bg-[#F3E7D3] transition">

            <span class="inline-block bg-[#8D2B1D] text-white text-[10px] font-bold uppercase px-2 py-1 rounded whitespace-nowrap">
                ${kategori}
            </span>

            <div class="text-left">

                <h4 class="text-[18px] font-semibold text-[#2B1A0E]">
                    ${keyword}
                </h4>

                <p class="text-[14px] text-[#6B5A45]">
                    ${deskripsi}
                </p>

            </div>

        </a>

    </div>
    `;
    }
</script>

<script>
    function showSatua() {

        document.getElementById("sectionSatua").classList.remove("hidden");
        document.getElementById("sectionIstilah").classList.add("hidden");

    }

    function showIstilah() {

        document.getElementById("sectionSatua").classList.add("hidden");
        document.getElementById("sectionIstilah").classList.remove("hidden");

    }
</script>
<script>
    feather.replace();
    const input = document.getElementById("searchInput");
    const hasil = document.getElementById("hasilCari");
    const keywordBox = document.getElementById("keywordBox");

    document.addEventListener("click", function(e) {

        if (
            !input.contains(e.target) &&
            !hasil.contains(e.target)
        ) {

            hasil.classList.add("hidden");

            keywordBox.classList.remove("hidden");

            input.value = "";
        }

    });
    input.addEventListener("input", function() {

        if (this.value.trim() == "") {

            hasil.classList.add("hidden");

            keywordBox.classList.remove("hidden");

        }

    });
</script>

<script>
    function openIstilah(judul, kategori, deskripsi, contoh, padanan, konteks) {

        document.getElementById("detailTitle").innerHTML = judul;
        document.getElementById("detailKategori").innerHTML = kategori;
        document.getElementById("detailDesc").innerHTML = deskripsi;
        document.getElementById("detailContoh").innerHTML = contoh;
        document.getElementById("detailPadanan").innerHTML = padanan;
        document.getElementById("detailKonteks").innerHTML = konteks;

        document.getElementById("overlay").classList.remove("hidden");
        document.getElementById("detailPanel").classList.remove("translate-x-full");

    }

    function closeDetail() {

        document.getElementById("overlay").classList.add("hidden");
        document.getElementById("detailPanel").classList.add("translate-x-full");

    }

    document.getElementById("overlay").onclick = closeDetail;

    function openSatua(nama, latin, status, gambar, habitat, makna, ancaman, pelestarian) {

        document.getElementById("satuaNama").innerHTML = nama;
        document.getElementById("satuaLatin").innerHTML = latin;
        document.getElementById("satuaStatus").innerHTML = status;
        document.getElementById("satuaImage").src = gambar;

        document.getElementById("satuaHabitat").innerHTML = habitat;
        document.getElementById("satuaMakna").innerHTML = makna;
        document.getElementById("satuaAncaman").innerHTML = ancaman;
        document.getElementById("satuaPelestarian").innerHTML = pelestarian;

        document.getElementById("overlaySatua").classList.remove("hidden");
        document.getElementById("panelSatua").classList.remove("translate-x-full");

    }

    function closeSatua() {

        document.getElementById("overlaySatua").classList.add("hidden");
        document.getElementById("panelSatua").classList.add("translate-x-full");

    }

    document.getElementById("overlaySatua").onclick = closeSatua;
</script>
