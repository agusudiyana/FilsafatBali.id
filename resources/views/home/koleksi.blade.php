<section id="koleksi" class="bg-[#F7F0E7] pt-28 pb-24 border-t border-[#DCCCB4]">

    <div class="max-w-7xl mx-auto px-8">

        <p class="uppercase tracking-[6px] text-[#C58A3C] text-xs mb-4">
            — KOLEKSI UTAMA
        </p>

        <h2 style="font-family:'Cormorant Garamond',serif;" class="text-5xl font-bold text-[#23160E] mb-12">
            Empat Pilar Arsip
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

            <!-- 1. AJARAN TETUA -->
            <a href="#ajaran" class="relative h-[470px] rounded-lg overflow-hidden group block">

                <img src="{{ asset('images/ajaran.jpeg') }}"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 duration-500"
                    alt="Ajaran Tetua">

                <div class="absolute inset-0 bg-gradient-to-t from-[#8B231B]/90 via-[#8B231B]/35 to-transparent">
                </div>

                <!-- Kontainer Flex Height untuk Menjaga Kesejajaran Teks -->
                <div class="absolute inset-0 p-6 text-white flex flex-col justify-end">

                    <p class="text-[11px] tracking-[4px] uppercase mb-2 font-medium">
                        KEARIFAN LELUHUR BALI
                    </p>

                    <h3 style="font-family:'Cormorant Garamond',serif;"
                        class="text-4xl font-bold mb-3 h-10 flex items-center">
                        Ajaran Tetua
                    </h3>

                    <!-- Tinggi Deskripsi Konsisten (min-h-[84px]) -->
                    <div class="min-h-[84px] flex items-start">
                        <p class="text-sm leading-7 text-white/90 line-clamp-3">
                            Petuah dan filosofi yang diwariskan para tetua Bali dari generasi ke generasi.
                        </p>
                    </div>

                    <!-- Counter Dinamis Database -->
                    <div class="flex justify-between items-center mt-6 pt-2">
                        <span class="text-sm font-semibold">
                            {{ number_format($totalAjaran ?? 0, 0, ',', '.') }} koleksi
                        </span>
                        <span class="text-2xl transition-transform duration-300 group-hover:translate-x-2">→</span>
                    </div>

                </div>

            </a>

            <!-- 2. CECIMPEDAN -->
            <a href="#cecimpedan" class="relative h-[470px] rounded-lg overflow-hidden group block">

                <img src="{{ asset('images/cecimpedan.jpeg') }}"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 duration-500"
                    alt="Cecimpedan">

                <div class="absolute inset-0 bg-gradient-to-t from-[#B88324]/90 via-[#B88324]/30 to-transparent">
                </div>

                <div class="absolute inset-0 p-6 text-white flex flex-col justify-end">

                    <p class="text-[11px] tracking-[4px] uppercase mb-2 font-medium">
                        TEKA-TEKI TRADISIONAL
                    </p>

                    <h3 style="font-family:'Cormorant Garamond',serif;"
                        class="text-4xl font-bold mb-3 h-10 flex items-center">
                        Cecimpedan
                    </h3>

                    <!-- Tinggi Deskripsi Konsisten (min-h-[84px]) -->
                    <div class="min-h-[84px] flex items-start">
                        <p class="text-sm leading-7 text-white/90 line-clamp-3">
                            Teka-teki khas Bali yang mengandung makna dan nilai kehidupan.
                        </p>
                    </div>

                    <!-- Counter Dinamis Database -->
                    <div class="flex justify-between items-center mt-6 pt-2">
                        <span class="text-sm font-semibold">
                            {{ number_format($totalCecimpedan ?? 0, 0, ',', '.') }} koleksi
                        </span>
                        <span class="text-2xl transition-transform duration-300 group-hover:translate-x-2">→</span>
                    </div>

                </div>

            </a>

            <!-- 3. SATUA BALI -->
            <a href="#sectionSatua" class="relative h-[470px] rounded-lg overflow-hidden group block">

                <img src="{{ asset('images/satua.jpg') }}"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 duration-500"
                    alt="Satua Bali">

                <div class="absolute inset-0 bg-gradient-to-t from-[#2D6C3F]/90 via-[#2D6C3F]/30 to-transparent">
                </div>

                <div class="absolute inset-0 p-6 text-white flex flex-col justify-end">

                    <p class="text-[11px] tracking-[4px] uppercase mb-2 font-medium">
                        KISAH TRADISIONAL PULAU DEWATA
                    </p>

                    <h3 style="font-family:'Cormorant Garamond',serif;"
                        class="text-4xl font-bold mb-3 h-10 flex items-center">
                        Satua Bali
                    </h3>

                    <!-- Tinggi Deskripsi Konsisten (min-h-[84px]) -->
                    <div class="min-h-[84px] flex items-start">
                        <p class="text-sm leading-7 text-white/90 line-clamp-3">
                            Ensiklopedia Satua Bali beserta pesan moral, nilai budaya, dan filosofi yang diwariskan
                            secara turun-temurun.
                        </p>
                    </div>

                    <!-- Counter Dinamis Database -->
                    <div class="flex justify-between items-center mt-6 pt-2">
                        <span class="text-sm font-semibold">
                            {{ number_format($totalSatua ?? 0, 0, ',', '.') }} koleksi
                        </span>
                        <span class="text-2xl transition-transform duration-300 group-hover:translate-x-2">→</span>
                    </div>

                </div>

            </a>

            <!-- 4. ISTILAH BALI -->
            <a href="#sectionIstilah" class="relative h-[470px] rounded-lg overflow-hidden group block">

                <img src="{{ asset('images/istilah.jpeg') }}"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 duration-500"
                    alt="Istilah Bali">

                <div class="absolute inset-0 bg-gradient-to-t from-[#304C73]/90 via-[#304C73]/30 to-transparent">
                </div>

                <div class="absolute inset-0 p-6 text-white flex flex-col justify-end">

                    <p class="text-[11px] tracking-[4px] uppercase mb-2 font-medium">
                        KOSAKATA DAN TERMINOLOGI
                    </p>

                    <h3 style="font-family:'Cormorant Garamond',serif;"
                        class="text-4xl font-bold mb-3 h-10 flex items-center">
                        Istilah Bali
                    </h3>

                    <!-- Tinggi Deskripsi Konsisten (min-h-[84px]) -->
                    <div class="min-h-[84px] flex items-start">
                        <p class="text-sm leading-7 text-white/90 line-clamp-3">
                            Kumpulan istilah bahasa Bali dalam adat, agama, dan kehidupan sehari-hari.
                        </p>
                    </div>

                    <!-- Counter Dinamis Database -->
                    <div class="flex justify-between items-center mt-6 pt-2">
                        <span class="text-sm font-semibold">
                            {{ number_format($totalIstilah ?? 0, 0, ',', '.') }} koleksi
                        </span>
                        <span class="text-2xl transition-transform duration-300 group-hover:translate-x-2">→</span>
                    </div>

                </div>

            </a>

        </div>

    </div>

</section>
