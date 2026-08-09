<!-- CSRF TOKEN FOR AJAX -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Style Khusus -->
<style>
    .btn-bookmark-custom {
        cursor: pointer !important;
        transition: all 0.25s ease-in-out;
    }
    .btn-bookmark-custom * {
        pointer-events: none !important;
    }
    .btn-bookmark-custom[data-saved="true"] svg,
    .btn-bookmark-custom[data-saved="true"] i {
        fill: #C58A3C !important;
        color: #C58A3C !important;
        stroke: #C58A3C !important;
    }
    .btn-bookmark-custom[data-saved="false"] svg,
    .btn-bookmark-custom[data-saved="false"] i {
        fill: none !important;
        color: #8F7A61 !important;
        stroke: #8F7A61 !important;
    }
</style>

<!-- ========================================== -->
<!-- SECTION SATUA BALI                         -->
<!-- ========================================== -->
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

        <!-- GRID CARDS SATUA BALI (DATABASE) -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($satuas as $item)
                @php
                    $judulSatua = $item->judul ?? ($item->nama ?? '-');
                    $subJudul   = $item->sub_judul ?? ($item->terjemahan ?? '');
                    $gambarUrl  = !empty($item->gambar) ? asset('storage/' . $item->gambar) : asset('images/default.jpg');
                    
                    $ringkasan  = $item->ringkasan ?? ($item->ringkasan_cerita ?? ($item->isi ?? ($item->cerita ?? '-')));
                    $tokoh      = $item->tokoh ?? ($item->tokoh_utama ?? '-');
                    $alur       = $item->alur ?? ($item->alur_cerita ?? '-');
                    $moral      = $item->moral ?? ($item->nilai_moral ?? '-');
                    $filosofi   = $item->filosofi ?? ($item->pesan_filosofi ?? '-');

                    // Cek status bookmark riil dari database
                    $isSaved = auth()->check() && \App\Models\Bookmark::where('user_id', auth()->id())
                        ->where('item_title', $judulSatua)
                        ->exists();
                @endphp

                <div class="group bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E] transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:border-[#C58A3C] flex flex-col justify-between relative">

                    <!-- AREA KLIK DETAIL (MENGGUNAKAN DATASET) -->
                    <div onclick="openSatuaCard(this)"
                        data-nama="{{ $judulSatua }}"
                        data-latin="{{ $subJudul }}"
                        data-img="{{ $gambarUrl }}"
                        data-ringkasan="{{ $ringkasan }}"
                        data-tokoh="{{ $tokoh }}"
                        data-alur="{{ $alur }}"
                        data-moral="{{ $moral }}"
                        data-filosofi="{{ $filosofi }}"
                        class="cursor-pointer flex-grow flex flex-col justify-between">
                        <div>
                            <div class="relative overflow-hidden">
                                <img src="{{ $gambarUrl }}"
                                    class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110"
                                    alt="{{ $judulSatua }}">
                                <div class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45"></div>

                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 z-10">
                                    <span class="bg-[#F7F0E7] text-[#6F4B2A] px-4 py-2 rounded-full text-xs font-semibold flex items-center gap-2 shadow-lg">
                                        <i data-feather="info" class="w-3 h-3"></i> DETAIL
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 pb-0">
                                <h3 style="font-family:'Cormorant Garamond',serif;"
                                    class="text-4xl text-white font-bold mb-1">
                                    {{ $judulSatua }}
                                </h3>
                                @if(!empty($subJudul))
                                    <p class="text-[#8F7A61] italic text-sm">
                                        {{ $subJudul }}
                                    </p>
                                @endif
                                <p class="text-[#C7B39A] mt-4 leading-7 line-clamp-3">
                                    {{ $ringkasan }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- AREA FOOTER & BOOKMARK -->
                    <div class="p-6 pt-0 mt-6">
                        <div class="pt-4 border-t border-[#3E2D1E] flex items-center justify-between min-h-[40px]">
                            <div onclick="openSatuaCard(this.parentElement.parentElement.parentElement.firstElementChild)"
                                class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 cursor-pointer">
                                <span class="text-xs tracking-[2px] uppercase text-[#C58A3C] font-semibold">
                                    Baca Selengkapnya
                                </span>
                                <i data-feather="arrow-right" class="w-4 h-4 text-[#C58A3C]"></i>
                            </div>

                            <!-- BUTTON BOOKMARK SATUA BALI -->
                            <button type="button"
                                onclick="handleBookmarkAction(event, this, '{{ addslashes($judulSatua) }}', 'Satua Bali')"
                                data-saved="{{ $isSaved ? 'true' : 'false' }}"
                                title="{{ $isSaved ? 'Batal Simpan' : 'Simpan ke Arsip' }}"
                                class="btn-bookmark-custom relative z-10 p-2 rounded-lg border border-[#6E4E1E] bg-transparent hover:bg-[#3E2D1E] transition shrink-0 flex items-center justify-center">
                                <i data-feather="bookmark"
                                    class="w-4 h-4 {{ $isSaved ? 'text-[#C58A3C]' : 'text-[#8F7A61]' }}"
                                    style="{{ $isSaved ? 'fill:#C58A3C; color:#C58A3C;' : '' }}"></i>
                            </button>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-full py-12 text-center text-[#B9986D]">
                    Belum ada Satua Bali yang terverifikasi.
                </div>
            @endforelse

        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- DRAWER & OVERLAY (DETAIL SATUA BALI)       -->
<!-- ========================================== -->
<!-- DIKLIK DI AREA GELAP (OVERLAY) OTOMATIS MENUTUP DRAWER SATUA -->
<div id="overlaySatua" onclick="closeSatua()" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden z-[100] cursor-pointer">
    
    <!-- PANEL CONTENT SATUA (ONCLICK STOPPROPAGATION AGAR KLIK DIDALAM PANEL TIDAK MENUTUP) -->
    <div id="panelSatua" onclick="event.stopPropagation()"
        class="absolute right-0 top-0 w-[42%] max-w-full h-full bg-[#F8F0E5] overflow-y-auto translate-x-full transition-all duration-500 shadow-2xl cursor-default">
        
        <button onclick="closeSatua()"
            class="absolute top-5 right-5 w-12 h-12 rounded-full bg-[#EBD9BF] hover:bg-[#D4A64A] transition font-bold text-lg z-20 text-[#5F4B3A]">
            ✕
        </button>

        <div class="relative">
            <img id="satuaImage" class="w-full h-64 object-cover">
            <div class="absolute inset-0 bg-black/35"></div>
            <div class="absolute bottom-8 left-8 right-8">
                <h2 id="satuaNama" class="text-white text-5xl font-bold mt-4" style="font-family:'Cormorant Garamond',serif;"></h2>
                <p id="satuaLatin" class="text-gray-300 italic"></p>
            </div>
        </div>

        <div class="p-8 space-y-8">
            <div class="border-l-2 border-[#C58A3C] pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-[#C58A3C] font-bold">Ringkasan Cerita</h5>
                <p id="satuaRingkasan" class="mt-2 text-[#5F4B3A] leading-8 whitespace-pre-line"></p>
            </div>

            <div class="border-l-2 border-[#8B5E3C] pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-[#8B5E3C] font-bold">Tokoh Utama</h5>
                <p id="satuaTokoh" class="mt-2 text-[#5F4B3A] leading-8 whitespace-pre-line"></p>
            </div>

            <div class="border-l-2 border-[#D4A64A] pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-[#D4A64A] font-bold">Alur Cerita</h5>
                <p id="satuaAlur" class="mt-2 text-[#5F4B3A] leading-8 whitespace-pre-line"></p>
            </div>

            <div class="border-l-2 border-[#2E8B57] pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-[#2E8B57] font-bold">Nilai Moral</h5>
                <p id="satuaMoral" class="mt-2 text-[#5F4B3A] leading-8 whitespace-pre-line"></p>
            </div>

            <div class="border-l-2 border-[#A63C2F] pl-4">
                <h5 class="uppercase tracking-[4px] text-xs text-[#A63C2F] font-bold">Pesan Filosofi</h5>
                <p id="satuaFilosofi" class="mt-2 text-[#5F4B3A] leading-8 whitespace-pre-line"></p>
            </div>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- SCRIPT JS CONTROLLER / SWITCHER TAB        -->
<!-- ========================================== -->
<script>
    // Status Login User
    const IS_LOGGED_IN = @json(auth()->check());
    const URL_LOGIN_PAGE = "{{ route('login') }}";

    // FUNCTION ACTION BOOKMARK VIA AJAX
    function handleBookmarkAction(event, btnElement, title, type) {
        event.stopPropagation();
        event.preventDefault();

        if (!IS_LOGGED_IN) {
            alert("Silakan login terlebih dahulu untuk menyimpan " + type + " ini ke arsip!");
            window.location.href = URL_LOGIN_PAGE;
            return;
        }

        // Tautan URL balik ke section Satua
        const itemUrl = "{{ url('/') }}?open=" + encodeURIComponent(title) + "#sectionSatua";

        // Kirim request ke backend Laravel
        fetch("{{ route('pengguna.arsip.store') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                item_title: title,
                item_type: type,
                item_url: itemUrl
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'saved') {
                btnElement.setAttribute('data-saved', 'true');
                btnElement.setAttribute('title', 'Batal Simpan');
            } else if (data.status === 'removed') {
                btnElement.setAttribute('data-saved', 'false');
                btnElement.setAttribute('title', 'Simpan ke Arsip');
            }

            // Refeather untuk merender ulang status SVGs
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        })
        .catch(err => {
            console.error('Error Bookmark:', err);
        });
    }

    // Switch Tab Satua & Istilah
    function showSatua() {
        const secSatua = document.getElementById("sectionSatua");
        const secIstilah = document.getElementById("sectionIstilah");
        if (secSatua) secSatua.classList.remove("hidden");
        if (secIstilah) secIstilah.classList.add("hidden");
    }

    function showIstilah() {
        const secSatua = document.getElementById("sectionSatua");
        const secIstilah = document.getElementById("sectionIstilah");
        if (secSatua) secSatua.classList.add("hidden");
        if (secIstilah) secIstilah.classList.remove("hidden");
    }

    // Open Drawer Satua via Dataset HTML
    function openSatuaCard(element) {
        document.getElementById("satuaNama").innerText = element.dataset.nama || '-';
        document.getElementById("satuaLatin").innerText = element.dataset.latin || '';
        document.getElementById("satuaImage").src = element.dataset.img || '';

        document.getElementById("satuaRingkasan").innerText = element.dataset.ringkasan || '-';
        document.getElementById("satuaTokoh").innerText = element.dataset.tokoh || '-';
        document.getElementById("satuaAlur").innerText = element.dataset.alur || '-';
        document.getElementById("satuaMoral").innerText = element.dataset.moral || '-';
        document.getElementById("satuaFilosofi").innerText = element.dataset.filosofi || '-';

        document.getElementById("overlaySatua").classList.remove("hidden");
        setTimeout(() => {
            document.getElementById("panelSatua").classList.remove("translate-x-full");
        }, 10);
    }

    function closeSatua() {
        document.getElementById("panelSatua").classList.add("translate-x-full");
        setTimeout(() => {
            document.getElementById("overlaySatua").classList.add("hidden");
        }, 500);
    }

    // Open Drawer Istilah via Dataset HTML
    function openIstilahCard(element) {
        document.getElementById("detailTitle").innerText = element.dataset.title || '-';
        document.getElementById("detailKategori").innerText = element.dataset.kategori || 'Umum';
        document.getElementById("detailDesc").innerText = element.dataset.desc || '-';
        document.getElementById("detailSejarah").innerText = element.dataset.sejarah || '-';
        document.getElementById("detailContoh").innerText = element.dataset.contoh || '-';
        document.getElementById("detailPadanan").innerText = element.dataset.padanan || '-';

        document.getElementById("overlay").classList.remove("hidden");
        document.getElementById("detailPanel").classList.remove("translate-x-full");
    }

    function closeDetail() {
        document.getElementById("detailPanel").classList.add("translate-x-full");
        setTimeout(() => {
            document.getElementById("overlay").classList.add("hidden");
        }, 500);
    }

    // Pencarian Istilah
    function filterIstilahList(keyword) {
        const query = keyword.trim().toLowerCase();
        const btnClear = document.getElementById("btnClearSearchIstilah");

        if (btnClear) {
            if (query.length > 0) btnClear.classList.remove("hidden");
            else btnClear.classList.add("hidden");
        }

        const items = document.querySelectorAll("#listIstilahContainer .item-istilah");
        items.forEach(item => {
            const judulEl = item.querySelector("h3");
            if (judulEl) {
                const judulText = judulEl.innerText.trim().toLowerCase();
                if (query === "" || judulText.includes(query)) {
                    item.style.setProperty("display", "grid", "important");
                } else {
                    item.style.setProperty("display", "none", "important");
                }
            }
        });
    }

    function clearSearchIstilah() {
        const input = document.getElementById("searchIstilahInput");
        if (input) {
            input.value = "";
            filterIstilahList("");
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }

        // AUTO-OPEN MODAL SATUA DARI HALAMAN ARSIP DISIMPAN
        const urlParams = new URLSearchParams(window.location.search);
        const itemToOpen = urlParams.get('open');

        if (itemToOpen && window.location.hash === '#sectionSatua') {
            const decodedTitle = decodeURIComponent(itemToOpen).trim().toLowerCase();
            showSatua();

            setTimeout(() => {
                const cards = document.querySelectorAll('#sectionSatua [onclick*="openSatuaCard"]');
                cards.forEach(card => {
                    if (card.dataset.nama && card.dataset.nama.trim().toLowerCase() === decodedTitle) {
                        openSatuaCard(card);
                    }
                });
            }, 400);
        }
    });
</script>