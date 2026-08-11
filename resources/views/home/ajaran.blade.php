<style>
    /* 1. Animasi Teks: Dari Bawah ke Atas (Fade Up) */
    @keyframes slideFadeUp {
        0% {
            opacity: 0;
            transform: translateY(28px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* 2. Animasi Gambar Utama: Dari Kanan ke Kiri (Fade Left) */
    @keyframes slideFadeLeft {
        0% {
            opacity: 0;
            transform: translateX(40px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Class untuk Memicu Animasi */
    .animate-fade-up {
        animation: slideFadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    .animate-fade-left {
        animation: slideFadeLeft 0.65s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
</style>

<section id="ajaran" class="bg-[#1A120C] py-24">
    <div class="max-w-[1200px] mx-auto px-6">

        <p class="uppercase tracking-[6px] text-[#D4A64A] text-xs mb-3">
            SOROTAN
        </p>

        <h2 class="text-[66px] leading-[0.95] font-semibold mb-12 text-[#F7F1E8]"
            style="font-family:'Cormorant Garamond',serif;">
            Ajaran Tetua Bali 
        </h2>

        @php
            $listAjaran = $ajarans ?? collect([]);
            $firstAjaran = $listAjaran->first();
            $defaultFallback = asset('images/tri-hita-karana.jpg');
        @endphp

        @if ($firstAjaran)
            <div class="grid lg:grid-cols-[540px_1fr] gap-14 items-center" id="containerAjaranHero">

                <!-- FOTO UTAMA DENGAN OVERLAY HOVER -->
                <div class="relative w-[540px] h-[420px] rounded-xl overflow-hidden shadow-xl group cursor-pointer"
                    onclick="openAjaran()">
                    @php
                        $imgMain = trim((string) ($firstAjaran->gambar ?? ''));
                        if (!empty($imgMain) && strtolower($imgMain) !== 'null') {
                            if (\Illuminate\Support\Str::startsWith($imgMain, ['http://', 'https://'])) {
                                $mainImgUrl = $imgMain;
                            } elseif (\Illuminate\Support\Str::startsWith($imgMain, 'images/')) {
                                $mainImgUrl = asset(str_replace('%2F', '/', rawurlencode($imgMain)));
                            } else {
                                $cleanMainPath = ltrim(str_replace(['public/', 'storage/'], '', $imgMain), '/');
                                $mainImgUrl = asset('storage/' . $cleanMainPath);
                            }
                        } else {
                            $mainImgUrl = $defaultFallback;
                        }
                    @endphp

                    <img id="mainImage" src="{{ $mainImgUrl }}"
                        onerror="this.onerror=null; this.src='{{ $defaultFallback }}';"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                    <!-- Badge Lokasi -->
                    <div
                        class="absolute bottom-4 left-4 z-10 flex items-center gap-1.5 bg-black/40 backdrop-blur-md px-3 py-1.5 rounded-md text-[#D4A64A] text-xs">
                        <i data-feather="map-pin" class="w-3.5 h-3.5"></i>
                        <span id="mainLocation" class="uppercase tracking-wider font-medium text-[10px]">
                            {{ strtoupper($firstAjaran->lokasi ?? 'BALI') }}
                        </span>
                    </div>

                    <!-- Overlay Gelap + Tombol Hover -->
                    <div
                        class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <button type="button"
                            class="bg-[#F7F1E8] text-[#241308] px-6 py-3 rounded-md text-xs tracking-[2px] font-semibold uppercase flex items-center gap-2 shadow-lg hover:bg-[#E2D6C5] transition transform translate-y-2 group-hover:translate-y-0 duration-300">
                            <i data-feather="info" class="w-4 h-4 text-[#8D6627]"></i>
                            Baca Selengkapnya
                        </button>
                    </div>
                </div>

                <!-- KONTEN BACAAN UTAMA -->
                <div id="mainContentBox">
                    <span id="mainTag"
                        class="inline-block border border-[#8B6528] text-[#D4A64A] bg-transparent text-[10px] tracking-[3px] uppercase px-4 py-2 rounded-md">
                        {{ strtoupper($firstAjaran->tags ?? 'AJARAN TETUA') }}
                    </span>

                    <h2 id="mainTitle" class="mt-6 text-[64px] leading-[0.95] font-semibold text-[#F7F1E8]"
                        style="font-family:'Cormorant Garamond',serif;">
                        {{ $firstAjaran->judul }}
                    </h2>

                    <p id="mainDesc" class="mt-7 text-[#E5D7C8] text-[19px] leading-[38px] font-normal line-clamp-3">
                        {{ \Illuminate\Support\Str::limit(strip_tags($firstAjaran->deskripsi ?? ''), 180) }}
                    </p>

                    <div class="flex justify-between items-end mt-10">
                        <!-- Profil Penulis & Tanggal -->
                        @php
                            $authorName = $firstAjaran->penulis ?? ($firstAjaran->user->name ?? 'Tim Balinesia');
                            $initialAvatar = strtoupper(substr(trim($authorName), 0, 1));
                            $tanggalDibuat = !empty($firstAjaran->created_at)
                                ? \Carbon\Carbon::parse($firstAjaran->created_at)->translatedFormat('d F Y')
                                : $firstAjaran->tahun ?? '1965';
                        @endphp
                        <div id="mainProfile" class="flex items-center">
                            <div
                                class="w-14 h-14 rounded-full bg-[#7C5216] flex items-center justify-center border border-[#D4A64A]/30">
                                <span id="mainAvatarInitial"
                                    class="text-[#D4A64A] font-semibold text-xl">{{ $initialAvatar }}</span>
                            </div>
                            <div class="ml-4">
                                <h4 id="mainAuthor" class="text-[#F8F2E8] text-[28px] font-semibold leading-tight"
                                    style="font-family:'Cormorant Garamond',serif;">
                                    {{ $authorName }}
                                </h4>
                                <p id="mainRole" class="text-[#A98C67] uppercase tracking-[2px] text-[11px] mt-0.5">
                                    {{ $tanggalDibuat }}
                                </p>
                            </div>
                        </div>

                        <!-- Tombol Detail -->
                        <button id="mainButton" type="button" onclick="openAjaran()"
                            class="border border-[#8D6627] text-[#D4A64A] px-8 py-3 rounded-md hover:bg-[#D4A64A] hover:text-[#241308] transition font-medium text-sm cursor-pointer">
                            DETAIL →
                        </button>
                    </div>
                </div>

            </div>

            <!-- THUMBNAIL CAROUSEL -->
            <div class="mt-10 flex flex-col items-center">
                <div class="flex gap-4 items-center flex-wrap justify-center">
                    @foreach ($listAjaran->take(3) as $index => $thumbItem)
                        @php
                            $itemId = (string) $thumbItem->id;
                            $imgThumb = trim((string) ($thumbItem->gambar ?? ''));
                            if (!empty($imgThumb) && strtolower($imgThumb) !== 'null') {
                                if (\Illuminate\Support\Str::startsWith($imgThumb, ['http://', 'https://'])) {
                                    $thumbImgUrl = $imgThumb;
                                } elseif (\Illuminate\Support\Str::startsWith($imgThumb, 'images/')) {
                                    $thumbImgUrl = asset(str_replace('%2F', '/', rawurlencode($imgThumb)));
                                } else {
                                    $cleanThumbPath = ltrim(str_replace(['public/', 'storage/'], '', $imgThumb), '/');
                                    $thumbImgUrl = asset('storage/' . $cleanThumbPath);
                                }
                            } else {
                                $thumbImgUrl = $defaultFallback;
                            }
                            $borderClass = $index === 0 ? 'border-[#D4A64A]' : 'border-transparent';
                        @endphp

                        <div onclick="changeSlide('{{ $itemId }}')" id="thumb-{{ $itemId }}"
                            class="thumb-card relative w-[360px] h-[90px] rounded-xl overflow-hidden cursor-pointer border-2 {{ $borderClass }} transition-all duration-500 bg-[#241710]">
                            <img src="{{ $thumbImgUrl }}"
                                onerror="this.onerror=null; this.src='{{ $defaultFallback }}';"
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/50"></div>
                            <span
                                class="absolute bottom-3 left-3 text-white font-semibold truncate max-w-[320px]">{{ $thumbItem->judul }}</span>
                        </div>
                    @endforeach
                </div>

                <!-- DOT INDICATORS -->
                <div class="flex justify-center gap-2 mt-5">
                    @foreach ($listAjaran->take(3) as $index => $dotItem)
                        @php
                            $dotId = (string) $dotItem->id;
                            $dotBg = $index === 0 ? 'bg-[#D9B35D]' : 'bg-[#665548]';
                        @endphp
                        <span id="dot-{{ $dotId }}"
                            class="dot-card w-2 h-2 rounded-full {{ $dotBg }} transition-all duration-300"></span>
                    @endforeach
                </div>
            </div>
        @else
            <div class="py-12 text-center text-[#A98C67]">
                Belum ada data Ajaran Tetua yang disetujui saat ini.
            </div>
        @endif

    </div>
</section>

<!-- OVERLAY & PANEL DRAWER AJARAN TETUA -->
<div id="overlayAjaran"
    class="fixed inset-0 bg-black/60 backdrop-blur-md z-[9999] hidden opacity-0 transition-opacity duration-300">
    <div id="panelAjaran"
        class="fixed top-0 right-0 h-full w-full sm:w-[550px] md:w-[50%] bg-[#FAF5ED] shadow-2xl overflow-y-auto transform translate-x-full transition-transform duration-500 ease-in-out">

        <!-- Header Banner Image -->
        <div class="relative h-64 md:h-80 w-full bg-[#241710]">
            <img id="panelImage" src="" onerror="this.onerror=null; this.src='{{ $defaultFallback }}';"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-[#FAF5ED] via-black/40 to-black/20"></div>

            <button onclick="closeAjaran()" type="button"
                class="absolute top-6 right-6 w-10 h-10 rounded-full bg-black/40 hover:bg-black/60 text-white flex items-center justify-center font-bold transition backdrop-blur-sm z-20 cursor-pointer">
                ✕
            </button>

            <div class="absolute bottom-6 left-8 right-8">
                <div id="panelTags" class="flex gap-2 mb-2">
                    <span id="panelTagBadge"
                        class="bg-[#C7962B]/80 text-white text-[9px] tracking-[2px] uppercase px-3 py-1 rounded backdrop-blur-sm font-semibold">FILOSOFI</span>
                </div>
                <h2 id="panelTitle" style="font-family:'Cormorant Garamond',serif;"
                    class="text-3xl md:text-5xl font-bold text-[#23160E] leading-tight">
                    Judul Ajaran
                </h2>
                <p id="panelSubHeader" class="text-xs text-[#8B6D48] mt-1 font-medium tracking-wider">
                    📍 DENPASAR • DIDIRIKAN TAHUN 1965
                </p>
            </div>
        </div>

        <!-- Body Content -->
        <div class="p-8 md:p-10 space-y-8">
            <div>
                <p class="uppercase tracking-[3px] text-xs text-[#C7962B] font-bold mb-3">PENJELASAN LENGKAP</p>
                <div id="panelPenjelasan" class="text-[#675A4D] text-base leading-relaxed space-y-4"></div>
            </div>

            <div id="boxPrinsipWrapper">
                <p class="uppercase tracking-[3px] text-xs text-[#C7962B] font-bold mb-4">PRINSIP UTAMA</p>
                <div id="panelPrinsip" class="space-y-4 pl-4 border-l-2 border-[#C7962B]"></div>
            </div>

            <div id="boxPenerapanWrapper" class="p-6 rounded-lg border border-[#DDBF88] bg-[#F5EACF]">
                <p class="uppercase tracking-[2px] text-[11px] text-[#8B6D48] font-bold mb-2">CONTOH PENERAPAN</p>
                <p id="panelPenerapan" class="text-[#675A4D] text-sm italic leading-relaxed"></p>
            </div>

            <div class="border-t border-[#E4D4BF] pt-6">
                <p class="uppercase tracking-[2px] text-[10px] text-[#8B6D48] font-bold">SUMBER & REFERENSI</p>
                <p id="panelSumber" class="text-xs text-[#8B6D48] mt-1"></p>
            </div>
        </div>

    </div>
</div>

<script>
    @php
        $slidesData = [];
        foreach ($listAjaran->take(3) as $index => $itemData) {
            $imgPath = trim((string) ($itemData->gambar ?? ''));
            if (!empty($imgPath) && strtolower($imgPath) !== 'null') {
                if (\Illuminate\Support\Str::startsWith($imgPath, ['http://', 'https://'])) {
                    $url = $imgPath;
                } elseif (\Illuminate\Support\Str::startsWith($imgPath, 'images/')) {
                    $url = asset(str_replace('%2F', '/', rawurlencode($imgPath)));
                } else {
                    $cleanPath = ltrim(str_replace(['public/', 'storage/'], '', $imgPath), '/');
                    $url = asset('storage/' . $cleanPath);
                }
            } else {
                $url = $defaultFallback;
            }

            $autName = $itemData->penulis ?? ($itemData->user->name ?? 'Tim Balinesia');
            $tglFormat = !empty($itemData->created_at) ? \Carbon\Carbon::parse($itemData->created_at)->translatedFormat('d F Y') : $itemData->tahun ?? '1965';

            $prinsipList = [];
            if (!empty($itemData->prinsip1_nama)) {
                $prinsipList[] = ['nama' => $itemData->prinsip1_nama, 'deskripsi' => $itemData->prinsip1_deskripsi ?? ''];
            }
            if (!empty($itemData->prinsip2_nama)) {
                $prinsipList[] = ['nama' => $itemData->prinsip2_nama, 'deskripsi' => $itemData->prinsip2_deskripsi ?? ''];
            }
            if (!empty($itemData->prinsip3_nama)) {
                $prinsipList[] = ['nama' => $itemData->prinsip3_nama, 'deskripsi' => $itemData->prinsip3_deskripsi ?? ''];
            }

            $slidesData[(string) $itemData->id] = [
                'id' => (string) $itemData->id,
                'judul' => $itemData->judul,
                'tags' => strtoupper($itemData->tags ?? 'FILOSOFI'),
                'gambar' => $url,
                'lokasi' => strtoupper($itemData->lokasi ?? 'BALI'),
                'tahun' => $tglFormat,
                'penulis' => $autName,
                'inisial' => strtoupper(substr(trim($autName), 0, 1)),
                'deskripsi' => $itemData->deskripsi ?? '',
                'prinsip' => $prinsipList,
                'penerapan' => $itemData->contoh_penerapan ?? '-',
                'sumber' => $itemData->sumber ?? '-',
            ];
        }
    @endphp

    var AJARAN_DATA = @json($slidesData);
    var activeAjaranId = "{{ $firstAjaran->id ?? '' }}";
    var ajaranTimer = null;
    var customOrderKeys = [];

    function setupCustomOrder() {
        var tatTwamId = null;
        var desaKalaId = null;
        var triHitaId = null;
        var remainingIds = [];

        for (var id in AJARAN_DATA) {
            var judulLower = AJARAN_DATA[id].judul.toLowerCase();
            if (judulLower.includes('tat twam')) {
                tatTwamId = id;
            } else if (judulLower.includes('desa kala')) {
                desaKalaId = id;
            } else if (judulLower.includes('tri hita')) {
                triHitaId = id;
            } else {
                remainingIds.push(id);
            }
        }

        customOrderKeys = [];
        if (tatTwamId) customOrderKeys.push(tatTwamId);
        if (desaKalaId) customOrderKeys.push(desaKalaId);
        if (triHitaId) customOrderKeys.push(triHitaId);

        customOrderKeys = customOrderKeys.concat(remainingIds);

        if (customOrderKeys.length === 0) {
            customOrderKeys = Object.keys(AJARAN_DATA);
        }
    }

    function changeSlide(id) {
        id = String(id);
        if (!AJARAN_DATA[id]) return;

        activeAjaranId = id;
        var data = AJARAN_DATA[id];

        var imgMain = document.getElementById('mainImage');
        var contentBox = document.getElementById('mainContentBox');

        // 1. Gambar Utama: Animasi dari KANAN ke KIRI (animate-fade-left)
        if (imgMain) {
            imgMain.classList.remove('animate-fade-left');
            void imgMain.offsetWidth; // Trigger DOM reflow
            imgMain.classList.add('animate-fade-left');
        }

        // 2. Teks Utama: Animasi dari BAWAH ke ATAS (animate-fade-up)
        if (contentBox) {
            contentBox.classList.remove('animate-fade-up');
            void contentBox.offsetWidth; // Trigger DOM reflow
            contentBox.classList.add('animate-fade-up');
        }

        // 3. Update Konten Utama
        if (imgMain) imgMain.src = data.gambar;
        if (document.getElementById('mainLocation')) document.getElementById('mainLocation').innerText = data.lokasi;
        if (document.getElementById('mainTag')) document.getElementById('mainTag').innerText = data.tags;
        if (document.getElementById('mainTitle')) document.getElementById('mainTitle').innerText = data.judul;
        if (document.getElementById('mainDesc')) document.getElementById('mainDesc').innerText = data.deskripsi;
        if (document.getElementById('mainAuthor')) document.getElementById('mainAuthor').innerText = data.penulis;
        if (document.getElementById('mainAvatarInitial')) document.getElementById('mainAvatarInitial').innerText = data
            .inisial;
        if (document.getElementById('mainRole')) document.getElementById('mainRole').innerText = data.tahun;

        // 4. Reset & Pindahkan Border Kuning Thumbnail
        var thumbs = document.querySelectorAll('.thumb-card');
        for (var i = 0; i < thumbs.length; i++) {
            thumbs[i].classList.remove('border-[#D4A64A]');
            thumbs[i].classList.add('border-transparent');
        }
        var selectedThumb = document.getElementById('thumb-' + id);
        if (selectedThumb) {
            selectedThumb.classList.remove('border-transparent');
            selectedThumb.classList.add('border-[#D4A64A]');
        }

        // 5. Reset & Pindahkan Dot
        var dots = document.querySelectorAll('.dot-card');
        for (var j = 0; j < dots.length; j++) {
            dots[j].classList.remove('bg-[#D9B35D]');
            dots[j].classList.add('bg-[#665548]');
        }
        var selectedDot = document.getElementById('dot-' + id);
        if (selectedDot) {
            selectedDot.classList.remove('bg-[#665548]');
            selectedDot.classList.add('bg-[#D9B35D]');
        }
    }

    function autoNextSlide() {
        if (customOrderKeys.length === 0) return;
        var currentIndex = customOrderKeys.indexOf(String(activeAjaranId));
        var nextIndex = (currentIndex + 1) % customOrderKeys.length;
        changeSlide(customOrderKeys[nextIndex]);
    }

    function startAjaranAutoSlide() {
        stopAjaranAutoSlide();
        ajaranTimer = setInterval(autoNextSlide, 4000);
    }

    function stopAjaranAutoSlide() {
        if (ajaranTimer) clearInterval(ajaranTimer);
    }

    document.addEventListener("DOMContentLoaded", function() {
        setupCustomOrder();

        if (customOrderKeys.length > 0) {
            changeSlide(customOrderKeys[0]);
        }

        startAjaranAutoSlide();

        var heroArea = document.getElementById('ajaran');
        if (heroArea) {
            heroArea.addEventListener('mouseenter', stopAjaranAutoSlide);
            heroArea.addEventListener('mouseleave', startAjaranAutoSlide);
        }
    });

    function changeSlide(id) {
        id = String(id);
        if (!AJARAN_DATA[id]) return;

        activeAjaranId = id;
        var data = AJARAN_DATA[id];

        var imgMain = document.getElementById('mainImage');
        var contentBox = document.getElementById('mainContentBox');

        // 1. Animasi
        if (imgMain) {
            imgMain.classList.remove('animate-fade-left');
            void imgMain.offsetWidth;
            imgMain.classList.add('animate-fade-left');
        }

        if (contentBox) {
            contentBox.classList.remove('animate-fade-up');
            void contentBox.offsetWidth;
            contentBox.classList.add('animate-fade-up');
        }

        // 2. Update Konten Utama
        if (imgMain) imgMain.src = data.gambar;
        if (document.getElementById('mainLocation')) document.getElementById('mainLocation').innerText = data.lokasi;
        if (document.getElementById('mainTag')) document.getElementById('mainTag').innerText = data.tags;
        if (document.getElementById('mainTitle')) document.getElementById('mainTitle').innerText = data.judul;
        if (document.getElementById('mainDesc')) document.getElementById('mainDesc').innerText = data.deskripsi;
        if (document.getElementById('mainAuthor')) document.getElementById('mainAuthor').innerText = data.penulis;
        if (document.getElementById('mainAvatarInitial')) document.getElementById('mainAvatarInitial').innerText = data.inisial;
        if (document.getElementById('mainRole')) document.getElementById('mainRole').innerText = data.tahun;

        // 3. Reset Border Thumbnail & Dot
        var thumbs = document.querySelectorAll('.thumb-card');
        thumbs.forEach(function(t) {
            t.classList.remove('border-[#D4A64A]');
            t.classList.add('border-transparent');
        });
        var selectedThumb = document.getElementById('thumb-' + id);
        if (selectedThumb) {
            selectedThumb.classList.remove('border-transparent');
            selectedThumb.classList.add('border-[#D4A64A]');
        }

        var dots = document.querySelectorAll('.dot-card');
        dots.forEach(function(d) {
            d.classList.remove('bg-[#D9B35D]');
            d.classList.add('bg-[#665548]');
        });
        var selectedDot = document.getElementById('dot-' + id);
        if (selectedDot) {
            selectedDot.classList.remove('bg-[#665548]');
            selectedDot.classList.add('bg-[#D9B35D]');
        }
    }

    // ==========================================
   
    function openAjaran(targetParam) {
        stopAjaranAutoSlide();

        var targetId = activeAjaranId;

        // Jika dipanggil membawa parameter ID (misal dari pencarian: 5 atau "5")
        if (targetParam !== undefined && targetParam !== null && targetParam !== "") {
            var paramStr = String(targetParam).trim();
            
            // 1. Pencocokan langsung berdasarkan ID
            if (AJARAN_DATA[paramStr]) {
                targetId = paramStr;
            } else {
                // 2. Pencocokan berdasarkan nama Judul (Toleran Spasi/Huruf)
                for (var key in AJARAN_DATA) {
                    var judulLower = AJARAN_DATA[key].judul.toLowerCase().replace(/\s+/g, ' ').trim();
                    var searchLower = paramStr.toLowerCase().replace(/\s+/g, ' ').trim();
                    if (judulLower.includes(searchLower) || searchLower.includes(judulLower)) {
                        targetId = key;
                        break;
                    }
                }
            }
        }

        if (!targetId || !AJARAN_DATA[targetId]) return;

        // Pindahkan slide aktif ke item yang dipilih
        changeSlide(targetId);

        var data = AJARAN_DATA[targetId];

        // Isikan Data ke Modal Drawer
        if (document.getElementById('panelImage')) document.getElementById('panelImage').src = data.gambar;
        if (document.getElementById('panelTagBadge')) document.getElementById('panelTagBadge').innerText = data.tags;
        if (document.getElementById('panelTitle')) document.getElementById('panelTitle').innerText = data.judul;
        if (document.getElementById('panelSubHeader')) document.getElementById('panelSubHeader').innerText = '📍 ' + data.lokasi + ' • ' + data.tahun;
        if (document.getElementById('panelPenjelasan')) document.getElementById('panelPenjelasan').innerHTML = data.deskripsi;
        if (document.getElementById('panelPenerapan')) document.getElementById('panelPenerapan').innerText = '"' + data.penerapan + '"';
        if (document.getElementById('panelSumber')) document.getElementById('panelSumber').innerText = data.sumber;

        var prinsipContainer = document.getElementById('panelPrinsip');
        var prinsipWrapper = document.getElementById('boxPrinsipWrapper');
        if (prinsipContainer) {
            prinsipContainer.innerHTML = '';
            if (data.prinsip && data.prinsip.length > 0) {
                if (prinsipWrapper) prinsipWrapper.classList.remove('hidden');
                data.prinsip.forEach(function(p) {
                    var item = document.createElement('div');
                    item.innerHTML = '<h4 class="font-bold text-[#23160E] text-lg" style="font-family:\'Cormorant Garamond\',serif;">' + p.nama + '</h4><p class="text-sm text-[#675A4D] mt-1">' + p.deskripsi + '</p>';
                    prinsipContainer.appendChild(item);
                });
            } else {
                if (prinsipWrapper) prinsipWrapper.classList.add('hidden');
            }
        }

        var overlay = document.getElementById('overlayAjaran');
        var panel = document.getElementById('panelAjaran');

        if (overlay) overlay.classList.remove('hidden');
        setTimeout(function() {
            if (overlay) overlay.classList.remove('opacity-0');
            if (panel) panel.classList.remove('translate-x-full');
        }, 10);
    }

    function closeAjaran() {
        var overlay = document.getElementById('overlayAjaran');
        var panel = document.getElementById('panelAjaran');

        if (panel) panel.classList.add('translate-x-full');
        if (overlay) overlay.classList.add('opacity-0');

        setTimeout(function() {
            if (overlay) overlay.classList.add('hidden');
            startAjaranAutoSlide();
        }, 500);
    }
</script>
