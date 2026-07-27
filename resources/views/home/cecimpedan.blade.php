<section id="cecimpedan"
        class="relative py-24 overflow-hidden
         bg-gradient-to-b
         from-[#EFE3CC]
         via-[#E8D8B8]
         to-[#E2CEAA]">

        <!-- Garis Atas -->
        <div class="absolute top-0 left-0 w-full h-[1px] bg-[#E7D8B8]"></div>

        <!-- Cahaya kiri -->
        <div
            class="absolute -left-40 top-24
        w-[420px]
        h-[420px]
        rounded-full
        bg-[#FFF7E8]
        opacity-70
        blur-[170px]">
        </div>

        <!-- Cahaya kanan -->
        <div
            class="absolute -right-40 bottom-10
        w-[450px]
        h-[450px]
        rounded-full
        bg-[#F8E9C7]
        opacity-70
        blur-[180px]">
        </div>

        <div class="relative max-w-7xl mx-auto px-8">

            <!-- Judul -->
            <p class="uppercase tracking-[6px] text-[#C58A3C] text-xs mb-4">
                — TEKA-TEKI TRADISIONAL
            </p>

            <h2 style="font-family:'Cormorant Garamond',serif;" class="text-5xl font-bold text-[#23160E]">
                Cecimpedan Bali
            </h2>

            <p class="mt-5 text-[#675A4D] text-lg max-w-2xl">
                Klik kartu untuk menjawab teka-teki, atau buka detail lengkap beserta filosofi maknanya.
            </p>

            <!-- Card -->
            <div id="sliderWrapper" class="mt-14 overflow-x-auto scrollbar-hide scroll-smooth">

                <div id="cecimpedanSlider" class="flex gap-8 w-max">

                    <!-- Card 1 -->
                    <div
                        class="cardCecimpedan bg-white border border-[#E4D4BF] rounded-xl p-7 hover:shadow-xl transition w-[350px] flex-shrink-0 flex flex-col">

                        <!-- Header -->
                        <div class="flex justify-between items-center">
                            <span
                                class="bg-[#C7962B] text-white text-[10px] tracking-[2px] uppercase px-3 py-1 rounded">
                                Sedang
                            </span>
                            <span class="text-[#7C6346] text-xs">
                                #001
                            </span>
                        </div>

                        <!-- Judul -->
                        <h3 style="font-family:'Cormorant Garamond',serif;"
                            class="italic text-[34px] leading-[46px] mt-7 text-[#23160E]">
                            "Bungkusne putih, isinye abang, sabilang karohne makejang ilang."
                        </h3>

                        <!-- Arti -->
                        <p class="mt-5 text-[#675A4D] leading-8">
                            Bungkusnya putih, isinya merah, setiap kali dibuka semuanya habis.
                        </p>

                        <!-- Tombol Buka (Sejajar dengan mt-auto pt-6) -->
                        <a id="btnJawab1" href="javascript:void(0)" onclick="toggleCard1()"
                            class="mt-auto pt-6 flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">
                            <i data-feather="chevron-right" class="w-4 h-4"></i>
                            Jawab Teka-Teki
                        </a>

                        <!-- Detail -->
                        <div id="detailCard1"
                            class="overflow-hidden max-h-0 opacity-0 transition-all duration-700 ease-in-out">
                            <div class="border-t border-[#E4D4BF] mt-6 pt-6">

                                <!-- Tombol sembunyikan -->
                                <a id="btnHideJawaban" href="javascript:void(0)" onclick="hideJawaban1()"
                                    class="hidden flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">
                                    <i data-feather="eye-off"></i>
                                    Sembunyikan Jawaban
                                </a>

                                <!-- Tombol tampil -->
                                <a id="btnShowJawaban" href="javascript:void(0)" onclick="showJawaban1()"
                                    class="flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">
                                    <i data-feather="eye"></i>
                                    Tampilkan Jawaban
                                </a>

                                <!-- Jawaban -->
                                <div id="jawabanCard1" class="hidden">
                                    <div class="mt-7">
                                        <div
                                            class="inline-block border border-[#D7B88A] bg-[#F8F0E5] rounded-md px-7 py-4">
                                            <h3 style="font-family:'Cormorant Garamond',serif;"
                                                class="text-[46px] leading-none text-[#A53D24] font-semibold">
                                                Buah Semangka
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="mt-8 flex">
                                        <div class="w-[2px] bg-[#D5A246] mr-5"></div>
                                        <div>
                                            <p class="uppercase tracking-[4px] text-[10px] text-[#C7962B]">
                                                Makna
                                            </p>
                                            <p class="mt-4 text-[#6B5A45] leading-9">
                                                Cecimpedan ini mengajarkan tentang kerelaan seperti semangka yang melepaskan seluruh isinya ketika dibuka. Manusia juga seharusnya memberi tanpa mengharapkan balasan.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Filosofi -->
                                <div class="mt-6">
                                    <button type="button" onclick="openFilosofi(1)"
                                        class="flex items-center gap-2 mt-6 text-[11px] uppercase tracking-[2px] text-[#6B5A45]">
                                        <i data-feather="info"></i>
                                        Filosofi Lengkap
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>


                    <!-- Card 2 -->
                    <div
                        class="cardCecimpedan bg-white border border-[#E4D4BF] rounded-xl p-7 hover:shadow-xl transition w-[350px] flex-shrink-0 flex flex-col">

                        <!-- Header Card -->
                        <div class="flex justify-between items-center">
                            <span
                                class="bg-[#8F2318] text-white text-[10px] tracking-[2px] uppercase px-3 py-1 rounded">
                                Sulit
                            </span>
                            <span class="text-[#7C6346] text-xs">
                                #002
                            </span>
                        </div>

                        <!-- Judul / Teks Teka-Teki -->
                        <h3 style="font-family:'Cormorant Garamond',serif;"
                            class="italic text-[34px] leading-[46px] mt-7 text-[#23160E]">
                            "Adanne luh, avakne besik, ngalih ya dini ditu, pesu ya di tengah."
                        </h3>

                        <!-- Arti Bahasa Indonesia -->
                        <p class="mt-5 text-[#675A4D] leading-8">
                            Namanya banyak, badannya satu, mencarinya ke sana ke sini, keluarnya di tengah.
                        </p>

                        <!-- Tombol Utama Jawab Teka-Teki (Sejajar dengan mt-auto pt-6) -->
                        <a id="btnJawab2" href="javascript:void(0)" onclick="toggleCard2()"
                            class="mt-auto pt-6 flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">
                            <i data-feather="chevron-right" class="w-4 h-4"></i>
                            Jawab Teka-Teki
                        </a>

                        <!-- Detail Accordion Card 2 -->
                        <div id="detailCard2"
                            class="overflow-hidden max-h-0 opacity-0 transition-all duration-700 ease-in-out">
                            <div class="border-t border-[#E4D4BF] mt-6 pt-6">

                                <!-- Tombol Sembunyikan Jawaban -->
                                <a id="btnHideJawaban2" href="javascript:void(0)" onclick="hideJawaban2()"
                                    class="hidden flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">
                                    <i data-feather="eye-off"></i>
                                    Sembunyikan Jawaban
                                </a>

                                <!-- Tombol Tampilkan Jawaban -->
                                <a id="btnShowJawaban2" href="javascript:void(0)" onclick="showJawaban2()"
                                    class="flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">
                                    <i data-feather="eye"></i>
                                    Tampilkan Jawaban
                                </a>

                                <!-- Box Jawaban -->
                                <div id="jawabanCard2" class="hidden">
                                    <div class="mt-7">
                                        <div
                                            class="inline-block border border-[#D7B88A] bg-[#F8F0E5] rounded-md px-7 py-4">
                                            <h3 style="font-family:'Cormorant Garamond',serif;"
                                                class="text-[38px] leading-none text-[#A53D24] font-semibold">
                                                Jarum Jahit
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="mt-8 flex">
                                        <div class="w-[2px] bg-[#D5A246] mr-5"></div>
                                        <div>
                                            <p class="uppercase tracking-[4px] text-[10px] text-[#C7962B]">
                                                Makna
                                            </p>
                                            <p class="mt-4 text-[#6B5A45] leading-8">
                                                Mengajarkan ketelitian dan fokus pada tujuan utama. Seperti jarum jahit yang menyatukan kain terpisah, manusia harus mampu mempererat keharmonisan.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Filosofi Lengkap Card 2 -->
                                <div class="mt-6">
                                    <button type="button" onclick="openFilosofi(2)"
                                        class="flex items-center gap-2 mt-6 text-[11px] uppercase tracking-[2px] text-[#6B5A45]">
                                        <i data-feather="info"></i>
                                        Filosofi Lengkap
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>


                    <!-- Card 3 -->
                    <div
                        class="cardCecimpedan bg-white border border-[#E4D4BF] rounded-xl p-7 hover:shadow-xl transition w-[350px] flex-shrink-0 flex flex-col">

                        <!-- Header Card -->
                        <div class="flex justify-between items-center">
                            <span
                                class="bg-[#2D6C3F] text-white text-[10px] tracking-[2px] uppercase px-3 py-1 rounded">
                                Mudah
                            </span>
                            <span class="text-[#7C6346] text-xs">
                                #003
                            </span>
                        </div>

                        <!-- Judul / Teks Teka-Teki -->
                        <h3 style="font-family:'Cormorant Garamond',serif;"
                            class="italic text-[34px] leading-[46px] mt-7 text-[#23160E]">
                            "Nongos di tegale, ngelah baju liu pesan, nanging sing taen nganggo."
                        </h3>

                        <!-- Arti Bahasa Indonesia -->
                        <p class="mt-5 text-[#675A4D] leading-8">
                            Tinggal di ladang, punya baju banyak sekali, tetapi tidak pernah memakainya.
                        </p>

                        <!-- Tombol Utama Jawab Teka-Teki (Sejajar dengan mt-auto pt-6) -->
                        <a id="btnJawab3" href="javascript:void(0)" onclick="toggleCard3()"
                            class="mt-auto pt-6 flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">
                            <i data-feather="chevron-right" class="w-4 h-4"></i>
                            Jawab Teka-Teki
                        </a>

                        <!-- Detail Accordion Card 3 -->
                        <div id="detailCard3"
                            class="overflow-hidden max-h-0 opacity-0 transition-all duration-700 ease-in-out">
                            <div class="border-t border-[#E4D4BF] mt-6 pt-6">

                                <!-- Tombol Sembunyikan Jawaban -->
                                <a id="btnHideJawaban3" href="javascript:void(0)" onclick="hideJawaban3()"
                                    class="hidden flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">
                                    <i data-feather="eye-off"></i>
                                    Sembunyikan Jawaban
                                </a>

                                <!-- Tombol Tampilkan Jawaban -->
                                <a id="btnShowJawaban3" href="javascript:void(0)" onclick="showJawaban3()"
                                    class="flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">
                                    <i data-feather="eye"></i>
                                    Tampilkan Jawaban
                                </a>

                                <!-- Box Jawaban -->
                                <div id="jawabanCard3" class="hidden">
                                    <div class="mt-7">
                                        <div
                                            class="inline-block border border-[#D7B88A] bg-[#F8F0E5] rounded-md px-7 py-4">
                                            <h3 style="font-family:'Cormorant Garamond',serif;"
                                                class="text-[38px] leading-none text-[#A53D24] font-semibold">
                                                Pohon Pisang
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="mt-8 flex">
                                        <div class="w-[2px] bg-[#D5A246] mr-5"></div>
                                        <div>
                                            <p class="uppercase tracking-[4px] text-[10px] text-[#C7962B]">
                                                Makna
                                            </p>
                                            <p class="mt-4 text-[#6B5A45] leading-8">
                                                Pohon pisang memiliki pelepah melimpah namun tidak menggunakannya untuk kesombongan. Mengajarkan kedermawanan dan kerendahan hati.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Filosofi Lengkap Card 3 -->
                                <div class="mt-6">
                                    <button type="button" onclick="openFilosofi(3)"
                                        class="flex items-center gap-2 mt-6 text-[11px] uppercase tracking-[2px] text-[#6B5A45]">
                                        <i data-feather="info"></i>
                                        Filosofi Lengkap
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- Card 4 -->
                    <div
                        class="cardCecimpedan bg-white border border-[#E4D4BF] rounded-xl p-7 hover:shadow-xl transition w-[350px] flex-shrink-0 flex flex-col">
                        <!-- Header Card -->
                        <div class="flex justify-between items-center">
                            <span
                                class="bg-[#8F2318] text-white text-[10px] tracking-[2px] uppercase px-3 py-1 rounded">
                                Sulit
                            </span>
                            <span class="text-[#7C6346] text-xs">
                                #004
                            </span>
                        </div>

                        <!-- Judul / Teks Teka-Teki -->
                        <h3 style="font-family:'Cormorant Garamond',serif;"
                            class="italic text-[34px] leading-[46px] mt-7 text-[#23160E]">
                            "Cangak maid baut, awakne bek baan adep."
                        </h3>

                        <!-- Arti Bahasa Indonesia -->
                        <p class="mt-5 text-[#675A4D] leading-8">
                            Burung cangak menarik tali, badannya penuh dengan jualan/barang dagangan.
                        </p>

                        <!-- Tombol Utama Jawab Teka-Teki (Sejajar dengan mt-auto pt-6) -->
                        <a id="btnJawab4" href="javascript:void(0)" onclick="toggleCard4()"
                            class="mt-auto pt-6 flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">
                            <i data-feather="chevron-right" class="w-4 h-4"></i>
                            Jawab Teka-Teki
                        </a>

                        <!-- Detail Accordion Card 4 -->
                        <div id="detailCard4"
                            class="overflow-hidden max-h-0 opacity-0 transition-all duration-700 ease-in-out">
                            <div class="border-t border-[#E4D4BF] mt-6 pt-6">
                                <!-- Tombol Sembunyikan Jawaban -->
                                <a id="btnHideJawaban4" href="javascript:void(0)" onclick="hideJawaban4()"
                                    class="hidden flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">
                                    <i data-feather="eye-off"></i>
                                    Sembunyikan Jawaban
                                </a>

                                <!-- Tombol Tampilkan Jawaban -->
                                <a id="btnShowJawaban4" href="javascript:void(0)" onclick="showJawaban4()"
                                    class="flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">
                                    <i data-feather="eye"></i>
                                    Tampilkan Jawaban
                                </a>

                                <!-- Box Jawaban -->
                                <div id="jawabanCard4" class="hidden">
                                    <div class="mt-7">
                                        <div
                                            class="inline-block border border-[#D7B88A] bg-[#F8F0E5] rounded-md px-7 py-4">
                                            <h3 style="font-family:'Cormorant Garamond',serif;"
                                                class="text-[38px] leading-none text-[#A53D24] font-semibold">
                                                Pena / Bunga Pandan
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="mt-8 flex">
                                        <div class="w-[2px] bg-[#D5A246] mr-5"></div>
                                        <div>
                                            <p class="uppercase tracking-[4px] text-[10px] text-[#C7962B]">
                                                Makna
                                            </p>
                                            <p class="mt-4 text-[#6B5A45] leading-8">
                                                Menggambarkan proses penciptaan karya dan ilmu pengetahuan yang membutuhkan kesabaran dalam merajai atau mengurai benang kehidupan.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Filosofi Lengkap Card 4 -->
                                <div class="mt-6">
                                    <button type="button" onclick="openFilosofi(4)"
                                        class="flex items-center gap-2 mt-6 text-[11px] uppercase tracking-[2px] text-[#6B5A45]">
                                        <i data-feather="info"></i>
                                        Filosofi Lengkap
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div
                        class="cardCecimpedan bg-white border border-[#E4D4BF] rounded-xl p-7 hover:shadow-xl transition w-[350px] flex-shrink-0 flex flex-col">

                        <!-- Header Card -->
                        <div class="flex justify-between items-center">
                            <span
                                class="bg-[#2D6C3F] text-white text-[10px] tracking-[2px] uppercase px-3 py-1 rounded">
                                Mudah
                            </span>
                            <span class="text-[#7C6346] text-xs">
                                #005
                            </span>
                        </div>

                        <!-- Judul / Teks Teka-Teki -->
                        <h3 style="font-family:'Cormorant Garamond',serif;"
                            class="italic text-[34px] leading-[46px] mt-7 text-[#23160E]">
                            "Tekek baet, gembuk melah, jalanne ngengkebang awak."
                        </h3>

                        <!-- Arti Bahasa Indonesia -->
                        <p class="mt-5 text-[#675A4D] leading-8">
                            Keras dan berat di luar, empuk dan bagus di dalam, jalannya selalu bersembunyi.
                        </p>

                        <!-- Tombol Utama Jawab Teka-Teki (Sejajar dengan mt-auto pt-6) -->
                        <a id="btnJawab5" href="javascript:void(0)" onclick="toggleCard5()"
                            class="mt-auto pt-6 flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">
                            <i data-feather="chevron-right" class="w-4 h-4"></i>
                            Jawab Teka-Teki
                        </a>

                        <!-- Detail Accordion Card 5 -->
                        <div id="detailCard5"
                            class="overflow-hidden max-h-0 opacity-0 transition-all duration-700 ease-in-out">
                            <div class="border-t border-[#E4D4BF] mt-6 pt-6">

                                <!-- Tombol Sembunyikan Jawaban -->
                                <a id="btnHideJawaban5" href="javascript:void(0)" onclick="hideJawaban5()"
                                    class="hidden flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">
                                    <i data-feather="eye-off"></i>
                                    Sembunyikan Jawaban
                                </a>

                                <!-- Tombol Tampilkan Jawaban -->
                                <a id="btnShowJawaban5" href="javascript:void(0)" onclick="showJawaban5()"
                                    class="flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">
                                    <i data-feather="eye"></i>
                                    Tampilkan Jawaban
                                </a>

                                <!-- Box Jawaban -->
                                <div id="jawabanCard5" class="hidden">
                                    <div class="mt-7">
                                        <div
                                            class="inline-block border border-[#D7B88A] bg-[#F8F0E5] rounded-md px-7 py-4">
                                            <h3 style="font-family:'Cormorant Garamond',serif;"
                                                class="text-[38px] leading-none text-[#A53D24] font-semibold">
                                                Buah Durian / Kelapa
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="mt-8 flex">
                                        <div class="w-[2px] bg-[#D5A246] mr-5"></div>
                                        <div>
                                            <p class="uppercase tracking-[4px] text-[10px] text-[#C7962B]">
                                                Makna
                                            </p>
                                            <p class="mt-4 text-[#6B5A45] leading-8">
                                                Pentingnya melihat kebaikan hati tanpa menghakimi tampilan fisik. Kebaikan sejati sering tersembunyi di balik sikap yang bersahaja.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Filosofi Lengkap Card 5 -->
                                <div class="mt-6">
                                    <button type="button" onclick="openFilosofi(5)"
                                        class="flex items-center gap-2 mt-6 text-[11px] uppercase tracking-[2px] text-[#6B5A45]">
                                        <i data-feather="info"></i>
                                        Filosofi Lengkap
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- OVERLAY & PANEL FILOSOFI (SLIDE RIGHT DRAWER) -->
    <div id="overlayFilosofi"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[9999] hidden opacity-0 transition-opacity duration-300">

        <!-- Panel Meluncur dari Kanan -->
        <div id="panelFilosofi"
            class="fixed top-0 right-0 h-full w-full sm:w-[500px] md:w-[45%] bg-[#FAF5ED] shadow-2xl overflow-y-auto transform translate-x-full transition-transform duration-500 ease-in-out p-8 md:p-10">

            <!-- Tombol Close (X) -->
            <button onclick="closeFilosofi()"
                class="absolute top-6 right-6 w-10 h-10 rounded-full bg-[#EFE3CC] hover:bg-[#E2D2B3] flex items-center justify-center text-[#23160E] font-bold transition">
                ✕
            </button>

            <!-- Content Inside Panel -->
            <div class="mt-4 text-center">
                <!-- Badge Tingkat -->
                <span id="filosofiTingkat"
                    class="inline-block bg-[#C7962B] text-white text-[10px] tracking-[2px] uppercase px-4 py-1.5 rounded font-semibold">
                    TINGKAT: SEDANG
                </span>

                <!-- Nomor Cecimpedan -->
                <p id="filosofiNomor" class="mt-4 uppercase tracking-[4px] text-[11px] text-[#8B6D48] font-medium">
                    CECIMPEDAN #001
                </p>

                <!-- Teks Teka-Teki -->
                <h2 id="filosofiTeks" style="font-family:'Cormorant Garamond',serif;"
                    class="italic text-2xl md:text-3xl text-[#23160E] font-bold mt-4 leading-relaxed">
                    "Bungkusne putih, isine abang, sabilang karohne makejang ilang."
                </h2>

                <!-- Arti Bahasa Indonesia -->
                <p id="filosofiArti" class="mt-3 text-[#675A4D] italic text-sm">
                    Bungkusnya putih, isinya merah, setiap kali dibuka semuanya habis.
                </p>

                <!-- Accordion / Tombol Jawaban di Panel -->
                <div class="mt-6 border border-[#E4D4BF] rounded-lg p-4 bg-[#F8F0E5] flex justify-between items-center cursor-pointer hover:bg-[#F3E6D3] transition"
                    onclick="toggleJawabanPanel()">
                    <span id="textJawabanPanel" class="text-xs uppercase tracking-[2px] text-[#8B6D48] font-semibold">
                        TAMPILKAN JAWABAN
                    </span>
                    <i data-feather="chevron-right" class="w-4 h-4 text-[#8B6D48]"></i>
                </div>

                <!-- Box Jawaban yang Tersembunyi -->
                <div id="boxJawabanPanel" class="hidden mt-3 p-4 bg-[#E8D8B8] rounded-lg text-left">
                    <p class="text-xs text-[#8B6D48] uppercase tracking-wider font-semibold">Jawaban:</p>
                    <p id="jawabanPanelText" class="text-xl font-bold text-[#A53D24] mt-1"
                        style="font-family:'Cormorant Garamond',serif;">Buah Semangka</p>
                </div>
            </div>

            <hr class="border-[#E4D4BF] my-8">

            <!-- Section Nilai Filosofis -->
            <div>
                <p class="uppercase tracking-[3px] text-xs text-[#C7962B] font-bold mb-4">
                    NILAI FILOSOFIS
                </p>
                <ul id="filosofiList"
                    class="space-y-3 text-[#675A4D] text-sm md:text-base leading-relaxed list-disc pl-5">
                    <li>Kerelaan memberi tanpa mengharapkan kembali</li>
                    <li>Keindahan yang baru terungkap saat dibuka — seperti kepribadian manusia</li>
                    <li>Paradoks: semakin diberikan, semakin bernilai</li>
                </ul>
            </div>

            <!-- Section Variasi Daerah -->
            <div class="mt-8 p-5 rounded-lg border border-[#DDBF88] bg-[#F5EACF]">
                <p class="uppercase tracking-[2px] text-[11px] text-[#8B6D48] font-bold">
                    VARIASI DAERAH
                </p>
                <p id="filosofiVariasi" class="mt-2 text-[#675A4D] text-sm leading-relaxed">
                    Di beberapa daerah, cecimpedan ini juga dijawab dengan 'buah delima' karena kemiripan deskripsinya.
                </p>
            </div>

            <!-- Grid Asal & Rekaman -->
            <div class="grid grid-cols-2 gap-4 mt-6">
                <div class="bg-[#F5EACF] rounded-lg p-4">
                    <p class="uppercase text-[10px] tracking-[2px] text-[#8B6D48] font-bold">
                        ASAL DAERAH
                    </p>
                    <p id="filosofiAsal" class="mt-1 text-xs md:text-sm text-[#23160E] font-medium">
                        Gianyar, Bali Tengah
                    </p>
                </div>

                <div class="bg-[#F5EACF] rounded-lg p-4">
                    <p class="uppercase text-[10px] tracking-[2px] text-[#8B6D48] font-bold">
                        REKAMAN
                    </p>
                    <p id="filosofiRekaman" class="mt-1 text-xs md:text-sm text-[#23160E] font-medium">
                        Direkam tahun 1982 oleh Balai Bahasa Bali
                    </p>
                </div>
            </div>

        </div>
    </div>