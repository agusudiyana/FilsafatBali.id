<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FilsafatBali.id</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

          <style>

        @keyframes fadeUp{

    from{
        opacity:0;
        transform:translateY(40px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}

.fade-up{

    animation:fadeUp .8s ease;

}

</style>
</head>

<body class="bg-white" style="font-family:'Inter',sans-serif;">

    <!-- ================= NAVBAR ================= -->
<nav id="navbar"
class="fixed top-0 left-0 w-full z-50 transition-all duration-300">

    <div class="max-w-7xl mx-auto flex items-center justify-between px-12 pt-2 pb-2">

        <!-- Logo -->
        <div class="leading-none">

            <h1
            style="font-family:'Cormorant Garamond',serif;"
            class="text-[26px] md:text-[28px] font-bold text-[#A73D1F] leading-none">
            FilsafatBali
            </h1>


            <p class="text-[#D8B15A] tracking-[4px] text-[8px] mt-0.5">
            · ID · ARSIPAN BUDAYA
            </p>

        </div>

        <!-- Menu -->
        <ul id="menu"
        class="hidden lg:flex items-center gap-12 text-[11px] uppercase tracking-[3px] font-medium text-[#A77E3F]">

            <li><a href="#" class="hover:text-yellow-300">Filsafat</a></li>

            <li><a href="#" class="hover:text-yellow-300">Ajaran</a></li>

            <li><a href="#" class="hover:text-yellow-300">Cecimpedan</a></li>

            <li><a href="#" class="hover:text-yellow-300">Satua & Istilah</a></li>

            <li><a href="#" class="hover:text-yellow-300">Kontributor</a></li>

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

    <section class="relative min-h-screen flex items-start justify-center overflow-hidden">

        <!-- Background -->
        <img src="{{ asset('images/hero.png') }}" alt="Hero"
            class="absolute inset-0 w-full h-full object-cover">

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

            
    <h1
        style="font-family:'Cormorant Garamond',serif;"
        class="font-bold leading-[0.9]">

     <span class="block text-white text-[58px]">
        Menjaga Warisan,
     </span>

     <span class="block text-[#E2B75B] text-[66px] mt-1">
        Menerangi Masa Depan
     </span>

    </h1>

            <p
           class="mt-8 max-w-2xl mx-auto text-center
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

            <div class="mt-8 max-w-3xl mx-auto">

            <div class="bg-[#F5EFE4] rounded-lg px-5 py-4 flex items-center shadow-xl">

            <svg xmlns="http://www.w3.org/2000/svg"

            class="w-6 h-6 text-gray-600 mr-4"

            fill="none"

            viewBox="0 0 24 24"

            stroke="currentColor">

            <path stroke-linecap="round"

            stroke-linejoin="round"

            stroke-width="2"

            d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/>

</svg>

<input

type="text"

placeholder="Cari ajaran, istilah, satua..."

class="bg-transparent w-full outline-none text-[16px]">

</div>

</div>
<div class="mt-5 flex justify-center flex-wrap gap-3">

    <span class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium">
        TRI HITA KARANA
    </span>

    <span class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium">
        NGABEN
    </span>

    <span class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium">
        JALAK BALI
    </span>

    <span class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium">
        RWA BHINEDA
    </span>

    <span class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium">
        TAKSU
    </span>

    <span class="border border-white/40 rounded-md px-4 py-2 text-[10px] uppercase tracking-[2px] text-white font-medium">
        SUBAK
    </span>

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
<!-- ================= KOLEKSI UTAMA ================= -->
<section class="bg-[#F7F0E7] py-24">

    <div class="max-w-7xl mx-auto px-8">

        <p class="uppercase tracking-[6px] text-[#C58A3C] text-xs mb-4">
            — KOLEKSI UTAMA
        </p>

        <h2 style="font-family:'Cormorant Garamond',serif;"
            class="text-5xl font-bold text-[#23160E] mb-12">
            Empat Pilar Arsip
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

            <!-- AJARAN -->
            <div class="relative h-[470px] rounded-lg overflow-hidden group">

                <img src="{{ asset('images/ajaran.jpeg') }}"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 duration-500">

                <div class="absolute inset-0 bg-gradient-to-t from-[#8B231B]/90 via-[#8B231B]/35 to-transparent"></div>

                <div class="absolute bottom-0 p-6 text-white">

                    <p class="text-[11px] tracking-[4px] uppercase mb-3">
                        KEARIFAN LELUHUR BALI
                    </p>

                    <h3 style="font-family:'Cormorant Garamond',serif;"
                        class="text-4xl font-bold mb-4">
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

                <div class="absolute inset-0 bg-gradient-to-t from-[#B88324]/90 via-[#B88324]/30 to-transparent"></div>

                <div class="absolute bottom-0 p-6 text-white">

                    <p class="text-[11px] tracking-[4px] uppercase mb-3">
                        TEKA-TEKI TRADISIONAL
                    </p>

                    <h3 style="font-family:'Cormorant Garamond',serif;"
                        class="text-4xl font-bold mb-4">
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

                <div class="absolute inset-0 bg-gradient-to-t from-[#2D6C3F]/90 via-[#2D6C3F]/30 to-transparent"></div>

                <div class="absolute bottom-0 p-6 text-white">

                    <p class="text-[11px] tracking-[4px] uppercase mb-3">
                        FAUNA KHAS PULAU DEWATA
                    </p>

                    <h3 style="font-family:'Cormorant Garamond',serif;"
                        class="text-4xl font-bold mb-4">
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

                <div class="absolute inset-0 bg-gradient-to-t from-[#304C73]/90 via-[#304C73]/30 to-transparent"></div>

                <div class="absolute bottom-0 p-6 text-white">

                    <p class="text-[11px] tracking-[4px] uppercase mb-3">
                        KOSAKATA DAN TERMINOLOGI
                    </p>

                    <h3 style="font-family:'Cormorant Garamond',serif;"
                        class="text-4xl font-bold mb-4">
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
<section class="bg-[#241308] py-24">

    <div class="max-w-[1200px] mx-auto px-6">

        <p class="uppercase tracking-[6px] text-[#D4A64A] text-xs mb-3">
            SOROTAN
        </p>

        <h2
class="text-[66px] leading-[0.95] font-semibold mb-12 text-[#F7F1E8]"
style="font-family:'Cormorant Garamond',serif;">
Ajaran Tetua
        </h2>

        <div class="grid lg:grid-cols-[540px_1fr] gap-14 items-center">

            <!-- FOTO -->
            <div>

                <img
id="mainImage"
src="{{ asset('images/ajaran.jpeg') }}"
class="w-[540px] h-[420px] rounded-xl object-cover shadow-xl">

            </div>

            <!-- KONTEN -->
            <div>

                <span
id="mainTag"
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

<h2
id="mainTitle"
class="mt-6
text-[64px]
leading-[0.95]
font-semibold
text-[#F7F1E8]"
style="font-family:'Cormorant Garamond',serif;">
Tri Hita Karana
</h2>
                <p
id="mainDesc"
class="mt-7
text-[#E5D7C8]
text-[19px]
leading-[38px]
font-normal">

Tri Hita Karana merupakan filosofi kehidupan masyarakat Bali yang mengajarkan keharmonisan hubungan manusia dengan Tuhan, sesama manusia, dan alam.

</p>

        <div class="flex justify-between items-end mt-10">

    <!-- Profil -->
    <div id="mainProfile" class="flex items-center">

        <div
            class="w-14 h-14 rounded-full bg-[#7C5216] flex items-center justify-center">

            <span class="text-[#D4A64A] font-semibold">I</span>

        </div>

        <div class="ml-4">

            <h4
                id="mainAuthor"
                class="text-[#F8F2E8] text-[30px] font-semibold"
                style="font-family:'Cormorant Garamond',serif;">

                Ida Bagus Mantra

            </h4>

            <p
                id="mainRole"
                class="text-[#A98C67] uppercase tracking-[3px] text-[11px]">

                EST. 1940

            </p>

        </div>

    </div>

    <!-- Tombol -->
    <button
        id="mainButton"
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
        <div
            onclick="changeSlide(1)"
            id="thumb1"
            class="thumb relative w-[360px] h-[90px] rounded-xl overflow-hidden cursor-pointer border-2 border-[#D4A64A] transition-all duration-500">

            <img src="{{ asset('images/ajaran.jpeg') }}"
                class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/50"></div>

            <span class="absolute bottom-3 left-3 text-white font-semibold">
                Tri Hita Karana
            </span>

        </div>

        <!-- TAT TWAM ASI -->
        <div
            onclick="changeSlide(2)"
            id="thumb2"
            class="thumb relative w-[360px] h-[90px] rounded-xl overflow-hidden cursor-pointer border-2 border-transparent transition-all duration-500">

            <img src="{{ asset('images/tat twam asi.jpeg') }}"
                class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/50"></div>

            <span class="absolute bottom-3 left-3 text-white font-semibold">
                Tat Twam Asi
            </span>

        </div>

        <!-- DESA KALA PATRA -->
        <div
            onclick="changeSlide(3)"
            id="thumb3"
            class="thumb relative w-[360px] h-[90px] rounded-xl overflow-hidden cursor-pointer border-2 border-transparent transition-all duration-500">

            <img src="{{ asset('images/desa kala patra.jpeg') }}"
                class="w-full h-full object-cover">

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

        <h2
            style="font-family:'Cormorant Garamond',serif;"
            class="text-[64px] leading-none font-bold text-[#23160E] mb-12">

            Artikel Pilihan

        </h2>

        <!-- Menu -->
        <div class="flex gap-10 border-b border-[#DCCCB4] pb-4 text-[13px] uppercase tracking-[2px] font-medium">

            <button class="text-[#9B2F21] border-b-2 border-[#9B2F21] pb-2">
                Semua
            </button>

            <button>Ajaran Tetua</button>

            <button>Cecimpedan</button>

            <button>Satua Bali</button>

            <button>Istilah Bali</button>

        </div>

        <!-- Card -->

        <div class="grid grid-cols-3 gap-8 mt-10">


            <!-- CARD 1 -->
            <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300">

                <!-- Gambar -->
                <div class="relative">

                    <img src="{{ asset('images/subak.jpg') }}"
                        class="w-full h-60 object-cover">

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

                    <h3
                        style="font-family:'Cormorant Garamond',serif;"
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
            <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300">

                <div class="relative">

                    <img src="{{ asset('images/tat twam asi.jpeg') }}"
                        class="w-full h-60 object-cover">

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

                        Tat Twam Asi,
                        Menghormati
                        Sesama Manusia

                    </h3>

                    <p class="mt-4 text-[#675A4D] leading-8">
                        Mengajarkan bahwa setiap manusia adalah bagian dari diri kita sendiri sehingga harus saling menghargai.
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
            <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300">

            <div class="relative">

            <img src="{{ asset('images/desa kala patra.jpeg') }}" class="w-full h-60 object-cover">

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

            <span class="absolute top-4 right-4 bg-white text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2">
            <i data-feather="check-circle" class="w-4 h-4"></i>
            Terverifikasi
            </span>

            </div>

            <div class="p-6">

            <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[34px] leading-tight font-bold text-[#2B1A12]">
            Desa Kala Patra,
            Bijaksana dalam
            Setiap Keadaan
            </h3>

            <p class="mt-4 text-[#675A4D] leading-8">
            Mengajarkan bahwa setiap tindakan harus disesuaikan dengan tempat, waktu, dan keadaan.
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
            <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300">

            <div class="relative">

            <img src="{{ asset('images/rwa bhineda.jpeg') }}" class="w-full h-60 object-cover">

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

            <span class="absolute top-4 right-4 bg-white text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2">
            <i data-feather="check-circle" class="w-4 h-4"></i>
            Terverifikasi
            </span>

            </div>

            <div class="p-6">

            <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[34px] leading-tight font-bold text-[#2B1A12]">
            Rwa Bhineda,
            Keseimbangan
            Kehidupan
            </h3>

            <p class="mt-4 text-[#675A4D] leading-8">
            Filosofi yang mengajarkan bahwa segala sesuatu memiliki pasangan yang saling melengkapi.
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
            <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300">

            <div class="relative">

            <img src="{{ asset('images/tri kaya parisudha.jpeg') }}" class="w-full h-60 object-cover">

            <span class="absolute top-4 left-4 bg-[#D9B35D] text-white text-[11px] tracking-[2px] uppercase font-semibold px-4 py-2 rounded-full">
            AJARAN TETUA
            </span>

            <span class="absolute top-4 right-4 bg-white text-[#2E7D32] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2">
            <i data-feather="check-circle" class="w-4 h-4"></i>
            Terverifikasi
            </span>

            </div>

            <div class="p-6">

            <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[34px] leading-tight font-bold text-[#2B1A12]">
            Tri Kaya
            Parisudha
            </h3>

            <p class="mt-4 text-[#675A4D] leading-8">
            Berpikir baik, berkata baik, dan berbuat baik sebagai dasar kehidupan masyarakat Bali.
            </p>

            <div class="mt-8 flex items-center justify-between">

            <div class="text-[13px] text-[#8C7A65]">
            <span>5 Juni 2025</span>
            <span class="mx-2">•</span>
            <span>8 Menit</span>
            </div>

            <button class="flex items-center gap-2 border border-[#D6C5AE] rounded-lg px-4 py-2 text-[13px] font-medium text-[#6E5C49] hover:bg-[#F5F0E8] transition">
            <i data-feather="bookmark" class="w-4 h-4"></i>
            Simpan
            </button>

            </div>

            </div>

            </div>

            <!-- CARD 6 -->
                <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300">

                <div class="relative">

                <img src="{{ asset('images/taksu.jpeg') }}" class="w-full h-60 object-cover">

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

                <span class="absolute top-4 right-4 bg-white text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2">
                <i data-feather="check-circle" class="w-4 h-4"></i>
                Terverifikasi
                </span>

                </div>

                <div class="p-6">

                <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[34px] leading-tight font-bold text-[#2B1A12]">
                Taksu,
                Kekuatan Spiritual
                Orang Bali
                </h3>

                <p class="mt-4 text-[#675A4D] leading-8">
                Taksu dipercaya sebagai kekuatan batin yang memberikan wibawa, kreativitas, dan inspirasi.
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
                    
    <!-- ================= FOOTER ================= -->

    <footer class="bg-green-800 text-white py-10">

        <div class="text-center">

            <h2 class="text-2xl font-bold">
                FilsafatBali.id
            </h2>

            <p class="mt-2 text-gray-300">
                Melestarikan warisan budaya Bali melalui teknologi digital.
            </p>

            <p class="mt-6 text-sm text-gray-400">
                © 2026 FilsafatBali.id. All Rights Reserved.
            </p>

        </div>

    </footer>

<script>

const navbar = document.getElementById("navbar");

window.addEventListener("scroll", function () {

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
function changeSlide(no){

    currentSlide = no;
    
    // Reset semua thumbnail
document.getElementById("thumb1").classList.remove("border-[#D4A64A]");
document.getElementById("thumb2").classList.remove("border-[#D4A64A]");
document.getElementById("thumb3").classList.remove("border-[#D4A64A]");

document.getElementById("thumb1").classList.add("border-transparent");
document.getElementById("thumb2").classList.add("border-transparent");
document.getElementById("thumb3").classList.add("border-transparent");

// Thumbnail yang dipilih diberi border emas
document.getElementById("thumb"+no).classList.remove("border-transparent");
document.getElementById("thumb"+no).classList.add("border-[#D4A64A]");

    if(no==1){

        document.getElementById("mainImage").src="/images/ajaran.jpeg";

        document.getElementById("mainTitle").innerHTML="Tri Hita Karana";

        document.getElementById("mainDesc").innerHTML=
        "Tri Hita Karana merupakan filosofi kehidupan masyarakat Bali yang mengajarkan keharmonisan hubungan manusia dengan Tuhan, sesama manusia, dan alam.";

        document.getElementById("mainAuthor").innerHTML="Tim FilsafatBali";

        document.getElementById("mainTag").innerHTML="FILSAFAT KEHIDUPAN";

    }

    if(no==2){

        document.getElementById("mainImage").src="/images/tat twam asi.jpeg";

        document.getElementById("mainTitle").innerHTML="Tat Twam Asi";

        document.getElementById("mainDesc").innerHTML=
        "Tat Twam Asi berarti 'Aku adalah kamu'. Filosofi ini mengajarkan empati dan menghormati sesama manusia.";

        document.getElementById("mainAuthor").innerHTML="Ida Bagus Mantra";

        document.getElementById("mainTag").innerHTML="KEMANUSIAAN";

    }

    if(no==3){

        document.getElementById("mainImage").src="/images/desa kala patra.jpeg";

        document.getElementById("mainTitle").innerHTML="Desa Kala Patra";

        document.getElementById("mainDesc").innerHTML=
        "Desa Kala Patra mengajarkan bahwa setiap tindakan harus mempertimbangkan tempat, waktu, dan keadaan.";

        document.getElementById("mainAuthor").innerHTML="I Gusti Ngurah";

        document.getElementById("mainTag").innerHTML="KEARIFAN LOKAL";

    }

    // Reset semua dot
document.getElementById("dot1").classList.remove("bg-[#D9B35D]");
document.getElementById("dot2").classList.remove("bg-[#D9B35D]");
document.getElementById("dot3").classList.remove("bg-[#D9B35D]");

document.getElementById("dot1").classList.add("bg-[#665548]");
document.getElementById("dot2").classList.add("bg-[#665548]");
document.getElementById("dot3").classList.add("bg-[#665548]");

// Dot yang aktif
document.getElementById("dot"+no).classList.remove("bg-[#665548]");
document.getElementById("dot"+no).classList.add("bg-[#D9B35D]");

// Animasi
document.getElementById("mainImage").classList.remove("fade-up");
document.getElementById("mainTag").classList.remove("fade-up");
document.getElementById("mainTitle").classList.remove("fade-up");
document.getElementById("mainDesc").classList.remove("fade-up");
document.getElementById("mainProfile").classList.remove("fade-up");
document.getElementById("mainButton").classList.remove("fade-up");

setTimeout(function(){

    document.getElementById("mainImage").classList.add("fade-up");
    document.getElementById("mainTag").classList.add("fade-up");
    document.getElementById("mainTitle").classList.add("fade-up");
    document.getElementById("mainDesc").classList.add("fade-up");
    document.getElementById("mainProfile").classList.add("fade-up");
    document.getElementById("mainButton").classList.add("fade-up");

},20);
} 

function autoSlide(){

    currentSlide++;

    if(currentSlide > 3){
        currentSlide = 1;
    }

    changeSlide(currentSlide);

}

changeSlide(1);

setInterval(autoSlide, 4000);
</script>
<script>
    feather.replace();
</script>
</body>

</html>

