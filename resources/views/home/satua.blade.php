<section id="sectionSatua" class="bg-[#1A110A] py-24">

    <div class="max-w-7xl mx-auto px-8">

        <!-- Judul -->
        <div class="flex justify-between items-center mb-12">

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
            <div class="flex border border-[#6E4E1E] rounded-lg overflow-hidden">

                <button id="btnSatua" onclick="showSatua()" class="px-8 py-3 bg-[#C58A3C] text-white">
                    SATUA BALI
                </button>

                <button id="btnIstilah" onclick="showIstilah()" class="px-8 py-3 bg-transparent text-[#C58A3C]">
                    ISTILAH BALI
                </button>

            </div>

        </div>

        <!-- CARD -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- CARD 1 -->
            <div
                class="group bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E]
                transition-all duration-500
                hover:-translate-y-2
                hover:shadow-2xl
                hover:border-[#C58A3C]">

                <div class="relative overflow-hidden">

                    <img src="{{ asset('images/timunmas.jpg') }}"
                        class="w-full h-56 object-contain transition-transform duration-700 group-hover:scale-110" <!--
                        Overlay -->
                    <div class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45"></div>

                    <!-- Tombol Detail -->
                    <button
                        onclick="openSatua(
                        'Ni Ketimun Mas',
                        'Golden Cucumber Girl',
                        'Kritis',
                        '{{ asset('images/timunmas.jpg') }}',
                        'Hutan musim gugur dan sabana di bagian barat Bali terutama kawasan Taman Nasional Bali Barat.',
                        'Dalam kepercayaan Bali Jalak Bali dianggap simbol kesucian dan keindahan.',
                        'Perburuan liar dan hilangnya habitat akibat alih fungsi lahan.',
                        'Program penangkaran dan pelepasliaran rutin.'
                        )"
                        class="absolute inset-0 flex items-center justify-center
                        opacity-0 group-hover:opacity-100 transition">

                        <a href="#"
                            class="bg-[#F7F0E7]
                            text-[#6F4B2A]
                            px-4 py-2
                            rounded-full
                            text-xs
                            font-semibold
                            flex items-center gap-2
                            shadow-lg">

                            <i data-feather="info" class="w-3 h-3"></i>

                            DETAIL

                        </a>

                    </button>


                </div>
                <div class="p-6">

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl text-white font-bold">
                        Ni Ketimun Mas
                    </h3>

                    <p class="text-[#8F7A61] italic text-sm">
                        Golden Cucumber Girl
                    </p>

                    <p class="text-[#C7B39A] mt-4 leading-7">
                        Cerita rakyat tentang seorang anak perempuan dari timun yang lari dari raksasa dengan bantuan
                        benda sakti
                    </p>
                    <div
                        class="mt-5 flex items-center justify-between
                        opacity-0 max-h-0 overflow-hidden
                        transition-all duration-500
                        group-hover:opacity-100
                        group-hover:max-h-20">

                        <span class="text-xs tracking-[2px] uppercase text-[#C58A3C]">
                            Baca Selengkapnya
                        </span>

                        <i data-feather="arrow-right" class="w-4 h-4 text-[#C58A3C]">
                        </i>

                    </div>
                </div>

            </div>

            <!-- CARD 2 -->
            <div
                class="group bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E]
                transition-all duration-500
                hover:-translate-y-2
                hover:shadow-2xl
                hover:border-[#C58A3C]">

                <div class="relative overflow-hidden">

                    <img src="{{ asset('images/siapselem.jpg') }}"
                        class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110">

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45"></div>

                    <!-- Tombol Detail -->
                    <button
                        onclick="openSatua(
                        'I Siap Selem',
                        'The Black Chicken',
                        'SATUA',
                        '{{ asset('images/siapselem.jpg') }}',
                        'I Siap Selem adalah satua Bali yang menceritakan seekor induk ayam hitam beserta tujuh anaknya.',
                        'I Siap Selem<br>I Doglagan<br>Enam anak ayam lainnya',
                        '1. Hidup bersama.<br>2. Anak-anak bermain.<br>3. I Doglagan tersesat.<br>4. Sang induk mencari.<br>5. Keluarga berkumpul kembali.',
                        'Kasih sayang ibu, kepedulian, dan kebersamaan keluarga.',
                        'Cinta seorang ibu tidak mengenal batas dan keluarga harus saling menjaga.'
                        )"
                        class="absolute inset-0 flex items-center justify-center
                        opacity-0 group-hover:opacity-100 transition-all duration-500">

                        <a href="#"
                            class="bg-[#F7F0E7]
                            text-[#6F4B2A]
                            px-4 py-2
                            rounded-full
                            text-xs
                            font-semibold
                            flex items-center gap-2
                            shadow-lg">

                            <i data-feather="info" class="w-3 h-3"></i>

                            DETAIL

                        </a>


                    </button>

                </div>
                <div class="p-6">

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl text-white font-bold">
                        I Siap Selem
                    </h3>

                    <p class="text-[#8F7A61] italic text-sm">
                        The Black Chicken
                    </p>

                    <p class="text-[#C7B39A] mt-4 leading-7">
                        Cerita rakyat tradisional Bali yang mengisahkan tentang seekor induk ayam hitam bernama I Siap
                        Selem dan ketujuh anaknya, termasuk si bungsu yang bernama I Doglagan
                    </p>
                    <div
                        class="mt-5 flex items-center justify-between
                        opacity-0 max-h-0 overflow-hidden
                        transition-all duration-500
                        group-hover:opacity-100
                        group-hover:max-h-20">

                        <span class="text-xs tracking-[2px] uppercase text-[#C58A3C]">
                            Baca Selengkapnya
                        </span>

                        <i data-feather="arrow-right" class="w-4 h-4 text-[#C58A3C]">
                        </i>

                    </div>
                </div>

            </div>

            <!-- CARD 3 -->
            <div
                class="group bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E]
                transition-all duration-500
                hover:-translate-y-2
                hover:shadow-2xl
                hover:border-[#C58A3C]">

                <div class="relative overflow-hidden">

                    <img src="{{ asset('images/ilutung.jpg') }}"
                        class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110">

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45"></div>

                    <!-- Tombol Detail -->
                    <button
                        onclick="openSatua(
                        'I Lutung teken I Kekua',
                        'The Lutung and the Monkey',
                        'SATUA',
                        '{{ asset('images/ilutung.jpg') }}',
                        'Persahabatan lutung dan monyet yang diuji oleh sifat serakah.',
                        'I Lutung<br>I Kekua',
                        '1. Bersahabat.<br>2. Mencari makanan.<br>3. Serakah.<br>4. Bertengkar.<br>5. Menyesal.',
                        'Jangan serakah dan jangan mengkhianati teman.',
                        'Persahabatan lebih berharga daripada keuntungan sesaat.'
                        )"
                        class="absolute inset-0 flex items-center justify-center
                        opacity-0 group-hover:opacity-100 transition-all duration-500">

                        <a href="#"
                            class="bg-[#F7F0E7]
                            text-[#6F4B2A]
                            px-4 py-2
                            rounded-full
                            text-xs
                            font-semibold
                            flex items-center gap-2
                            shadow-lg">

                            <i data-feather="info" class="w-3 h-3"></i>

                            DETAIL

                        </a>


                    </button>


                </div>

                <div class="p-6">

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl text-white font-bold">
                        I Lutung teken I Kekua
                    </h3>

                    <p class="text-[#8F7A61] italic text-sm">
                        The Lutung and the Monkey
                    </p>

                    <p class="text-[#C7B39A] mt-4 leading-7">
                        I Lutung tekén I Kekua adalah cerita rakyat Bali tentang persahabatan monyet dan kura-kura yang
                        berisi sifat licik, rasa serakah, dan akibat buruk.
                    </p>
                    <div
                        class="mt-5 flex items-center justify-between
                        opacity-0 max-h-0 overflow-hidden
                        transition-all duration-500
                        group-hover:opacity-100
                        group-hover:max-h-20">

                        <span class="text-xs tracking-[2px] uppercase text-[#C58A3C]">
                            Baca Selengkapnya
                        </span>

                        <i data-feather="arrow-right" class="w-4 h-4 text-[#C58A3C]">
                        </i>

                    </div>
                </div>

            </div>
            <!-- CARD 4 -->
            <div
                class="group bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E]
                transition-all duration-500
                hover:-translate-y-2
                hover:shadow-2xl
                hover:border-[#C58A3C]">

                <div class="relative overflow-hidden">

                    <img src="{{ asset('images/ibawang.jpeg') }}"
                        class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110">

                    <div class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45"></div>

                    <button
                        onclick="openSatua(
                            'Ni Bawang teken Ni Kesuna',
                            'The Tale of Ni Bawang and Ni Kesuna',
                            'SATUA',
                            '{{ asset('images/ibawang.jpeg') }}',

                            'Ni Bawang teken Ni Kesuna merupakan satua Bali yang mengisahkan dua saudara dengan sifat yang sangat berbeda. Ni Bawang dikenal rajin, sabar, dan berhati baik, sedangkan Ni Kesuna pemalas, iri hati, dan sering berbuat curang.',

                            'Ni Bawang<br>Ni Kesuna<br>Ibu',

                            '1. Ni Bawang hidup sederhana dan rajin.<br>2. Ni Kesuna iri kepada saudaranya.<br>3. Ni Bawang mendapat balasan karena kebaikannya.<br>4. Ni Kesuna mencoba meniru dengan niat buruk.<br>5. Ni Kesuna menerima akibat dari keserakahannya.',

                            'Rajin bekerja, bersikap jujur, rendah hati, dan tidak iri terhadap orang lain.',

                            'Setiap perbuatan memiliki konsekuensi. Kebaikan akan membawa kebahagiaan, sedangkan keserakahan akan membawa penderitaan.'
                            )"
                        class="absolute inset-0 flex items-center justify-center
                            opacity-0 group-hover:opacity-100 transition-all duration-500">

                        <a href="#"
                            class="bg-[#F7F0E7]
                            text-[#6F4B2A]
                            px-4 py-2
                            rounded-full
                            text-xs
                            font-semibold
                            flex items-center gap-2
                            shadow-lg">

                            <i data-feather="info" class="w-3 h-3"></i>

                            DETAIL

                        </a>


                    </button>


                </div>

                <div class="p-6">

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl text-white font-bold">
                        Ni Bawang teken Ni Kesuna
                    </h3>

                    <p class="text-[#8F7A61] italic text-sm">
                        The Tale of Ni Bawang and Ni Kesuna
                    </p>

                    <p class="text-[#C7B39A] mt-4 leading-7">
                        Ni Bawang teken Ni Kesuna inggih punika silih tunggil satua Bali (cerita rakyat) sané nyritayang
                        indik kalih nyame malianan parilaku, inggih punika Ni Bawang sané belas asih tur rajin, sekadi
                        Ni Kesuna sané sombong tur males.
                    </p>
                    <div
                        class="mt-5 flex items-center justify-between
                        opacity-0 max-h-0 overflow-hidden
                        transition-all duration-500
                        group-hover:opacity-100
                        group-hover:max-h-20">

                        <span class="text-xs tracking-[2px] uppercase text-[#C58A3C]">
                            Baca Selengkapnya
                        </span>

                        <i data-feather="arrow-right" class="w-4 h-4 text-[#C58A3C]">
                        </i>

                    </div>
                </div>

            </div>
            <!-- CARD 5 -->
            <div
                class="group bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E]
                transition-all duration-500
                hover:-translate-y-2
                hover:shadow-2xl
                hover:border-[#C58A3C]">

                <div class="relative overflow-hidden">

                    <img src="{{ asset('images/tuwung.jpg') }}"
                        class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110">

                    <div class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45">
                    </div>

                    <button
                        onclick="openSatua(
                        'I Tuwung Kuning',
                        'Yellow Eggplant',
                        'SATUA',
                        '{{ asset('images/tuwung.jpg') }}',

                        'I Tuwung Kuning adalah satua Bali yang menceritakan penyesalan orang tua, perjuangan hidup seorang anak, serta pertemuan kembali keluarga yang telah lama berpisah.',

                        'I Tuwung Kuning<br>Ayah<br>Ibu',

                        '1. Terjadi kesalahpahaman dalam keluarga.<br>2. Anak meninggalkan rumah.<br>3. Menjalani kehidupan yang penuh perjuangan.<br>4. Orang tua menyesali perbuatannya.<br>5. Keluarga dipertemukan kembali.',

                        'Kasih sayang keluarga, kesabaran, kerja keras, dan pentingnya saling memaafkan.',

                        'Hubungan keluarga merupakan ikatan yang sangat berharga. Penyesalan akan selalu datang terlambat apabila tidak saling menghargai.'
                        )"
                        class="absolute inset-0 flex items-center justify-center
                        opacity-0 group-hover:opacity-100 transition-all duration-500">

                        <a href="#"
                            class="bg-[#F7F0E7]
                            text-[#6F4B2A]
                            px-4 py-2
                            rounded-full
                            text-xs
                            font-semibold
                            flex items-center gap-2
                            shadow-lg">

                            <i data-feather="info" class="w-3 h-3"></i>

                            DETAIL

                        </a>


                    </button>


                </div>

                <div class="p-6">

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl text-white font-bold">
                        I Tuwung Kuning
                    </h3>

                    <p class="text-[#8F7A61] italic text-sm">
                        yellow eggplant
                    </p>

                    <p class="text-[#C7B39A] mt-4 leading-7">
                        I Tuung Kuning adalah cerita rakyat atau satua Bali yang mengisahkan tentang penyesalan orang
                        tua, perjuangan hidup, serta pertemuan kembali keluarga yang terpisah.
                    <div
                        class="mt-5 flex items-center justify-between
                        opacity-0 max-h-0 overflow-hidden
                        transition-all duration-500
                        group-hover:opacity-100
                        group-hover:max-h-20">

                        <span class="text-xs tracking-[2px] uppercase text-[#C58A3C]">
                            Baca Selengkapnya
                        </span>

                        <i data-feather="arrow-right" class="w-4 h-4 text-[#C58A3C]">
                        </i>

                    </div>
                </div>

            </div>
            <!-- CARD 6 -->
            <div
                class="group bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E]
                transition-all duration-500
                hover:-translate-y-2
                hover:shadow-2xl
                hover:border-[#C58A3C]">

                <div class="relative overflow-hidden">

                    <img src="{{ asset('images/ibelog.jpg') }}"
                        class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110">

                    <div class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45">
                    </div>

                    <div
                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500">

                        <button
                            onclick="openSatua(
                            'I Belog',
                            'The Fool',
                            'SATUA',
                            '{{ asset('images/ibelog.jpg') }}',

                            'I Belog adalah satua Bali yang mengisahkan seorang pemuda yang sangat polos dan sering salah memahami setiap nasihat yang diberikan ibunya sehingga menimbulkan berbagai kejadian lucu.',

                            'I Belog<br>Ibu',

                            '1. Ibu memberi nasihat kepada I Belog.<br>2. I Belog salah memahami setiap perintah.<br>3. Terjadi berbagai kejadian lucu.<br>4. I Belog belajar dari kesalahannya.<br>5. Menjadi pribadi yang lebih bijaksana.',

                            'Pentingnya mendengarkan dengan baik, belajar sebelum bertindak, serta menghormati nasihat orang tua.',

                            'Kebodohan bukanlah sebuah kesalahan apabila seseorang mau belajar. Pengetahuan dan kebijaksanaan diperoleh melalui pengalaman.'
                            )"
                            class="absolute inset-0 flex items-center justify-center
                            opacity-0 group-hover:opacity-100 transition-all duration-500">

                            <a href="#"
                                class="bg-[#F7F0E7]
                            text-[#6F4B2A]
                            px-4 py-2
                            rounded-full
                            text-xs
                            font-semibold
                            flex items-center gap-2
                            shadow-lg">

                                <i data-feather="info" class="w-3 h-3"></i>

                                DETAIL

                            </a>


                        </button>

                    </div>

                </div>

                <div class="p-6">

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl text-white font-bold">
                        I Belog
                    </h3>

                    <p class="text-[#8F7A61] italic text-sm">
                        The Fool
                    </p>

                    <p class="text-[#C7B39A] mt-4 leading-7">
                        I Belog adalah cerita rakyat Bali yang menceritakan tentang seorang pemuda bernama I Belog yang
                        sangat bodoh, polos, dan selalu salah paham dalam mengartikan perintah ibunya.
                    </p>
                    <div
                        class="mt-5 flex items-center justify-between
                        opacity-0 max-h-0 overflow-hidden
                        transition-all duration-500
                        group-hover:opacity-100
                        group-hover:max-h-20">

                        <span class="text-xs tracking-[2px] uppercase text-[#C58A3C]">
                            Baca Selengkapnya
                        </span>

                        <i data-feather="arrow-right" class="w-4 h-4 text-[#C58A3C]">
                        </i>

                    </div>
                </div>

            </div>

        </div>

    </div>

</section>
<!-- Overlay -->
<div id="overlaySatua" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden z-40">

    <!-- Panel -->
    <div id="panelSatua"
        class="absolute right-0 top-0
    w-[42%] h-full
    bg-[#F8F0E5]
    overflow-y-auto
    translate-x-full
    transition-all duration-500">

        <!-- Tombol Close -->
        <button onclick="closeSatua()" class="absolute top-5 right-5 w-12 h-12 rounded-full bg-[#EBD9BF]">
            ✕
        </button>

        <!-- Gambar -->
        <div class="relative">

            <img id="satuaImage" class="w-full h-64 object-cover">

            <div class="absolute inset-0 bg-black/35"></div>

            <div class="absolute bottom-8 left-8">

                <span id="satuaStatus" class="bg-[#9C2C1D] text-white px-3 py-1 rounded text-xs uppercase"></span>

                <h2 id="satuaNama" class="text-white text-5xl font-bold mt-4"
                    style="font-family:'Cormorant Garamond',serif;">
                </h2>

                <p id="satuaLatin" class="text-gray-300 italic"></p>

            </div>

        </div>

        <!-- Isi -->
        <div class="p-8 space-y-8">

            <div class="border-l-2 border-[#C58A3C] pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-[#C58A3C]">
                    Ringkasan Cerita
                </h5>

                <p id="satuaRingkasan" class="mt-2 text-[#5F4B3A] leading-8"></p>
            </div>

            <div class="border-l-2 border-[#8B5E3C] pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-[#8B5E3C]">
                    Tokoh Utama
                </h5>

                <p id="satuaTokoh" class="mt-2 text-[#5F4B3A] leading-8"></p>
            </div>

            <div class="border-l-2 border-[#D4A64A] pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-[#D4A64A]">
                    Alur Cerita
                </h5>

                <p id="satuaAlur" class="mt-2 text-[#5F4B3A] leading-8"></p>
            </div>

            <div class="border-l-2 border-[#2E8B57] pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-[#2E8B57]">
                    Nilai Moral
                </h5>

                <p id="satuaMoral" class="mt-2 text-[#5F4B3A] leading-8"></p>
            </div>

            <div class="border-l-2 border-[#A63C2F] pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-[#A63C2F]">
                    Pesan Filosofi
                </h5>

                <p id="satuaFilosofi" class="mt-2 text-[#5F4B3A] leading-8"></p>
            </div>

        </div>

    </div>

</div>
