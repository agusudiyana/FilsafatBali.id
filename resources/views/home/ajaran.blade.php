<section id="ajaran" class="bg-[#1A120C] py-24">
    <div class="max-w-[1200px] mx-auto px-6">

        <p class="uppercase tracking-[6px] text-[#D4A64A] text-xs mb-3">
            SOROTAN
        </p>

        <h2 class="text-[66px] leading-[0.95] font-semibold mb-12 text-[#F7F1E8]"
            style="font-family:'Cormorant Garamond',serif;">
            Ajaran Tetua
        </h2>

        <div class="grid lg:grid-cols-[540px_1fr] gap-14 items-center">

            <!-- FOTO BERSAMA OVERLAY HOVER -->
            <div class="relative w-[540px] h-[420px] rounded-xl overflow-hidden shadow-xl group cursor-pointer" onclick="openAjaran()">
                <img id="mainImage" src="{{ asset('images/tri-hita-karana.jpg') }}"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                <!-- Badge Lokasi (Pojok Kiri Bawah) -->
                <div class="absolute bottom-4 left-4 z-10 flex items-center gap-1.5 bg-black/40 backdrop-blur-md px-3 py-1.5 rounded-md text-[#D4A64A] text-xs">
                    <i data-feather="map-pin" class="w-3.5 h-3.5"></i>
                    <span id="mainLocation" class="uppercase tracking-wider font-medium text-[10px]">DENPASAR</span>
                </div>

                <!-- Overlay Gelap + Tombol Hover "BACA SELENGKAPNYA" -->
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <button class="bg-[#F7F1E8] text-[#241308] px-6 py-3 rounded-md text-xs tracking-[2px] font-semibold uppercase flex items-center gap-2 shadow-lg hover:bg-[#E2D6C5] transition transform translate-y-2 group-hover:translate-y-0 duration-300">
                        <i data-feather="info" class="w-4 h-4 text-[#8D6627]"></i>
                        Baca Selengkapnya
                    </button>
                </div>
            </div>

            <!-- KONTEN -->
            <div>
                <span id="mainTag"
                    class="inline-block border border-[#8B6528] text-[#D4A64A] bg-transparent text-[10px] tracking-[3px] uppercase px-4 py-2 rounded-md">
                    AJARAN TETUA
                </span>
                
                <h2 id="mainTitle"
                    class="mt-6 text-[64px] leading-[0.95] font-semibold text-[#F7F1E8]"
                    style="font-family:'Cormorant Garamond',serif;">
                    Tri Hita Karana
                </h2>
                
                <p id="mainDesc"
                    class="mt-7 text-[#E5D7C8] text-[19px] leading-[38px] font-normal">
                    Tri Hita Karana merupakan filosofi kehidupan masyarakat Bali yang mengajarkan keharmonisan hubungan manusia dengan Tuhan, sesama manusia, dan alam.
                </p>

                <div class="flex justify-between items-end mt-10">
                    <!-- Profil -->
                    <div id="mainProfile" class="flex items-center">
                        <div class="w-14 h-14 rounded-full bg-[#7C5216] flex items-center justify-center">
                            <span class="text-[#D4A64A] font-semibold">I</span>
                        </div>
                        <div class="ml-4">
                            <h4 id="mainAuthor" class="text-[#F8F2E8] text-[30px] font-semibold"
                                style="font-family:'Cormorant Garamond',serif;">
                                Ida Bagus Mantra
                            </h4>
                            <p id="mainRole" class="text-[#A98C67] uppercase tracking-[3px] text-[11px]">
                                EST. 1940
                            </p>
                        </div>
                    </div>

                    <!-- Tombol Detail -->
                    <button id="mainButton" onclick="openAjaran()"
                        class="border border-[#8D6627] text-[#D4A64A] px-8 py-3 rounded-md hover:bg-[#D4A64A] hover:text-[#241308] transition">
                        DETAIL →
                    </button>
                </div>
            </div>

        </div>

        <!-- THUMBNAIL + DOT -->
        <div class="mt-10 flex flex-col items-center">
            <div class="flex gap-4 items-center">
                <!-- TRI HITA KARANA -->
                <div onclick="changeSlide(1)" id="thumb1"
                    class="thumb relative w-[360px] h-[90px] rounded-xl overflow-hidden cursor-pointer border-2 border-[#D4A64A] transition-all duration-500">
                    <img src="{{ asset('images/ajaran.jpeg') }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/50"></div>
                    <span class="absolute bottom-3 left-3 text-white font-semibold">Tri Hita Karana</span>
                </div>

                <!-- TAT TWAM ASI -->
                <div onclick="changeSlide(2)" id="thumb2"
                    class="thumb relative w-[360px] h-[90px] rounded-xl overflow-hidden cursor-pointer border-2 border-transparent transition-all duration-500">
                    <img src="{{ asset('images/tat twam asi.jpeg') }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/50"></div>
                    <span class="absolute bottom-3 left-3 text-white font-semibold">Tat Twam Asi</span>
                </div>

                <!-- DESA KALA PATRA -->
                <div onclick="changeSlide(3)" id="thumb3"
                    class="thumb relative w-[360px] h-[90px] rounded-xl overflow-hidden cursor-pointer border-2 border-transparent transition-all duration-500">
                    <img src="{{ asset('images/desa kala patra.jpeg') }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/50"></div>
                    <span class="absolute bottom-3 left-3 text-white font-semibold">Desa Kala Patra</span>
                </div>
            </div>

            <!-- DOT -->
            <div class="flex justify-center gap-2 mt-5">
                <span id="dot1" class="w-2 h-2 rounded-full bg-[#D9B35D]"></span>
                <span id="dot2" class="w-2 h-2 rounded-full bg-[#665548]"></span>
                <span id="dot3" class="w-2 h-2 rounded-full bg-[#665548]"></span>
            </div>
        </div>

    </div>
