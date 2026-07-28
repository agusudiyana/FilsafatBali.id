<!-- ========================================== -->
<!-- SECTION ISTILAH BALI                      -->
<!-- ========================================== -->
<section id="sectionIstilah" class="bg-[#1A110A] py-24 hidden">

    <div class="max-w-7xl mx-auto px-8">

        <!-- Header Istilah -->
        <div class="flex justify-between items-start mb-12">

            <div>
                <p class="uppercase tracking-[5px] text-[#C89438] text-xs mb-3">
                    — ENSIKLOPEDIA
                </p>

                <h2 style="font-family:'Cormorant Garamond',serif;" class="text-6xl font-bold text-white">
                    Satua & Istilah Bali
                </h2>

                <p class="text-[#B9986D] mt-3 text-lg">
                    Klik item untuk membuka informasi lengkap.
                </p>
            </div>

            <!-- Tab Istilah -->
            <div class="flex border border-[#6E4E1E] rounded-lg overflow-hidden shrink-0 mt-2">
                <button id="btnSatua" onclick="showSatua()"
                    class="w-36 md:w-40 py-3 bg-transparent text-[#C58A3C] uppercase tracking-[2px] text-xs font-semibold text-center shrink-0 transition-all">
                    SATUA BALI
                </button>

                <button id="btnIstilah" onclick="showIstilah()"
                    class="w-36 md:w-40 py-3 bg-[#C58A3C] text-white uppercase tracking-[2px] text-xs font-semibold text-center shrink-0 transition-all">
                    ISTILAH BALI
                </button>
            </div>

        </div>

        <!-- Search Input khusus Cari Judul saja -->
        <div class="mb-10 relative max-w-md">

            <input id="searchIstilahInput" type="text" placeholder="Cari judul istilah..."
                oninput="filterIstilahList(this.value)"
                class="w-full
                bg-transparent
                border border-[#3E2D1E]
                rounded-md
                px-5 py-3 pr-10
                text-[#D8C7AE]
                placeholder:text-[#6E5B45]
                outline-none
                focus:border-[#C48D2D] transition duration-200">

            <button id="btnClearSearchIstilah" onclick="clearSearchIstilah()"
                class="hidden absolute right-3 top-1/2 -translate-y-1/2 text-[#6E5B45] hover:text-[#D8C7AE] transition font-bold">
                ✕
            </button>

        </div>

        <!-- LIST ISTILAH -->
        <div id="listIstilahContainer" class="divide-y divide-[#3E2D1E]">

            <!-- Item 1 -->
            <div onclick="openIstilah(
                'Ngaben',
                'Upacara',
                'Upacara kremasi jenazah dalam agama Hindu Bali. Tujuannya membebaskan roh dari ikatan duniawi.',
                'Tradisi Ngaben telah dikenal sejak berkembangnya agama Hindu di Bali sekitar abad ke-9 hingga ke-11 Masehi. Upacara ini merupakan bagian dari Pitra Yadnya, yaitu persembahan suci kepada leluhur sebagai bentuk bakti kepada orang tua dan keluarga yang telah meninggal. Dalam kepercayaan Hindu Bali, Ngaben bertujuan mengembalikan unsur Panca Maha Bhuta ke alam semesta serta membantu penyucian Atma agar dapat melanjutkan perjalanan menuju alam leluhur atau mengalami kelahiran kembali sesuai hukum Karma Phala.',
                'Kremasi (Indonesia)',
                'Digunakan dalam upacara Pitra Yadnya.'
                )"
                class="item-istilah grid grid-cols-[170px_120px_1fr] py-6 items-center cursor-pointer hover:bg-[#2A1A10] hover:px-4 transition-all duration-300 rounded-lg">

                <h3 class="text-white text-4xl font-bold" style="font-family:'Cormorant Garamond',serif;">

                    Ngaben

                </h3>

                <span
                    class="text-[10px] uppercase tracking-[2px]
                border border-[#6A5135]
                text-[#C89438]
                rounded
                px-3 py-1 w-fit">

                    Upacara

                </span>

                <p class="text-[#C8B299] leading-8">

                    Upacara kremasi jenazah dalam agama Hindu Bali.
                    Tujuannya membebaskan roh dari ikatan duniawi.

                </p>

            </div>

            <!-- Item 2 -->
            <div onclick="openIstilah(
                'Pura',
                'Tempat',
                'Tempat ibadah umat Hindu Bali. Setiap desa adat memiliki Pura Kahyangan Tiga sebagai pusat spiritual.',
                'Pura mulai berkembang di Bali bersamaan dengan masuknya agama Hindu sekitar abad ke-8 hingga ke-11 Masehi. Pada masa Kerajaan Bali Kuno, pura tidak hanya berfungsi sebagai tempat pemujaan kepada Ida Sang Hyang Widhi Wasa, tetapi juga menjadi pusat kegiatan keagamaan, pendidikan, dan kehidupan masyarakat. Hingga kini, pura tetap menjadi bagian penting dari identitas budaya dan spiritual masyarakat Bali.',
                'Tempat Ibadah',
                'Digunakan untuk menyebut tempat suci umat Hindu Bali.'
                )"
                class="item-istilah grid grid-cols-[170px_120px_1fr] py-6 items-center cursor-pointer hover:bg-[#2A1A10] hover:px-4 transition-all duration-300 rounded-lg">

                <h3 class="text-white text-4xl font-bold" style="font-family:'Cormorant Garamond',serif;">

                    Pura

                </h3>

                <span
                    class="text-[10px] uppercase tracking-[2px]
                border border-[#6A5135]
                text-[#C89438]
                rounded
                px-3 py-1 w-fit">

                    Tempat

                </span>

                <p class="text-[#C8B299] leading-8">

                    Tempat ibadah umat Hindu Bali. Setiap desa adat
                    memiliki Pura Kahyangan Tiga sebagai pusat spiritual.

                </p>

            </div>

            <!-- Item 3 -->
            <div onclick="openIstilah(
                'Odalan',
                'Upacara',
                'Hari jadi pura yang dirayakan setiap 210 hari berdasarkan kalender Pawukon Bali.',
                'Odalan merupakan tradisi peringatan hari jadi sebuah pura yang telah diwariskan secara turun-temurun sejak masa kerajaan Hindu di Bali. Pelaksanaannya mengikuti kalender Pawukon atau kalender Saka, tergantung tradisi masing-masing pura. Selain menjadi bentuk rasa syukur kepada Tuhan, Odalan juga menjadi momen mempererat persaudaraan masyarakat melalui gotong royong, persembahyangan, dan pelestarian seni budaya Bali.',
                'Hari Jadi Pura',
                'Digunakan untuk menyebut peringatan berdirinya sebuah pura.'
                )"
                class="item-istilah grid grid-cols-[170px_120px_1fr] py-6 items-center cursor-pointer hover:bg-[#2A1A10] hover:px-4 transition-all duration-300 rounded-lg">

                <h3 class="text-white text-4xl font-bold" style="font-family:'Cormorant Garamond',serif;">

                    Odalan

                </h3>

                <span
                    class="text-[10px] uppercase tracking-[2px]
                border border-[#6A5135]
                text-[#C89438]
                rounded
                px-3 py-1 w-fit">

                    Upacara

                </span>

                <p class="text-[#C8B299] leading-8">

                    Hari jadi pura yang dirayakan setiap 210 hari
                    berdasarkan kalender Pawukon Bali.

                </p>

            </div>

            <!-- Item 4 -->
            <div onclick="openIstilah(
                'Banten',
                'Upacara',
                'Sesaji atau persembahan dalam upacara adat Bali yang terdiri dari berbagai unsur simbolis.',
                'Banten telah menjadi bagian dari tradisi masyarakat Bali sejak berkembangnya ajaran Hindu di Nusantara. Sebagai sarana persembahan suci, setiap banten memiliki bentuk, warna, dan susunan yang mengandung makna filosofis. Banten melambangkan ketulusan hati, rasa syukur, dan penghormatan kepada Tuhan, leluhur, serta alam semesta, sehingga selalu digunakan dalam berbagai upacara keagamaan di Bali.',
                'Sesaji',
                'Digunakan dalam seluruh upacara keagamaan Hindu Bali.'
                )"
                class="item-istilah grid grid-cols-[170px_120px_1fr] py-6 items-center cursor-pointer hover:bg-[#2A1A10] hover:px-4 transition-all duration-300 rounded-lg">

                <h3 class="text-white text-4xl font-bold" style="font-family:'Cormorant Garamond',serif;">

                    Banten

                </h3>

                <span
                    class="text-[10px] uppercase tracking-[2px]
                border border-[#6A5135]
                text-[#C89438]
                rounded
                px-3 py-1 w-fit">

                    Upacara

                </span>

                <p class="text-[#C8B299] leading-8">

                    Sesaji atau persembahan dalam upacara adat Bali
                    yang terdiri dari berbagai unsur simbolis.

                </p>

            </div>

            <!-- Item 5 -->
            <div onclick="openIstilah(
                'Sekaa',
                'Sosial',
                'Kelompok masyarakat Bali yang dibentuk berdasarkan kesamaan fungsi atau minat.',
                'Sekaa merupakan organisasi tradisional masyarakat Bali yang telah ada sejak zaman kerajaan sebagai wadah kebersamaan dalam menjalankan kegiatan adat, keagamaan, kesenian, maupun sosial. Pembentukan sekaa didasarkan pada semangat gotong royong dan tanggung jawab bersama. Hingga saat ini, berbagai jenis sekaa seperti Sekaa Teruna, Sekaa Gong, dan Sekaa Subak masih berperan penting dalam menjaga kelestarian budaya dan kehidupan bermasyarakat di Bali.',
                'Kelompok',
                'Digunakan untuk menyebut organisasi atau kelompok masyarakat Bali.'
                )"
                class="item-istilah grid grid-cols-[170px_120px_1fr] py-6 items-center cursor-pointer hover:bg-[#2A1A10] hover:px-4 transition-all duration-300 rounded-lg">

                <h3 class="text-white text-4xl font-bold" style="font-family:'Cormorant Garamond',serif;">

                    Sekaa

                </h3>

                <span
                    class="text-[10px] uppercase tracking-[2px]
                border border-[#6A5135]
                text-[#C89438]
                rounded
                px-3 py-1 w-fit">

                    Sosial

                </span>

                <p class="text-[#C8B299] leading-8">

                    Kelompok masyarakat Bali yang dibentuk berdasarkan
                    kesamaan fungsi atau minat.

                </p>

            </div>

        </div>

    </div>

</section>

<!-- Overlay -->
<div id="overlay" onclick="closeDetail()" class="fixed inset-0 bg-black/60 hidden z-40">
</div>

<!-- Panel Detail -->
<div id="detailPanel"
    class="fixed top-0 right-0 w-[520px] max-w-full h-full
        bg-[#F6E9D7]
        shadow-2xl
        translate-x-full
        transition-all duration-500
        z-50
        overflow-y-auto">

    <div class="p-8">

        <!-- tombol tutup -->
        <button onclick="closeDetail()"
            class="absolute top-5 right-5
                w-10 h-10 rounded-full
                bg-[#E8D6BD]
                hover:bg-[#D8C3A3]
                flex items-center justify-center font-bold text-[#5C4836] transition">

            ✕

        </button>

        <!-- Judul -->
        <h2 id="detailTitle" style="font-family:'Cormorant Garamond',serif;" class="text-6xl font-bold text-[#24160E]">

            Ngaben

        </h2>

        <!-- Kategori -->
        <span id="detailKategori"
            class="inline-block mt-4
                border border-[#C79A4A]
                text-[#B57D27]
                uppercase
                tracking-[2px]
                text-[11px]
                px-3 py-1 rounded">

            Upacara

        </span>

        <!-- Deskripsi -->
        <p id="detailDesc" class="mt-8 text-[#675A4D] leading-10 text-[18px]">

            Upacara kremasi jenazah dalam agama Hindu Bali.
            Tujuannya membebaskan roh dari ikatan duniawi.

        </p>

        <!-- Sejarah -->
        <div class="mt-10">

            <p class="uppercase tracking-[4px] text-[11px] text-[#C58A3C] font-semibold">
                SEJARAH
            </p>

            <div id="detailSejarah" class="mt-4 text-[#675A4D] leading-9">

            </div>

        </div>

        <hr class="my-8 border-[#E5D6BF]">

        <!-- Contoh -->
        <p class="uppercase text-xs tracking-[3px] text-[#B7832E] font-semibold">

            Contoh Penggunaan

        </p>

        <div class="mt-3 bg-[#F1DFC3]
                border border-[#D7BE99]
                rounded-lg p-5">

            <p id="detailContoh" class="italic text-[#5D4937]">

                "Ngaben Ida Bagus Rai..."

            </p>

        </div>

        <!-- Padanan -->
        <p class="uppercase text-xs tracking-[3px] text-[#B7832E] font-semibold mt-8">

            Padanan Kata

        </p>

        <p id="detailPadanan" class="mt-3 text-[#5C4836]">

            Kremasi

        </p>

        <!-- Konteks -->
        <p class="uppercase text-xs tracking-[3px] text-[#B7832E] font-semibold mt-8">

            Konteks

        </p>

        <div class="mt-3 bg-[#F7E4DA]
                border border-[#DAB39C]
                rounded-lg p-5">

            <p id="detailKonteks" class="text-[#5C4836]">

                Digunakan dalam Bahasa Bali Alus.

            </p>

        </div>

    </div>

</div>

<!-- SCRIPT PENCARIAN KHUSUS JUDUL & OPERASIONAL MODAL -->
<script>
    // 1. Fungsi Pencarian Khusus Judul (Tag <h3>)
    function filterIstilahList(keyword) {
        const query = keyword.trim().toLowerCase();
        const btnClear = document.getElementById("btnClearSearchIstilah");

        if (btnClear) {
            if (query.length > 0) {
                btnClear.classList.remove("hidden");
            } else {
                btnClear.classList.add("hidden");
            }
        }

        const items = document.querySelectorAll("#listIstilahContainer .item-istilah");

        items.forEach(item => {
            // AMBIL ELEMEN JUDUL SAJA (h3)
            const judulEl = item.querySelector("h3");

            if (judulEl) {
                // Ambil teks khusus dari Judul (misal: "Pura", "Odalan", "Ngaben")
                const judulText = judulEl.innerText.trim().toLowerCase();

                // Cek apakah Judul mengandung kata kunci pencarian
                if (query === "" || judulText.includes(query)) {
                    item.style.setProperty("display", "grid", "important");
                } else {
                    item.style.setProperty("display", "none", "important");
                }
            }
        });
    }
</script>
