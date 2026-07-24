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
                        class="w-full h-56 object-contain transition-transform duration-700 group-hover:scale-110"

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45"></div>

                    <!-- Tombol Detail -->
                    <button
                        onclick="openSatua(
                        'Jalak Bali',
                        'Leucopsar rothschildi',
                        'Kritis',
                        '{{ asset('images/timunmas.jpg') }}',
                        'Hutan musim gugur dan sabana di bagian barat Bali terutama kawasan Taman Nasional Bali Barat.',
                        'Dalam kepercayaan Bali Jalak Bali dianggap simbol kesucian dan keindahan.',
                        'Perburuan liar dan hilangnya habitat akibat alih fungsi lahan.',
                        'Program penangkaran dan pelepasliaran rutin.'
                        )"
                        class="absolute inset-0 flex items-center justify-center
                        opacity-0 group-hover:opacity-100 transition">

                        <span
                            class="bg-[#F3E8D7]
                            px-5 py-2
                            rounded-full
                            text-[#6A4321]
                            font-semibold text-sm">
                            Detail
                        </span>

                    </button>


                </div>
                <div class="p-6">

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl text-white font-bold">
                        Ni Ketimun Mas
                    </h3>

                    <p class="text-[#8F7A61] italic text-sm">
                        This is Cucumber Mas
                    </p>

                    <p class="text-[#C7B39A] mt-4 leading-7">
                        Cerita rakyat tentang seorang anak perempuan dari timun yang lari dari raksasa dengan bantuan benda sakti
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

                    <img src="{{ asset('images/penyu hijau.jpeg') }}"
                        class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110">

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45"></div>

                    <!-- Tombol Detail -->
                    <div
                        class="absolute inset-0
                        flex items-center justify-center
                        opacity-0
                        group-hover:opacity-100
                        transition-all duration-500">

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

                    </div>

                </div>
                <div class="p-6">

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl text-white font-bold">
                        I Siap Selem
                    </h3>

                    <p class="text-[#8F7A61] italic text-sm">
                        I'm Ready Selem
                    </p>

                    <p class="text-[#C7B39A] mt-4 leading-7">
                        Cerita rakyat tradisional Bali yang mengisahkan tentang seekor induk ayam hitam bernama I Siap Selem dan ketujuh anaknya, termasuk si bungsu yang bernama I Doglagan
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

                    <img src="{{ asset('images/kera ekor panjang.jpeg') }}"
                        class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110">

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45"></div>

                    <!-- Tombol Detail -->
                    <div
                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500">

                        <a href="#"
                            class="bg-[#F7F0E7] text-[#6F4B2A]
                            px-4 py-2 rounded-full text-xs font-semibold
                            flex items-center gap-2 shadow-lg">

                            <i data-feather="info" class="w-3 h-3"></i>

                            DETAIL

                        </a>

                    </div>


                </div>

                <div class="p-6">

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl text-white font-bold">
                        I Lutung Teken I Kekua 
                    </h3>

                    <p class="text-[#8F7A61] italic text-sm">
                        Macaca fascicularis
                    </p>

                    <p class="text-[#C7B39A] mt-4 leading-7">
                        Satwa yang banyak dijumpai di kawasan pura dan hutan Bali.
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

                    <img src="{{ asset('images/landak jawa.jpg') }}"
                        class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110">

                    <div class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45"></div>

                    <div
                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500">

                        <a href="#"
                            class="bg-[#F7F0E7] text-[#6F4B2A]
                            px-4 py-2 rounded-full text-xs font-semibold
                            flex items-center gap-2 shadow-lg">

                            <i data-feather="info" class="w-3 h-3"></i>

                            DETAIL

                        </a>

                    </div>

                    <span
                        class="absolute bottom-3 right-3
                        bg-[#2E8B57]
                        text-white
                        text-[10px]
                        font-bold
                        uppercase
                        px-2 py-1
                        rounded">

                        AMAN

                    </span>

                </div>

                <div class="p-6">

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl text-white font-bold">
                        Landak Jawa
                    </h3>

                    <p class="text-[#8F7A61] italic text-sm">
                        Hystrix javanica
                    </p>

                    <p class="text-[#C7B39A] mt-4 leading-7">
                        Hewan nokturnal yang dalam mitologi Bali dipercaya sebagai penjaga tanah dari roh jahat.
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

                    <img src="{{ asset('images/elang jawa.jpg') }}"
                        class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110">

                    <div class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45">
                    </div>

                    <div
                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500">

                        <a href="#"
                            class="bg-[#F7F0E7] text-[#6F4B2A]
                            px-4 py-2 rounded-full text-xs font-semibold
                            flex items-center gap-2 shadow-lg">

                            <i data-feather="info" class="w-3 h-3"></i>

                            DETAIL

                        </a>

                    </div>

                    <span
                        class="absolute bottom-3 right-3
                        bg-[#D5A13B]
                        text-white
                        text-[10px]
                        font-bold
                        uppercase
                        px-2 py-1
                        rounded">

                        TERANCAM

                    </span>

                </div>

                <div class="p-6">

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl text-white font-bold">
                        Elang Jawa
                    </h3>

                    <p class="text-[#8F7A61] italic text-sm">
                        Nisaetusbartelsi
                    </p>

                    <p class="text-[#C7B39A] mt-4 leading-7">
                        Rajawali gunung yang menjadi inspirasi lambang Garuda Pancasila. Melambangkan kekuatan
                        agung.
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
            <!-- CARD 6 -->
            <div
                class="group bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E]
                transition-all duration-500
                hover:-translate-y-2
                hover:shadow-2xl
                hover:border-[#C58A3C]">

                <div class="relative overflow-hidden">

                    <img src="{{ asset('images/biawak air.jpeg') }}"
                        class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110">

                    <div class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45">
                    </div>

                    <div
                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500">

                        <a href="#"
                            class="bg-[#F7F0E7] text-[#6F4B2A]
                            px-4 py-2 rounded-full text-xs font-semibold
                            flex items-center gap-2 shadow-lg">

                            <i data-feather="info" class="w-3 h-3"></i>

                            DETAIL

                        </a>

                    </div>

                    <span
                        class="absolute bottom-3 right-3
                        bg-[#2E8B57]
                        text-white
                        text-[10px]
                        font-bold
                        uppercase
                        px-2 py-1
                        rounded">

                        AMAN

                    </span>

                </div>

                <div class="p-6">

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl text-white font-bold">
                        Biawak Air
                    </h3>

                    <p class="text-[#8F7A61] italic text-sm">
                        Varanus salvator
                    </p>

                    <p class="text-[#C7B39A] mt-4 leading-7">
                        Biawak besar di sungai Bali. Dalam kosmologi Bali dikaikan dengan alam bawah (buana bawah).
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

            <div class="border-l-2 border-green-700 pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-green-700">
                    Habitat
                </h5>

                <p id="satuaHabitat" class="mt-2 text-[#5F4B3A]"></p>
            </div>

            <div class="border-l-2 border-red-700 pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-red-700">
                    Makna Adat & Budaya
                </h5>

                <p id="satuaMakna" class="mt-2 text-[#5F4B3A]"></p>
            </div>

            <div class="border-l-2 border-yellow-600 pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-yellow-700">
                    Ancaman
                </h5>

                <p id="satuaAncaman" class="mt-2 text-[#5F4B3A]"></p>
            </div>

            <div class="border-l-2 border-blue-700 pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-blue-700">
                    Upaya Pelestarian
                </h5>

                <p id="satuaPelestarian" class="mt-2 text-[#5F4B3A]"></p>
            </div>

        </div>

    </div>

</div>
