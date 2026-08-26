<!-- SECTION KONTRIBUTOR / PILIH PERAN -->
<section id="kontributor" class="bg-[#F7F0E7] py-12 sm:py-24">

    <div class="max-w-7xl mx-auto px-4 sm:px-8">

        <!-- Judul Header -->
        <div class="text-center">
            <p class="uppercase tracking-[4px] sm:tracking-[6px] text-[#C58A3C] text-[10px] sm:text-xs font-semibold">
                — BERGABUNG BERSAMA
            </p>

            <h2 style="font-family:'Cormorant Garamond',serif;" class="text-3xl sm:text-5xl lg:text-[64px] font-bold text-[#23160E] mt-2 sm:mt-4 leading-tight">
                Pilih Peran Anda
            </h2>

            <p class="mt-2 sm:mt-4 text-[#6E5C4B] text-xs sm:text-lg max-w-2xl mx-auto leading-relaxed sm:leading-8">
                Setiap anggota komunitas memiliki peran penting dalam menjaga warisan budaya Bali.
            </p>
        </div>

        <!-- GRID CARDS PERAN (RESPONSIF KONSISTEN) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-8 mt-8 sm:mt-16">

            <!-- ================= PENGGUNA ================= -->
            <div class="bg-white rounded-xl border border-[#E7D5C2] p-5 sm:p-8 flex flex-col justify-between shadow-sm hover:shadow-md transition">
                <div>
                    <div class="flex items-center gap-3.5 sm:gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-lg bg-[#F4E5D8] flex items-center justify-center shrink-0">
                            <i data-feather="book-open" class="w-5 h-5 sm:w-6 sm:h-6 text-[#9B3B24]"></i>
                        </div>
                        <div>
                            <h3 style="font-family:'Cormorant Garamond',serif;" class="text-2xl sm:text-4xl font-bold text-[#23160E]">
                                Pengguna
                            </h3>
                            <p class="uppercase tracking-[1.5px] sm:tracking-[2px] text-[9px] sm:text-xs text-[#9B7C58] font-medium">
                                Pelajar & Masyarakat
                            </p>
                        </div>
                    </div>

                    <ul class="mt-5 sm:mt-8 space-y-2.5 sm:space-y-4 text-xs sm:text-sm text-[#6B4A2B]">
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#9B3B24] shrink-0"></span>
                            <span>Membaca artikel</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#9B3B24] shrink-0"></span>
                            <span>Simpan artikel favorit</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#9B3B24] shrink-0"></span>
                            <span>Notifikasi artikel terbaru</span>
                        </li>
                    </ul>
                </div>

                <a href="{{ route('register') }}"
                    class="mt-6 sm:mt-10 block text-center border border-[#9B3B24] text-[#9B3B24] rounded-md py-2.5 sm:py-3 hover:bg-[#9B3B24] hover:text-white font-semibold text-xs sm:text-sm transition">
                    Daftar Gratis
                </a>
            </div>

            <!-- ================= PENULIS ================= -->
            <div class="relative bg-white rounded-xl border-2 border-[#C48D2D] shadow-xl p-5 sm:p-8 flex flex-col justify-between mt-2 sm:mt-0">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-[#C48D2D] text-white text-[9px] sm:text-[10px] uppercase tracking-[2px] sm:tracking-[3px] px-3.5 sm:px-4 py-0.5 sm:py-1 rounded-full font-bold shadow-sm whitespace-nowrap">
                    Populer
                </span>

                <div>
                    <div class="flex items-center gap-3.5 sm:gap-4 mt-1 sm:mt-0">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-lg bg-[#F8EBD2] flex items-center justify-center shrink-0">
                            <i data-feather="edit-3" class="w-5 h-5 sm:w-6 sm:h-6 text-[#C48D2D]"></i>
                        </div>
                        <div>
                            <h3 style="font-family:'Cormorant Garamond',serif;" class="text-2xl sm:text-4xl font-bold text-[#23160E]">
                                Penulis
                            </h3>
                            <p class="uppercase tracking-[1.5px] sm:tracking-[2px] text-[9px] sm:text-xs text-[#9B7C58] font-medium">
                                Kontributor Konten
                            </p>
                        </div>
                    </div>

                    <ul class="mt-5 sm:mt-8 space-y-2.5 sm:space-y-4 text-xs sm:text-sm text-[#6B4A2B]">
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C48D2D] shrink-0"></span>
                            <span>Publikasi artikel budaya</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C48D2D] shrink-0"></span>
                            <span>Tambah Ajaran Tetua</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C48D2D] shrink-0"></span>
                            <span>Tambah Satua Bali</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#C48D2D] shrink-0"></span>
                            <span>Tambah Istilah Bali</span>
                        </li>
                    </ul>
                </div>

                <a href="{{ route('register', ['role' => 'penulis']) }}"
                    class="mt-6 sm:mt-10 block text-center bg-[#C48D2D] text-white rounded-md py-2.5 sm:py-3 hover:bg-[#B27C20] font-semibold text-xs sm:text-sm transition shadow-md">
                    Jadi Penulis
                </a>
            </div>

            <!-- ================= ADMIN ================= -->
            <div class="bg-white rounded-xl border border-[#E7D5C2] p-5 sm:p-8 flex flex-col justify-between shadow-sm hover:shadow-md transition sm:col-span-2 lg:col-span-1">
                <div>
                    <div class="flex items-center gap-3.5 sm:gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-lg bg-[#E8E8E8] flex items-center justify-center shrink-0">
                            <i data-feather="shield" class="w-5 h-5 sm:w-6 sm:h-6 text-[#385274]"></i>
                        </div>
                        <div>
                            <h3 style="font-family:'Cormorant Garamond',serif;" class="text-2xl sm:text-4xl font-bold text-[#23160E]">
                                Admin
                            </h3>
                            <p class="uppercase tracking-[1.5px] sm:tracking-[2px] text-[9px] sm:text-xs text-[#9B7C58] font-medium">
                                Pengelola Arsip
                            </p>
                        </div>
                    </div>

                    <ul class="mt-5 sm:mt-8 space-y-2.5 sm:space-y-4 text-xs sm:text-sm text-[#6B4A2B]">
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#385274] shrink-0"></span>
                            <span>Moderasi artikel</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#385274] shrink-0"></span>
                            <span>Verifikasi konten</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#385274] shrink-0"></span>
                            <span>Kelola pengguna</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#385274] shrink-0"></span>
                            <span>Kelola kategori</span>
                        </li>
                    </ul>
                </div>

                <a href="{{ route('login') }}"
                    class="mt-6 sm:mt-10 block text-center border border-[#385274] text-[#385274] rounded-md py-2.5 sm:py-3 hover:bg-[#385274] hover:text-white font-semibold text-xs sm:text-sm transition">
                    Hubungi Kami
                </a>
            </div>

        </div>

    </div>

</section>