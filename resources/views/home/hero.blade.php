<section id="filsafat" class="relative min-h-screen flex items-start justify-center overflow-hidden">

        <!-- Background -->
        <img src="{{ asset('images/hero.png') }}" alt="Hero" class="absolute inset-0 w-full h-full object-cover">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/55"></div>

        <div class="absolute bottom-0 left-0 w-full h-64 bg-gradient-to-t from-[#F5F0E8] to-transparent"></div>

        <!-- Isi -->
        <div class="relative z-10 text-center max-w-4xl mx-auto px-6 pt-40">

            <div class="max-w-lg mx-auto mb-10">
                <p class="uppercase tracking-[8px] text-[#E2B75B] text-[9px] font-medium text-center whitespace-nowrap">
                    Arsip Digital Filsafat & Budaya Bali
                </p>
            </div>


            <h1 style="font-family:'Cormorant Garamond',serif;" class="font-bold leading-[0.9]">

                <span class="block text-white text-[58px]">
                    Menjaga Warisan,
                </span>

                <span class="block text-[#E2B75B] text-[66px] mt-1">
                    Menerangi Masa Depan
                </span>

            </h1>

            <p class="mt-8 max-w-2xl mx-auto text-center
           text-[17px] md:text-[18px]
           font-normal
           leading-[36px]
           text-[#F3F1EC]"
                style="font-family:'Inter', sans-serif;">

                Platform digital untuk mengakses, mempelajari, dan
                <br>
                melestarikan kearifan lokal Bali.

            </p>

            <!-- Search -->

            <div class="mt-8 max-w-3xl mx-auto relative">

                <!-- Kotak Search -->
                <div class="bg-[#F5EFE4] rounded-lg px-5 py-4 flex items-center shadow-xl">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 mr-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />

                    </svg>

                    <input id="searchInput" type="text" placeholder="Cari ajaran, istilah, satua..."
                        class="bg-transparent w-full outline-none text-[16px]">

                </div>

                <!-- HASIL PENCARIAN -->
                <div id="hasilCari" class="hidden absolute left-0 top-full mt-2 w-full z-50">
                </div>

            </div>

            <div id="keywordBox" class="mt-5 flex justify-center flex-wrap gap-3">

                <a href="#"
                    onclick="cariKeyword(
                    'Tri Hita Karana',
                    'AJARAN',
                    'Filosofi hidup masyarakat Bali yang menekankan keharmonisan antara manusia, Tuhan, dan alam.'
                    ); return false;"
                    class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium hover:bg-white hover:text-black transition">

                    TRI HITA KARANA

                </a>
                <a href="#"
                    onclick="cariKeyword(
'Ngaben',
'ISTILAH',
'Upacara kremasi jenazah dalam agama Hindu Bali. Bertujuan untuk membebaskan roh dari ikatan duniawi.'
); return false;"
                    class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium hover:bg-white hover:text-black transition">

                    NGABEN

                </a>

                <a href="#"
                    onclick="cariKeyword(
'Jalak Bali',
'SATUA',
'Burung endemik Bali yang menjadi simbol kelestarian alam Pulau Dewata.'
); return false;"
                    class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium hover:bg-white hover:text-black transition">

                    JALAK BALI

                </a>

                <a href="#"
                    onclick="cariKeyword(
                    'Rwa Bhineda',
                    'AJARAN',
                    'Konsep keseimbangan antara dua hal yang berbeda namun saling melengkapi.'
                    ); return false;"
                    class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium hover:bg-white hover:text-black transition">

                    RWA BHINEDA

                </a>

                <a href="#"
                    onclick="cariKeyword(
                    'Taksu',
                    'ISTILAH',
                    'Kekuatan spiritual atau karisma yang dimiliki seseorang dalam berkarya.'
                    ); return false;"
                    class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium hover:bg-white hover:text-black transition">

                    TAKSU

                </a>

                <a href="#"
                    onclick="cariKeyword(
                    'Subak',
                    'AJARAN',
                    'Sistem irigasi tradisional Bali yang diakui UNESCO sebagai warisan budaya dunia.'
                    ); return false;"
                    class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium hover:bg-white hover:text-black transition">

                    SUBAK

                </a>

            </div>


        </div>

    </section>