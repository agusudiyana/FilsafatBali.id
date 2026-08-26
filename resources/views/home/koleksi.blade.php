<section id="koleksi" class="bg-[#F7F0E7] pt-14 sm:pt-28 pb-12 sm:pb-24 border-t border-[#DCCCB4]">

    <div class="max-w-7xl mx-auto px-4 sm:px-8">

        <p class="uppercase tracking-[4px] sm:tracking-[6px] text-[#C58A3C] text-[10px] sm:text-xs mb-2 sm:mb-4">
            — KOLEKSI UTAMA
        </p>

        <h2 style="font-family:'Cormorant Garamond',serif;" class="text-3xl sm:text-5xl font-bold text-[#23160E] mb-6 sm:mb-12 leading-tight">
            Empat Pilar Arsip
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">

            <!-- 1. AJARAN TETUA -->
            <a href="#ajaran" class="relative h-[380px] sm:h-[470px] rounded-lg overflow-hidden group block">

                <img src="{{ asset('images/ajaran.jpeg') }}"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 duration-500"
                    alt="Ajaran Tetua">

                <div class="absolute inset-0 bg-gradient-to-t from-[#8B231B]/90 via-[#8B231B]/35 to-transparent">
                </div>

                <div class="absolute inset-0 p-5 sm:p-6 text-white flex flex-col justify-end">

                    <p class="text-[9px] sm:text-[11px] tracking-[3px] sm:tracking-[4px] uppercase mb-1.5 sm:mb-2 font-medium">
                        KEARIFAN LELUHUR BALI
                    </p>

                    <h3 style="font-family:'Cormorant Garamond',serif;"
                        class="text-2xl sm:text-4xl font-bold mb-2 sm:mb-3 h-8 sm:h-10 flex items-center">
                        Ajaran Tetua
                    </h3>

                    <div class="min-h-[60px] sm:min-h-[84px] flex items-start">
                        <p class="text-xs sm:text-sm leading-relaxed sm:leading-7 text-white/90 line-clamp-3">
                            Petuah dan filosofi yang diwariskan para tetua Bali dari generasi ke generasi.
                        </p>
                    </div>

                    <div class="flex justify-between items-center mt-4 sm:mt-6 pt-2">
                        <span class="text-xs sm:text-sm font-semibold">
                            {{ number_format($totalAjaran ?? 0, 0, ',', '.') }} koleksi
                        </span>
                        <span class="text-xl sm:text-2xl transition-transform duration-300 group-hover:translate-x-2">→</span>
                    </div>

                </div>

            </a>

            <!-- 2. CECIMPEDAN -->
            <a href="#cecimpedan" class="relative h-[380px] sm:h-[470px] rounded-lg overflow-hidden group block">

                <img src="{{ asset('images/cecimpedan.jpeg') }}"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 duration-500"
                    alt="Cecimpedan">

                <div class="absolute inset-0 bg-gradient-to-t from-[#B88324]/90 via-[#B88324]/30 to-transparent">
                </div>

                <div class="absolute inset-0 p-5 sm:p-6 text-white flex flex-col justify-end">

                    <p class="text-[9px] sm:text-[11px] tracking-[3px] sm:tracking-[4px] uppercase mb-1.5 sm:mb-2 font-medium">
                        TEKA-TEKI TRADISIONAL
                    </p>

                    <h3 style="font-family:'Cormorant Garamond',serif;"
                        class="text-2xl sm:text-4xl font-bold mb-2 sm:mb-3 h-8 sm:h-10 flex items-center">
                        Cecimpedan
                    </h3>

                    <div class="min-h-[60px] sm:min-h-[84px] flex items-start">
                        <p class="text-xs sm:text-sm leading-relaxed sm:leading-7 text-white/90 line-clamp-3">
                            Teka-teki khas Bali yang mengandung makna dan nilai kehidupan.
                        </p>
                    </div>

                    <div class="flex justify-between items-center mt-4 sm:mt-6 pt-2">
                        <span class="text-xs sm:text-sm font-semibold">
                            {{ number_format($totalCecimpedan ?? 0, 0, ',', '.') }} koleksi
                        </span>
                        <span class="text-xl sm:text-2xl transition-transform duration-300 group-hover:translate-x-2">→</span>
                    </div>

                </div>

            </a>

            <!-- 3. SATUA BALI (DIPERBAIKI DENGAN ONCLICK) -->
            <a href="#sectionSatua" onclick="pilihPilarSatua(event)" class="relative h-[380px] sm:h-[470px] rounded-lg overflow-hidden group block cursor-pointer">

                <img src="{{ asset('images/satua.jpg') }}"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 duration-500"
                    alt="Satua Bali">

                <div class="absolute inset-0 bg-gradient-to-t from-[#2D6C3F]/90 via-[#2D6C3F]/30 to-transparent">
                </div>

                <div class="absolute inset-0 p-5 sm:p-6 text-white flex flex-col justify-end">

                    <p class="text-[9px] sm:text-[11px] tracking-[3px] sm:tracking-[4px] uppercase mb-1.5 sm:mb-2 font-medium">
                        KISAH TRADISIONAL PULAU DEWATA
                    </p>

                    <h3 style="font-family:'Cormorant Garamond',serif;"
                        class="text-2xl sm:text-4xl font-bold mb-2 sm:mb-3 h-8 sm:h-10 flex items-center">
                        Satua Bali
                    </h3>

                    <div class="min-h-[60px] sm:min-h-[84px] flex items-start">
                        <p class="text-xs sm:text-sm leading-relaxed sm:leading-7 text-white/90 line-clamp-3">
                            Ensiklopedia Satua Bali beserta pesan moral, nilai budaya, dan filosofi yang diwariskan
                            secara turun-temurun.
                        </p>
                    </div>

                    <div class="flex justify-between items-center mt-4 sm:mt-6 pt-2">
                        <span class="text-xs sm:text-sm font-semibold">
                            {{ number_format($totalSatua ?? 0, 0, ',', '.') }} koleksi
                        </span>
                        <span class="text-xl sm:text-2xl transition-transform duration-300 group-hover:translate-x-2">→</span>
                    </div>

                </div>

            </a>

            <!-- 4. ISTILAH BALI (DIPERBAIKI DENGAN ONCLICK) -->
            <a href="#sectionIstilah" onclick="pilihPilarIstilah(event)" class="relative h-[380px] sm:h-[470px] rounded-lg overflow-hidden group block cursor-pointer">

                <img src="{{ asset('images/istilah.jpeg') }}"
                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 duration-500"
                    alt="Istilah Bali">

                <div class="absolute inset-0 bg-gradient-to-t from-[#304C73]/90 via-[#304C73]/30 to-transparent">
                </div>

                <div class="absolute inset-0 p-5 sm:p-6 text-white flex flex-col justify-end">

                    <p class="text-[9px] sm:text-[11px] tracking-[3px] sm:tracking-[4px] uppercase mb-1.5 sm:mb-2 font-medium">
                        KOSAKATA DAN TERMINOLOGI
                    </p>

                    <h3 style="font-family:'Cormorant Garamond',serif;"
                        class="text-2xl sm:text-4xl font-bold mb-2 sm:mb-3 h-8 sm:h-10 flex items-center">
                        Istilah Bali
                    </h3>

                    <div class="min-h-[60px] sm:min-h-[84px] flex items-start">
                        <p class="text-xs sm:text-sm leading-relaxed sm:leading-7 text-white/90 line-clamp-3">
                            Kumpulan istilah bahasa Bali dalam adat, agama, dan kehidupan sehari-hari.
                        </p>
                    </div>

                    <div class="flex justify-between items-center mt-4 sm:mt-6 pt-2">
                        <span class="text-xs sm:text-sm font-semibold">
                            {{ number_format($totalIstilah ?? 0, 0, ',', '.') }} koleksi
                        </span>
                        <span class="text-xl sm:text-2xl transition-transform duration-300 group-hover:translate-x-2">→</span>
                    </div>

                </div>

            </a>

        </div>

    </div>

