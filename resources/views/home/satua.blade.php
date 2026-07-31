<!-- CSRF TOKEN FOR AJAX -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Style Khusus: Hanya Isolasi Klik Icon Tanpa Merusak Lapis Layer (z-index) -->
<style>
    .btn-bookmark-custom {
        cursor: pointer !important;
    }

    .btn-bookmark-custom * {
        pointer-events: none !important;
    }
</style>

<section id="sectionSatua" class="bg-[#1A110A] py-24">
    <div class="max-w-7xl mx-auto px-8">

        <!-- Judul Header -->
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

            <!-- Tab Satua & Istilah -->
            <div class="flex border border-[#6E4E1E] rounded-lg overflow-hidden shrink-0 mt-2">
                <button id="btnSatua" onclick="showSatua()"
                    class="w-36 md:w-40 py-3 bg-[#C58A3C] text-white uppercase tracking-[2px] text-xs font-semibold text-center shrink-0 transition-all">
                    SATUA BALI
                </button>
                <button id="btnIstilah" onclick="showIstilah()"
                    class="w-36 md:w-40 py-3 bg-transparent text-[#C58A3C] uppercase tracking-[2px] text-xs font-semibold text-center shrink-0 transition-all">
                    ISTILAH BALI
                </button>
            </div>
        </div>

        <!-- GRID CARDS SATUA BALI -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- CARD 1: NI KETIMUN MAS -->
            <div
                class="group bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E] transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:border-[#C58A3C] flex flex-col justify-between relative">

                <!-- AREA KLIK DETAIL (GAMBAR & TEKS) -->
                <div onclick="openSatua('Ni Ketimun Mas', 'Golden Cucumber Girl', '', '{{ asset('images/timunmas.jpg') }}', 'Hutan musim gugur dan sabana di bagian barat Bali terutama kawasan Taman Nasional Bali Barat.', 'Dalam kepercayaan Bali Jalak Bali dianggap simbol kesucian dan keindahan.', 'Perburuan liar dan hilangnya habitat akibat alih fungsi lahan.', 'Program penangkaran dan pelepasliaran rutin.', 'Pesan filosofi mengenai ketabahan.')"
                    class="cursor-pointer flex-grow flex flex-col justify-between">
                    <div>
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('images/timunmas.jpg') }}"
                                class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110"
                                alt="Ni Ketimun Mas">
                            <div
                                class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45">
                            </div>

                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 z-10">
                                <span
                                    class="bg-[#F7F0E7] text-[#6F4B2A] px-4 py-2 rounded-full text-xs font-semibold flex items-center gap-2 shadow-lg">
                                    <i data-feather="info" class="w-3 h-3"></i> DETAIL
                                </span>
                            </div>
                        </div>

                        <div class="p-6 pb-0">
                            <h3 style="font-family:'Cormorant Garamond',serif;"
                                class="text-4xl text-white font-bold mb-1">
                                Ni Ketimun Mas
                            </h3>
                            <p class="text-[#8F7A61] italic text-sm">
                                Golden Cucumber Girl
                            </p>
                            <p class="text-[#C7B39A] mt-4 leading-7">
                                Cerita rakyat tentang seorang anak perempuan dari timun yang lari dari raksasa dengan
                                bantuan benda sakti.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- AREA FOOTER & TOMBOL SIMPAN -->
                <div class="p-6 pt-0 mt-6">
                    <div class="pt-4 border-t border-[#3E2D1E] flex items-center justify-between min-h-[40px]">
                        <div onclick="openSatua('Ni Ketimun Mas', 'Golden Cucumber Girl', '', '{{ asset('images/timunmas.jpg') }}', 'Hutan musim gugur dan sabana di bagian barat Bali terutama kawasan Taman Nasional Bali Barat.', 'Dalam kepercayaan Bali Jalak Bali dianggap simbol kesucian dan keindahan.', 'Perburuan liar dan hilangnya habitat akibat alih fungsi lahan.', 'Program penangkaran dan pelepasliaran rutin.', 'Pesan filosofi mengenai ketabahan.')"
                            class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 cursor-pointer">
                            <span class="text-xs tracking-[2px] uppercase text-[#C58A3C] font-semibold">
                                Baca Selengkapnya
                            </span>
                            <i data-feather="arrow-right" class="w-4 h-4 text-[#C58A3C]"></i>
                        </div>

                        @php
                            $isSaved1 =
                                auth()->check() &&
                                \App\Models\Bookmark::where('user_id', auth()->id())
                                    ->where('item_title', 'Ni Ketimun Mas')
                                    ->exists();
                        @endphp
                        <button type="button"
                            onclick="handleBookmarkAction(event, this, 'Ni Ketimun Mas', 'Satua Bali')"
                            data-saved="{{ $isSaved1 ? 'true' : 'false' }}"
                            title="{{ $isSaved1 ? 'Batal Simpan' : 'Simpan ke Arsip' }}"
                            class="btn-bookmark-custom relative z-10 p-2 rounded-lg border border-[#6E4E1E] bg-transparent hover:bg-[#3E2D1E] transition shrink-0 flex items-center justify-center">
                            <i data-feather="bookmark"
                                class="w-4 h-4 {{ $isSaved1 ? 'text-[#C58A3C]' : 'text-[#8F7A61]' }}"
                                style="{{ $isSaved1 ? 'fill:#C58A3C; color:#C58A3C;' : '' }}"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- CARD 2: I SIAP SELEM -->
            <div
                class="group bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E] transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:border-[#C58A3C] flex flex-col justify-between relative">

                <!-- AREA KLIK DETAIL -->
                <div onclick="openSatua('I Siap Selem', 'The Black Chicken', '', '{{ asset('images/siapselem.jpg') }}', 'I Siap Selem adalah satua Bali yang menceritakan seekor induk ayam hitam beserta tujuh anaknya.', 'I Siap Selem<br>I Doglagan<br>Enam anak ayam lainnya', '1. Hidup bersama.<br>2. Anak-anak bermain.<br>3. I Doglagan tersesat.<br>4. Sang induk mencari.<br>5. Keluarga berkumpul kembali.', 'Kasih sayang ibu, kepedulian, dan kebersamaan keluarga.', 'Cinta seorang ibu tidak mengenal batas dan keluarga harus saling menjaga.')"
                    class="cursor-pointer flex-grow flex flex-col justify-between">
                    <div>
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('images/siapselem.jpg') }}"
                                class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110"
                                alt="I Siap Selem">
                            <div
                                class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45">
                            </div>

                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 z-10">
                                <span
                                    class="bg-[#F7F0E7] text-[#6F4B2A] px-4 py-2 rounded-full text-xs font-semibold flex items-center gap-2 shadow-lg">
                                    <i data-feather="info" class="w-3 h-3"></i> DETAIL
                                </span>
                            </div>
                        </div>

                        <div class="p-6 pb-0">
                            <h3 style="font-family:'Cormorant Garamond',serif;"
                                class="text-4xl text-white font-bold mb-1">
                                I Siap Selem
                            </h3>
                            <p class="text-[#8F7A61] italic text-sm">
                                The Black Chicken
                            </p>
                            <p class="text-[#C7B39A] mt-4 leading-7">
                                Cerita rakyat tradisional Bali yang mengisahkan tentang seekor induk ayam hitam bernama
                                I Siap Selem dan ketujuh anaknya.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- AREA FOOTER & TOMBOL SIMPAN -->
                <div class="p-6 pt-0 mt-6">
                    <div class="pt-4 border-t border-[#3E2D1E] flex items-center justify-between min-h-[40px]">
                        <div onclick="openSatua('I Siap Selem', 'The Black Chicken', '', '{{ asset('images/siapselem.jpg') }}', 'I Siap Selem adalah satua Bali yang menceritakan seekor induk ayam hitam beserta tujuh anaknya.', 'I Siap Selem<br>I Doglagan<br>Enam anak ayam lainnya', '1. Hidup bersama.<br>2. Anak-anak bermain.<br>3. I Doglagan tersesat.<br>4. Sang induk mencari.<br>5. Keluarga berkumpul kembali.', 'Kasih sayang ibu, kepedulian, dan kebersamaan keluarga.', 'Cinta seorang ibu tidak mengenal batas dan keluarga harus saling menjaga.')"
                            class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 cursor-pointer">
                            <span class="text-xs tracking-[2px] uppercase text-[#C58A3C] font-semibold">
                                Baca Selengkapnya
                            </span>
                            <i data-feather="arrow-right" class="w-4 h-4 text-[#C58A3C]"></i>
                        </div>

                        @php
                            $isSaved2 =
                                auth()->check() &&
                                \App\Models\Bookmark::where('user_id', auth()->id())
                                    ->where('item_title', 'I Siap Selem')
                                    ->exists();
                        @endphp
                        <button type="button" onclick="handleBookmarkAction(event, this, 'I Siap Selem', 'Satua Bali')"
                            data-saved="{{ $isSaved2 ? 'true' : 'false' }}"
                            title="{{ $isSaved2 ? 'Batal Simpan' : 'Simpan ke Arsip' }}"
                            class="btn-bookmark-custom relative z-10 p-2 rounded-lg border border-[#6E4E1E] bg-transparent hover:bg-[#3E2D1E] transition shrink-0 flex items-center justify-center">
                            <i data-feather="bookmark"
                                class="w-4 h-4 {{ $isSaved2 ? 'text-[#C58A3C]' : 'text-[#8F7A61]' }}"
                                style="{{ $isSaved2 ? 'fill:#C58A3C; color:#C58A3C;' : '' }}"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- CARD 3: I LUTUNG TEKEN I KEKUA -->
            <div
                class="group bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E] transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:border-[#C58A3C] flex flex-col justify-between relative">

                <!-- AREA KLIK DETAIL -->
                <div onclick="openSatua('I Lutung teken I Kekua', 'The Lutung and the Monkey', '', '{{ asset('images/ilutung.jpg') }}', 'Persahabatan lutung dan monyet yang diuji oleh sifat serakah.', 'I Lutung<br>I Kekua', '1. Bersahabat.<br>2. Mencari makanan.<br>3. Serakah.<br>4. Bertengkar.<br>5. Menyesal.', 'Jangan serakah dan jangan mengkhianati teman.', 'Persahabatan lebih berharga daripada keuntungan sesaat.')"
                    class="cursor-pointer flex-grow flex flex-col justify-between">
                    <div>
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('images/ilutung.jpg') }}"
                                class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110"
                                alt="I Lutung teken I Kekua">
                            <div
                                class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45">
                            </div>

                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 z-10">
                                <span
                                    class="bg-[#F7F0E7] text-[#6F4B2A] px-4 py-2 rounded-full text-xs font-semibold flex items-center gap-2 shadow-lg">
                                    <i data-feather="info" class="w-3 h-3"></i> DETAIL
                                </span>
                            </div>
                        </div>

                        <div class="p-6 pb-0">
                            <h3 style="font-family:'Cormorant Garamond',serif;"
                                class="text-4xl text-white font-bold mb-1">
                                I Lutung teken I Kekua
                            </h3>
                            <p class="text-[#8F7A61] italic text-sm">
                                The Lutung and the Monkey
                            </p>
                            <p class="text-[#C7B39A] mt-4 leading-7">
                                I Lutung tekén I Kekua adalah cerita rakyat Bali tentang persahabatan monyet dan
                                kura-kura yang berisi sifat licik dan akibat buruk.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- AREA FOOTER & TOMBOL SIMPAN -->
                <div class="p-6 pt-0 mt-6">
                    <div class="pt-4 border-t border-[#3E2D1E] flex items-center justify-between min-h-[40px]">
                        <div onclick="openSatua('I Lutung teken I Kekua', 'The Lutung and the Monkey', '', '{{ asset('images/ilutung.jpg') }}', 'Persahabatan lutung dan monyet yang diuji oleh sifat serakah.', 'I Lutung<br>I Kekua', '1. Bersahabat.<br>2. Mencari makanan.<br>3. Serakah.<br>4. Bertengkar.<br>5. Menyesal.', 'Jangan serakah dan jangan mengkhianati teman.', 'Persahabatan lebih berharga daripada keuntungan sesaat.')"
                            class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 cursor-pointer">
                            <span class="text-xs tracking-[2px] uppercase text-[#C58A3C] font-semibold">
                                Baca Selengkapnya
                            </span>
                            <i data-feather="arrow-right" class="w-4 h-4 text-[#C58A3C]"></i>
                        </div>

                        @php
                            $isSaved3 =
                                auth()->check() &&
                                \App\Models\Bookmark::where('user_id', auth()->id())
                                    ->where('item_title', 'I Lutung teken I Kekua')
                                    ->exists();
                        @endphp
                        <button type="button"
                            onclick="handleBookmarkAction(event, this, 'I Lutung teken I Kekua', 'Satua Bali')"
                            data-saved="{{ $isSaved3 ? 'true' : 'false' }}"
                            title="{{ $isSaved3 ? 'Batal Simpan' : 'Simpan ke Arsip' }}"
                            class="btn-bookmark-custom relative z-10 p-2 rounded-lg border border-[#6E4E1E] bg-transparent hover:bg-[#3E2D1E] transition shrink-0 flex items-center justify-center">
                            <i data-feather="bookmark"
                                class="w-4 h-4 {{ $isSaved3 ? 'text-[#C58A3C]' : 'text-[#8F7A61]' }}"
                                style="{{ $isSaved3 ? 'fill:#C58A3C; color:#C58A3C;' : '' }}"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- CARD 4: NI BAWANG TEKEN NI KESUNA -->
            <div
                class="group bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E] transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:border-[#C58A3C] flex flex-col justify-between relative">

                <!-- AREA KLIK DETAIL -->
                <div onclick="openSatua('Ni Bawang teken Ni Kesuna', 'The Tale of Ni Bawang and Ni Kesuna', '', '{{ asset('images/ibawang.jpeg') }}', 'Ni Bawang teken Ni Kesuna merupakan satua Bali yang mengisahkan dua saudara dengan sifat yang sangat berbeda.', 'Ni Bawang<br>Ni Kesuna<br>Ibu', '1. Ni Bawang hidup sederhana.<br>2. Ni Kesuna iri.<br>3. Ni Bawang mendapat balasan.<br>4. Ni Kesuna meniru.<br>5. Akibat keserakahan.', 'Rajin bekerja, bersikap jujur, rendah hati.', 'Setiap perbuatan memiliki konsekuensi.')"
                    class="cursor-pointer flex-grow flex flex-col justify-between">
                    <div>
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('images/ibawang.jpeg') }}"
                                class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110"
                                alt="Ni Bawang teken Ni Kesuna">
                            <div
                                class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45">
                            </div>

                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 z-10">
                                <span
                                    class="bg-[#F7F0E7] text-[#6F4B2A] px-4 py-2 rounded-full text-xs font-semibold flex items-center gap-2 shadow-lg">
                                    <i data-feather="info" class="w-3 h-3"></i> DETAIL
                                </span>
                            </div>
                        </div>

                        <div class="p-6 pb-0">
                            <h3 style="font-family:'Cormorant Garamond',serif;"
                                class="text-4xl text-white font-bold mb-1">
                                Ni Bawang teken Ni Kesuna
                            </h3>
                            <p class="text-[#8F7A61] italic text-sm">
                                The Tale of Ni Bawang and Ni Kesuna
                            </p>
                            <p class="text-[#C7B39A] mt-4 leading-7">
                                Ni Bawang teken Ni Kesuna inggih punika silih tunggil satua Bali sané nyritayang indik
                                kalih nyame malianan parilaku.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- AREA FOOTER & TOMBOL SIMPAN -->
                <div class="p-6 pt-0 mt-6">
                    <div class="pt-4 border-t border-[#3E2D1E] flex items-center justify-between min-h-[40px]">
                        <div onclick="openSatua('Ni Bawang teken Ni Kesuna', 'The Tale of Ni Bawang and Ni Kesuna', '', '{{ asset('images/ibawang.jpeg') }}', 'Ni Bawang teken Ni Kesuna merupakan satua Bali yang mengisahkan dua saudara dengan sifat yang sangat berbeda.', 'Ni Bawang<br>Ni Kesuna<br>Ibu', '1. Ni Bawang hidup sederhana.<br>2. Ni Kesuna iri.<br>3. Ni Bawang mendapat balasan.<br>4. Ni Kesuna meniru.<br>5. Akibat keserakahan.', 'Rajin bekerja, bersikap jujur, rendah hati.', 'Setiap perbuatan memiliki konsekuensi.')"
                            class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 cursor-pointer">
                            <span class="text-xs tracking-[2px] uppercase text-[#C58A3C] font-semibold">
                                Baca Selengkapnya
                            </span>
                            <i data-feather="arrow-right" class="w-4 h-4 text-[#C58A3C]"></i>
                        </div>

                        @php
                            $isSaved4 =
                                auth()->check() &&
                                \App\Models\Bookmark::where('user_id', auth()->id())
                                    ->where('item_title', 'Ni Bawang teken Ni Kesuna')
                                    ->exists();
                        @endphp
                        <button type="button"
                            onclick="handleBookmarkAction(event, this, 'Ni Bawang teken Ni Kesuna', 'Satua Bali')"
                            data-saved="{{ $isSaved4 ? 'true' : 'false' }}"
                            title="{{ $isSaved4 ? 'Batal Simpan' : 'Simpan ke Arsip' }}"
                            class="btn-bookmark-custom relative z-10 p-2 rounded-lg border border-[#6E4E1E] bg-transparent hover:bg-[#3E2D1E] transition shrink-0 flex items-center justify-center">
                            <i data-feather="bookmark"
                                class="w-4 h-4 {{ $isSaved4 ? 'text-[#C58A3C]' : 'text-[#8F7A61]' }}"
                                style="{{ $isSaved4 ? 'fill:#C58A3C; color:#C58A3C;' : '' }}"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- CARD 5: I TUWUNG KUNING -->
            <div
                class="group bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E] transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:border-[#C58A3C] flex flex-col justify-between relative">

                <!-- AREA KLIK DETAIL -->
                <div onclick="openSatua('I Tuwung Kuning', 'Yellow Eggplant', '', '{{ asset('images/tuwung.jpg') }}', 'I Tuwung Kuning adalah satua Bali yang menceritakan penyesalan orang tua.', 'I Tuwung Kuning<br>Ayah<br>Ibu', '1. Kesalahpahaman.<br>2. Meninggalkan rumah.<br>3. Perjuangan.<br>4. Penyesalan.<br>5. Pertemuan.', 'Kasih sayang keluarga, kesabaran, kerja keras.', 'Hubungan keluarga merupakan ikatan yang sangat berharga.')"
                    class="cursor-pointer flex-grow flex flex-col justify-between">
                    <div>
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('images/tuwung.jpg') }}"
                                class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110"
                                alt="I Tuwung Kuning">
                            <div
                                class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45">
                            </div>

                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 z-10">
                                <span
                                    class="bg-[#F7F0E7] text-[#6F4B2A] px-4 py-2 rounded-full text-xs font-semibold flex items-center gap-2 shadow-lg">
                                    <i data-feather="info" class="w-3 h-3"></i> DETAIL
                                </span>
                            </div>
                        </div>

                        <div class="p-6 pb-0">
                            <h3 style="font-family:'Cormorant Garamond',serif;"
                                class="text-4xl text-white font-bold mb-1">
                                I Tuwung Kuning
                            </h3>
                            <p class="text-[#8F7A61] italic text-sm">
                                Yellow Eggplant
                            </p>
                            <p class="text-[#C7B39A] mt-4 leading-7">
                                I Tuung Kuning adalah cerita rakyat Bali yang mengisahkan tentang penyesalan orang tua
                                dan perjuangan hidup.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- AREA FOOTER & TOMBOL SIMPAN -->
                <div class="p-6 pt-0 mt-6">
                    <div class="pt-4 border-t border-[#3E2D1E] flex items-center justify-between min-h-[40px]">
                        <div onclick="openSatua('I Tuwung Kuning', 'Yellow Eggplant', '', '{{ asset('images/tuwung.jpg') }}', 'I Tuwung Kuning adalah satua Bali yang menceritakan penyesalan orang tua.', 'I Tuwung Kuning<br>Ayah<br>Ibu', '1. Kesalahpahaman.<br>2. Meninggalkan rumah.<br>3. Perjuangan.<br>4. Penyesalan.<br>5. Pertemuan.', 'Kasih sayang keluarga, kesabaran, kerja keras.', 'Hubungan keluarga merupakan ikatan yang sangat berharga.')"
                            class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 cursor-pointer">
                            <span class="text-xs tracking-[2px] uppercase text-[#C58A3C] font-semibold">
                                Baca Selengkapnya
                            </span>
                            <i data-feather="arrow-right" class="w-4 h-4 text-[#C58A3C]"></i>
                        </div>

                        @php
                            $isSaved5 =
                                auth()->check() &&
                                \App\Models\Bookmark::where('user_id', auth()->id())
                                    ->where('item_title', 'I Tuwung Kuning')
                                    ->exists();
                        @endphp
                        <button type="button"
                            onclick="handleBookmarkAction(event, this, 'I Tuwung Kuning', 'Satua Bali')"
                            data-saved="{{ $isSaved5 ? 'true' : 'false' }}"
                            title="{{ $isSaved5 ? 'Batal Simpan' : 'Simpan ke Arsip' }}"
                            class="btn-bookmark-custom relative z-10 p-2 rounded-lg border border-[#6E4E1E] bg-transparent hover:bg-[#3E2D1E] transition shrink-0 flex items-center justify-center">
                            <i data-feather="bookmark"
                                class="w-4 h-4 {{ $isSaved5 ? 'text-[#C58A3C]' : 'text-[#8F7A61]' }}"
                                style="{{ $isSaved5 ? 'fill:#C58A3C; color:#C58A3C;' : '' }}"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- CARD 6: I BELOG -->
            <div
                class="group bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E] transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:border-[#C58A3C] flex flex-col justify-between relative">

                <!-- AREA KLIK DETAIL -->
                <div onclick="openSatua('I Belog', 'The Fool', '', '{{ asset('images/ibelog.jpg') }}', 'I Belog adalah satua Bali yang menceritakan seorang pemuda yang sangat polos.', 'I Belog<br>Ibu', '1. Nasihat ibu.<br>2. Salah paham.<br>3. Kejadian lucu.<br>4. Belajar.<br>5. Bijaksana.', 'Pentingnya mendengarkan dengan baik.', 'Kebodohan bukanlah sebuah kesalahan apabila seseorang mau belajar.')"
                    class="cursor-pointer flex-grow flex flex-col justify-between">
                    <div>
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('images/ibelog.jpg') }}"
                                class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110"
                                alt="I Belog">
                            <div
                                class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45">
                            </div>

                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 z-10">
                                <span
                                    class="bg-[#F7F0E7] text-[#6F4B2A] px-4 py-2 rounded-full text-xs font-semibold flex items-center gap-2 shadow-lg">
                                    <i data-feather="info" class="w-3 h-3"></i> DETAIL
                                </span>
                            </div>
                        </div>

                        <div class="p-6 pb-0">
                            <h3 style="font-family:'Cormorant Garamond',serif;"
                                class="text-4xl text-white font-bold mb-1">
                                I Belog
                            </h3>
                            <p class="text-[#8F7A61] italic text-sm">
                                The Fool
                            </p>
                            <p class="text-[#C7B39A] mt-4 leading-7">
                                I Belog adalah cerita rakyat Bali tentang seorang pemuda yang sangat polos dan selalu
                                salah paham mengartikan nasihat.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- AREA FOOTER & TOMBOL SIMPAN -->
                <div class="p-6 pt-0 mt-6">
                    <div class="pt-4 border-t border-[#3E2D1E] flex items-center justify-between min-h-[40px]">
                        <div onclick="openSatua('I Belog', 'The Fool', '', '{{ asset('images/ibelog.jpg') }}', 'I Belog adalah satua Bali yang menceritakan seorang pemuda yang sangat polos.', 'I Belog<br>Ibu', '1. Nasihat ibu.<br>2. Salah paham.<br>3. Kejadian lucu.<br>4. Belajar.<br>5. Bijaksana.', 'Pentingnya mendengarkan dengan baik.', 'Kebodohan bukanlah sebuah kesalahan apabila seseorang mau belajar.')"
                            class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 cursor-pointer">
                            <span class="text-xs tracking-[2px] uppercase text-[#C58A3C] font-semibold">
                                Baca Selengkapnya
                            </span>
                            <i data-feather="arrow-right" class="w-4 h-4 text-[#C58A3C]"></i>
                        </div>

                        @php
                            $isSaved6 =
                                auth()->check() &&
                                \App\Models\Bookmark::where('user_id', auth()->id())
                                    ->where('item_title', 'I Belog')
                                    ->exists();
                        @endphp
                        <button type="button" onclick="handleBookmarkAction(event, this, 'I Belog', 'Satua Bali')"
                            data-saved="{{ $isSaved6 ? 'true' : 'false' }}"
                            title="{{ $isSaved6 ? 'Batal Simpan' : 'Simpan ke Arsip' }}"
                            class="btn-bookmark-custom relative z-10 p-2 rounded-lg border border-[#6E4E1E] bg-transparent hover:bg-[#3E2D1E] transition shrink-0 flex items-center justify-center">
                            <i data-feather="bookmark"
                                class="w-4 h-4 {{ $isSaved6 ? 'text-[#C58A3C]' : 'text-[#8F7A61]' }}"
                                style="{{ $isSaved6 ? 'fill:#C58A3C; color:#C58A3C;' : '' }}"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- OVERLAY & PANEL DRAWER (DETAIL SATUA) -->
