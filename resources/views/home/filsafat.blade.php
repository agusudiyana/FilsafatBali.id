<section id="jenis-filsafat" class="bg-[#F7F0E7] py-12 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">

        <!-- Judul Section -->
        <div class="text-center mb-10 sm:mb-16">
            <p class="uppercase tracking-[4px] sm:tracking-[6px] text-[#C58A3C] text-[10px] sm:text-xs mb-2 sm:mb-4">
                — WAWASAN FILSAFAT
            </p>
            <h2 style="font-family:'Cormorant Garamond',serif;" class="text-3xl sm:text-[60px] font-bold text-[#23160E] leading-tight">
                Jenis-Jenis Filsafat di Dunia
            </h2>
            <p class="mt-4 sm:mt-6 max-w-3xl mx-auto text-[#675A4D] leading-relaxed sm:leading-8 text-sm sm:text-lg px-2">
                Filsafat berkembang di berbagai belahan dunia dengan beragam
                sudut pandang dalam memahami manusia, kehidupan,
                pengetahuan, moral, dan hubungan dengan Tuhan.
            </p>
        </div>

        @php
            $listFilsafat = isset($filsafats) 
                ? $filsafats->where('status', 'disetujui') 
                : collect([]);

            if($listFilsafat->isEmpty() && isset($filsafats)) {
                $listFilsafat = $filsafats;
            }
        @endphp

        <!-- GRID CARDS (DINAMIS DARI DATABASE) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @forelse($listFilsafat as $item)
                @php
                    $idKey = $item->id;
                    $bgIkon = $item->warna_bg ?? 'bg-[#992B20]';
                    $colorText = $item->warna_teks ?? 'text-[#B27A27]';
                    $deskripsiTampil = $item->deskripsi ?? 'Mengkaji nilai-nilai kehidupan dan pandangan hidup secara mendalam.';
                    
                    // LOGIKA EKSTRAKSI SEMUA NAMA TOKOH UNTUK BADGE KARTU DEPAN
                    $tokohStr = $item->tokoh_terkenal ?? '';
                    $tokohList = [];

                    if (!empty($tokohStr)) {
                        $rawItems = preg_split('/[\.;]/', $tokohStr);
                        foreach ($rawItems as $raw) {
                            $raw = trim($raw);
                            if (!empty($raw)) {
                                $parts = explode(':', $raw);
                                $namaOnly = trim($parts[0]);
                                if (!empty($namaOnly) && !in_array($namaOnly, $tokohList)) {
                                    $tokohList[] = $namaOnly;
                                }
                            }
                        }
                    }
                @endphp

                <div onclick="openFilsafat('{{ $idKey }}')"
                    class="group bg-white rounded-xl border border-[#E5D6BF]
                    p-6 sm:p-8 hover:-translate-y-2 hover:shadow-xl
                    duration-300 cursor-pointer flex flex-col justify-between h-full">

                    <!-- Content Top Wrapper -->
                    <div class="flex flex-col flex-1">
                        <!-- Icon -->
                        <div
                            class="w-12 h-12 sm:w-14 sm:h-14 rounded-full {{ $bgIkon }} flex items-center justify-center text-white text-xl sm:text-2xl mb-4 sm:mb-6 shrink-0">
                            {{ $item->ikon ?? '🏛' }}
                        </div>

                        <!-- Judul -->
                        <h3 style="font-family:'Cormorant Garamond',serif;"
                            class="text-2xl sm:text-[38px] font-bold text-[#23160E] leading-tight">
                            {{ $item->judul }}
                        </h3>

                        <!-- Deskripsi -->
                        <p class="mt-3 sm:mt-4 text-[#675A4D] leading-relaxed sm:leading-7 text-sm sm:text-base flex-1">
                            {{ Str::limit($deskripsiTampil, 120) }}
                        </p>

                        <!-- Tokoh Pill Badges (MENAMPILKAN SEMUA TOKOH) -->
                        <div class="mt-5 sm:mt-6 flex flex-wrap gap-1.5 sm:gap-2 pt-2">
                            @if (!empty($tokohList))
                                @foreach ($tokohList as $namaTokoh)
                                    <span class="px-2.5 sm:px-3 py-0.5 sm:py-1 rounded-full bg-[#F8F1E6] {{ $colorText }} text-[11px] sm:text-xs font-medium">
                                        {{ $namaTokoh }}
                                    </span>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Footer Bottom Wrapper -->
                    <div class="mt-6 sm:mt-8 pt-4 sm:pt-6 border-t border-[#E5D6BF] flex items-center justify-between shrink-0">
                        <span class="uppercase tracking-[1.5px] sm:tracking-[2px] text-[10px] sm:text-[11px] font-bold {{ $colorText }}">
                            Lihat Informasi
                        </span>
                        <i data-feather="arrow-right"
                            class="w-4 h-4 sm:w-5 sm:h-5 {{ $colorText }} group-hover:translate-x-1 duration-300"></i>
                    </div>

                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12 text-[#675A4D] text-sm sm:text-base">
                    Belum ada data filsafat yang disetujui di database.
                </div>
            @endforelse
        </div>

    </div>
</section>

<!-- OVERLAY DRAWER SIDE-PANEL -->
<div id="overlayBarat" onclick="handleOverlayClick(event)" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-50 transition-opacity duration-300">
    <div id="panelBarat" onclick="event.stopPropagation()"
        class="absolute right-0 top-0 w-full max-w-full sm:max-w-[500px] h-full bg-[#FAF5ED] overflow-y-auto translate-x-full shadow-2xl transition-transform duration-500 ease-in-out">

        <!-- Close Button -->
        <button type="button" onclick="closeBarat()"
            class="absolute top-4 right-4 sm:top-6 sm:right-6 w-9 h-9 sm:w-11 sm:h-11 rounded-full bg-[#EFE3CC] hover:bg-[#E5D4B7] flex items-center justify-center font-bold text-[#23160E] transition cursor-pointer z-10 text-sm sm:text-base">
            ✕
        </button>

        <div class="p-5 sm:p-10 pt-16 sm:pt-10">
            <p class="uppercase tracking-[3px] sm:tracking-[4px] text-[#C58A3C] text-[10px] sm:text-xs font-semibold">
                WAWASAN FILSAFAT
            </p>

            <h2 id="judulFilsafat" style="font-family:'Cormorant Garamond',serif;"
                class="text-3xl sm:text-5xl font-bold mt-2 sm:mt-4 text-[#23160E] leading-tight">
            </h2>

            <p id="ringkasanFilsafat" class="mt-4 sm:mt-6 text-[#675A4D] leading-relaxed sm:leading-8 text-sm sm:text-[15px]">
            </p>

            <div class="border-t border-[#E4D4BF] my-6 sm:my-8"></div>

            <h3 style="font-family:'Cormorant Garamond',serif;" class="text-2xl sm:text-3xl text-[#23160E]">
                Asal
            </h3>
            <p id="asalFilsafat" class="mt-2 sm:mt-4 text-[#675A4D] leading-relaxed sm:leading-8 text-sm sm:text-[15px]">
            </p>

            <div class="border-t border-[#E4D4BF] my-6 sm:my-8"></div>

            <h3 style="font-family:'Cormorant Garamond',serif;" class="text-2xl sm:text-3xl text-[#23160E]">
                Fokus
            </h3>
            <p id="fokusFilsafat" class="mt-2 sm:mt-4 text-[#675A4D] leading-relaxed sm:leading-8 text-sm sm:text-[15px]">
            </p>

            <div class="border-t border-[#E4D4BF] my-6 sm:my-8"></div>

            <h3 style="font-family:'Cormorant Garamond',serif;" class="text-2xl sm:text-3xl text-[#23160E]">
                Tokoh Terkenal
            </h3>
            <!-- Container untuk Card Tokoh Terkenal -->
            <div id="tokohFilsafat" class="mt-4 sm:mt-6 space-y-3 sm:space-y-4">
            </div>

            <div class="border-t border-[#E4D4BF] my-6 sm:my-8"></div>

            <h3 style="font-family:'Cormorant Garamond',serif;" class="text-2xl sm:text-3xl text-[#23160E]">
                Karakteristik
            </h3>
            <!-- Container untuk List Karakteristik Bullets -->
            <ul id="karakteristikFilsafat" class="mt-4 sm:mt-6 space-y-2 sm:space-y-3 text-[#675A4D] leading-relaxed sm:leading-7 list-disc pl-5 text-sm sm:text-[15px]">
            </ul>

            <div class="border-t border-[#E4D4BF] my-6 sm:my-8"></div>

            <h3 style="font-family:'Cormorant Garamond',serif;" class="text-2xl sm:text-3xl text-[#23160E]">
                Pengaruh / Implikasi
            </h3>
            <p id="pengaruhFilsafat" class="mt-2 sm:mt-4 text-[#675A4D] leading-relaxed sm:leading-8 text-sm sm:text-[15px]">
            </p>
        </div>
    </div>
</div>

<!-- SCRIPT JAVASCRIPT CONNECTED TO DATABASE -->
<script>
    @php
        $dbFilsafatData = [];
        foreach ($listFilsafat as $f) {
            $dbFilsafatData[$f->id] = [
                'id' => $f->id,
                'judul' => $f->judul ?? 'Tanpa Judul',
                'ringkasan' => $f->deskripsi ?? '-',
                'asal' => $f->asal ?? '-',
                'fokus' => $f->fokus ?? '-',
                'tokoh_raw' => $f->tokoh_terkenal ?? '',
                'karakteristik_raw' => $f->karakteristik ?? '',
                'pengaruh' => $f->implikasi ?? '-',
                'warna_teks' => $f->warna_teks ?? 'text-[#8C281E]',
            ];
        }
    @endphp

    var DB_FILSAFAT = @json($dbFilsafatData);

    function openFilsafat(id) {
        var overlay = document.getElementById("overlayBarat");
        var panel = document.getElementById("panelBarat");

        // Kunci scroll body utama
        document.body.style.overflow = "hidden";

        if (overlay) overlay.classList.remove("hidden");
        setTimeout(function() {
            if (panel) panel.classList.remove("translate-x-full");
        }, 10);

        var data = DB_FILSAFAT[id];

        if (!data) {
            var keys = Object.keys(DB_FILSAFAT);
            if (keys.length > 0) data = DB_FILSAFAT[keys[0]];
        }

        if (data) {
            if (document.getElementById("judulFilsafat")) 
                document.getElementById("judulFilsafat").innerText = data.judul || '-';
            if (document.getElementById("ringkasanFilsafat")) 
                document.getElementById("ringkasanFilsafat").innerText = data.ringkasan || '-';
            if (document.getElementById("asalFilsafat")) 
                document.getElementById("asalFilsafat").innerText = data.asal || '-';
            if (document.getElementById("fokusFilsafat")) 
                document.getElementById("fokusFilsafat").innerText = data.fokus || '-';
            if (document.getElementById("pengaruhFilsafat")) 
                document.getElementById("pengaruhFilsafat").innerText = data.pengaruh || '-';

            // PARSER TOKOH TERKENAL (CARD BOXES PUTIH)
            var tokohContainer = document.getElementById("tokohFilsafat");
            if (tokohContainer) {
                tokohContainer.innerHTML = "";
                var rawTokoh = data.tokoh_raw.trim();

                if (rawTokoh !== "") {
                    var items = rawTokoh.split(/(?<=\.)\s+/);
                    var htmlTokoh = "";

                    items.forEach(function(item) {
                        item = item.trim();
                        if (item.length > 0) {
                            var parts = item.split(':');
                            var namaTokoh = parts[0] ? parts[0].trim() : '';
                            var deskTokoh = parts[1] ? parts.slice(1).join(':').trim() : '';

                            if (namaTokoh) {
                                htmlTokoh += `
                                    <div class="bg-white border border-[#E5D6BF] rounded-xl p-4 sm:p-5 shadow-sm text-left">
                                        <h4 class="font-bold text-[#8C281E] text-sm sm:text-[16px]">${namaTokoh}</h4>
                                        ${deskTokoh ? `<p class="mt-1.5 sm:mt-2 text-[#675A4D] text-xs sm:text-[14px] leading-relaxed">${deskTokoh}</p>` : ''}
                                    </div>
                                `;
                            }
                        }
                    });

                    tokohContainer.innerHTML = htmlTokoh !== "" ? htmlTokoh : `
                        <div class="bg-white border border-[#E5D6BF] rounded-xl p-4 sm:p-5 shadow-sm text-left">
                            <h4 class="font-bold text-[#8C281E] text-sm sm:text-[16px]">${rawTokoh}</h4>
                        </div>
                    `;
                } else {
                    tokohContainer.innerHTML = `<p class="text-[#675A4D] text-xs sm:text-sm italic">-</p>`;
                }
            }

            // PARSER KARAKTERISTIK (BULLET LIST)
            var karakContainer = document.getElementById("karakteristikFilsafat");
            if (karakContainer) {
                karakContainer.innerHTML = "";
                var rawKarak = data.karakteristik_raw.trim();

                if (rawKarak !== "") {
                    var bullets = rawKarak.split('.');
                    var htmlList = "";

                    bullets.forEach(function(b) {
                        b = b.trim();
                        if (b.length > 1) {
                            htmlList += `<li>${b}.</li>`;
                        }
                    });

                    karakContainer.innerHTML = htmlList !== "" ? htmlList : `<li>${rawKarak}</li>`;
                } else {
                    karakContainer.innerHTML = `<li class="italic">-</li>`;
                }
            }
        }

        if (typeof feather !== 'undefined') feather.replace();
    }

    function handleOverlayClick(e) {
        if (e.target === document.getElementById("overlayBarat")) {
            closeBarat();
        }
    }

    function closeBarat() {
        var panel = document.getElementById("panelBarat");
        var overlay = document.getElementById("overlayBarat");

        if (panel) panel.classList.add("translate-x-full");
        setTimeout(function() {
            if (overlay) overlay.classList.add("hidden");
            document.body.style.overflow = "auto";
        }, 300);
    }
</script>