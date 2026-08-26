<!-- ========================================== -->
<!-- SECTION SATUA BALI                         -->
<!-- ========================================== -->
<section id="sectionSatua" class="bg-[#1A110A] py-12 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">

        <!-- Judul Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-start mb-8 sm:mb-12 gap-6 md:gap-0">
            <div>
                <p class="uppercase tracking-[4px] sm:tracking-[5px] text-[#C89438] text-[10px] sm:text-xs mb-2 sm:mb-3">
                    — ENSIKLOPEDIA
                </p>
                <h2 style="font-family:'Cormorant Garamond',serif;" class="text-3xl sm:text-6xl font-bold text-white leading-tight">
                    Satua & Istilah Bali
                </h2>
                <p class="text-[#B9986D] mt-2 sm:mt-3 text-sm sm:text-lg">
                    Klik item untuk membuka informasi lengkap.
                </p>
            </div>

            <!-- Tab Satua & Istilah -->
            <div class="flex border border-[#6E4E1E] rounded-lg overflow-hidden shrink-0 w-full sm:w-auto mt-0 md:mt-2">
                <button id="btnSatua" onclick="showSatua()"
                    class="flex-1 sm:w-36 md:w-40 py-2.5 sm:py-3 bg-[#C58A3C] text-white uppercase tracking-[1.5px] sm:tracking-[2px] text-[11px] sm:text-xs font-semibold text-center shrink-0 transition-all cursor-pointer">
                    SATUA BALI
                </button>
                <button id="btnIstilah" onclick="showIstilah()"
                    class="flex-1 sm:w-36 md:w-40 py-2.5 sm:py-3 bg-transparent text-[#C58A3C] uppercase tracking-[1.5px] sm:tracking-[2px] text-[11px] sm:text-xs font-semibold text-center shrink-0 transition-all cursor-pointer">
                    ISTILAH BALI
                </button>
            </div>
        </div>

        <!-- GRID CARDS SATUA BALI (DATABASE) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($satuas as $item)
                @php
                    $judulSatua = $item->judul ?? ($item->nama ?? '-');
                    $subJudul   = $item->sub_judul ?? ($item->terjemahan ?? '');
                    $gambarUrl  = !empty($item->gambar) ? asset('storage/' . $item->gambar) : asset('images/default.jpg');
                    
                    // PEMETAAN KOLOM DATABASE YANG TEPAT
                    $ringkasanCard = $item->ringkasan ?? '-';  // Tampil di Cover Kartu (Taman Nasional, dll)
                    $isiCerita     = $item->isi ?? '-';        // Tampil di dalam Overlay (Pada zaman dahulu...)
                    $tokoh         = $item->tokoh ?? '-';      // Tampil di dalam Overlay (Jalak Bali, dll)
                    $alur          = $item->alur ?? '-';       // Tampil di dalam Overlay
                    $moral         = $item->moral ?? '-';      // Tampil di dalam Overlay
                    $filosofi      = $item->filosofi ?? '-';   // Tampil di dalam Overlay

                    // Cek status bookmark riil dari database
                    $isSaved = auth()->check() && \App\Models\Bookmark::where('user_id', auth()->id())
                        ->where('item_title', $judulSatua)
                        ->exists();
                @endphp

                <div class="group bg-[#24170D] rounded-lg overflow-hidden border border-[#3E2D1E] transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:border-[#C58A3C] flex flex-col justify-between relative cursor-pointer">

                    <!-- AREA KLIK DETAIL (MENGGUNAKAN DATASET) -->
                    <div onclick="openSatuaCard(this)"
                        data-nama="{{ $judulSatua }}"
                        data-latin="{{ $subJudul }}"
                        data-img="{{ $gambarUrl }}"
                        data-isi="{{ $isiCerita }}"
                        data-tokoh="{{ $tokoh }}"
                        data-alur="{{ $alur }}"
                        data-moral="{{ $moral }}"
                        data-filosofi="{{ $filosofi }}"
                        class="cursor-pointer flex-grow flex flex-col justify-between">
                        <div>
                            <div class="relative overflow-hidden">
                                <img src="{{ $gambarUrl }}"
                                    class="w-full h-48 sm:h-56 object-cover transition-transform duration-700 group-hover:scale-110"
                                    alt="{{ $judulSatua }}">
                                <div class="absolute inset-0 bg-black/30 transition-all duration-500 group-hover:bg-black/45"></div>

                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 z-10">
                                    <span class="bg-[#F7F0E7] text-[#6F4B2A] px-3.5 sm:px-4 py-1.5 sm:py-2 rounded-full text-[11px] sm:text-xs font-semibold flex items-center gap-2 shadow-lg">
                                        <i data-feather="info" class="w-3 h-3"></i> DETAIL
                                    </span>
                                </div>
                            </div>

                            <div class="p-5 sm:p-6 pb-0">
                                <h3 style="font-family:'Cormorant Garamond',serif;"
                                    class="text-2xl sm:text-4xl text-white font-bold mb-1 leading-tight">
                                    {{ $judulSatua }}
                                </h3>
                                @if(!empty($subJudul))
                                    <p class="text-[#8F7A61] italic text-xs sm:text-sm">
                                        {{ $subJudul }}
                                    </p>
                                @endif
                                <!-- Tampil Ringkasan di Cover Kartu -->
                                <p class="text-[#C7B39A] mt-3 sm:mt-4 text-xs sm:text-base leading-relaxed sm:leading-7 line-clamp-3">
                                    {{ $ringkasanCard }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- AREA FOOTER & BOOKMARK -->
                    <div class="p-5 sm:p-6 pt-0 mt-4 sm:mt-6">
                        <div class="pt-3 sm:pt-4 border-t border-[#3E2D1E] flex items-center justify-between min-h-[40px]">
                            <div onclick="openSatuaCard(this.parentElement.parentElement.parentElement.firstElementChild)"
                                class="flex items-center gap-2 opacity-100 sm:opacity-0 group-hover:opacity-100 transition-opacity duration-500 cursor-pointer">
                                <span class="text-[10px] sm:text-xs tracking-[1.5px] sm:tracking-[2px] uppercase text-[#C58A3C] font-semibold">
                                    Baca Selengkapnya
                                </span>
                                <i data-feather="arrow-right" class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-[#C58A3C]"></i>
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
                <div class="col-span-full py-12 text-center text-[#B9986D] text-xs sm:text-base">
                    Belum ada Satua Bali yang terverifikasi.
                </div>
            @endforelse

        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- DRAWER & OVERLAY (DETAIL SATUA BALI)       -->
<!-- ========================================== -->
<div id="overlaySatua" onclick="closeSatua()" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden z-[100] cursor-pointer">
    
    <div id="panelSatua" onclick="event.stopPropagation()"
        class="absolute right-0 top-0 w-full sm:w-[500px] md:w-[42%] max-w-full h-full bg-[#F8F0E5] overflow-y-auto translate-x-full transition-all duration-500 shadow-2xl cursor-default">
        
        <button onclick="closeSatua()"
            class="absolute top-4 right-4 sm:top-5 sm:right-5 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-[#EBD9BF] hover:bg-[#D4A64A] transition font-bold text-base sm:text-lg z-20 text-[#5F4B3A] cursor-pointer">
            ✕
        </button>

        <div class="relative">
            <img id="satuaImage" class="w-full h-48 sm:h-64 object-cover">
            <div class="absolute inset-0 bg-black/35"></div>
            <div class="absolute bottom-5 left-5 right-5 sm:bottom-8 sm:left-8 sm:right-8">
                <h2 id="satuaNama" class="text-white text-3xl sm:text-5xl font-bold mt-2 sm:mt-4 leading-tight" style="font-family:'Cormorant Garamond',serif;"></h2>
                <p id="satuaLatin" class="text-gray-300 italic text-xs sm:text-sm"></p>
            </div>
        </div>

        <div class="p-5 sm:p-8 space-y-6 sm:space-y-8">
            <!-- ISI CERITA UTAMA DI DALAM OVERLAY -->
            <div class="border-l-2 border-[#C58A3C] pl-3.5 sm:pl-4">
                <h5 class="uppercase tracking-[3px] sm:tracking-[4px] text-[10px] sm:text-xs text-[#C58A3C] font-bold">Isi Cerita</h5>
                <p id="satuaIsi" class="mt-1.5 sm:mt-2 text-[#5F4B3A] text-xs sm:text-base leading-relaxed sm:leading-8 whitespace-pre-line"></p>
            </div>

            <div class="border-l-2 border-[#8B5E3C] pl-3.5 sm:pl-4">
                <h5 class="uppercase tracking-[3px] sm:tracking-[4px] text-[10px] sm:text-xs text-[#8B5E3C] font-bold">Tokoh Utama</h5>
                <p id="satuaTokoh" class="mt-1.5 sm:mt-2 text-[#5F4B3A] text-xs sm:text-base leading-relaxed sm:leading-8 whitespace-pre-line"></p>
            </div>

            <div class="border-l-2 border-[#D4A64A] pl-3.5 sm:pl-4">
                <h5 class="uppercase tracking-[3px] sm:tracking-[4px] text-[10px] sm:text-xs text-[#D4A64A] font-bold">Alur Cerita</h5>
                <p id="satuaAlur" class="mt-1.5 sm:mt-2 text-[#5F4B3A] text-xs sm:text-base leading-relaxed sm:leading-8 whitespace-pre-line"></p>
            </div>

            <div class="border-l-2 border-[#2E8B57] pl-3.5 sm:pl-4">
                <h5 class="uppercase tracking-[3px] sm:tracking-[4px] text-[10px] sm:text-xs text-[#2E8B57] font-bold">Nilai Moral</h5>
                <p id="satuaMoral" class="mt-1.5 sm:mt-2 text-[#5F4B3A] text-xs sm:text-base leading-relaxed sm:leading-8 whitespace-pre-line"></p>
            </div>

            <div class="border-l-2 border-[#A63C2F] pl-3.5 sm:pl-4">
                <h5 class="uppercase tracking-[3px] sm:tracking-[4px] text-[10px] sm:text-xs text-[#A63C2F] font-bold">Pesan Filosofi</h5>
                <p id="satuaFilosofi" class="mt-1.5 sm:mt-2 text-[#5F4B3A] text-xs sm:text-base leading-relaxed sm:leading-8 whitespace-pre-line"></p>
            </div>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- SCRIPT JS CONTROLLER                       -->
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

        const itemUrl = "{{ url('/') }}?open=" + encodeURIComponent(title) + "#sectionSatua";

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

    // Open Drawer Satua via Dataset HTML (Mengambil data-isi untuk isi cerita)
    function openSatuaCard(element) {
        if (!element) return;
        const card = element.closest('[data-nama]') || element;
        const ds = card.dataset;

        if (!ds || !ds.nama) return;

        if (document.getElementById("satuaNama")) document.getElementById("satuaNama").innerText = ds.nama || '-';
        if (document.getElementById("satuaLatin")) document.getElementById("satuaLatin").innerText = ds.latin || '';
        if (document.getElementById("satuaImage")) document.getElementById("satuaImage").src = ds.img || '';

        if (document.getElementById("satuaIsi")) document.getElementById("satuaIsi").innerText = ds.isi || '-';
        if (document.getElementById("satuaTokoh")) document.getElementById("satuaTokoh").innerText = ds.tokoh || '-';
        if (document.getElementById("satuaAlur")) document.getElementById("satuaAlur").innerText = ds.alur || '-';
        if (document.getElementById("satuaMoral")) document.getElementById("satuaMoral").innerText = ds.moral || '-';
        if (document.getElementById("satuaFilosofi")) document.getElementById("satuaFilosofi").innerText = ds.filosofi || '-';

        // KUNCI SCROLL HALAMAN
        document.body.style.overflow = "hidden";
        document.documentElement.style.overflow = "hidden";

        const overlay = document.getElementById("overlaySatua");
        const panel = document.getElementById("panelSatua");

        if (overlay) overlay.classList.remove("hidden");
        setTimeout(() => {
            if (panel) panel.classList.remove("translate-x-full");
        }, 10);
    }

    // CLOSE DRAWER SATUA & BUANG KUNCI SCROLL
    function closeSatua() {
        const overlay = document.getElementById("overlaySatua");
        const panel = document.getElementById("panelSatua");

        if (panel) panel.classList.add("translate-x-full");

        // MEMBUKA KUNCI SCROLL
        document.body.style.removeProperty("overflow");
        document.body.style.overflow = "auto";
        document.documentElement.style.removeProperty("overflow");
        document.documentElement.style.overflow = "auto";

        setTimeout(() => {
            if (overlay) overlay.classList.add("hidden");
        }, 300);
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
                const cards = document.querySelectorAll('#sectionSatua [data-nama]');
                cards.forEach(card => {
                    const nama = card.dataset.nama ? card.dataset.nama.trim().toLowerCase() : '';
                    if (nama === decodedTitle || nama.includes(decodedTitle)) {
                        openSatuaCard(card);
                    }
                });
            }, 400);
        }
    });
</script>