<div id="overlaySatua" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden z-[100]">
    <div id="panelSatua"
        class="absolute right-0 top-0 w-[42%] h-full bg-[#F8F0E5] overflow-y-auto translate-x-full transition-all duration-500 shadow-2xl">
        <button onclick="closeSatua()"
            class="absolute top-5 right-5 w-12 h-12 rounded-full bg-[#EBD9BF] hover:bg-[#D4A64A] transition font-bold text-lg z-20">
            ✕
        </button>

        <div class="relative">
            <img id="satuaImage" class="w-full h-64 object-cover">
            <div class="absolute inset-0 bg-black/35"></div>
            <div class="absolute bottom-8 left-8 right-8">
                <h2 id="satuaNama" class="text-white text-5xl font-bold mt-4"
                    style="font-family:'Cormorant Garamond',serif;"></h2>
                <p id="satuaLatin" class="text-gray-300 italic"></p>
            </div>
        </div>

        <div class="p-8 space-y-8">
            <div class="border-l-2 border-[#C58A3C] pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-[#C58A3C] font-bold">Ringkasan Cerita</h5>
                <p id="satuaRingkasan" class="mt-2 text-[#5F4B3A] leading-8"></p>
            </div>

            <div class="border-l-2 border-[#8B5E3C] pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-[#8B5E3C] font-bold">Tokoh Utama</h5>
                <p id="satuaTokoh" class="mt-2 text-[#5F4B3A] leading-8"></p>
            </div>

            <div class="border-l-2 border-[#D4A64A] pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-[#D4A64A] font-bold">Alur Cerita</h5>
                <p id="satuaAlur" class="mt-2 text-[#5F4B3A] leading-8"></p>
            </div>

            <div class="border-l-2 border-[#2E8B57] pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-[#2E8B57] font-bold">Nilai Moral</h5>
                <p id="satuaMoral" class="mt-2 text-[#5F4B3A] leading-8"></p>
            </div>

            <div class="border-l-2 border-[#A63C2F] pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-[#A63C2F] font-bold">Pesan Filosofi</h5>
                <p id="satuaFilosofi" class="mt-2 text-[#5F4B3A] leading-8"></p>
            </div>
        </div>
    </div>
</div>