</section>

<!-- ========================================== -->
<!-- SCRIPT JS HANDLER KLIK KARTU PILAR ARSIP   -->
<!-- ========================================== -->
<script>
    function pilihPilarSatua(event) {
        if (event) event.preventDefault();

        // 1. Tampilkan section Satua Bali
        if (typeof showSatua === 'function') {
            showSatua();
        } else {
            const secSatua = document.getElementById("sectionSatua");
            const secIstilah = document.getElementById("sectionIstilah");
            if (secSatua) secSatua.classList.remove("hidden");
            if (secIstilah) secIstilah.classList.add("hidden");
        }

        // 2. Smooth scroll ke lokasi section Satua
        const el = document.getElementById("sectionSatua");
        if (el) {
            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    function pilihPilarIstilah(event) {
        if (event) event.preventDefault();

        // 1. Tampilkan section Istilah Bali
        if (typeof showIstilah === 'function') {
            showIstilah();
        } else {
            const secSatua = document.getElementById("sectionSatua");
            const secIstilah = document.getElementById("sectionIstilah");
            if (secSatua) secSatua.classList.add("hidden");
            if (secIstilah) secIstilah.classList.remove("hidden");
        }

        // 2. Smooth scroll ke lokasi section Istilah
        const el = document.getElementById("sectionIstilah") || document.getElementById("sectionSatua");
        if (el) {
            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
</script>