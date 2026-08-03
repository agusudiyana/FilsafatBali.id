<!-- SECTION CECIMPEDAN BALI -->
<section id="cecimpedan"
    class="relative py-24 overflow-hidden bg-gradient-to-b from-[#EFE3CC] via-[#E8D8B8] to-[#E2CEAA]">

    <div class="absolute top-0 left-0 w-full h-[1px] bg-[#E7D8B8]"></div>

    <div class="relative max-w-7xl mx-auto px-8">

        <!-- Header Section -->
        <p class="uppercase tracking-[6px] text-[#C58A3C] text-xs mb-4 font-semibold">
            — TEKA-TEKI TRADISIONAL
        </p>

        <h2 style="font-family:'Cormorant Garamond',serif;" class="text-5xl font-bold text-[#23160E]">
            Cecimpedan Bali
        </h2>

        <p class="mt-5 text-[#675A4D] text-lg max-w-2xl">
            Klik kartu untuk menjawab teka-teki, atau buka detail lengkap beserta filosofi maknanya.
        </p>

        <!-- Slider Card Cecimpedan -->
        <div id="sliderWrapper" class="mt-14 overflow-x-auto scrollbar-hide scroll-smooth">
            <div id="cecimpedanSlider" class="flex gap-8 w-max pb-6">

                @forelse($cecimpedans as $index => $item)
                    @php
                        $nomor = str_pad($index + 1, 3, '0', STR_PAD_LEFT);
                        $tingkat = $item->tingkat ?? ($item->tingkat_kesulitan ?? 'Sedang');
                        $pertanyaan = $item->pertanyaan ?? ($item->teks ?? ($item->judul ?? '-'));
                        $arti = $item->arti ?? ($item->terjemahan ?? '-');
                        $jawaban = $item->jawaban ?? ($item->kunci_jawaban ?? '-');
                        $makna = $item->makna ?? ($item->penjelasan ?? '-');
                        $filosofi = $item->filosofi ?? ($item->nilai_filosofis ?? '-');
                        $variasi = $item->variasi ?? ($item->variasi_daerah ?? '-');
                        $asal = $item->asal ?? ($item->asal_daerah ?? 'Gianyar, Bali');
                        $rekaman = $item->rekaman ?? ($item->sumber_rekaman ?? '-');

                        $badgeBg = 'bg-[#C7962B]';
                        if (strtolower($tingkat) === 'mudah') {
                            $badgeBg = 'bg-[#2D6C3F]';
                        } elseif (strtolower($tingkat) === 'sulit') {
                            $badgeBg = 'bg-[#8F2318]';
                        }
                    @endphp

                    <div class="cardCecimpedan bg-white border border-[#E4D4BF] rounded-xl p-7 hover:shadow-xl transition-all duration-500 w-[380px] flex-shrink-0 flex flex-col justify-between">

                        <div>
                            <!-- Header Card -->
                            <div class="flex justify-between items-center">
                                <span class="{{ $badgeBg }} text-white text-[10px] tracking-[2px] uppercase px-3 py-1 rounded font-semibold shadow-sm">
                                    {{ $tingkat }}
                                </span>
                                <span class="text-[#7C6346] text-xs font-semibold">
                                    #{{ $nomor }}
                                </span>
                            </div>

                            <!-- Teks Teka-Teki -->
                            <h3 style="font-family:'Cormorant Garamond',serif;" class="italic text-[30px] leading-[42px] mt-6 text-[#23160E] font-bold">
                                "{{ $pertanyaan }}"
                            </h3>

                            <!-- Arti Bahasa Indonesia -->
                            <p class="mt-4 text-[#675A4D] leading-7 text-sm">
                                {{ $arti }}
                            </p>
                        </div>

                        <!-- Bagian Bawah Card -->
                        <div class="mt-6 pt-4 border-t border-[#E4D4BF] flex flex-col gap-2">

                            <!-- 1. JAWAB TEKA TEKI KARTU -->
                            <button type="button" onclick="toggleCardAnswer(this)"
                                class="btnToggleCard flex items-center gap-1.5 uppercase tracking-[1px] text-[11px] text-[#8B6D48] hover:text-[#C58A3C] font-semibold transition-all duration-300 w-fit cursor-pointer">
                                <i data-feather="key" class="w-3.5 h-3.5 text-[#C58A3C] pointer-events-none"></i>
                                <span class="lblToggle pointer-events-none">Jawab Teka-Teki</span>
                            </button>

                            <!-- 2. DETAIL JAWABAN KARTU -->
                            <div class="cardAnswerContent max-h-0 opacity-0 overflow-hidden transition-all duration-500 ease-in-out">
                                <div class="pt-2 space-y-3 my-1">
                                    <div class="border border-[#D7B88A] bg-gradient-to-r from-[#F8F0E5] to-[#FFF9F2] rounded-lg p-3.5 shadow-inner">
                                        <p class="text-[10px] uppercase tracking-wider text-[#8B6D48] font-bold">Kunci Jawaban</p>
                                        <h3 style="font-family:'Cormorant Garamond',serif;" class="text-[26px] leading-tight text-[#A53D24] font-bold mt-0.5">
                                            {{ $jawaban }}
                                        </h3>
                                    </div>

                                    <div class="flex">
                                        <div class="w-[2px] bg-[#D5A246] mr-2.5 shrink-0 rounded-full"></div>
                                        <div>
                                            <p class="uppercase tracking-[2px] text-[10px] text-[#C7962B] font-bold">Makna</p>
                                            <p class="mt-0.5 text-[#6B5A45] text-xs leading-relaxed">
                                                {{ $makna }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 3. FILOSOFI LENGKAP -->
                            <button type="button" onclick="openFilosofiDrawer(this)"
                                data-tingkat="TINGKAT: {{ strtoupper($tingkat) }}"
                                data-nomor="CECIMPEDAN #{{ $nomor }}"
                                data-teks="{{ $pertanyaan }}"
                                data-arti="{{ $arti }}" 
                                data-jawaban="{{ $jawaban }}"
                                data-filosofi="{{ $filosofi }}" 
                                data-variasi="{{ $variasi }}"
                                data-asal="{{ $asal }}" 
                                data-rekaman="{{ $rekaman }}"
                                class="flex items-center gap-1.5 text-[11px] uppercase tracking-[1px] text-[#6B5A45] hover:text-[#C58A3C] transition font-semibold w-fit mt-1 cursor-pointer">
                                <i data-feather="info" class="w-3.5 h-3.5 text-[#C58A3C] pointer-events-none"></i>
                                <span class="pointer-events-none">Filosofi Lengkap</span>
                            </button>

                        </div>

                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-[#8B6D48]">
                        Belum ada data Cecimpedan Bali.
                    </div>
                @endforelse

            </div>
        </div>

    </div>
</section>


<!-- OVERLAY & PANEL DRAWER CECIMPEDAN -->
<div id="cecimpedanOverlayFilosofi" onclick="closeCecimpedanDrawer()" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[99999] hidden opacity-0 transition-opacity duration-300">

    <div id="cecimpedanPanelFilosofi" onclick="event.stopPropagation()" class="fixed top-0 right-0 h-full w-full sm:w-[500px] md:w-[45%] bg-[#FAF5ED] shadow-2xl overflow-y-auto transform translate-x-full transition-transform duration-500 ease-in-out p-8 md:p-10">

        <!-- Tombol Close -->
        <button type="button" onclick="closeCecimpedanDrawer()" class="absolute top-6 right-6 w-10 h-10 rounded-full bg-[#EFE3CC] hover:bg-[#E2D2B3] flex items-center justify-center text-[#23160E] font-bold transition cursor-pointer z-50">
            ✕
        </button>

        <div class="mt-4 text-center">
            <span id="cecimpedanFilosofiTingkat" class="inline-block bg-[#C7962B] text-white text-[10px] tracking-[2px] uppercase px-4 py-1.5 rounded font-semibold">
                TINGKAT: SEDANG
            </span>

            <p id="cecimpedanFilosofiNomor" class="mt-4 uppercase tracking-[4px] text-[11px] text-[#8B6D48] font-medium">
                CECIMPEDAN #001
            </p>

            <h2 id="cecimpedanFilosofiTeks" style="font-family:'Cormorant Garamond',serif;" class="italic text-2xl md:text-3xl text-[#23160E] font-bold mt-4 leading-relaxed">
                ""
            </h2>

            <p id="cecimpedanFilosofiArti" class="mt-3 text-[#675A4D] italic text-sm">
                -
            </p>

            <!-- TOMBOL TAMPILKAN JAWABAN (FEATHER ICON DENGAN POINTER-EVENTS-NONE) -->
            <button type="button" onclick="window.toggleCecimpedanPanelJawaban(this)" class="mt-6 w-full border-2 border-[#D7B88A] rounded-lg p-4 bg-[#F8F0E5] hover:bg-[#F3E6D3] active:bg-[#EBD8C1] flex justify-between items-center cursor-pointer transition relative z-50 select-none shadow-sm">
                <span class="text-xs uppercase tracking-[2px] text-[#8B6D48] font-bold flex items-center gap-2 pointer-events-none">
                    <i data-feather="key" class="w-3.5 h-3.5 text-[#C7962B] pointer-events-none"></i>
                    <span class="lbl-panel-jawaban pointer-events-none">TAMPILKAN JAWABAN</span>
                </span>
                <span class="icon-panel-jawaban text-[#8B6D48] text-xs font-bold pointer-events-none">▼</span>
            </button>

            <!-- Box Jawaban Tersembunyi -->
            <div class="box-panel-jawaban-target hidden mt-3 p-4 bg-[#E8D8B8] rounded-lg text-left transition-all duration-300 border border-[#D5A246]">
                <p class="text-xs text-[#8B6D48] uppercase tracking-wider font-semibold">Jawaban:</p>
                <p id="cecimpedanJawabanPanelText" class="text-2xl font-bold text-[#A53D24] mt-1" style="font-family:'Cormorant Garamond',serif;">-</p>
            </div>
        </div>

        <hr class="border-[#E4D4BF] my-8">

        <div>
            <p class="uppercase tracking-[3px] text-xs text-[#C7962B] font-bold mb-4">
                NILAI FILOSOFIS
            </p>
            <div id="cecimpedanFilosofiList" class="text-[#675A4D] text-sm md:text-base leading-relaxed whitespace-pre-line">
                -
            </div>
        </div>

        <div class="mt-8 p-5 rounded-lg border border-[#DDBF88] bg-[#F5EACF]">
            <p class="uppercase tracking-[2px] text-[11px] text-[#8B6D48] font-bold">
                VARIASI DAERAH
            </p>
            <p id="cecimpedanFilosofiVariasi" class="mt-2 text-[#675A4D] text-sm leading-relaxed whitespace-pre-line">
                -
            </p>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-6">
            <div class="bg-[#F5EACF] rounded-lg p-4">
                <p class="uppercase text-[10px] tracking-[2px] text-[#8B6D48] font-bold">ASAL DAERAH</p>
                <p id="cecimpedanFilosofiAsal" class="mt-1 text-xs md:text-sm text-[#23160E] font-medium">-</p>
            </div>

            <div class="bg-[#F5EACF] rounded-lg p-4">
                <p class="uppercase text-[10px] tracking-[2px] text-[#8B6D48] font-bold">REKAMAN</p>
                <p id="cecimpedanFilosofiRekaman" class="mt-1 text-xs md:text-sm text-[#23160E] font-medium">-</p>
            </div>
        </div>

    </div>
</div>

<!-- SCRIPT GLOBAL MURNI -->
<script>
    function toggleCardAnswer(btn) {
        const card = btn.closest('.cardCecimpedan');
        const answerBox = card.querySelector('.cardAnswerContent');
        const label = btn.querySelector('.lblToggle');

        const isHidden = answerBox.style.maxHeight === '' || answerBox.style.maxHeight === '0px';

        if (isHidden) {
            answerBox.style.maxHeight = answerBox.scrollHeight + "px";
            answerBox.style.opacity = "1";
            if (label) label.innerText = 'Sembunyikan Jawaban';
            card.classList.remove('border-[#E4D4BF]');
            card.classList.add('border-[#C58A3C]', 'shadow-2xl');
        } else {
            answerBox.style.maxHeight = "0px";
            answerBox.style.opacity = "0";
            if (label) label.innerText = 'Jawab Teka-Teki';
            card.classList.remove('border-[#C58A3C]', 'shadow-2xl');
            card.classList.add('border-[#E4D4BF]');
        }
    }

    function openFilosofiDrawer(btn) {
        const dataset = btn.dataset;

        document.getElementById('cecimpedanFilosofiTingkat').innerText = dataset.tingkat || 'TINGKAT: SEDANG';
        document.getElementById('cecimpedanFilosofiNomor').innerText = dataset.nomor || '';
        document.getElementById('cecimpedanFilosofiTeks').innerText = '"' + (dataset.teks || '') + '"';
        document.getElementById('cecimpedanFilosofiArti').innerText = dataset.arti || '-';
        document.getElementById('cecimpedanJawabanPanelText').innerText = dataset.jawaban || '-';
        document.getElementById('cecimpedanFilosofiList').innerText = dataset.filosofi || '-';
        document.getElementById('cecimpedanFilosofiVariasi').innerText = dataset.variasi || '-';
        document.getElementById('cecimpedanFilosofiAsal').innerText = dataset.asal || '-';
        document.getElementById('cecimpedanFilosofiRekaman').innerText = dataset.rekaman || '-';

        const panelBtn = document.querySelector('#cecimpedanPanelFilosofi button[onclick*="toggleCecimpedanPanelJawaban"]');
        if (panelBtn) {
            const box = panelBtn.nextElementSibling;
            const lbl = panelBtn.querySelector('.lbl-panel-jawaban');
            const icon = panelBtn.querySelector('.icon-panel-jawaban');
            
            if (box) box.classList.add('hidden');
            if (lbl) lbl.innerText = 'TAMPILKAN JAWABAN';
            if (icon) icon.innerText = '▼';
        }

        const overlay = document.getElementById('cecimpedanOverlayFilosofi');
        const panel = document.getElementById('cecimpedanPanelFilosofi');

        overlay.classList.remove('hidden');
        setTimeout(() => {
            overlay.classList.remove('opacity-0');
            panel.classList.remove('translate-x-full');
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        }, 10);
    }

    function closeCecimpedanDrawer() {
        const overlay = document.getElementById('cecimpedanOverlayFilosofi');
        const panel = document.getElementById('cecimpedanPanelFilosofi');

        if (panel && overlay) {
            panel.classList.add('translate-x-full');
            overlay.classList.add('opacity-0');
            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 300);
        }
    }

    window.toggleCecimpedanPanelJawaban = function (btn) {
        const box = btn.nextElementSibling;
        const lbl = btn.querySelector('.lbl-panel-jawaban');
        const icon = btn.querySelector('.icon-panel-jawaban');

        if (!box) return;

        if (box.classList.contains('hidden')) {
            box.classList.remove('hidden');
            if (lbl) lbl.innerText = 'SEMBUNYIKAN JAWABAN';
            if (icon) icon.innerText = '▲';
        } else {
            box.classList.add('hidden');
            if (lbl) lbl.innerText = 'TAMPILKAN JAWABAN';
            if (icon) icon.innerText = '▼';
        }
    };

    document.addEventListener('DOMContentLoaded', function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>