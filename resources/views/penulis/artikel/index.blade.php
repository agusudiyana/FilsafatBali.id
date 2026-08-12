@extends('penulis.layouts.app')

@section('content')
    <!-- Container Utama: Mengunci tinggi area konten agar halaman tidak memiliki scrollbar luar -->
    <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col h-[calc(100vh-100px)]">
        
        <!-- HEADER HALAMAN & TAB KATEGORI (DIAM DI TEMPAT) -->
        <div class="flex-none">
            
            <!-- Header Halaman -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 border-b border-[#E6D5B8] pb-4">
                <div>
                    <span class="text-xs font-semibold tracking-widest text-[#C48D2D] uppercase">Manajemen Konten</span>
                    <h1 class="text-3xl font-bold font-serif text-[#2C221E] mt-1">
                        Daftar Artikel & Kiriman
                    </h1>
                    <p class="text-[#6B635B] text-sm mt-1">
                        Kelola, pantau status verifikasi, dan tambahkan kearifan lokal Bali Anda di sini.
                    </p>
                </div>

                <a href="{{ route('penulis.artikel.create') }}"
                    class="bg-[#C48D2D] hover:bg-[#A9781F] text-white px-5 py-3 rounded-xl flex items-center gap-2 shadow-md transition-all transform hover:-translate-y-0.5">
                    <i data-feather="plus-circle" class="w-5 h-5"></i>
                    <span class="font-medium">Tambah Artikel Baru</span>
                </a>
            </div>

            <!-- TAB FILTER KATEGORI LENGKAP DENGAN GARIS BAWAH (border-b border-[#E6D5B8]) -->
            <div class="flex flex-wrap items-center gap-2 pb-4 mb-4 border-b border-[#E6D5B8] w-full" id="category-tabs">
                <button onclick="filterCategory('semua', this)" 
                    class="tab-btn px-4 py-2 text-sm font-semibold text-white bg-[#2C221E] rounded-lg shadow-sm transition">
                    Semua
                </button>
                <button onclick="filterCategory('Ajaran Tertua', this)" 
                    class="tab-btn px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-[#E6D5B8]/40 rounded-lg transition">
                    Ajaran Tertua
                </button>
                <button onclick="filterCategory('Cecimpedan', this)" 
                    class="tab-btn px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-[#E6D5B8]/40 rounded-lg transition">
                    Cecimpedan
                </button>
                <button onclick="filterCategory('Satua Bali', this)" 
                    class="tab-btn px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-[#E6D5B8]/40 rounded-lg transition">
                    Satua Bali
                </button>
                <button onclick="filterCategory('Istilah Bali', this)" 
                    class="tab-btn px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-[#E6D5B8]/40 rounded-lg transition">
                    Istilah Bali
                </button>
            </div>

            @if (session('success'))
                <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-3 rounded-xl mb-4 flex items-center gap-3 shadow-sm">
                    <i data-feather="check-circle" class="w-5 h-5 text-emerald-600"></i>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            @endif

        </div>

        <!-- HANYA TABEL YANG BISA DI-SCROLL -->
        <div class="flex-1 bg-white rounded-2xl shadow-sm border border-[#E6D5B8]/60 overflow-hidden flex flex-col min-h-0">
            <div id="table-scroll-container" class="overflow-y-auto overflow-x-auto flex-1">
                <table class="w-full text-left border-collapse">
                    
                    <!-- Header Tabel Terkunci di Atas -->
                    <thead class="bg-[#FBF9F5] text-[#2C221E] uppercase text-xs tracking-wider border-b border-[#E6D5B8] sticky top-0 z-10">
                        <tr>
                            <th class="p-4 font-semibold">No</th>
                            <th class="p-4 font-semibold">Judul Artikel</th>
                            <th class="p-4 font-semibold">Kategori</th>
                            <th class="p-4 font-semibold">Status</th>
                            <th class="p-4 text-center font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody class="divide-y divide-[#E6D5B8]/40 text-sm">
                        @forelse($artikels as $a)
                            @php
                                $kategoriNama = $a->kategori ?? 'Ajaran Tertua';
                            @endphp
                            <tr class="article-row hover:bg-[#FBF9F5]/60 transition" data-category="{{ $kategoriNama }}">
                                <td class="p-4 font-medium text-gray-500">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="p-4 font-semibold text-[#2C221E]">
                                    {{ $a->judul }}
                                </td>
                                <td class="p-4">
                                    <span class="bg-[#F3E7D0] text-[#2C221E] px-3 py-1 rounded-full text-xs font-medium">
                                        {{ $kategoriNama }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    @if ($a->status == 'pending')
                                        <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="clock" class="w-3.5 h-3.5"></i> Pending
                                        </span>
                                    @elseif($a->status == 'disetujui')
                                        <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="check-circle" class="w-3.5 h-3.5"></i> Disetujui
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 bg-rose-50 text-rose-700 border border-rose-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="x-circle" class="w-3.5 h-3.5"></i> Ditolak
                                        </span>
                                    @endif
                                </td>
                                
                                <td class="p-4 text-center">
                                    @if($a->status == 'disetujui')
                                        <span class="text-xs text-gray-400 italic font-semibold block leading-tight">
                                            Terkunci<br><span class="text-[11px] font-normal">(Disetujui)</span>
                                        </span>
                                    @else
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('penulis.artikel.edit', $a->id) }}" title="Edit Artikel"
                                                class="bg-amber-500 hover:bg-amber-600 text-white p-2 rounded-lg transition shadow-sm">
                                                <i data-feather="edit-2" class="w-4 h-4"></i>
                                            </a>

                                            <form action="{{ route('penulis.artikel.destroy', $a->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Hapus Artikel"
                                                    class="bg-rose-500 hover:bg-rose-600 text-white p-2 rounded-lg transition shadow-sm">
                                                    <i data-feather="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr id="empty-database-row">
                                <td colspan="5" class="text-center py-12 text-gray-400">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <i data-feather="inbox" class="w-10 h-10 stroke-1 text-gray-300"></i>
                                        <span class="text-base font-medium text-gray-500">Belum ada data artikel yang dikirimkan.</span>
                                        <p class="text-xs text-gray-400">Mulai buat kontribusi budaya pertama Anda sekarang.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                        <!-- Row khusus ketika filter tidak menemukan data -->
                        <tr id="no-filtered-data" class="hidden">
                            <td colspan="5" class="text-center py-12 text-gray-400">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <i data-feather="search" class="w-10 h-10 stroke-1 text-gray-300"></i>
                                    <span class="text-base font-medium text-gray-500">Tidak ada artikel dalam kategori ini.</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Script Filter Tab Kategori -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });

        function filterCategory(category, selectedBtn) {
            // 1. Reset styling semua tombol filter
            const buttons = document.querySelectorAll('.tab-btn');
            buttons.forEach(btn => {
                btn.className = "tab-btn px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-[#E6D5B8]/40 rounded-lg transition";
            });

            // 2. Beri styling aktif pada tombol yang sedang diklik
            selectedBtn.className = "tab-btn px-4 py-2 text-sm font-semibold text-white bg-[#2C221E] rounded-lg shadow-sm transition";

            // 3. Filter baris data tabel
            const rows = document.querySelectorAll('.article-row');
            let visibleCount = 0;

            rows.forEach(row => {
                const rowCategory = row.getAttribute('data-category');
                
                if (category === 'semua' || (rowCategory && rowCategory.trim().toLowerCase() === category.trim().toLowerCase())) {
                    row.classList.remove('hidden');
                    visibleCount++;
                } else {
                    row.classList.add('hidden');
                }
            });

            // 4. Reset posisi scroll tabel ke paling atas saat pindah tab
            const scrollContainer = document.getElementById('table-scroll-container');
            if (scrollContainer) {
                scrollContainer.scrollTop = 0;
            }

            // 5. Tampilkan indikator jika kategori tidak memiliki artikel
            const noDataRow = document.getElementById('no-filtered-data');
            if (noDataRow) {
                if (visibleCount === 0 && rows.length > 0) {
                    noDataRow.classList.remove('hidden');
                } else {
                    noDataRow.classList.add('hidden');
                }
            }
        }
    </script>
@endsection