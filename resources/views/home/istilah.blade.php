<!-- ========================================== -->
<!-- SECTION ISTILAH BALI                      -->
<!-- ========================================== -->
<section id="sectionIstilah" class="bg-[#1A110A] py-24 hidden">

    <div class="max-w-7xl mx-auto px-8">

        <!-- Header Istilah -->
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

            <!-- Tab Istilah -->
            <div class="flex border border-[#6E4E1E] rounded-lg overflow-hidden shrink-0 mt-2">
                <button id="btnSatua" onclick="showSatua()"
                    class="w-36 md:w-40 py-3 bg-transparent text-[#C58A3C] uppercase tracking-[2px] text-xs font-semibold text-center shrink-0 transition-all">
                    SATUA BALI
                </button>

                <button id="btnIstilah" onclick="showIstilah()"
                    class="w-36 md:w-40 py-3 bg-[#C58A3C] text-white uppercase tracking-[2px] text-xs font-semibold text-center shrink-0 transition-all">
                    ISTILAH BALI
                </button>
            </div>

        </div>

        <!-- Search Input khusus Cari Judul saja -->
        <div class="mb-10 relative max-w-md">

            <input id="searchIstilahInput" type="text" placeholder="Cari judul istilah..."
                oninput="filterIstilahList(this.value)"
                class="w-full
                bg-transparent
                border border-[#3E2D1E]
                rounded-md
                px-5 py-3 pr-10
                text-[#D8C7AE]
                placeholder:text-[#6E5B45]
                outline-none
                focus:border-[#C48D2D] transition duration-200">

            <button id="btnClearSearchIstilah" onclick="clearSearchIstilah()"
                class="hidden absolute right-3 top-1/2 -translate-y-1/2 text-[#6E5B45] hover:text-[#D8C7AE] transition font-bold">
                ✕
            </button>

        </div>

        <!-- LIST ISTILAH (DARI DATABASE) -->
        <div id="listIstilahContainer" class="divide-y divide-[#3E2D1E]">

            @forelse($istilahs as $item)
                <div onclick="openIstilah(
                    '{{ addslashes($item->istilah ?? ($item->judul ?? '-')) }}',
                    '{{ addslashes($item->kategori ?? 'Umum') }}',
                    '{{ addslashes($item->arti ?? ($item->definisi ?? '-')) }}',
                    '{{ addslashes($item->sejarah ?? ($item->penjelasan ?? '-')) }}',
                    '{{ addslashes($item->contoh_penggunaan ?? ($item->contoh ?? '-')) }}',
                    '{{ addslashes($item->padanan_kata ?? ($item->keterangan ?? '-')) }}'
                    )"
                    class="item-istilah grid grid-cols-[170px_120px_1fr] py-6 items-center cursor-pointer hover:bg-[#2A1A10] hover:px-4 transition-all duration-300 rounded-lg">

                    <h3 class="text-white text-4xl font-bold" style="font-family:'Cormorant Garamond',serif;">
                        {{ $item->istilah ?? ($item->judul ?? '-') }}
                    </h3>

                    <span class="text-[10px] uppercase tracking-[2px] border border-[#6A5135] text-[#C89438] rounded px-3 py-1 w-fit">
                        {{ $item->kategori ?? 'Umum' }}
                    </span>

                    <p class="text-[#C8B299] leading-8 line-clamp-2">
                        {{ $item->arti ?? ($item->definisi ?? '-') }}
                    </p>

                </div>
            @empty
                <div class="py-12 text-center text-[#B9986D]">
                    Belum ada Istilah Bali yang terverifikasi / disetujui.
                </div>
            @endforelse

        </div>

    </div>

</section>

<!-- Overlay -->
<div id="overlay" onclick="closeDetail()" class="fixed inset-0 bg-black/60 hidden z-40">
</div>

<!-- Panel Detail -->
<div id="detailPanel"
    class="fixed top-0 right-0 w-[520px] max-w-full h-full
        bg-[#F6E9D7]
        shadow-2xl
        translate-x-full
        transition-all duration-500
        z-50
        overflow-y-auto">

    <div class="p-8">

        <!-- tombol tutup -->
        <button onclick="closeDetail()"
            class="absolute top-5 right-5
                w-10 h-10 rounded-full
                bg-[#E8D6BD]
                hover:bg-[#D8C3A3]
                flex items-center justify-center font-bold text-[#5C4836] transition">
            ✕
        </button>

        <!-- Judul -->
        <h2 id="detailTitle" style="font-family:'Cormorant Garamond',serif;" class="text-6xl font-bold text-[#24160E]">
            -
        </h2>

        <!-- Kategori -->
        <span id="detailKategori"
            class="inline-block mt-4
                border border-[#C79A4A]
                text-[#B57D27]
                uppercase
                tracking-[2px]
                text-[11px]
                px-3 py-1 rounded">
            -
        </span>

        <!-- Deskripsi / Arti -->
        <p id="detailDesc" class="mt-8 text-[#675A4D] leading-10 text-[18px]">
            -
        </p>

        <!-- Sejarah -->
        <div class="mt-10">
            <p class="uppercase tracking-[4px] text-[11px] text-[#C58A3C] font-semibold">
                SEJARAH
            </p>
            <div id="detailSejarah" class="mt-4 text-[#675A4D] leading-9">
                -
            </div>
        </div>

        <hr class="my-8 border-[#E5D6BF]">

        <!-- Contoh -->
        <p class="uppercase text-xs tracking-[3px] text-[#B7832E] font-semibold">
            Contoh Penggunaan
        </p>

        <div class="mt-3 bg-[#F1DFC3] border border-[#D7BE99] rounded-lg p-5">
            <p id="detailContoh" class="italic text-[#5D4937]">
                -
            </p>
        </div>

        <!-- Padanan -->
        <p class="uppercase text-xs tracking-[3px] text-[#B7832E] font-semibold mt-8">
            Padanan Kata
        </p>

        <p id="detailPadanan" class="mt-3 text-[#5C4836]">
            -
        </p>

    </div>

</div>

<!-- SCRIPT PENCARIAN KHUSUS JUDUL & OPERASIONAL MODAL -->
<script>
    // 1. Fungsi Pencarian Khusus Judul (Tag <h3>)
    function filterIstilahList(keyword) {
        const query = keyword.trim().toLowerCase();
        const btnClear = document.getElementById("btnClearSearchIstilah");

        if (btnClear) {
            if (query.length > 0) {
                btnClear.classList.remove("hidden");
            } else {
                btnClear.classList.add("hidden");
            }
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
</script>