<section id="filsafat" class="relative min-h-screen flex items-start justify-center">

    <!-- Background Image -->
    <img src="{{ asset('images/hero.png') }}" alt="Hero Background" class="absolute inset-0 w-full h-full object-cover">

    <!-- Overlay Gelap -->
    <div class="absolute inset-0 bg-black/55"></div>

    <!-- Gradient Transition Bottom -->
    <div class="absolute bottom-0 left-0 w-full h-64 bg-gradient-to-t from-[#F5F0E8] to-transparent"></div>

    <!-- Konten Utama Hero -->
    <div class="relative z-10 text-center max-w-4xl mx-auto px-6 pt-40">

        <!-- Subtitle Header -->
        <div class="max-w-lg mx-auto mb-10">
            <p class="uppercase tracking-[8px] text-[#E2B75B] text-[9px] font-medium text-center whitespace-nowrap">
                Arsip Digital Filsafat & Budaya Bali
            </p>
        </div>

        <!-- Judul Utama Hero -->
        <h1 style="font-family:'Cormorant Garamond',serif;" class="font-bold leading-[0.9]">
            <span class="block text-white text-[58px]">
                Menjaga Warisan,
            </span>
            <span class="block text-[#E2B75B] text-[66px] mt-1">
                Menerangi Masa Depan
            </span>
        </h1>

        <!-- Deskripsi Singkat -->
        <p class="mt-8 max-w-2xl mx-auto text-center text-[17px] md:text-[18px] font-normal leading-[36px] text-[#F3F1EC]"
            style="font-family:'Inter', sans-serif;">
            Platform digital untuk mengakses, mempelajari, dan
            <br>
            melestarikan kearifan lokal Bali.
        </p>

        <!-- KOTAK PENCARIAN (SEARCH CONTAINER) -->
        <div class="mt-8 max-w-2xl mx-auto relative z-[9999]">

            <!-- Field Input Search -->
            <div id="searchBoxContainer"
                class="bg-[#FAF5ED] rounded-xl px-5 h-[54px] flex items-center shadow-2xl transition-all duration-200 w-full shrink-0 ring-2 ring-transparent">

                <!-- Icon Kaca Pembesar -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#8C7A65] mr-3 shrink-0" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>

                <!-- Input Teks Live Search -->
                <input id="searchInput" type="text" placeholder="Cari ajaran, istilah, satua..."
                    class="bg-transparent flex-1 w-full outline-none text-[16px] text-[#2B1A0E] placeholder-[#A0907E] font-medium h-full"
                    onfocus="aktifkanBorderMerah()" oninput="liveSearch(this.value)">

                <!-- Tombol Clear Teks (X) -->
                <button id="btnClearSearch" onclick="clearSearch()"
                    class="hidden text-[#8C7A65] hover:text-[#8D2B1D] font-bold text-lg px-2 shrink-0 transition cursor-pointer">
                    ✕
                </button>
            </div>

            <!-- DROPDOWN HASIL PENCARIAN LIVE -->
            <div id="hasilCari"
                class="hidden absolute left-0 top-full mt-2 w-full bg-[#FAF5ED] rounded-xl border border-[#E5D6BF] shadow-2xl overflow-y-auto max-h-[320px] divide-y divide-[#EADCC9] z-[99999]">
                <!-- Hasil pencarian live akan dirender di sini via JavaScript -->
            </div>

        </div>

        <!-- KEYWORD CHIPS (TOMBOL PENCARIAN CEPAT) -->
        <div id="keywordBox" class="mt-5 flex justify-center flex-wrap gap-3">

            <a href="#" onclick="cariKeyword(event, 'Tri Hita Karana'); return false;"
                class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium hover:bg-white hover:text-black transition">
                TRI HITA KARANA
            </a>

            <a href="#" onclick="cariKeyword(event, 'Ngaben'); return false;"
                class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium hover:bg-white hover:text-black transition">
                NGABEN
            </a>

            <a href="#" onclick="cariKeyword(event, 'I Siap Selem'); return false;"
                class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium hover:bg-white hover:text-black transition">
                I SIAP SELEM
            </a>

            <a href="#" onclick="cariKeyword(event, 'Rwa Bhineda'); return false;"
                class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium hover:bg-white hover:text-black transition">
                RWA BHINEDA
            </a>

            <a href="#" onclick="cariKeyword(event, 'Taksu'); return false;"
                class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium hover:bg-white hover:text-black transition">
                TAKSU
            </a>

            <a href="#" onclick="cariKeyword(event, 'Subak'); return false;"
                class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium hover:bg-white hover:text-black transition">
                SUBAK
            </a>

        </div>

    </div>

</section>
