<!-- ========================================== -->
<!-- STYLES FIX: UNDERLINE SINGLE & EFEK GAMBAR -->
<!-- ========================================== -->
<style>
    /* Container Menu Tab */
    .filter-tab-container {
        position: relative;
        display: flex;
        gap: 2.5rem; /* 40px */
        border-bottom: 1px solid #DCCCB4;
    }

    /* Styling Dasar Setiap Tombol Tab */
    .filter-tab-btn {
        position: relative;
        padding-bottom: 1rem; /* 16px */
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 500;
        color: #8C7A65;
        background: transparent;
        border: none;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .filter-tab-btn:hover {
        color: #992B20;
    }

    /* KONDISI AKTIF: Hanya tombol aktif yang berwarna merah */
    .filter-tab-btn.tab-active {
        color: #992B20 !important;
        font-weight: 700;
    }

    /* ANIMASI GARIS UNDERLINE MERAH EXCLUSIVE */
    /* Garis merah hanya dirender pada tombol yang memiliki class .tab-active */
    .filter-tab-btn::after {
        content: '';
        position: absolute;
        bottom: -1px; /* Menempel tepat di garis border-bottom container */
        left: 0;
        width: 100%;
        height: 3px;
        background-color: #992B20;
        transform: scaleX(0); /* Sembunyi secara default */
        transform-origin: center;
        transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Garis merah melebar 100% HANYA jika tombol memiliki class tab-active */
    .filter-tab-btn.tab-active::after {
        transform: scaleX(1);
    }

    /* KEYFRAMES ANIMASI GAMBAR / KARTU ARTIKEL MUNCUL */
    @keyframes imageReveal {
        0% {
            opacity: 0;
            transform: scale(0.88) translateY(20px);
            filter: blur(4px);
        }
        100% {
            opacity: 1;
            transform: scale(1) translateY(0);
            filter: blur(0);
        }
    }

    /* Class animasi kartu artikel saat dipanggil JavaScript */
    .card-reveal-anim {
        animation: imageReveal 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
</style>

<!-- ========================================== -->
<!-- SECTION ARTIKEL PILIHAN                    -->
<!-- ========================================== -->
<section id="artikel" class="bg-[#F7F0E7] py-24">
    <div class="max-w-7xl mx-auto px-8">

        <!-- Judul Section -->
        <p class="uppercase tracking-[6px] text-[#B8863B] text-xs mb-3">
            TERBARU
        </p>

        <h2 style="font-family:'Cormorant Garamond',serif;" class="text-[64px] leading-none font-bold text-[#23160E] mb-12">
            Artikel Pilihan
        </h2>

        <!-- Menu Filter Tab (Container) -->
        <div class="filter-tab-container">
            <button id="btn-semua" onclick="filterArtikel('semua')" class="filter-tab-btn tab-active">Semua</button>
            <button id="btn-ajaran" onclick="filterArtikel('ajaran')" class="filter-tab-btn">Ajaran Tetua</button>
            <button id="btn-cecimpedan" onclick="filterArtikel('cecimpedan')" class="filter-tab-btn">Cecimpedan</button>
            <button id="btn-satua" onclick="filterArtikel('satua')" class="filter-tab-btn">Satua Bali</button>
            <button id="btn-istilah" onclick="filterArtikel('istilah')" class="filter-tab-btn">Istilah Bali</button>
        </div>

        <!-- Grid Cards Artikel -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">

            <!-- CARD 1: AJARAN TETUA -->
            <div onclick="openDetailArtikel(1)" class="card-artikel ajaran bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300 cursor-pointer group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('images/subak.jpeg') }}" class="w-full h-60 object-cover group-hover:scale-105 transition duration-500">
                    
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300"></div>

                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 transform group-hover:scale-100 scale-95 z-10">
                        <span class="bg-[#FAF5ED] text-[#2B1A12] border border-[#D6C5AE] text-[11px] font-bold tracking-[2px] uppercase px-5 py-2.5 rounded-lg shadow-lg flex items-center gap-2 hover:bg-white transition">
                            <i data-feather="external-link" class="w-4 h-4 text-[#B8863B]"></i>
                            BACA ARTIKEL
                        </span>
                    </div>

                    <span class="absolute top-4 left-4 bg-[#992B20] text-white text-[11px] tracking-[2px] uppercase font-semibold px-4 py-2 rounded-full z-10">
                        AJARAN TETUA
                    </span>
                    <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2 z-10">
                        <i data-feather="check-circle" class="w-4 h-4"></i> Terverifikasi
                    </span>
                </div>

                <div class="p-6">
                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[34px] leading-tight font-bold text-[#2B1A12] group-hover:text-[#B8863B] transition">
                        Filosofi Subak: Demokrasi Air dalam Peradaban Bali
                    </h3>
                    <p class="mt-4 text-[#675A4D] leading-8 line-clamp-2">
                        Sistem irigasi Subak bukan sekadar teknik pertanian, tetapi merupakan perwujudan nyata Tri Hita Karana.
                    </p>
                    <div class="mt-8 flex items-center justify-between">
                        <div class="text-[13px] text-[#8C7A65]">
                            <span>12 Juni 2025</span><span class="mx-2">•</span><span>8 Menit</span>
                        </div>
                        <button onclick="event.stopPropagation();" class="w-10 h-10 flex items-center justify-center border border-[#D6C5AE] rounded-lg text-[#8C6A3B] hover:bg-[#F5F0E8] hover:border-[#D9B35D] transition duration-300">
                            <i data-feather="bookmark" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- CARD 2: CECIMPEDAN -->
            <div onclick="openDetailArtikel(2)" class="card-artikel cecimpedan bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300 cursor-pointer group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('images/cecimpedan.jpeg') }}" class="w-full h-60 object-cover group-hover:scale-105 transition duration-500">
                    
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300"></div>

                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 transform group-hover:scale-100 scale-95 z-10">
                        <span class="bg-[#FAF5ED] text-[#2B1A12] border border-[#D6C5AE] text-[11px] font-bold tracking-[2px] uppercase px-5 py-2.5 rounded-lg shadow-lg flex items-center gap-2 hover:bg-white transition">
                            <i data-feather="external-link" class="w-4 h-4 text-[#B8863B]"></i>
                            BACA ARTIKEL
                        </span>
                    </div>

                    <span class="absolute top-4 left-4 bg-[#D9A441] text-white text-[11px] tracking-[2px] uppercase font-semibold px-4 py-2 rounded-full z-10">
                        CECIMPEDAN
                    </span>
                    <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2 z-10">
                        <i data-feather="check-circle" class="w-4 h-4"></i> Terverifikasi
                    </span>
                </div>

                <div class="p-6">
                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[34px] leading-tight font-bold text-[#2B1A12] group-hover:text-[#B8863B] transition">
                        Cecimpedan Bali sebagai Media Pendidikan Karakter Anak
                    </h3>
                    <p class="mt-4 text-[#675A4D] leading-8 line-clamp-2">
                        Teka-teki tradisional Bali bukan sekadar hiburan; di dalamnya tersimpan pelajaran logika, ekologi, dan nilai-nilai moral.
                    </p>
                    <div class="mt-8 flex items-center justify-between">
                        <div class="text-[13px] text-[#8C7A65]">
                            <span>10 Juni 2025</span><span class="mx-2">•</span><span>6 Menit</span>
                        </div>
                        <button onclick="event.stopPropagation();" class="w-10 h-10 flex items-center justify-center border border-[#D6C5AE] rounded-lg text-[#8C6A3B] hover:bg-[#F5F0E8] hover:border-[#D9B35D] transition duration-300">
                            <i data-feather="bookmark" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- CARD 3: SATUA BALI -->
            <div onclick="openDetailArtikel(3)" class="card-artikel satua bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300 cursor-pointer group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('images/jalak bali.jpeg') }}" class="w-full h-60 object-cover group-hover:scale-105 transition duration-500">
                    
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300"></div>

                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 transform group-hover:scale-100 scale-95 z-10">
                        <span class="bg-[#FAF5ED] text-[#2B1A12] border border-[#D6C5AE] text-[11px] font-bold tracking-[2px] uppercase px-5 py-2.5 rounded-lg shadow-lg flex items-center gap-2 hover:bg-white transition">
                            <i data-feather="external-link" class="w-4 h-4 text-[#B8863B]"></i>
                            BACA ARTIKEL
                        </span>
                    </div>

                    <span class="absolute top-4 left-4 bg-[#2F7D4B] text-white text-[11px] tracking-[2px] uppercase font-semibold px-4 py-2 rounded-full z-10">
                        SATUA BALI
                    </span>
                    <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2 z-10">
                        <i data-feather="check-circle" class="w-4 h-4"></i> Terverifikasi
                    </span>
                </div>

                <div class="p-6">
                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[34px] leading-tight font-bold text-[#2B1A12] group-hover:text-[#B8863B] transition">
                        Jalak Bali: Simbol Keanggunan Yang Terancam Punah
                    </h3>
                    <p class="mt-4 text-[#675A4D] leading-8 line-clamp-2">
                        Leucopsar rothschildi, si Jalak Bali yang murni putih, kini tersisa kurang dari 100 ekor di alam liar.
                    </p>
                    <div class="mt-8 flex items-center justify-between">
                        <div class="text-[13px] text-[#8C7A65]">
                            <span>8 Juni 2025</span><span class="mx-2">•</span><span>5 Menit</span>
                        </div>
                        <button onclick="event.stopPropagation();" class="w-10 h-10 flex items-center justify-center border border-[#D6C5AE] rounded-lg text-[#8C6A3B] hover:bg-[#F5F0E8] hover:border-[#D9B35D] transition duration-300">
                            <i data-feather="bookmark" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- CARD 4: ISTILAH BALI -->
            <div onclick="openDetailArtikel(4)" class="card-artikel istilah bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300 cursor-pointer group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('images/sor singgih.jpeg') }}" class="w-full h-60 object-cover group-hover:scale-105 transition duration-500">
                    
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300"></div>

                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 transform group-hover:scale-100 scale-95 z-10">
                        <span class="bg-[#FAF5ED] text-[#2B1A12] border border-[#D6C5AE] text-[11px] font-bold tracking-[2px] uppercase px-5 py-2.5 rounded-lg shadow-lg flex items-center gap-2 hover:bg-white transition">
                            <i data-feather="external-link" class="w-4 h-4 text-[#B8863B]"></i>
                            BACA ARTIKEL
                        </span>
                    </div>

                    <span class="absolute top-4 left-4 bg-[#305F9E] text-white text-[11px] tracking-[2px] uppercase font-semibold px-4 py-2 rounded-full z-10">
                        ISTILAH BALI
                    </span>
                    <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2 z-10">
                        <i data-feather="check-circle" class="w-4 h-4"></i> Terverifikasi
                    </span>
                </div>

                <div class="p-6">
                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[34px] leading-tight font-bold text-[#2B1A12] group-hover:text-[#B8863B] transition">
                        Sor Singgih: Hierarki Bahasa sebagai Cermin Tatanan Sosial
                    </h3>
                    <p class="mt-4 text-[#675A4D] leading-8 line-clamp-2">
                        Bahasa Bali mengenal tingkatan tutur—Alus, Madya, Kasar—yang mencerminkan relasi sosial dan etika.
                    </p>
                    <div class="mt-8 flex items-center justify-between">
                        <div class="text-[13px] text-[#8C7A65]">
                            <span>7 Juni 2025</span><span class="mx-2">•</span><span>7 Menit</span>
                        </div>
                        <button onclick="event.stopPropagation();" class="w-10 h-10 flex items-center justify-center border border-[#D6C5AE] rounded-lg text-[#8C6A3B] hover:bg-[#F5F0E8] hover:border-[#D9B35D] transition duration-300">
                            <i data-feather="bookmark" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- CARD 5: AJARAN TETUA -->
            <div onclick="openDetailArtikel(5)" class="card-artikel ajaran bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300 cursor-pointer group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('images/rwa_bhineda.jpg') }}" class="w-full h-60 object-cover group-hover:scale-105 transition duration-500">
                    
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300"></div>

                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 transform group-hover:scale-100 scale-95 z-10">
                        <span class="bg-[#FAF5ED] text-[#2B1A12] border border-[#D6C5AE] text-[11px] font-bold tracking-[2px] uppercase px-5 py-2.5 rounded-lg shadow-lg flex items-center gap-2 hover:bg-white transition">
                            <i data-feather="external-link" class="w-4 h-4 text-[#B8863B]"></i>
                            BACA ARTIKEL
                        </span>
                    </div>

                    <span class="absolute top-4 left-4 bg-[#992B20] text-white text-[11px] tracking-[2px] uppercase font-semibold px-4 py-2 rounded-full z-10">
                        AJARAN TETUA
                    </span>
                    <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2 z-10">
                        <i data-feather="check-circle" class="w-4 h-4"></i> Terverifikasi
                    </span>
                </div>

                <div class="p-6">
                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[34px] leading-tight font-bold text-[#2B1A12] group-hover:text-[#B8863B] transition">
                        Rwa Bhineda, Keseimbangan Kehidupan
                    </h3>
                    <p class="mt-4 text-[#675A4D] leading-8 line-clamp-2">
                        Filosofi yang mengajarkan bahwa segala sesuatu memiliki pasangan yang saling melengkapi dalam harmoni alam.
                    </p>
                    <div class="mt-8 flex items-center justify-between">
                        <div class="text-[13px] text-[#8C7A65]">
                            <span>5 Juni 2025</span><span class="mx-2">•</span><span>8 Menit</span>
                        </div>
                        <button onclick="event.stopPropagation();" class="w-10 h-10 flex items-center justify-center border border-[#D6C5AE] rounded-lg text-[#8C6A3B] hover:bg-[#F5F0E8] hover:border-[#D9B35D] transition duration-300">
                            <i data-feather="bookmark" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- CARD 6: CECIMPEDAN -->
            <div onclick="openDetailArtikel(6)" class="card-artikel cecimpedan bg-white rounded-xl overflow-hidden shadow hover:shadow-xl duration-300 cursor-pointer group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('images/cecimpedan.jpeg') }}" class="w-full h-60 object-cover group-hover:scale-105 transition duration-500">
                    
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300"></div>

                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 transform group-hover:scale-100 scale-95 z-10">
                        <span class="bg-[#FAF5ED] text-[#2B1A12] border border-[#D6C5AE] text-[11px] font-bold tracking-[2px] uppercase px-5 py-2.5 rounded-lg shadow-lg flex items-center gap-2 hover:bg-white transition">
                            <i data-feather="external-link" class="w-4 h-4 text-[#B8863B]"></i>
                            BACA ARTIKEL
                        </span>
                    </div>

                    <span class="absolute top-4 left-4 bg-[#D9A441] text-white text-[11px] tracking-[2px] uppercase font-semibold px-4 py-2 rounded-full z-10">
                        CECIMPEDAN
                    </span>
                    <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2 z-10">
                        <i data-feather="check-circle" class="w-4 h-4"></i> Terverifikasi
                    </span>
                </div>

                <div class="p-6">
                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[34px] leading-tight font-bold text-[#2B1A12] group-hover:text-[#B8863B] transition">
                        Makna Tersembunyi di Balik Cecimpedan tentang Alam
                    </h3>
                    <p class="mt-4 text-[#675A4D] leading-8 line-clamp-2">
                        Teka-teki Bali tentang benda alam mengandung makna filosofi mendalam dalam menjaga ekosistem.
                    </p>
                    <div class="mt-8 flex items-center justify-between">
                        <div class="text-[13px] text-[#8C7A65]">
                            <span>2 Juni 2025</span><span class="mx-2">•</span><span>9 Menit</span>
                        </div>
                        <button onclick="event.stopPropagation();" class="w-10 h-10 flex items-center justify-center border border-[#D6C5AE] rounded-lg text-[#8C6A3B] hover:bg-[#F5F0E8] hover:border-[#D9B35D] transition duration-300">
                            <i data-feather="bookmark" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- JAVASCRIPT: FILTER & EFEK ANIMASI GAMBAR   -->
<!-- ========================================== -->
<script>
    function filterArtikel(kategori) {
        // 1. LEPAS class 'tab-active' dari SEMUA tombol tab
        document.querySelectorAll('.filter-tab-btn').forEach(function(btn) {
            btn.classList.remove('tab-active');
        });

        // 2. PASANG class 'tab-active' HANYA pada tombol yang diklik
        const activeBtn = document.getElementById('btn-' + kategori);
        if (activeBtn) {
            activeBtn.classList.add('tab-active');
        }

        // 3. EFEK ANIMASI GAMBAR/KARTU ARTIKEL
        const cards = document.querySelectorAll('.card-artikel');
        cards.forEach(function(card) {
            // Hapus class animasi sebelumnya
            card.classList.remove('card-reveal-anim');

            if (kategori === 'semua' || card.classList.contains(kategori)) {
                card.style.display = 'block';

                // Re-trigger animasi CSS dengan merefresh browser DOM reflow
                void card.offsetWidth;
                
                // Tambahkan kelas animasi zoom + fade-in
                card.classList.add('card-reveal-anim');
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>