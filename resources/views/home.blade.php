<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FilsafatBali.id</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <style>
        html {
            scroll-behavior: smooth;
        }

        section {
            scroll-margin-top: 100px;
        }

        @keyframes fadeUp {

            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

        .fade-up {

            animation: fadeUp .8s ease;

        }

        .tab-active {
            color: #992B20;
            border-bottom: 2px solid #992B20;
            padding-bottom: 8px;
            font-weight: 600;
        }
    </style>
</head>

<body class="bg-white" style="font-family:'Inter',sans-serif;">

    <!-- ================= NAVBAR ================= -->
    <nav id="navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-300">

        <div class="max-w-7xl mx-auto flex items-center justify-between px-12 pt-2 pb-2">

            <!-- Logo -->
            <div class="leading-none">

                <h1 style="font-family:'Cormorant Garamond',serif;"
                    class="text-[26px] md:text-[28px] font-bold text-[#A73D1F] leading-none">
                    FilsafatBali
                </h1>


                <p class="text-[#D8B15A] tracking-[4px] text-[8px] mt-0.5">
                    · ID · ARSIPAN BUDAYA
                </p>

            </div>

            <!-- Menu -->
            <ul id="menu"
                class="hidden lg:flex items-center text-[11px] uppercase tracking-[3px] font-medium text-[#6B4A2B]">

                <li class="mr-8">
                    <a href="#filsafat" class="hover:text-[#992B20] transition">
                        FILSAFAT
                    </a>
                </li>


                <li class="mr-8">
                    <a href="#ajaran" class="hover:text-[#992B20] transition">
                        AJARAN TETUA
                    </a>
                </li>

                <li class="mr-8">
                    <a href="#cecimpedan" class="hover:text-[#D9A441] transition">
                        CECIMPEDAN
                    </a>
                </li>

                <li class="mr-8">
                    <section id="satua">
                        SATUA & ISTILAH
                        </a>
                </li>

                <li>
                    <a href="#kontributor">
                        KONTRIBUTOR
                    </a>
                </li>

            </ul>


            <!-- Button -->
            <div class="flex items-center gap-2">

                <a href="/login"
                    class="px-5 py-2 text-[13px] font-medium rounded-md border border-[#C8A45A] text-[#C8A45A] hover:bg-[#C8A45A] hover:text-white transition">

                    Masuk

                </a>

                <a href="/register"
                    class="px-5 py-2 text-[13px] font-medium rounded-md bg-[#9B3B24] text-white hover:bg-[#82311E] transition">

                    Daftar

                </a>

            </div>

        </div>

    </nav>

    <!-- ================= HERO ================= -->

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


    <!-- ================= STATISTIK ================= -->

    <section class="bg-[#8F2318] py-8">

        <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-6 gap-8 text-center">

            <div>
                <div class="mb-2 flex justify-center">
                    <i data-feather="book-open" class="w-5 h-5 text-[#D9B35D]"></i>
                </div>
                <h2 class="text-white text-4xl font-bold">248</h2>
                <p class="text-[#D9B35D] text-[10px] tracking-[3px] uppercase mt-2 font-medium">
                    Ajaran Tetua
                </p>
            </div>

            <div>
                <div class="mb-2 flex justify-center">
                    <i data-feather="feather" class="w-5 h-5 text-[#D9B35D]"></i>
                </div>
                <h2 class="text-white text-4xl font-bold">134</h2>
                <p class="text-[#D9B35D] text-[10px] tracking-[3px] uppercase mt-2 font-medium">
                    Cecimpedan
                </p>
            </div>

            <div>
                <div class="mb-2 flex justify-center">
                    <i data-feather="globe" class="w-5 h-5 text-[#D9B35D]"></i>
                </div>
                <h2 class="text-white text-4xl font-bold">87</h2>
                <p class="text-[#D9B35D] text-[10px] tracking-[3px] uppercase mt-2 font-medium">
                    Satua Bali
                </p>
            </div>

            <div>
                <div class="mb-2 flex justify-center">
                    <i data-feather="tag" class="w-5 h-5 text-[#D9B35D]"></i>
                </div>
                <h2 class="text-white text-4xl font-bold">512</h2>
                <p class="text-[#D9B35D] text-[10px] tracking-[3px] uppercase mt-2 font-medium">
                    Istilah Bali
                </p>
            </div>

            <div>
                <div class="mb-2 flex justify-center">
                    <i data-feather="users" class="w-5 h-5 text-[#D9B35D]"></i>
                </div>
                <h2 class="text-white text-4xl font-bold">63</h2>
                <p class="text-[#D9B35D] text-[10px] tracking-[3px] uppercase mt-2 font-medium">
                    Kontributor
                </p>
            </div>

            <div>
                <div class="mb-2 flex justify-center">
                    <i data-feather="shield" class="w-5 h-5 text-[#D9B35D]"></i>
                </div>
                <h2 class="text-white text-4xl font-bold">1,2 ribu</h2>
                <p class="text-[#D9B35D] text-[10px] tracking-[3px] uppercase mt-2 font-medium">
                    Terverifikasi
                </p>
            </div>

        </div>

    </section>
    <!-- ================= JENIS FILSAFAT DI DUNIA ================= -->
    <section id="jenis-filsafat" class="bg-[#F7F0E7] py-24">

        <div class="max-w-7xl mx-auto px-8">

            <!-- Judul -->
            <div class="text-center mb-16">

                <p class="uppercase tracking-[6px] text-[#C58A3C] text-xs mb-4">
                    — WAWASAN FILSAFAT
                </p>

                <h2 style="font-family:'Cormorant Garamond',serif;" class="text-[60px] font-bold text-[#23160E]">

                    Jenis-Jenis Filsafat di Dunia

                </h2>

                <p class="mt-6 max-w-3xl mx-auto text-[#675A4D] leading-8 text-lg">

                    Filsafat berkembang di berbagai belahan dunia dengan beragam
                    sudut pandang dalam memahami manusia, kehidupan,
                    pengetahuan, moral, dan hubungan dengan Tuhan.

                </p>

            </div>

            <!-- CARD -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Barat -->
                <div
                    class="bg-white rounded-xl border border-[#E5D6BF] p-8 hover:-translate-y-2 hover:shadow-xl duration-300">

                    <div
                        class="w-14 h-14 rounded-full bg-[#992B20] flex items-center justify-center text-white text-2xl mb-6">
                        🏛
                    </div>

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl font-bold text-[#23160E]">

                        Filsafat Barat

                    </h3>

                    <p class="mt-4 text-[#675A4D] leading-8">

                        Berfokus pada logika, rasionalitas, ilmu pengetahuan,
                        dan pencarian kebenaran melalui pemikiran kritis.

                    </p>

                </div>

                <!-- Timur -->
                <div
                    class="bg-white rounded-xl border border-[#E5D6BF] p-8 hover:-translate-y-2 hover:shadow-xl duration-300">

                    <div
                        class="w-14 h-14 rounded-full bg-[#2F7D4B] flex items-center justify-center text-white text-2xl mb-6">
                        ☯
                    </div>

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl font-bold text-[#23160E]">

                        Filsafat Timur

                    </h3>

                    <p class="mt-4 text-[#675A4D] leading-8">

                        Menekankan keharmonisan hidup, spiritualitas,
                        keseimbangan alam, serta pengendalian diri.

                    </p>

                </div>

                <!-- Moral -->
                <div
                    class="bg-white rounded-xl border border-[#E5D6BF] p-8 hover:-translate-y-2 hover:shadow-xl duration-300">

                    <div
                        class="w-14 h-14 rounded-full bg-[#C58A3C] flex items-center justify-center text-white text-2xl mb-6">
                        ⚖
                    </div>

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl font-bold text-[#23160E]">

                        Filsafat Moral

                    </h3>

                    <p class="mt-4 text-[#675A4D] leading-8">

                        Mengkaji nilai baik dan buruk serta bagaimana manusia
                        seharusnya bertindak dalam kehidupan.

                    </p>

                </div>

                <!-- Politik -->
                <div
                    class="bg-white rounded-xl border border-[#E5D6BF] p-8 hover:-translate-y-2 hover:shadow-xl duration-300">

                    <div
                        class="w-14 h-14 rounded-full bg-[#355C9A] flex items-center justify-center text-white text-2xl mb-6">
                        🏛
                    </div>

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl font-bold text-[#23160E]">

                        Filsafat Politik

                    </h3>

                    <p class="mt-4 text-[#675A4D] leading-8">

                        Membahas negara, pemerintahan, keadilan,
                        hukum, hak, dan kewajiban masyarakat.

                    </p>

                </div>

                <!-- Ilmu -->
                <div
                    class="bg-white rounded-xl border border-[#E5D6BF] p-8 hover:-translate-y-2 hover:shadow-xl duration-300">

                    <div
                        class="w-14 h-14 rounded-full bg-[#D9B35D] flex items-center justify-center text-white text-2xl mb-6">
                        🔬
                    </div>

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl font-bold text-[#23160E]">

                        Filsafat Ilmu

                    </h3>

                    <p class="mt-4 text-[#675A4D] leading-8">

                        Mengkaji hakikat ilmu pengetahuan,
                        metode ilmiah, dan cara memperoleh kebenaran.

                    </p>

                </div>

                <!-- Agama -->
                <div
                    class="bg-white rounded-xl border border-[#E5D6BF] p-8 hover:-translate-y-2 hover:shadow-xl duration-300">

                    <div
                        class="w-14 h-14 rounded-full bg-[#6B4A8E] flex items-center justify-center text-white text-2xl mb-6">
                        ✨
                    </div>

                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl font-bold text-[#23160E]">

                        Filsafat Agama

                    </h3>

                    <p class="mt-4 text-[#675A4D] leading-8">

                        Mengkaji hubungan manusia dengan Tuhan,
                        makna kehidupan, serta dasar kepercayaan.

                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= KOLEKSI UTAMA ================= -->
    <section id="koleksi" class="bg-[#F7F0E7] pt-28 pb-24 border-t border-[#DCCCB4]">

        <div class="max-w-7xl mx-auto px-8">

            <p class="uppercase tracking-[6px] text-[#C58A3C] text-xs mb-4">
                — KOLEKSI UTAMA
            </p>

            <h2 style="font-family:'Cormorant Garamond',serif;" class="text-5xl font-bold text-[#23160E] mb-12">
                Empat Pilar Arsip
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

                <!-- AJARAN -->
                <div class="relative h-[470px] rounded-lg overflow-hidden group">

                    <img src="{{ asset('images/ajaran.jpeg') }}"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 duration-500">

                    <div class="absolute inset-0 bg-gradient-to-t from-[#8B231B]/90 via-[#8B231B]/35 to-transparent">
                    </div>

                    <div class="absolute bottom-0 p-6 text-white">

                        <p class="text-[11px] tracking-[4px] uppercase mb-3">
                            KEARIFAN LELUHUR BALI
                        </p>

                        <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl font-bold mb-4">
                            Ajaran Tetua
                        </h3>

                        <p class="text-sm leading-7 text-white/90">
                            Petuah dan filosofi yang diwariskan para tetua Bali dari generasi ke generasi.
                        </p>

                        <div class="flex justify-between items-center mt-8">

                            <span class="text-sm font-semibold">
                                248 entri
                            </span>

                            <span class="text-2xl">→</span>

                        </div>

                    </div>

                </div>

                <!-- CECIMPEDAN -->
                <div class="relative h-[470px] rounded-lg overflow-hidden group">

                    <img src="{{ asset('images/cecimpedan.jpeg') }}"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 duration-500">

                    <div class="absolute inset-0 bg-gradient-to-t from-[#B88324]/90 via-[#B88324]/30 to-transparent">
                    </div>

                    <div class="absolute bottom-0 p-6 text-white">

                        <p class="text-[11px] tracking-[4px] uppercase mb-3">
                            TEKA-TEKI TRADISIONAL
                        </p>

                        <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl font-bold mb-4">
                            Cecimpedan
                        </h3>

                        <p class="text-sm leading-7 text-white/90">
                            Teka-teki khas Bali yang mengandung makna dan nilai kehidupan.
                        </p>

                        <div class="flex justify-between items-center mt-8">

                            <span class="text-sm font-semibold">
                                134 entri
                            </span>

                            <span class="text-2xl">→</span>

                        </div>

                    </div>

                </div>

                <!-- SATUA -->
                <div class="relative h-[470px] rounded-lg overflow-hidden group">

                    <img src="{{ asset('images/satua.jpeg') }}"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 duration-500">

                    <div class="absolute inset-0 bg-gradient-to-t from-[#2D6C3F]/90 via-[#2D6C3F]/30 to-transparent">
                    </div>

                    <div class="absolute bottom-0 p-6 text-white">

                        <p class="text-[11px] tracking-[4px] uppercase mb-3">
                            FAUNA KHAS PULAU DEWATA
                        </p>

                        <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl font-bold mb-4">
                            Satua Bali
                        </h3>

                        <p class="text-sm leading-7 text-white/90">
                            Ensiklopedia satua Bali beserta makna budaya dan filosofinya.
                        </p>

                        <div class="flex justify-between items-center mt-8">

                            <span class="text-sm font-semibold">
                                87 entri
                            </span>

                            <span class="text-2xl">→</span>

                        </div>

                    </div>

                </div>

                <!-- ISTILAH -->
                <div class="relative h-[470px] rounded-lg overflow-hidden group">

                    <img src="{{ asset('images/istilah.jpeg') }}"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 duration-500">

                    <div class="absolute inset-0 bg-gradient-to-t from-[#304C73]/90 via-[#304C73]/30 to-transparent">
                    </div>

                    <div class="absolute bottom-0 p-6 text-white">

                        <p class="text-[11px] tracking-[4px] uppercase mb-3">
                            KOSAKATA DAN TERMINOLOGI
                        </p>

                        <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl font-bold mb-4">
                            Istilah Bali
                        </h3>

                        <p class="text-sm leading-7 text-white/90">
                            Kumpulan istilah bahasa Bali dalam adat, agama, dan kehidupan sehari-hari.
                        </p>

                        <div class="flex justify-between items-center mt-8">

                            <span class="text-sm font-semibold">
                                512 entri
                            </span>

                            <span class="text-2xl">→</span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= SOROTAN AJARAN TETUA ================= -->
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

                <!-- FOTO -->
                <div>

                    <img id="mainImage" src="{{ asset('images/ajaran.jpeg') }}"
                        class="w-[540px] h-[420px] rounded-xl object-cover shadow-xl">

                </div>

                <!-- KONTEN -->
                <div>

                    <span id="mainTag"
                        class="inline-block
                        border
                        border-[#8B6528]
                        text-[#D4A64A]
                        bg-transparent
                        text-[10px]
                        tracking-[3px]
                        uppercase
                        px-4
                        py-2
                        rounded-md">
                        FILSAFAT KEHIDUPAN
                    </span>

                    <h2 id="mainTitle"
                        class="mt-6
                        text-[64px]
                        leading-[0.95]
                        font-semibold
                        text-[#F7F1E8]"
                        style="font-family:'Cormorant Garamond',serif;">
                        Tri Hita Karana
                    </h2>
                    <p id="mainDesc"
                        class="mt-7
                        text-[#E5D7C8]
                        text-[19px]
                        leading-[38px]
                        font-normal">

                        Tri Hita Karana merupakan filosofi kehidupan masyarakat Bali yang mengajarkan keharmonisan
                        hubungan manusia dengan Tuhan, sesama manusia, dan alam.

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

                        <!-- Tombol -->
                        <button id="mainButton"
                            class="border border-[#8D6627]
        text-[#D4A64A]
        px-8 py-3
        rounded-md
        hover:bg-[#D4A64A]
        hover:text-[#241308]
        transition">

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

                        <a href="#" onclick="cariKeyword('Tri Hita Karana'); return false;"
                            class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium hover:bg-white hover:text-black transition">

                            TRI HITA KARANA

                        </a>

                    </div>

                    <!-- TAT TWAM ASI -->
                    <div onclick="changeSlide(2)" id="thumb2"
                        class="thumb relative w-[360px] h-[90px] rounded-xl overflow-hidden cursor-pointer border-2 border-transparent transition-all duration-500">

                        <img src="{{ asset('images/tat twam asi.jpeg') }}" class="w-full h-full object-cover">

                        <div class="absolute inset-0 bg-black/50"></div>

                        <span class="absolute bottom-3 left-3 text-white font-semibold">
                            Tat Twam Asi
                        </span>

                    </div>

                    <!-- DESA KALA PATRA -->
                    <div onclick="changeSlide(3)" id="thumb3"
                        class="thumb relative w-[360px] h-[90px] rounded-xl overflow-hidden cursor-pointer border-2 border-transparent transition-all duration-500">

                        <img src="{{ asset('images/desa kala patra.jpeg') }}" class="w-full h-full object-cover">

                        <div class="absolute inset-0 bg-black/50"></div>

                        <span class="absolute bottom-3 left-3 text-white font-semibold">
                            Desa Kala Patra
                        </span>

                    </div>

                </div>

                <!-- DOT -->
                <div class="flex justify-center gap-2 mt-5">

                    <span id="dot1" class="w-2 h-2 rounded-full bg-[#D9B35D]"></span>

                    <span id="dot2" class="w-2 h-2 rounded-full bg-[#665548]"></span>

                    <span id="dot3" class="w-2 h-2 rounded-full bg-[#665548]"></span>

                </div>

            </div>


    </section>

    <!-- ================= ARTIKEL PILIHAN ================= -->

    <section class="bg-[#F7F0E7] py-24">

        <div class="max-w-7xl mx-auto px-8">

            <!-- Judul -->
            <p class="uppercase tracking-[6px] text-[#B8863B] text-xs mb-3">
                TERBARU
            </p>

            <h2 style="font-family:'Cormorant Garamond',serif;"
                class="text-[64px] leading-none font-bold text-[#23160E] mb-12">

                Artikel Pilihan

            </h2>

            <!-- Menu -->
            <div class="flex gap-10 border-b border-[#DCCCB4] pb-4 text-[13px] uppercase tracking-[2px] font-medium">

                <button id="btn-semua" onclick="filterArtikel('semua')" class="tab-active">
                    Semua
                </button>

                <button id="btn-ajaran" onclick="filterArtikel('ajaran')">
                    Ajaran Tetua
                </button>

                <button id="btn-cecimpedan" onclick="filterArtikel('cecimpedan')">
                    Cecimpedan
                </button>

                <button id="btn-satua" onclick="filterArtikel('satua')">
                    Satua Bali
                </button>

                <button id="btn-istilah" onclick="filterArtikel('istilah')">
                    Istilah Bali
                </button>

            </div>

            <!-- Card -->

            <div class="grid grid-cols-3 gap-8 mt-10">


                <!-- CARD 1 -->
                <div
                    class="card-artikel ajaran bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300">
                    <!-- Gambar -->
                    <div class="relative">

                        <img src="{{ asset('images/subak.jpeg') }}" class="w-full h-60 object-cover">

                        <!-- Badge Kategori -->
                        <span
                            class="absolute top-4 left-4
                        bg-[#992B20]
                        text-white
                        text-[11px]
                        tracking-[2px]
                        uppercase
                        font-semibold
                        px-4 py-2
                        rounded-full">

                            AJARAN TETUA

                        </span>

                        <!-- Badge Verifikasi -->
                        <span
                            class="absolute top-4 right-4
                        bg-white
                        text-[#D9B35D]
                        text-[11px]
                        font-semibold
                        px-4 py-2
                        rounded-full
                        shadow
                        flex items-center gap-2">

                            <i data-feather="check-circle" class="w-4 h-4"></i>
                            Terverifikasi

                        </span>

                    </div>

                    <!-- Isi -->
                    <div class="p-6">

                        <h3 style="font-family:'Cormorant Garamond',serif;"
                            class="text-[34px] leading-tight font-bold text-[#2B1A12]">

                            Filosofi Subak:
                            Demokrasi Air dalam
                            Peradaban Bali

                        </h3>

                        <p class="mt-4 text-[#675A4D] leading-8">

                            Sistem irigasi Subak bukan sekadar teknik pertanian,
                            tetapi merupakan perwujudan nyata Tri Hita Karana.

                        </p>

                        <!-- Footer -->
                        <div class="mt-8 flex items-center justify-between">

                            <div class="text-[13px] text-[#8C7A65]">
                                <span>12 Juni 2025</span>
                                <span class="mx-2">•</span>
                                <span>8 Menit</span>
                            </div>

                            <button
                                class="w-10 h-10
                            flex items-center justify-center
                            border border-[#D6C5AE]
                            rounded-lg
                            text-[#8C6A3B]
                            hover:bg-[#F5F0E8]
                            hover:border-[#D9B35D]
                            transition duration-300">

                                <i data-feather="bookmark" class="w-5 h-5"></i>

                            </button>

                        </div>

                    </div>

                </div>

                <!-- CARD 2 -->
                <div
                    class="card-artikel cecimpedan bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300">

                    <div class="relative">

                        <img src="{{ asset('images/cecimpedan.jpeg') }}" class="w-full h-60 object-cover">

                        <span
                            class="absolute top-4 left-4
                        bg-[#D9A441]
                        text-white
                        text-[11px]
                        tracking-[2px]
                        uppercase
                        font-semibold
                        px-4 py-2
                        rounded-full">

                            CECIMPEDAN

                        </span>

                        <span
                            class="absolute top-4 right-4 bg-white text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2">

                            <i data-feather="check-circle" class="w-4 h-4"></i>
                            Terverifikasi

                        </span>

                    </div>

                    <div class="p-6">

                        <h3 style="font-family:'Cormorant Garamond',serif;"
                            class="text-[34px] leading-tight font-bold text-[#2B1A12]">

                            Cecimpedan Bali sebagai Media Pendidikan Karakter Anak

                        </h3>

                        <p class="mt-4 text-[#675A4D] leading-8">
                            Teka_teki tradisional Bali bukan sekedar hiburan; di dalamnya tersimpan pelajaran logika,
                            ekologi, dan nilai...
                        </p>

                        <div class="mt-8 flex items-center justify-between">

                            <div class="text-[13px] text-[#8C7A65]">
                                <span>10 Juni 2025</span>
                                <span class="mx-2">•</span>
                                <span>6 Menit</span>
                            </div>

                            <button
                                class="w-10 h-10
                        flex items-center justify-center
                        border border-[#D6C5AE]
                        rounded-lg
                        text-[#8C6A3B]
                        hover:bg-[#F5F0E8]
                        hover:border-[#D9B35D]
                        transition duration-300">

                                <i data-feather="bookmark" class="w-5 h-5"></i>

                            </button>

                        </div>

                    </div>

                </div>

                <!-- CARD 3 -->
                <div
                    class="card-artikel satua bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300">

                    <div class="relative">

                        <img src="{{ asset('images/jalak bali.jpeg') }}" class="w-full h-60 object-cover">

                        <span
                            class="absolute top-4 left-4
                        bg-[#2F7D4B]
                        text-white
                        text-[11px]
                        tracking-[2px]
                        uppercase
                        font-semibold
                        px-4 py-2
                        rounded-full">

                            SATUA BALI

                        </span>

                        <span
                            class="absolute top-4 right-4 bg-white text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2">
                            <i data-feather="check-circle" class="w-4 h-4"></i>
                            Terverifikasi
                        </span>

                    </div>

                    <div class="p-6">

                        <h3 style="font-family:'Cormorant Garamond',serif;"
                            class="text-[34px] leading-tight font-bold text-[#2B1A12]">
                            Jalak Bali: Simbol Keanggunaan Yang Terancam Punah
                        </h3>

                        <p class="mt-4 text-[#675A4D] leading-8">
                            Leucopsar rothschildi, si Jalak Bali yang murni putih, kii tersisa kurang dari 100 ekor di
                            alam liar.
                        </p>

                        <div class="mt-8 flex items-center justify-between">

                            <div class="text-[13px] text-[#8C7A65]">
                                <span>8 Juni 2025</span>
                                <span class="mx-2">•</span>
                                <span>5 Menit</span>
                            </div>

                            <button
                                class="w-10 h-10
            flex items-center justify-center
            border border-[#D6C5AE]
            rounded-lg
            text-[#8C6A3B]
            hover:bg-[#F5F0E8]
            hover:border-[#D9B35D]
            transition duration-300">

                                <i data-feather="bookmark" class="w-5 h-5"></i>

                            </button>

                        </div>

                    </div>

                </div>


                <!-- CARD 4 -->
                <div
                    class="card-artikel istilah bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300">

                    <div class="relative">

                        <img src="{{ asset('images/sor singgih.jpeg') }}" class="w-full h-60 object-cover">

                        <span
                            class="absolute top-4 left-4
                bg-[#305F9E]
                text-white
                text-[11px]
                tracking-[2px]
                uppercase
                font-semibold
                px-4 py-2
                rounded-full">

                            ISTILAH BALI

                        </span>

                        <span
                            class="absolute top-4 right-4 bg-white text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2">
                            <i data-feather="check-circle" class="w-4 h-4"></i>
                            Terverifikasi
                        </span>

                    </div>

                    <div class="p-6">

                        <h3 style="font-family:'Cormorant Garamond',serif;"
                            class="text-[34px] leading-tight font-bold text-[#2B1A12]">
                            Sor Singgih: Hierarki Bahasa sebagai Cermin Tatanan Sosial
                        </h3>

                        <p class="mt-4 text-[#675A4D] leading-8">
                            Bahasa Bali mengenal tingkatan tutur-Alus, Madya, Kasar-yang mencerminkan relasi sosial
                            dan....
                        </p>

                        <div class="mt-8 flex items-center justify-between">

                            <div class="text-[13px] text-[#8C7A65]">
                                <span>7 Juni 2025</span>
                                <span class="mx-2">•</span>
                                <span>7 Menit</span>
                            </div>

                            <button
                                class="w-10 h-10
                flex items-center justify-center
                border border-[#D6C5AE]
                rounded-lg
                text-[#8C6A3B]
                hover:bg-[#F5F0E8]
                hover:border-[#D9B35D]
                transition duration-300">

                                <i data-feather="bookmark" class="w-5 h-5"></i>

                            </button>

                        </div>

                    </div>

                </div>

                <!-- CARD 5 -->
                <div
                    class="card-artikel ajaran bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300">

                    <div class="relative">

                        <img src="{{ asset('images/rwa_bhineda.jpg') }}" class="w-full h-60 object-cover">

                        <span
                            class="absolute top-4 left-4 bg-[#D9B35D] text-white text-[11px] tracking-[2px] uppercase font-semibold px-4 py-2 rounded-full">
                            AJARAN TETUA
                        </span>

                        <span
                            class="absolute top-4 right-4 bg-white text-[#2E7D32] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2">
                            <i data-feather="check-circle" class="w-4 h-4"></i>
                            Terverifikasi
                        </span>

                    </div>

                    <div class="p-6">

                        <h3 style="font-family:'Cormorant Garamond',serif;"
                            class="text-[34px] leading-tight font-bold text-[#2B1A12]">
                            Rwa Bhineda,
                            Keseimbangan
                            Kehidupan
                        </h3>

                        <p class="mt-4 text-[#675A4D] leading-8">
                            Filosofi yang mengajarkan bahwa segala sesuatu memiliki pasangan yang saling melengkapi.
                        </p>

                        <div class="mt-8 flex items-center justify-between">

                            <div class="text-[13px] text-[#8C7A65]">
                                <span>5 Juni 2025</span>
                                <span class="mx-2">•</span>
                                <span>8 Menit</span>
                            </div>

                            <button
                                class="w-10 h-10
                 flex items-center justify-center
                 border border-[#D6C5AE]
                 rounded-lg
                 text-[#8C6A3B]
                 hover:bg-[#F5F0E8]
                 hover:border-[#D9B35D]
                 transition duration-300">
                                <i data-feather="bookmark" class="w-5 h-5"></i>
                            </button>

                        </div>

                    </div>

                </div>

                <!-- CARD 6 -->
                <div
                    class="card-artikel cecimpedan bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300">

                    <div class="relative">

                        <img src="{{ asset('images/cecimpedan.jpeg') }}" class="w-full h-60 object-cover">

                        <span
                            class="absolute top-4 left-4
                    bg-[#D9A441]
                    text-white
                    text-[11px]
                    tracking-[2px]
                    uppercase
                    font-semibold
                    px-4 py-2
                    rounded-full">

                            CECIMPEDAN

                        </span>

                        <span
                            class="absolute top-4 right-4 bg-white text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2">
                            <i data-feather="check-circle" class="w-4 h-4"></i>
                            Terverifikasi
                        </span>

                    </div>

                    <div class="p-6">

                        <h3 style="font-family:'Cormorant Garamond',serif;"
                            class="text-[34px] leading-tight font-bold text-[#2B1A12]">
                            Makna Tersembunyi di Balik Cecimpedan tentang Alam
                        </h3>

                        <p class="mt-4 text-[#675A4D] leading-8">
                            Teka-teki Bali tentang benda alam mengandung makna filosofi dan benda alam.
                        </p>

                        <div class="mt-8 flex items-center justify-between">

                            <div class="text-[13px] text-[#8C7A65]">
                                <span>2 Juni 2025</span>
                                <span class="mx-2">•</span>
                                <span>9 Menit</span>
                            </div>

                            <button
                                class="w-10 h-10
                        flex items-center justify-center
                        border border-[#D6C5AE]
                        rounded-lg
                        text-[#8C6A3B]
                        hover:bg-[#F5F0E8]
                        hover:border-[#D9B35D]
                        transition duration-300">

                                <i data-feather="bookmark" class="w-5 h-5"></i>

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= CECIMPEDAN ================= -->
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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-14">

                <!-- Card 1 -->
                <div class="bg-white border border-[#E4D4BF] rounded-xl p-7 hover:shadow-xl transition">

                    <div class="flex justify-between items-center">

                        <span class="bg-[#C7962B] text-white text-[10px] tracking-[2px] uppercase px-3 py-1 rounded">
                            Sedang
                        </span>

                        <span class="text-[#7C6346] text-xs">
                            #001
                        </span>

                    </div>

                    <h3 style="font-family:'Cormorant Garamond',serif;"
                        class="italic text-[34px] leading-[46px] mt-7 text-[#23160E]">

                        "Bungkusne putih,
                        isinye abang,
                        sabilang karohne
                        makejang ilang."

                    </h3>

                    <p class="mt-5 text-[#675A4D] leading-8">
                        Bungkusnya putih, isinya merah, setiap kali dibuka semuanya habis.
                    </p>

                    <a href="#"
                        class="mt-8 flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">

                        <i data-feather="chevron-right" class="w-4 h-4"></i>

                        Jawab Teka-Teki

                    </a>

                </div>

                <!-- Card 2 -->
                <div class="bg-white border border-[#E4D4BF] rounded-xl p-7 hover:shadow-xl transition">

                    <div class="flex justify-between items-center">

                        <span class="bg-[#8F2318] text-white text-[10px] tracking-[2px] uppercase px-3 py-1 rounded">
                            Sulit
                        </span>

                        <span class="text-[#7C6346] text-xs">
                            #002
                        </span>

                    </div>

                    <h3 style="font-family:'Cormorant Garamond',serif;"
                        class="italic text-[34px] leading-[46px] mt-7 text-[#23160E]">

                        "Adanne luh,
                        avakne besik,
                        ngalih ya dini
                        ditu, pesu ya di tengah."

                    </h3>

                    <p class="mt-5 text-[#675A4D] leading-8">
                        Namanya banyak, badannya satu, mencarinya ke sana ke sini, keluarnya di tengah.
                    </p>

                    <a href="#"
                        class="mt-8 flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">

                        <i data-feather="chevron-right" class="w-4 h-4"></i>

                        Jawab Teka-Teki

                    </a>

                </div>

                <!-- Card 3 -->
                <div class="bg-white border border-[#E4D4BF] rounded-xl p-7 hover:shadow-xl transition">

                    <div class="flex justify-between items-center">

                        <span class="bg-[#2D6C3F] text-white text-[10px] tracking-[2px] uppercase px-3 py-1 rounded">
                            Mudah
                        </span>

                        <span class="text-[#7C6346] text-xs">
                            #003
                        </span>

                    </div>

                    <h3 style="font-family:'Cormorant Garamond',serif;"
                        class="italic text-[34px] leading-[46px] mt-7 text-[#23160E]">

                        "Nongos di tegale,
                        ngelah baju liu pesan,
                        nanging sing taen nganggo."

                    </h3>

                    <p class="mt-5 text-[#675A4D] leading-8">
                        Tinggal di ladang, punya baju banyak sekali, tetapi tidak pernah memakainya.
                    </p>

                    <a href="#"
                        class="mt-8 flex items-center gap-2 uppercase tracking-[2px] text-[11px] text-[#8B6D48]">

                        <i data-feather="chevron-right" class="w-4 h-4"></i>

                        Jawab Teka-Teki

                    </a>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= SATUA & ISTILAH ================= -->

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
                <div class="flex border border-[#5A432A] rounded-lg overflow-hidden">

                    <button id="btnSatua" onclick="showSatua()"
                        class="bg-[#C48D2D] text-white px-8 py-3 uppercase tracking-[2px] text-xs">

                        Satua Bali

                    </button>

                    <button id="btnIstilah" onclick="showIstilah()"
                        class="text-[#B9986D] px-8 py-3 uppercase tracking-[2px] text-xs">

                        Istilah Bali

                    </button>

                </div>

            </div>

            <!-- CARD -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- CARD 1 -->
                <div class="bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E]">

                    <img src="{{ asset('images/jalak bali.jpeg') }}" class="w-full h-56 object-cover">

                    <div class="p-6">

                        <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl text-white font-bold">
                            Jalak Bali
                        </h3>

                        <p class="text-[#8F7A61] italic text-sm">
                            Leucopsar rothschildi
                        </p>

                        <p class="text-[#C7B39A] mt-4 leading-7">
                            Burung endemik Bali yang menjadi simbol kelestarian alam Pulau Dewata.
                        </p>

                    </div>

                </div>

                <!-- CARD 2 -->
                <div class="bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E]">

                    <img src="{{ asset('images/penyu hijau.jpeg') }}" class="w-full h-56 object-cover">

                    <div class="p-6">

                        <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl text-white font-bold">
                            Penyu Hijau
                        </h3>

                        <p class="text-[#8F7A61] italic text-sm">
                            Chelonia mydas
                        </p>

                        <p class="text-[#C7B39A] mt-4 leading-7">
                            Penyu yang sering muncul dalam simbol dan tradisi masyarakat Bali.
                        </p>

                    </div>

                </div>

                <!-- CARD 3 -->
                <div class="bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E]">

                    <img src="{{ asset('images/kera ekor panjang.jpeg') }}" class="w-full h-56 object-cover">

                    <div class="p-6">

                        <h3 style="font-family:'Cormorant Garamond',serif;" class="text-4xl text-white font-bold">
                            Kera Ekor Panjang
                        </h3>

                        <p class="text-[#8F7A61] italic text-sm">
                            Macaca fascicularis
                        </p>

                        <p class="text-[#C7B39A] mt-4 leading-7">
                            Satwa yang banyak dijumpai di kawasan pura dan hutan Bali.
                        </p>

                    </div>

                </div>
                <!-- CARD 4 -->
                <div class="bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E]">

                    <img src="{{ asset('images/landak jawa.jpg') }}" class="w-full h-56 object-cover">

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

                    </div>

                </div>
                <!-- CARD 5 -->
                <div class="bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E]">

                    <img src="{{ asset('images/elang jawa.jpg') }}" class="w-full h-56 object-cover">

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

                    </div>

                </div>
                <!-- CARD 6 -->
                <div class="bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E]">

                    <img src="{{ asset('images/biawak air.jpeg') }}" class="w-full h-56 object-cover">

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

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= SECTION ISTILAH BALI ================= -->
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

                    <button id="btnIstilah"
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
                <div class="grid grid-cols-[170px_120px_1fr] py-6 items-center">

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
                <div class="grid grid-cols-[170px_120px_1fr] py-6 items-center">

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
                <div class="grid grid-cols-[170px_120px_1fr] py-6 items-center">

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
                <div class="grid grid-cols-[170px_120px_1fr] py-6 items-center">

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
                <div class="grid grid-cols-[170px_120px_1fr] py-6 items-center">

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
    <!-- ================= KONTRIBUTOR ================= -->
    <section id="kontributor" class="bg-[#F8F1E6] py-24">

        <div class="max-w-7xl mx-auto px-8">

            <!-- Judul -->
            <div class="text-center">

                <p class="uppercase tracking-[6px] text-[#C58A3C] text-xs">
                    — BERGABUNG BERSAMA
                </p>

                <h2 style="font-family:'Cormorant Garamond',serif;" class="text-[64px] font-bold text-[#23160E] mt-4">

                    Pilih Peran Anda

                </h2>

                <p class="mt-4 text-[#6E5C4B] text-lg max-w-2xl mx-auto leading-8">
                    Setiap anggota komunitas memiliki peran penting dalam menjaga
                    warisan budaya Bali.
                </p>

            </div>

            <!-- CARD -->
            <div class="grid lg:grid-cols-3 gap-8 mt-16">

                <!-- ================= PENGGUNA ================= -->
                <div class="bg-white rounded-xl border border-[#E7D5C2] p-8">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-lg bg-[#F4E5D8] flex items-center justify-center">
                            <i data-feather="book-open" class="w-6 h-6 text-[#9B3B24]"></i>
                        </div>

                        <div>

                            <h3 style="font-family:'Cormorant Garamond',serif;"
                                class="text-4xl font-bold text-[#23160E]">
                                Pengguna
                            </h3>

                            <p class="uppercase tracking-[2px] text-xs text-[#9B7C58]">
                                Pelajar & Masyarakat
                            </p>

                        </div>

                    </div>

                    <ul class="mt-8 space-y-4 text-[#6B4A2B]">

                        <li>● Akses seluruh koleksi arsip</li>
                        <li>● Simpan artikel favorit</li>
                        <li>● Ikuti diskusi komunitas</li>
                        <li>● Unduh konten pilihan</li>
                        <li>● Notifikasi artikel terbaru</li>

                    </ul>

                    <a href="/register"
                        class="mt-10 block text-center border border-[#9B3B24] text-[#9B3B24] rounded-md py-3 hover:bg-[#9B3B24] hover:text-white transition">

                        Daftar Gratis

                    </a>

                </div>

                <!-- ================= PENULIS ================= -->
                <div class="relative bg-white rounded-xl border-2 border-[#C48D2D] shadow-xl p-8">

                    <span
                        class="absolute -top-3 left-1/2 -translate-x-1/2 bg-[#C48D2D] text-white text-[10px] uppercase tracking-[3px] px-4 py-1 rounded-full">
                        Populer
                    </span>

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-lg bg-[#F8EBD2] flex items-center justify-center">
                            <i data-feather="edit-3" class="w-6 h-6 text-[#C48D2D]"></i>
                        </div>

                        <div>

                            <h3 style="font-family:'Cormorant Garamond',serif;"
                                class="text-4xl font-bold text-[#23160E]">
                                Penulis
                            </h3>

                            <p class="uppercase tracking-[2px] text-xs text-[#9B7C58]">
                                Kontributor Konten
                            </p>

                        </div>

                    </div>

                    <ul class="mt-8 space-y-4 text-[#6B4A2B]">

                        <li>● Publikasi artikel budaya</li>
                        <li>● Tambah Ajaran Tetua</li>
                        <li>● Tambah Satua Bali</li>
                        <li>● Tambah Istilah Bali</li>
                        <li>● Lencana kontributor</li>

                    </ul>

                    <a href="/register"
                        class="mt-10 block text-center bg-[#C48D2D] text-white rounded-md py-3 hover:bg-[#B27C20] transition">

                        Jadi Penulis

                    </a>

                </div>

                <!-- ================= ADMIN ================= -->
                <div class="bg-white rounded-xl border border-[#E7D5C2] p-8">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-lg bg-[#E8E8E8] flex items-center justify-center">
                            <i data-feather="shield" class="w-6 h-6 text-[#385274]"></i>
                        </div>

                        <div>

                            <h3 style="font-family:'Cormorant Garamond',serif;"
                                class="text-4xl font-bold text-[#23160E]">
                                Admin
                            </h3>

                            <p class="uppercase tracking-[2px] text-xs text-[#9B7C58]">
                                Pengelola Arsip
                            </p>

                        </div>

                    </div>

                    <ul class="mt-8 space-y-4 text-[#6B4A2B]">

                        <li>● Moderasi artikel</li>
                        <li>● Verifikasi konten</li>
                        <li>● Kelola pengguna</li>
                        <li>● Kelola kategori</li>
                        <li>● Analitik platform</li>

                    </ul>

                    <a href="/login"
                        class="mt-10 block text-center border border-[#385274] text-[#385274] rounded-md py-3 hover:bg-[#385274] hover:text-white transition">

                        Hubungi Kami

                    </a>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= FOOTER ================= -->
    <footer class="bg-[#1B1108] text-white pt-20 pb-8">

        <div class="max-w-7xl mx-auto px-8">

            <!-- Isi Footer -->
            <div class="grid lg:grid-cols-4 gap-16">

                <!-- Logo -->
                <div>

                    <h2 style="font-family:'Cormorant Garamond',serif;" class="text-5xl font-bold">

                        FilsafatBali.id

                    </h2>

                    <p class="mt-6 text-[#A99376] leading-8">

                        Platform arsip digital budaya dan kearifan lokal Bali.
                        Menjaga warisan, menerangi masa depan.

                    </p>

                    <div class="mt-8 flex items-center gap-3">

                        <i data-feather="shield" class="w-4 h-4 text-[#C48D2D]"></i>

                        <span class="uppercase tracking-[3px] text-[11px] text-[#C48D2D]">

                            Konten Terverifikasi

                        </span>

                    </div>

                </div>

                <!-- Koleksi -->
                <div>

                    <p class="uppercase tracking-[5px] text-[11px] text-[#8D765B] mb-8">
                        Koleksi
                    </p>

                    <ul class="space-y-5">

                        <li><a href="#filsafat" class="hover:text-[#D9B35D] transition">Filsafat</a></li>

                        <li><a href="#ajaran" class="hover:text-[#D9B35D] transition">Ajaran Tetua</a></li>

                        <li><a href="#cecimpedan" class="hover:text-[#D9B35D] transition">Cecimpedan</a></li>

                        <li><a href="#sectionSatua" class="hover:text-[#D9B35D] transition">Satua Bali</a></li>

                        <li><a href="#sectionIstilah" class="hover:text-[#D9B35D] transition">Istilah Bali</a></li>

                        <li><a href="#koleksi" class="hover:text-[#D9B35D] transition">Artikel Pilihan</a></li>

                    </ul>

                </div>

                <!-- Komunitas -->
                <div>

                    <p class="uppercase tracking-[5px] text-[11px] text-[#8D765B] mb-8">
                        Komunitas
                    </p>

                    <ul class="space-y-5">

                        <li><a href="/register" class="hover:text-[#D9B35D] transition">Jadi Penulis</a></li>

                        <li><a href="#" class="hover:text-[#D9B35D] transition">Forum Diskusi</a></li>

                        <li><a href="#" class="hover:text-[#D9B35D] transition">Papan Peringkat</a></li>

                        <li><a href="#" class="hover:text-[#D9B35D] transition">Acara & Webinar</a></li>

                    </ul>

                </div>

                <!-- Tentang -->
                <div>

                    <p class="uppercase tracking-[5px] text-[11px] text-[#8D765B] mb-8">
                        Tentang
                    </p>

                    <ul class="space-y-5">

                        <li><a href="#" class="hover:text-[#D9B35D] transition">Tentang Kami</a></li>

                        <li><a href="#" class="hover:text-[#D9B35D] transition">Tim Redaksi</a></li>

                        <li><a href="#" class="hover:text-[#D9B35D] transition">Kebijakan Privasi</a></li>

                        <li><a href="#" class="hover:text-[#D9B35D] transition">Syarat & Ketentuan</a></li>

                        <li><a href="#" class="hover:text-[#D9B35D] transition">Hubungi Kami</a></li>

                    </ul>

                </div>

            </div>

            <!-- Garis -->
            <div class="border-t border-[#3B2A1C] mt-16 pt-8 flex flex-col md:flex-row justify-between items-center">

                <p class="text-[#7F6B56] text-[12px] tracking-[2px] uppercase">

                    © 2026 FILSAFATBALI.ID — HAK CIPTA DILINDUNGI

                </p>

                <div class="flex gap-8 mt-6 md:mt-0">

                    <a href="#"
                        class="text-[#7F6B56] text-[12px] uppercase tracking-[2px] hover:text-[#D9B35D]">

                        Bahasa Bali

                    </a>

                    <a href="#"
                        class="text-[#7F6B56] text-[12px] uppercase tracking-[2px] hover:text-[#D9B35D]">

                        Indonesia

                    </a>

                    <a href="#"
                        class="text-[#7F6B56] text-[12px] uppercase tracking-[2px] hover:text-[#D9B35D]">

                        English

                    </a>

                </div>

            </div>

        </div>

    </footer>

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
    </script>

    <script>
        function cariKeyword(keyword, kategori, deskripsi) {

    const input = document.getElementById("searchInput");
    const hasil = document.getElementById("hasilCari");
    const keywordBox = document.getElementById("keywordBox");

    input.value = keyword;

    if(keywordBox){
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
</body>

</html>