</section>

<!-- OVERLAY & PANEL DRAWER AJARAN TETUA -->
<div id="overlayAjaran" class="fixed inset-0 bg-black/60 backdrop-blur-md z-[9999] hidden opacity-0 transition-opacity duration-300">
    
    <!-- Panel meluncur dari Kanan -->
    <div id="panelAjaran" class="fixed top-0 right-0 h-full w-full sm:w-[550px] md:w-[50%] bg-[#FAF5ED] shadow-2xl overflow-y-auto transform translate-x-full transition-transform duration-500 ease-in-out">
        
        <!-- Header Banner Image -->
        <div class="relative h-64 md:h-80 w-full">
            <img id="panelImage" src="{{ asset('images/tri-hita-karana.jpg') }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-[#FAF5ED] via-black/40 to-black/20"></div>

            <!-- Tombol Close (X) -->
            <button onclick="closeAjaran()" class="absolute top-6 right-6 w-10 h-10 rounded-full bg-black/40 hover:bg-black/60 text-white flex items-center justify-center font-bold transition backdrop-blur-sm z-20">
                ✕
            </button>

            <!-- Judul Banner di atas gambar -->
            <div class="absolute bottom-6 left-8 right-8">
                <!-- Tags -->
                <div id="panelTags" class="flex gap-2 mb-2">
                    <span class="bg-[#C7962B]/80 text-white text-[9px] tracking-[2px] uppercase px-3 py-1 rounded backdrop-blur-sm font-semibold">FILOSOFI</span>
                    <span class="bg-[#C7962B]/80 text-white text-[9px] tracking-[2px] uppercase px-3 py-1 rounded backdrop-blur-sm font-semibold">HARMONI</span>
                </div>
                <h2 id="panelTitle" style="font-family:'Cormorant Garamond',serif;" class="text-3xl md:text-5xl font-bold text-[#23160E] leading-tight">
                    Tri Hita Karana
                </h2>
                <p id="panelSubHeader" class="text-xs text-[#8B6D48] mt-1 font-medium tracking-wider">
                    📍 UBUD, GIANYAR • DIDIRIKAN TAHUN 1965
                </p>
            </div>
        </div>

        <!-- Body Content -->
        <div class="p-8 md:p-10 space-y-8">
            
            <!-- Penjelasan Lengkap -->
            <div>
                <p class="uppercase tracking-[3px] text-xs text-[#C7962B] font-bold mb-3">PENJELASAN LENGKAP</p>
                <div id="panelPenjelasan" class="text-[#675A4D] text-base leading-relaxed space-y-4">
                    <p>Tri Hita Karana berasal dari bahasa Sanskerta: tri (tiga), hita (kebahagiaan/keselamatan), karana (penyebab). Falsafah ini adalah landasan kehidupan masyarakat Bali yang telah ada sejak ribuan tahun.</p>
                </div>
            </div>

            <!-- Tiga Prinsip Utama -->
            <div>
                <p class="uppercase tracking-[3px] text-xs text-[#C7962B] font-bold mb-4">TIGA PRINSIP UTAMA</p>
                <div id="panelPrinsip" class="space-y-4 pl-4 border-l-2 border-[#C7962B]">
                    <div>
                        <h4 class="font-bold text-[#23160E] text-lg" style="font-family:'Cormorant Garamond',serif;">Parhyangan</h4>
                        <p class="text-sm text-[#675A4D] mt-1">Hubungan harmonis antara manusia dan Ida Sang Hyang Widhi Wasa (Tuhan).</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-[#23160E] text-lg" style="font-family:'Cormorant Garamond',serif;">Pawongan</h4>
                        <p class="text-sm text-[#675A4D] mt-1">Hubungan harmonis antar sesama manusia melalui gotong royong dan toleransi.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-[#23160E] text-lg" style="font-family:'Cormorant Garamond',serif;">Palemahan</h4>
                        <p class="text-sm text-[#675A4D] mt-1">Hubungan harmonis antara manusia dan alam sekitar/lingkungan.</p>
                    </div>
                </div>
            </div>

            <!-- Box Contoh Penerapan -->
            <div class="p-6 rounded-lg border border-[#DDBF88] bg-[#F5EACF]">
                <p class="uppercase tracking-[2px] text-[11px] text-[#8B6D48] font-bold mb-2">CONTOH PENERAPAN</p>
                <p id="panelPenerapan" class="text-[#675A4D] text-sm italic leading-relaxed">
                    "Sistem Subak Bali yang mengatur irigasi sawah secara kolektif adalah contoh nyata penerapan Tri Hita Karana — meliputi ritual keagamaan, kerja sama petani, dan pengelolaan alam berkelanjutan."
                </p>
            </div>

            <!-- Sumber -->
            <div class="border-t border-[#E4D4BF] pt-6">
                <p class="uppercase tracking-[2px] text-[10px] text-[#8B6D48] font-bold">SUMBER</p>
                <p id="panelSumber" class="text-xs text-[#8B6D48] mt-1">
                    Sadia, I.W. (1965). Tri Hita Karana dalam Kehidupan Orang Bali. Denpasar: Pustaka Bali.
                </p>
            </div>

        </div>

    </div>
</div>