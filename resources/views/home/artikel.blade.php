<!-- ========================================== -->
<!-- STYLES FIX: UNDERLINE, ANIMASI & HOVER HOIST -->
<!-- ========================================== -->
<style>
    /* EFEK KARTU ARTIKEL TERANGKAT NAIK SAAT HOVER */
    .card-artikel {
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), 
                    box-shadow 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        will-change: transform, box-shadow;
    }

    .card-artikel:hover {
        transform: translateY(-10px) !important; 
        box-shadow: 0 20px 30px -10px rgba(43, 26, 18, 0.18) !important; 
    }

    /* Container Menu Tab */
    .filter-tab-container {
        position: relative;
        display: flex;
        gap: 2.5rem;
        border-bottom: 1px solid #DCCCB4;
    }

    /* Styling Dasar Setiap Tombol Tab */
    .filter-tab-btn {
        position: relative;
        padding-bottom: 1rem;
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

    .filter-tab-btn.tab-active {
        color: #992B20 !important;
        font-weight: 700;
    }

    .filter-tab-btn::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 3px;
        background-color: #992B20;
        transform: scaleX(0);
        transform-origin: center;
        transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .filter-tab-btn.tab-active::after {
        transform: scaleX(1);
    }

    @keyframes imageReveal {
        0% { opacity: 0; transform: scale(0.88) translateY(20px); filter: blur(4px); }
        100% { opacity: 1; transform: scale(1) translateY(0); filter: blur(0); }
    }

    .card-reveal-anim {
        animation: imageReveal 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
</style>

<!-- CSRF TOKEN FOR AJAX -->
<meta name="csrf-token" content="{{ csrf_token() }}">

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

        <!-- Menu Filter Tab -->
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
            <div onclick="openDetailArtikel(1)" class="card-artikel ajaran bg-white rounded-xl overflow-hidden shadow duration-300 cursor-pointer group relative">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('images/subak.jpeg') }}" class="w-full h-60 object-cover group-hover:scale-105 transition duration-500" alt="Filosofi Subak">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 transform group-hover:scale-100 scale-95 z-10">
                        <span class="bg-[#FAF5ED] text-[#2B1A12] border border-[#D6C5AE] text-[11px] font-bold tracking-[2px] uppercase px-5 py-2.5 rounded-lg shadow-lg flex items-center gap-2 hover:bg-white transition">
                            <i data-feather="external-link" class="w-4 h-4 text-[#B8863B]"></i> BACA ARTIKEL
                        </span>
                    </div>
                    <span class="absolute top-4 left-4 bg-[#992B20] text-white text-[11px] tracking-[2px] uppercase font-semibold px-4 py-2 rounded-full z-10">AJARAN TETUA</span>
                    <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2 z-10">
                        <i data-feather="check-circle" class="w-4 h-4"></i> Terverifikasi
                    </span>
                </div>
                <div class="p-6">
                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[34px] leading-tight font-bold text-[#2B1A12] group-hover:text-[#B8863B] transition">
                        Filosofi Subak: Demokrasi Air dalam Peradaban Bali
                    </h3>
                    <p class="mt-4 text-[#675A4D] leading-8 line-clamp-2">Sistem irigasi Subak bukan sekadar teknik pertanian, tetapi merupakan perwujudan nyata Tri Hita Karana.</p>
                    <div class="mt-8 flex items-center justify-between">
                        <div class="text-[13px] text-[#8C7A65]"><span>12 Juni 2025</span><span class="mx-2">•</span><span>8 Menit</span></div>
                        @auth
                            @if(auth()->user()->role === 'pengguna')
                                @php
                                    $isSaved1 = \App\Models\Bookmark::where('user_id', auth()->id())->where('item_title', 'Filosofi Subak: Demokrasi Air dalam Peradaban Bali')->exists();
                                @endphp
                                <button type="button" 
                                    onclick="toggleBookmark(event, this, 'Filosofi Subak: Demokrasi Air dalam Peradaban Bali', 'Ajaran Tetua')" 
                                    data-saved="{{ $isSaved1 ? 'true' : 'false' }}"
                                    title="{{ $isSaved1 ? 'Batal Simpan' : 'Simpan ke Arsip' }}" 
                                    class="relative z-30 w-10 h-10 flex items-center justify-center border border-[#D6C5AE] rounded-lg text-[#8C6A3B] hover:bg-[#F5F0E8] hover:border-[#D9B35D] transition duration-300">
                                    <i data-feather="bookmark" class="w-5 h-5 {{ $isSaved1 ? 'text-[#B8863B]' : '' }}" style="{{ $isSaved1 ? 'fill:#B8863B; color:#B8863B;' : '' }}"></i>
                                </button>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            <!-- CARD 2: CECIMPEDAN -->
            <div onclick="openDetailArtikel(2)" class="card-artikel cecimpedan bg-white rounded-xl overflow-hidden shadow duration-300 cursor-pointer group relative">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('images/cecimpedan.jpeg') }}" class="w-full h-60 object-cover group-hover:scale-105 transition duration-500" alt="Cecimpedan">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 transform group-hover:scale-100 scale-95 z-10">
                        <span class="bg-[#FAF5ED] text-[#2B1A12] border border-[#D6C5AE] text-[11px] font-bold tracking-[2px] uppercase px-5 py-2.5 rounded-lg shadow-lg flex items-center gap-2 hover:bg-white transition">
                            <i data-feather="external-link" class="w-4 h-4 text-[#B8863B]"></i> BACA ARTIKEL
                        </span>
                    </div>
                    <span class="absolute top-4 left-4 bg-[#D9A441] text-white text-[11px] tracking-[2px] uppercase font-semibold px-4 py-2 rounded-full z-10">CECIMPEDAN</span>
                    <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2 z-10">
                        <i data-feather="check-circle" class="w-4 h-4"></i> Terverifikasi
                    </span>
                </div>
                <div class="p-6">
                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[34px] leading-tight font-bold text-[#2B1A12] group-hover:text-[#B8863B] transition">
                        Cecimpedan Bali sebagai Media Pendidikan Karakter Anak
                    </h3>
                    <p class="mt-4 text-[#675A4D] leading-8 line-clamp-2">Teka-teki tradisional Bali bukan sekadar hiburan; di dalamnya tersimpan pelajaran logika, ekologi, dan nilai-nilai moral.</p>
                    <div class="mt-8 flex items-center justify-between">
                        <div class="text-[13px] text-[#8C7A65]"><span>10 Juni 2025</span><span class="mx-2">•</span><span>6 Menit</span></div>
                        @auth
                            @if(auth()->user()->role === 'pengguna')
                                @php
                                    $isSaved2 = \App\Models\Bookmark::where('user_id', auth()->id())->where('item_title', 'Cecimpedan Bali sebagai Media Pendidikan Karakter Anak')->exists();
                                @endphp
                                <button type="button" 
                                    onclick="toggleBookmark(event, this, 'Cecimpedan Bali sebagai Media Pendidikan Karakter Anak', 'Cecimpedan')" 
                                    data-saved="{{ $isSaved2 ? 'true' : 'false' }}"
                                    title="{{ $isSaved2 ? 'Batal Simpan' : 'Simpan ke Arsip' }}" 
                                    class="relative z-30 w-10 h-10 flex items-center justify-center border border-[#D6C5AE] rounded-lg text-[#8C6A3B] hover:bg-[#F5F0E8] hover:border-[#D9B35D] transition duration-300">
                                    <i data-feather="bookmark" class="w-5 h-5 {{ $isSaved2 ? 'text-[#B8863B]' : '' }}" style="{{ $isSaved2 ? 'fill:#B8863B; color:#B8863B;' : '' }}"></i>
                                </button>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            <!-- CARD 3: SATUA BALI -->
            <div onclick="openDetailArtikel(3)" class="card-artikel satua bg-white rounded-xl overflow-hidden shadow duration-300 cursor-pointer group relative">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('images/jalak bali.jpeg') }}" class="w-full h-60 object-cover group-hover:scale-105 transition duration-500" alt="Jalak Bali">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 transform group-hover:scale-100 scale-95 z-10">
                        <span class="bg-[#FAF5ED] text-[#2B1A12] border border-[#D6C5AE] text-[11px] font-bold tracking-[2px] uppercase px-5 py-2.5 rounded-lg shadow-lg flex items-center gap-2 hover:bg-white transition">
                            <i data-feather="external-link" class="w-4 h-4 text-[#B8863B]"></i> BACA ARTIKEL
                        </span>
                    </div>
                    <span class="absolute top-4 left-4 bg-[#2F7D4B] text-white text-[11px] tracking-[2px] uppercase font-semibold px-4 py-2 rounded-full z-10">SATUA BALI</span>
                    <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2 z-10">
                        <i data-feather="check-circle" class="w-4 h-4"></i> Terverifikasi
                    </span>
                </div>
                <div class="p-6">
                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[34px] leading-tight font-bold text-[#2B1A12] group-hover:text-[#B8863B] transition">
                        Jalak Bali: Simbol Keanggunan Yang Terancam Punah
                    </h3>
                    <p class="mt-4 text-[#675A4D] leading-8 line-clamp-2">Leucopsar rothschildi, si Jalak Bali yang murni putih, kini tersisa kurang dari 100 ekor di alam liar.</p>
                    <div class="mt-8 flex items-center justify-between">
                        <div class="text-[13px] text-[#8C7A65]"><span>8 Juni 2025</span><span class="mx-2">•</span><span>5 Menit</span></div>
                        @auth
                            @if(auth()->user()->role === 'pengguna')
                                @php
                                    $isSaved3 = \App\Models\Bookmark::where('user_id', auth()->id())->where('item_title', 'Jalak Bali: Simbol Keanggunan Yang Terancam Punah')->exists();
                                @endphp
                                <button type="button" 
                                    onclick="toggleBookmark(event, this, 'Jalak Bali: Simbol Keanggunan Yang Terancam Punah', 'Satua Bali')" 
                                    data-saved="{{ $isSaved3 ? 'true' : 'false' }}"
                                    title="{{ $isSaved3 ? 'Batal Simpan' : 'Simpan ke Arsip' }}" 
                                    class="relative z-30 w-10 h-10 flex items-center justify-center border border-[#D6C5AE] rounded-lg text-[#8C6A3B] hover:bg-[#F5F0E8] hover:border-[#D9B35D] transition duration-300">
                                    <i data-feather="bookmark" class="w-5 h-5 {{ $isSaved3 ? 'text-[#B8863B]' : '' }}" style="{{ $isSaved3 ? 'fill:#B8863B; color:#B8863B;' : '' }}"></i>
                                </button>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            <!-- CARD 4: ISTILAH BALI -->
            <div onclick="openDetailArtikel(4)" class="card-artikel istilah bg-white rounded-xl overflow-hidden shadow duration-300 cursor-pointer group relative">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('images/sor singgih.jpeg') }}" class="w-full h-60 object-cover group-hover:scale-105 transition duration-500" alt="Sor Singgih">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 transform group-hover:scale-100 scale-95 z-10">
                        <span class="bg-[#FAF5ED] text-[#2B1A12] border border-[#D6C5AE] text-[11px] font-bold tracking-[2px] uppercase px-5 py-2.5 rounded-lg shadow-lg flex items-center gap-2 hover:bg-white transition">
                            <i data-feather="external-link" class="w-4 h-4 text-[#B8863B]"></i> BACA ARTIKEL
                        </span>
                    </div>
                    <span class="absolute top-4 left-4 bg-[#305F9E] text-white text-[11px] tracking-[2px] uppercase font-semibold px-4 py-2 rounded-full z-10">ISTILAH BALI</span>
                    <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2 z-10">
                        <i data-feather="check-circle" class="w-4 h-4"></i> Terverifikasi
                    </span>
                </div>
                <div class="p-6">
                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[34px] leading-tight font-bold text-[#2B1A12] group-hover:text-[#B8863B] transition">
                        Sor Singgih: Hierarki Bahasa sebagai Cermin Tatanan Sosial
                    </h3>
                    <p class="mt-4 text-[#675A4D] leading-8 line-clamp-2">Bahasa Bali mengenal tingkatan tutur—Alus, Madya, Kasar—yang mencerminkan relasi sosial dan etika.</p>
                    <div class="mt-8 flex items-center justify-between">
                        <div class="text-[13px] text-[#8C7A65]"><span>7 Juni 2025</span><span class="mx-2">•</span><span>7 Menit</span></div>
                        @auth
                            @if(auth()->user()->role === 'pengguna')
                                @php
                                    $isSaved4 = \App\Models\Bookmark::where('user_id', auth()->id())->where('item_title', 'Sor Singgih: Hierarki Bahasa sebagai Cermin Tatanan Sosial')->exists();
                                @endphp
                                <button type="button" 
                                    onclick="toggleBookmark(event, this, 'Sor Singgih: Hierarki Bahasa sebagai Cermin Tatanan Sosial', 'Istilah Bali')" 
                                    data-saved="{{ $isSaved4 ? 'true' : 'false' }}"
                                    title="{{ $isSaved4 ? 'Batal Simpan' : 'Simpan ke Arsip' }}" 
                                    class="relative z-30 w-10 h-10 flex items-center justify-center border border-[#D6C5AE] rounded-lg text-[#8C6A3B] hover:bg-[#F5F0E8] hover:border-[#D9B35D] transition duration-300">
                                    <i data-feather="bookmark" class="w-5 h-5 {{ $isSaved4 ? 'text-[#B8863B]' : '' }}" style="{{ $isSaved4 ? 'fill:#B8863B; color:#B8863B;' : '' }}"></i>
                                </button>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            <!-- CARD 5: AJARAN TETUA -->
            <div onclick="openDetailArtikel(5)" class="card-artikel ajaran bg-white rounded-xl overflow-hidden shadow duration-300 cursor-pointer group relative">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('images/rwa_bhineda.jpg') }}" class="w-full h-60 object-cover group-hover:scale-105 transition duration-500" alt="Rwa Bhineda">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 transform group-hover:scale-100 scale-95 z-10">
                        <span class="bg-[#FAF5ED] text-[#2B1A12] border border-[#D6C5AE] text-[11px] font-bold tracking-[2px] uppercase px-5 py-2.5 rounded-lg shadow-lg flex items-center gap-2 hover:bg-white transition">
                            <i data-feather="external-link" class="w-4 h-4 text-[#B8863B]"></i> BACA ARTIKEL
                        </span>
                    </div>
                    <span class="absolute top-4 left-4 bg-[#992B20] text-white text-[11px] tracking-[2px] uppercase font-semibold px-4 py-2 rounded-full z-10">AJARAN TETUA</span>
                    <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2 z-10">
                        <i data-feather="check-circle" class="w-4 h-4"></i> Terverifikasi
                    </span>
                </div>
                <div class="p-6">
                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[34px] leading-tight font-bold text-[#2B1A12] group-hover:text-[#B8863B] transition">
                        Rwa Bhineda, Keseimbangan Kehidupan
                    </h3>
                    <p class="mt-4 text-[#675A4D] leading-8 line-clamp-2">Filosofi yang mengajarkan bahwa segala sesuatu memiliki pasangan yang saling melengkapi dalam harmoni alam.</p>
                    <div class="mt-8 flex items-center justify-between">
                        <div class="text-[13px] text-[#8C7A65]"><span>5 Juni 2025</span><span class="mx-2">•</span><span>8 Menit</span></div>
                        @auth
                            @if(auth()->user()->role === 'pengguna')
                                @php
                                    $isSaved5 = \App\Models\Bookmark::where('user_id', auth()->id())->where('item_title', 'Rwa Bhineda, Keseimbangan Kehidupan')->exists();
                                @endphp
                                <button type="button" 
                                    onclick="toggleBookmark(event, this, 'Rwa Bhineda, Keseimbangan Kehidupan', 'Ajaran Tetua')" 
                                    data-saved="{{ $isSaved5 ? 'true' : 'false' }}"
                                    title="{{ $isSaved5 ? 'Batal Simpan' : 'Simpan ke Arsip' }}" 
                                    class="relative z-30 w-10 h-10 flex items-center justify-center border border-[#D6C5AE] rounded-lg text-[#8C6A3B] hover:bg-[#F5F0E8] hover:border-[#D9B35D] transition duration-300">
                                    <i data-feather="bookmark" class="w-5 h-5 {{ $isSaved5 ? 'text-[#B8863B]' : '' }}" style="{{ $isSaved5 ? 'fill:#B8863B; color:#B8863B;' : '' }}"></i>
                                </button>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            <!-- CARD 6: CECIMPEDAN -->
            <div onclick="openDetailArtikel(6)" class="card-artikel cecimpedan bg-white rounded-xl overflow-hidden shadow duration-300 cursor-pointer group relative">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('images/cecimpedan.jpeg') }}" class="w-full h-60 object-cover group-hover:scale-105 transition duration-500" alt="Cecimpedan Alam">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 transform group-hover:scale-100 scale-95 z-10">
                        <span class="bg-[#FAF5ED] text-[#2B1A12] border border-[#D6C5AE] text-[11px] font-bold tracking-[2px] uppercase px-5 py-2.5 rounded-lg shadow-lg flex items-center gap-2 hover:bg-white transition">
                            <i data-feather="external-link" class="w-4 h-4 text-[#B8863B]"></i> BACA ARTIKEL
                        </span>
                    </div>
                    <span class="absolute top-4 left-4 bg-[#D9A441] text-white text-[11px] tracking-[2px] uppercase font-semibold px-4 py-2 rounded-full z-10">CECIMPEDAN</span>
                    <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#D9B35D] text-[11px] font-semibold px-4 py-2 rounded-full shadow flex items-center gap-2 z-10">
                        <i data-feather="check-circle" class="w-4 h-4"></i> Terverifikasi
                    </span>
                </div>
                <div class="p-6">
                    <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[34px] leading-tight font-bold text-[#2B1A12] group-hover:text-[#B8863B] transition">
                        Makna Tersembunyi di Balik Cecimpedan tentang Alam
                    </h3>
                    <p class="mt-4 text-[#675A4D] leading-8 line-clamp-2">Teka-teki Bali tentang benda alam mengandung makna filosofi mendalam dalam menjaga ekosistem.</p>
                    <div class="mt-8 flex items-center justify-between">
                        <div class="text-[13px] text-[#8C7A65]"><span>2 Juni 2025</span><span class="mx-2">•</span><span>9 Menit</span></div>
                        @auth
                            @if(auth()->user()->role === 'pengguna')
                                @php
                                    $isSaved6 = \App\Models\Bookmark::where('user_id', auth()->id())->where('item_title', 'Makna Tersembunyi di Balik Cecimpedan tentang Alam')->exists();
                                @endphp
                                <button type="button" 
                                    onclick="toggleBookmark(event, this, 'Makna Tersembunyi di Balik Cecimpedan tentang Alam', 'Cecimpedan')" 
                                    data-saved="{{ $isSaved6 ? 'true' : 'false' }}"
                                    title="{{ $isSaved6 ? 'Batal Simpan' : 'Simpan ke Arsip' }}" 
                                    class="relative z-30 w-10 h-10 flex items-center justify-center border border-[#D6C5AE] rounded-lg text-[#8C6A3B] hover:bg-[#F5F0E8] hover:border-[#D9B35D] transition duration-300">
                                    <i data-feather="bookmark" class="w-5 h-5 {{ $isSaved6 ? 'text-[#B8863B]' : '' }}" style="{{ $isSaved6 ? 'fill:#B8863B; color:#B8863B;' : '' }}"></i>
                                </button>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- MODAL OVERLAY DETAIL BACA ARTIKEL          -->
<!-- ========================================== -->
<div id="overlayArtikel" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden opacity-0 transition-opacity duration-300">
    <div id="panelArtikel" class="fixed inset-y-0 right-0 w-full max-w-2xl bg-[#FAF6F0] shadow-2xl p-8 overflow-y-auto transform translate-x-full transition-transform duration-300 ease-in-out border-l border-[#D6C5AE]">
        <button onclick="closeDetailArtikel()" class="absolute top-6 right-6 w-10 h-10 rounded-full bg-[#EFE6D8] text-[#2B1A12] flex items-center justify-center hover:bg-[#992B20] hover:text-white transition duration-300">✕</button>
        <div class="mb-4">
            <span id="artKategoriBadge" class="text-white text-[10px] tracking-[2px] uppercase font-semibold px-3 py-1.5 rounded-full">KATEGORI</span>
        </div>
        <h2 id="artTitle" style="font-family:'Cormorant Garamond',serif;" class="text-3xl md:text-4xl font-bold text-[#2B1A12] leading-tight mb-4">Judul Artikel</h2>
        <div class="flex items-center gap-3 pb-6 mb-6 border-b border-[#E5D8C5]">
            <div id="artAvatar" class="w-10 h-10 rounded-full bg-[#992B20] text-white font-bold flex items-center justify-center text-sm">A</div>
            <div>
                <h4 id="artPenulis" class="text-sm font-bold text-[#2B1A12]">Nama Penulis</h4>
                <p id="artMeta" class="text-xs text-[#8C7A65]">12 JUNI 2025 • 8 MENIT</p>
            </div>
        </div>
        <div class="rounded-xl overflow-hidden mb-6 shadow-md">
            <img id="artImage" src="" class="w-full h-64 object-cover" alt="Gambar Artikel">
        </div>
        <div id="artIsi" class="text-[#4A3E35] leading-relaxed space-y-4 text-base"></div>
        <div class="mt-8 p-5 bg-[#EFE4D3] border-l-4 border-[#992B20] rounded-r-lg">
            <h4 class="font-bold text-[#2B1A12] text-sm uppercase tracking-wider mb-1">Kesimpulan</h4>
            <p id="artKesimpulan" class="text-sm text-[#675A4D] italic"></p>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- JAVASCRIPT: TOGGLE BOOKMARK & FILTER       -->
<!-- ========================================== -->
<script>
    // FUNGSI UTAMA BOOKMARK (MENCEGAH MODAL TERBUKA & MENGATASI FEATHER ICON)
    function toggleBookmark(event, btn, title, type) {
        // 1. Mencegah klik menembus ke kartu utama (sehingga modal tidak terbuka)
        event.stopPropagation();
        event.preventDefault();

        // 2. Cek status saat ini
        const isSaved = btn.getAttribute('data-saved') === 'true';
        
        // 3. Menangani perubahan Feather Icon (karena <i> diubah jadi <svg> otomatis)
        const icon = btn.querySelector('svg') || btn.querySelector('i');

        // ==== OPTIMISTIC UI UPDATE (Ubah warna secara instan) ====
        if (isSaved) {
            // BATAL SIMPAN: Hapus warna emas
            btn.setAttribute('data-saved', 'false');
            btn.setAttribute('title', 'Simpan ke Arsip');
            if (icon) {
                icon.style.fill = 'none';
                icon.style.color = '#8C6A3B';
                icon.classList.remove('text-[#B8863B]');
            }
        } else {
            // SIMPAN: Berikan warna emas
            btn.setAttribute('data-saved', 'true');
            btn.setAttribute('title', 'Batal Simpan');
            if (icon) {
                icon.style.fill = '#B8863B';
                icon.style.color = '#B8863B';
                icon.classList.add('text-[#B8863B]');
            }
        }

        // 4. Kirim Request ke Server di Background
        const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : '';

        fetch("{{ route('pengguna.arsip.store') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                item_title: title,
                item_type: type,
                item_url: window.location.href.split('#')[0] + '#artikel'
            })
        })
        .then(response => {
            if (!response.ok) {
                console.warn('Gagal menghubungi server.');
            }
        })
        .catch(err => console.error('Error AJAX:', err));
    }

    // FUNGSI FILTER TAB (TIDAK ADA PERUBAHAN)
    function filterArtikel(kategori) {
        document.querySelectorAll('.filter-tab-btn').forEach(function(btn) {
            btn.classList.remove('tab-active');
        });

        const activeBtn = document.getElementById('btn-' + kategori);
        if (activeBtn) {
            activeBtn.classList.add('tab-active');
        }

        const cards = document.querySelectorAll('.card-artikel');
        cards.forEach(function(card) {
            card.classList.remove('card-reveal-anim');
            if (kategori === 'semua' || card.classList.contains(kategori)) {
                card.style.display = 'block';
                void card.offsetWidth;
                card.classList.add('card-reveal-anim');
                setTimeout(() => { card.classList.remove('card-reveal-anim'); }, 500);
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>