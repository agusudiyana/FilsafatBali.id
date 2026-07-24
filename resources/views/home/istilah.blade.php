    <section id="sectionIstilah" class="bg-[#1A110A] py-24 hidden">

        <div class="max-w-7xl mx-auto px-8">

            <!-- Header -->
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

                <!-- Tab -->
                <div class="flex border border-[#5A432A] rounded-lg overflow-hidden">

                    <button id="btnSatua" onclick="showSatua()"
                        class="text-[#B9986D] px-8 py-3 uppercase tracking-[2px] text-xs">

                        Satua Bali

                    </button>

                    <button id="btnIstilah" onclick="showIstilah()"
                        class="bg-[#C48D2D] text-white px-8 py-3 uppercase tracking-[2px] text-xs">

                        Istilah Bali

                    </button>

                </div>

            </div>

            <!-- Search -->
            <div class="mb-10">

                <input type="text" placeholder="Cari istilah..."
                    class="w-full max-w-md
                bg-transparent
                border border-[#3E2D1E]
                rounded-md
                px-5 py-3
                text-[#D8C7AE]
                placeholder:text-[#6E5B45]
                outline-none
                focus:border-[#C48D2D]">

            </div>

            <!-- LIST ISTILAH -->

            <div class="divide-y divide-[#3E2D1E]">

                <!-- Item 1 -->
                <div onclick="openIstilah(
                    'Ngaben',
                    'Upacara',
                    'Upacara kremasi jenazah dalam agama Hindu Bali. Tujuannya membebaskan roh dari ikatan duniawi.',
                    'Ngaben Ida Bagus Rai dilaksanakan secara nista madya.',
                    'Kremasi (Indonesia)',
                    'Digunakan dalam upacara Pitra Yadnya.'
                    )"
                    class="grid grid-cols-[170px_120px_1fr] py-6 items-center cursor-pointer hover:bg-[#2A1A10] hover:px-4 transition-all duration-300 rounded-lg">

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
                    'Masyarakat sembahyang di Pura Desa saat Hari Raya Galungan.',
                    'Tempat Ibadah',
                    'Digunakan untuk menyebut tempat suci umat Hindu Bali.'
                    )"
                    class="grid grid-cols-[170px_120px_1fr] py-6 items-center cursor-pointer hover:bg-[#2A1A10] hover:px-4 transition-all duration-300 rounded-lg">
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
                    'Odalan di Pura Desa akan dilaksanakan minggu depan.',
                    'Hari Jadi Pura',
                    'Digunakan untuk menyebut peringatan berdirinya sebuah pura.'
                    )"
                    class="grid grid-cols-[170px_120px_1fr] py-6 items-center cursor-pointer hover:bg-[#2A1A10] hover:px-4 transition-all duration-300 rounded-lg">

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
                    'Ibu sedang membuat banten untuk persembahyangan.',
                    'Sesaji',
                    'Digunakan dalam seluruh upacara keagamaan Hindu Bali.'
                    )"
                    class="grid grid-cols-[170px_120px_1fr] py-6 items-center cursor-pointer hover:bg-[#2A1A10] hover:px-4 transition-all duration-300 rounded-lg">

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
                    'Sekaa Teruna membantu persiapan acara desa.',
                    'Kelompok',
                    'Digunakan untuk menyebut organisasi atau kelompok masyarakat Bali.'
                    )"
                    class="grid grid-cols-[170px_120px_1fr] py-6 items-center cursor-pointer hover:bg-[#2A1A10] hover:px-4 transition-all duration-300 rounded-lg">

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


        <!-- Overlay -->
        <div id="overlay" class="fixed inset-0 bg-black/60 hidden z-40">
        </div>

        <!-- Panel Detail -->
        <div id="detailPanel"
            class="fixed top-0 right-0 w-[520px] h-full
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
            hover:bg-[#D8C3A3]">

                    ✕

                </button>

                <!-- Judul -->
                <h2 id="detailTitle" style="font-family:'Cormorant Garamond',serif;"
                    class="text-6xl font-bold text-[#24160E]">

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
                <p id="detailDesc" class="mt-8 text-[#544433] leading-9 text-lg">

                    Upacara kremasi jenazah dalam agama Hindu Bali.

                </p>

                <hr class="my-8">

                <!-- Contoh -->
                <p class="uppercase text-xs tracking-[3px] text-[#B7832E]">

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
                <p class="uppercase text-xs tracking-[3px] text-[#B7832E] mt-8">

                    Padanan Kata

                </p>

                <p id="detailPadanan" class="mt-3 text-[#5C4836]">

                    Kremasi

                </p>

                <!-- Konteks -->
                <p class="uppercase text-xs tracking-[3px] text-[#B7832E] mt-8">

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

    </section>
