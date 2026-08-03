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

        @php
            $listFilsafat = $filsafats ?? collect([]);
        @endphp

        <!-- GRID CARDS (DINAMIS DARI DATABASE) -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($listFilsafat as $item)
                @php
                    $slug = strtolower(trim($item->slug ?? 'barat'));
                    $bgIkon = $item->warna_bg ?? 'bg-[#992B20]';
                    $colorText = $item->warna_teks ?? 'text-[#B27A27]';

                    // Fleksibilitas deskripsi kartu depan
                    $deskripsiTampil =
                        $item->deskripsi_singkat ??
                        ($item->deskripsi ??
                            ($item->ringkasan ??
                                ($item->penjelasan ??
                                    'Mengkaji nilai-nilai kehidupan dan pandangan hidup secara mendalam.')));

                    // EKSTRAKSI NAMA TOKOH (PENCATATAN SERUPA OVERLAY)
                    $tokohList = [];

                    // 1. Cek jika tokoh tersimpan di kolom terpisah (tokoh1_nama, dll)
                    if (!empty($item->tokoh1_nama)) {
                        $tokohList[] = $item->tokoh1_nama;
                    }
                    if (!empty($item->tokoh2_nama)) {
                        $tokohList[] = $item->tokoh2_nama;
                    }
                    if (!empty($item->tokoh3_nama)) {
                        $tokohList[] = $item->tokoh3_nama;
                    }

                    // 2. Cek jika tokoh tersimpan di kolom array / JSON `tokoh`
                    if (empty($tokohList)) {
                        $rawTokoh = $item->tokoh;

                        if (is_string($rawTokoh)) {
                            $decoded = json_decode($rawTokoh, true);
                            if (json_last_error() === JSON_ERROR_NONE) {
                                $rawTokoh = $decoded;
                            } else {
                                $tokohList = array_map('trim', explode(',', $rawTokoh));
                            }
                        }

                        if (is_array($rawTokoh)) {
                            foreach ($rawTokoh as $tkh) {
                                if (is_array($tkh)) {
                                    $nama =
                                        $tkh['nama'] ??
                                        ($tkh['nama_tokoh'] ?? ($tkh['name'] ?? ($tkh['tokoh'] ?? reset($tkh))));
                                    if ($nama && is_string($nama)) {
                                        $tokohList[] = trim($nama);
                                    }
                                } elseif (is_string($tkh) && trim($tkh) !== '') {
                                    $tokohList[] = trim($tkh);
                                }
                            }
                        }
                    }
                @endphp

                <div onclick="openFilsafat('{{ $slug }}')"
                    class="group bg-white rounded-xl border border-[#E5D6BF]
                    p-8 hover:-translate-y-2 hover:shadow-xl
                    duration-300 cursor-pointer flex flex-col justify-between h-full">

                    <!-- Content Top Wrapper -->
                    <div class="flex flex-col flex-1">
                        <!-- Icon -->
                        <div
                            class="w-14 h-14 rounded-full {{ $bgIkon }} flex items-center justify-center text-white text-2xl mb-6 shrink-0">
                            {{ $item->ikon ?? '🏛' }}
                        </div>

                        <!-- Judul -->
                        <h3 style="font-family:'Cormorant Garamond',serif;"
                            class="text-[38px] font-bold text-[#23160E] leading-tight">
                            {{ $item->judul }}
                        </h3>

                        <!-- Deskripsi -->
                        <p class="mt-4 text-[#675A4D] leading-7 flex-1">
                            {{ Str::limit($deskripsiTampil, 120) }}
                        </p>

                        <!-- Tokoh Pill Badges (Presisi Mengikuti Overlay) -->
                        <div class="mt-6 flex flex-wrap gap-2 pt-2">
                            @if (!empty($tokohList))
                                @foreach (array_slice($tokohList, 0, 3) as $namaTokoh)
                                    <span
                                        class="px-3 py-1 rounded-full bg-[#F8F1E6] {{ $colorText }} text-xs font-medium">
                                        {{ $namaTokoh }}
                                    </span>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Footer Bottom Wrapper -->
                    <div class="mt-8 pt-6 border-t border-[#E5D6BF] flex items-center justify-between shrink-0">
                        <span class="uppercase tracking-[2px] text-[11px] font-bold {{ $colorText }}">
                            Lihat Informasi
                        </span>
                        <i data-feather="arrow-right"
                            class="w-5 h-5 {{ $colorText }} group-hover:translate-x-1 duration-300"></i>
                    </div>

                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-[#675A4D]">
                    Belum ada data filsafat yang tersedia di database.
                </div>
            @endforelse
        </div>

    </div>
</section>

<!-- Overlay Drawer Side-Panel -->
<div id="overlayBarat" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-50">
    <div id="panelBarat"
        class="absolute right-0 top-0 w-[42%] h-full bg-[#FAF5ED] overflow-y-auto translate-x-full shadow-2xl transition-transform duration-500 ease-in-out">

        <!-- Close Button -->
        <button onclick="closeBarat()"
            class="absolute top-6 right-6 w-11 h-11 rounded-full bg-[#EFE3CC] hover:bg-[#E5D4B7] flex items-center justify-center font-bold text-[#23160E]">
            ✕
        </button>

        <div class="p-10">
            <p class="uppercase tracking-[4px] text-[#C58A3C] text-xs">
                WAWASAN FILSAFAT
            </p>

            <h2 id="judulFilsafat" style="font-family:'Cormorant Garamond',serif;"
                class="text-5xl font-bold mt-4 text-[#23160E]">
            </h2>

            <p id="ringkasanFilsafat" class="mt-6 text-[#675A4D] leading-8">
            </p>

            <div class="border-t border-[#E4D4BF] my-10"></div>

            <h3 style="font-family:'Cormorant Garamond',serif;" class="text-3xl text-[#23160E]">
                Asal
            </h3>
            <p id="asalFilsafat" class="mt-5 text-[#675A4D] leading-8">
            </p>

            <div class="border-t border-[#E4D4BF] my-10"></div>

            <h3 style="font-family:'Cormorant Garamond',serif;" class="text-3xl text-[#23160E]">
                Fokus
            </h3>
            <p id="fokusFilsafat" class="mt-5 text-[#675A4D] leading-8">
            </p>

            <div class="border-t border-[#E4D4BF] my-10"></div>

            <h3 style="font-family:'Cormorant Garamond',serif;" class="text-3xl text-[#23160E]">
                Tokoh Terkenal
            </h3>
            <div id="tokohFilsafat" class="mt-5 space-y-4">
            </div>

            <div class="border-t border-[#E4D4BF] my-10"></div>

            <h3 style="font-family:'Cormorant Garamond',serif;" class="text-3xl text-[#23160E]">
                Karakteristik
            </h3>
            <ul id="karakteristikFilsafat" class="mt-5 space-y-3 text-[#675A4D] leading-8 list-disc pl-6">
            </ul>

            <div class="border-t border-[#E4D4BF] my-10"></div>

            <h3 style="font-family:'Cormorant Garamond',serif;" class="text-3xl text-[#23160E]">
                Pengaruh
            </h3>
            <p id="pengaruhFilsafat" class="mt-5 text-[#675A4D] leading-8">
            </p>
        </div>
    </div>
</div>

<!-- SCRIPT JAVASCRIPT CONNECTED TO DATABASE -->
<script>
    @php
        $dbFilsafatData = [];
        foreach ($listFilsafat as $f) {
            // Parsing Tokoh untuk Overlay Side Panel
            $tokohJS = [];

            // Pilihan A: Jika memakai kolom terpisah
            if (!empty($f->tokoh1_nama)) {
                $tokohJS[] = ['nama' => $f->tokoh1_nama, 'deskripsi' => $f->tokoh1_deskripsi ?? ''];
            }
            if (!empty($f->tokoh2_nama)) {
                $tokohJS[] = ['nama' => $f->tokoh2_nama, 'deskripsi' => $f->tokoh2_deskripsi ?? ''];
            }
            if (!empty($f->tokoh3_nama)) {
                $tokohJS[] = ['nama' => $f->tokoh3_nama, 'deskripsi' => $f->tokoh3_deskripsi ?? ''];
            }

            // Pilihan B: Jika memakai JSON/Array/String
            if (empty($tokohJS)) {
                $rawTokoh = $f->tokoh;
                if (is_string($rawTokoh)) {
                    $decoded = json_decode($rawTokoh, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $rawTokoh = $decoded;
                    } else {
                        $rawTokoh = explode(',', $rawTokoh);
                    }
                }
                $tokohJS = $rawTokoh;
            }

            // Parsing Karakteristik untuk JS Overlay
            $karakJS = $f->karakteristik;
            if (is_string($karakJS)) {
                $decoded = json_decode($karakJS, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $karakJS = $decoded;
                } else {
                    $karakJS = explode(',', $karakJS);
                }
            }

            $keySlug = strtolower(trim($f->slug ?? ''));

            $dbFilsafatData[$keySlug] = [
                'judul' => $f->judul ?? 'Tanpa Judul',
                'ringkasan' => $f->ringkasan ?? ($f->deskripsi_singkat ?? ($f->deskripsi ?? '-')),
                'asal' => $f->asal ?? '-',
                'fokus' => $f->fokus ?? '-',
                'tokoh' => $tokohJS ?? [],
                'karakteristik' => $karakJS ?? [],
                'pengaruh' => $f->pengaruh ?? '-',
                'warna_teks' => $f->warna_teks ?? 'text-[#992B20]',
            ];
        }
    @endphp

    var DB_FILSAFAT = @json($dbFilsafatData);

    function openFilsafat(jenis) {
        var overlay = document.getElementById("overlayBarat");
        var panel = document.getElementById("panelBarat");

        if (overlay) overlay.classList.remove("hidden");
        setTimeout(function() {
            if (panel) panel.classList.remove("translate-x-full");
        }, 10);

        var key = String(jenis).toLowerCase().trim();
        var data = DB_FILSAFAT[key];

        if (data) {
            if (document.getElementById("judulFilsafat")) document.getElementById("judulFilsafat").innerText = data
                .judul;
            if (document.getElementById("ringkasanFilsafat")) document.getElementById("ringkasanFilsafat").innerText =
                data.ringkasan;
            if (document.getElementById("asalFilsafat")) document.getElementById("asalFilsafat").innerText = data.asal;
            if (document.getElementById("fokusFilsafat")) document.getElementById("fokusFilsafat").innerText = data
                .fokus;
            if (document.getElementById("pengaruhFilsafat")) document.getElementById("pengaruhFilsafat").innerText =
                data.pengaruh;

            // Render Tokoh di Overlay Side Panel
            var tokohContainer = document.getElementById("tokohFilsafat");
            if (tokohContainer) {
                tokohContainer.innerHTML = "";
                if (Array.isArray(data.tokoh) && data.tokoh.length > 0) {
                    data.tokoh.forEach(function(t) {
                        var namaTokoh = (typeof t === 'object' && t !== null) ? (t.nama || t.nama_tokoh || t
                            .name || t.tokoh || '') : t;
                        var descTokoh = (typeof t === 'object' && t !== null) ? (t.deskripsi || t.desc || '') :
                            '';

                        if (namaTokoh) {
                            tokohContainer.innerHTML += `
                                <div class="bg-white border border-[#E5D6BF] rounded-lg p-5">
                                    <h4 class="font-semibold ${data.warna_teks}">${namaTokoh}</h4>
                                    ${descTokoh ? `<p class="mt-2 text-[#675A4D] text-sm">${descTokoh}</p>` : ''}
                                </div>
                            `;
                        }
                    });
                } else if (typeof data.tokoh === 'string' && data.tokoh.trim() !== '') {
                    tokohContainer.innerHTML =
                        `<div class="bg-white border border-[#E5D6BF] rounded-lg p-5 text-[#675A4D] text-sm">${data.tokoh}</div>`;
                } else {
                    tokohContainer.innerHTML = `<p class="text-[#675A4D] text-sm italic">-</p>`;
                }
            }

            // Render Karakteristik
            var karakContainer = document.getElementById("karakteristikFilsafat");
            if (karakContainer) {
                karakContainer.innerHTML = "";
                if (Array.isArray(data.karakteristik) && data.karakteristik.length > 0) {
                    data.karakteristik.forEach(function(k) {
                        if (k && String(k).trim() !== '') {
                            karakContainer.innerHTML += `<li>${k}</li>`;
                        }
                    });
                } else if (typeof data.karakteristik === 'string' && data.karakteristik.trim() !== '') {
                    karakContainer.innerHTML = `<li>${data.karakteristik}</li>`;
                } else {
                    karakContainer.innerHTML = `<li class="italic">-</li>`;
                }
            }
        }

        if (typeof feather !== 'undefined') feather.replace();
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
