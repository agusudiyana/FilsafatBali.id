@extends('penulis.layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        
        <!-- Header Halaman -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 border-b border-[#E6D5B8] pb-6">
            <div>
                <span class="text-xs font-semibold tracking-widest text-[#C48D2D] uppercase">Aktivitas Penulis</span>
                <h1 class="text-3xl font-bold font-serif text-[#2C221E] mt-1">
                    Riwayat Kiriman
                </h1>
                <p class="text-[#6B635B] text-sm mt-1">
                    Pantau seluruh riwayat dan status verifikasi dari semua jenis konten yang telah Anda kontribusikan.
                </p>
            </div>
        </div>

        <!-- Filter & Search Section -->
        <div class="flex flex-col sm:flex-row gap-3 mb-6 justify-between items-center">
            <!-- Input Search -->
            <div class="relative w-full sm:w-80">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                    <i data-feather="search" class="w-4 h-4"></i>
                </div>
                <input type="text" id="searchInput" placeholder="Cari berdasarkan huruf depan..."
                    class="w-full pl-9 pr-4 py-2.5 bg-white border border-[#E6D5B8] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C48D2D] focus:border-[#C48D2D] text-[#2C221E] placeholder-gray-400 shadow-sm transition">
            </div>

            <!-- Dropdown Filter Kategori -->
            <div class="w-full sm:w-56">
                <select id="categoryFilter"
                    class="w-full px-4 py-2.5 bg-white border border-[#E6D5B8] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C48D2D] focus:border-[#C48D2D] text-[#2C221E] shadow-sm transition cursor-pointer">
                    <option value="all">Semua Kategori</option>
                    <option value="Artikel">Artikel</option>
                    <option value="Filsafat">Filsafat</option>
                    <option value="Cecimpedan">Cecimpedan</option>
                    <option value="Satua Bali">Satua Bali</option>
                    <option value="Istilah Bali">Istilah Bali</option>
                </select>
            </div>
        </div>

        <!-- Tabel Data Riwayat Kiriman (Header Terkunci 100%) -->
        <div class="bg-white rounded-2xl shadow-sm border border-[#E6D5B8]/60 overflow-hidden">
            <div class="max-h-[calc(100vh-320px)] overflow-y-auto">
                <table class="w-full text-left border-collapse table-fixed relative" id="historyTable">
                    
                    <!-- Header Judul Kolom Terkunci Murni di Atas -->
                    <thead class="bg-[#FBF9F5] text-[#2C221E] uppercase text-xs tracking-wider border-b border-[#E6D5B8] sticky top-0 z-20 shadow-sm">
                        <tr>
                            <th class="p-4 font-semibold w-16 text-center bg-[#FBF9F5]">No</th>
                            <th class="p-4 font-semibold w-40 bg-[#FBF9F5]">Jenis Kiriman</th>
                            <th class="p-4 font-semibold w-auto bg-[#FBF9F5]">Judul / Istilah</th>
                            <th class="p-4 font-semibold w-48 text-center bg-[#FBF9F5]">Status Verifikasi</th>
                        </tr>
                    </thead>
                    
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @php $no = 1; @endphp

                        {{-- Loop Data Artikel --}}
                        @if(isset($artikel))
                            @foreach($artikel as $item)
                                <tr class="data-row hover:bg-[#FBF9F5]/60 transition" data-category="Artikel">
                                    <td class="p-4 font-medium text-gray-500 text-center">{{ $no++ }}</td>
                                    <td class="p-4">
                                        <span class="bg-[#F3E7D0] text-[#2C221E] px-3 py-1 rounded-full text-xs font-medium inline-block">
                                            Artikel
                                        </span>
                                    </td>
                                    <td class="p-4 font-semibold text-[#2C221E] title-cell truncate">
                                        {{ $item->judul ?? '-' }}
                                    </td>
                                    <td class="p-4 text-center">
                                        @if ($item->status == 'pending')
                                            <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1 rounded-full text-xs font-semibold">
                                                <i data-feather="clock" class="w-3.5 h-3.5"></i> Pending
                                            </span>
                                        @elseif($item->status == 'disetujui')
                                            <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-semibold">
                                                <i data-feather="check-circle" class="w-3.5 h-3.5"></i> Disetujui
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 bg-rose-50 text-rose-700 border border-rose-200 px-3 py-1 rounded-full text-xs font-semibold">
                                                <i data-feather="x-circle" class="w-3.5 h-3.5"></i> Ditolak
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        {{-- Loop Data Filsafat --}}
                        @if(isset($filsafat))
                            @foreach($filsafat as $item)
                                <tr class="data-row hover:bg-[#FBF9F5]/60 transition" data-category="Filsafat">
                                    <td class="p-4 font-medium text-gray-500 text-center">{{ $no++ }}</td>
                                    <td class="p-4">
                                        <span class="bg-[#F3E7D0] text-[#2C221E] px-3 py-1 rounded-full text-xs font-medium inline-block">
                                            Filsafat
                                        </span>
                                    </td>
                                    <td class="p-4 font-semibold text-[#2C221E] title-cell truncate">
                                        {{ $item->judul ?? '-' }}
                                    </td>
                                    <td class="p-4 text-center">
                                        @if ($item->status == 'pending')
                                            <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1 rounded-full text-xs font-semibold">
                                                <i data-feather="clock" class="w-3.5 h-3.5"></i> Pending
                                            </span>
                                        @elseif($item->status == 'disetujui')
                                            <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-semibold">
                                                <i data-feather="check-circle" class="w-3.5 h-3.5"></i> Disetujui
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 bg-rose-50 text-rose-700 border border-rose-200 px-3 py-1 rounded-full text-xs font-semibold">
                                                <i data-feather="x-circle" class="w-3.5 h-3.5"></i> Ditolak
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        {{-- Loop Data Cecimpedan --}}
                        @if(isset($cecimpedan))
                            @foreach($cecimpedan as $item)
                                <tr class="data-row hover:bg-[#FBF9F5]/60 transition" data-category="Cecimpedan">
                                    <td class="p-4 font-medium text-gray-500 text-center">{{ $no++ }}</td>
                                    <td class="p-4">
                                        <span class="bg-[#F3E7D0] text-[#2C221E] px-3 py-1 rounded-full text-xs font-medium inline-block">
                                            Cecimpedan
                                        </span>
                                    </td>
                                    <td class="p-4 font-semibold text-[#2C221E] title-cell truncate">
                                        {{ $item->pertanyaan ?? $item->cecimpedan ?? $item->judul ?? '-' }}
                                    </td>
                                    <td class="p-4 text-center">
                                        @if ($item->status == 'pending')
                                            <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1 rounded-full text-xs font-semibold">
                                                <i data-feather="clock" class="w-3.5 h-3.5"></i> Pending
                                            </span>
                                        @elseif($item->status == 'disetujui')
                                            <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-semibold">
                                                <i data-feather="check-circle" class="w-3.5 h-3.5"></i> Disetujui
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 bg-rose-50 text-rose-700 border border-rose-200 px-3 py-1 rounded-full text-xs font-semibold">
                                                <i data-feather="x-circle" class="w-3.5 h-3.5"></i> Ditolak
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        {{-- Loop Data Satua --}}
                        @if(isset($satua))
                            @foreach($satua as $item)
                                <tr class="data-row hover:bg-[#FBF9F5]/60 transition" data-category="Satua Bali">
                                    <td class="p-4 font-medium text-gray-500 text-center">{{ $no++ }}</td>
                                    <td class="p-4">
                                        <span class="bg-[#F3E7D0] text-[#2C221E] px-3 py-1 rounded-full text-xs font-medium inline-block">
                                            Satua Bali
                                        </span>
                                    </td>
                                    <td class="p-4 font-semibold text-[#2C221E] title-cell truncate">
                                        {{ $item->judul ?? $item->nama_satua ?? $item->nama ?? '-' }}
                                    </td>
                                    <td class="p-4 text-center">
                                        @if ($item->status == 'pending')
                                            <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1 rounded-full text-xs font-semibold">
                                                <i data-feather="clock" class="w-3.5 h-3.5"></i> Pending
                                            </span>
                                        @elseif($item->status == 'disetujui')
                                            <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-semibold">
                                                <i data-feather="check-circle" class="w-3.5 h-3.5"></i> Disetujui
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 bg-rose-50 text-rose-700 border border-rose-200 px-3 py-1 rounded-full text-xs font-semibold">
                                                <i data-feather="x-circle" class="w-3.5 h-3.5"></i> Ditolak
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        {{-- Loop Data Istilah --}}
                        @if(isset($istilah))
                            @foreach($istilah as $item)
                                <tr class="data-row hover:bg-[#FBF9F5]/60 transition" data-category="Istilah Bali">
                                    <td class="p-4 font-medium text-gray-500 text-center">{{ $no++ }}</td>
                                    <td class="p-4">
                                        <span class="bg-[#F3E7D0] text-[#2C221E] px-3 py-1 rounded-full text-xs font-medium inline-block">
                                            Istilah Bali
                                        </span>
                                    </td>
                                    <td class="p-4 font-semibold text-[#2C221E] title-cell truncate">
                                        {{ $item->istilah ?? $item->nama_istilah ?? $item->judul ?? '-' }}
                                    </td>
                                    <td class="p-4 text-center">
                                        @if ($item->status == 'pending')
                                            <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1 rounded-full text-xs font-semibold">
                                                <i data-feather="clock" class="w-3.5 h-3.5"></i> Pending
                                            </span>
                                        @elseif($item->status == 'disetujui')
                                            <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-semibold">
                                                <i data-feather="check-circle" class="w-3.5 h-3.5"></i> Disetujui
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 bg-rose-50 text-rose-700 border border-rose-200 px-3 py-1 rounded-full text-xs font-semibold">
                                                <i data-feather="x-circle" class="w-3.5 h-3.5"></i> Ditolak
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        {{-- Row Pesan Jika Data Pencarian / Filter Tidak Ditemukan --}}
                        <tr id="noResultsRow" class="hidden">
                            <td colspan="4" class="text-center py-12 text-gray-400">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <i data-feather="search" class="w-8 h-8 stroke-1 text-gray-300"></i>
                                    <span class="text-base font-medium text-gray-500">Tidak ada riwayat yang sesuai.</span>
                                    <p class="text-xs text-gray-400">Coba kata kunci lain yang sesuai huruf awalannya.</p>
                                </div>
                            </td>
                        </tr>

                        {{-- Tampilan Saat Tidak Ada Data Sama Sekali dari Database --}}
                        @if((!isset($artikel) || $artikel->isEmpty()) && (!isset($filsafat) || $filsafat->isEmpty()) && (!isset($cecimpedan) || $cecimpedan->isEmpty()) && (!isset($satua) || $satua->isEmpty()) && (!isset($istilah) || $istilah->isEmpty()))
                            <tr>
                                <td colspan="4" class="text-center py-12 text-gray-400">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <i data-feather="history" class="w-10 h-10 stroke-1 text-gray-300"></i>
                                        <span class="text-base font-medium text-gray-500">Belum ada riwayat kiriman.</span>
                                        <p class="text-xs text-gray-400">Kontribusi yang Anda buat akan muncul di sini.</p>
                                    </div>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Script Filter & Inisialisasi Feather Icons -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Replace Feather Icons
            if (typeof feather !== 'undefined') {
                feather.replace();
            }

            // Elemen Filter
            const searchInput = document.getElementById('searchInput');
            const categoryFilter = document.getElementById('categoryFilter');
            const rows = document.querySelectorAll('.data-row');
            const noResultsRow = document.getElementById('noResultsRow');

            function filterTable() {
                const searchValue = searchInput.value.toLowerCase().trim();
                const selectedCategory = categoryFilter.value;
                let visibleCount = 0;

                rows.forEach(row => {
                    const titleText = row.querySelector('.title-cell').textContent.trim().toLowerCase();
                    const categoryText = row.getAttribute('data-category');

                    // Menggunakan startsWith() agar hanya mencocokkan huruf depannya saja
                    const matchesSearch = searchValue === '' || titleText.startsWith(searchValue);
                    const matchesCategory = (selectedCategory === 'all') || (categoryText === selectedCategory);

                    if (matchesSearch && matchesCategory) {
                        row.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        row.classList.add('hidden');
                    }
                });

                // Tampilkan baris "Tidak ditemukan" jika hasil pencarian kosong
                if (rows.length > 0 && visibleCount === 0) {
                    noResultsRow.classList.remove('hidden');
                } else {
                    noResultsRow.classList.add('hidden');
                }
            }

            // Event Listeners
            if (searchInput) searchInput.addEventListener('input', filterTable);
            if (categoryFilter) categoryFilter.addEventListener('change', filterTable);
        });
    </script>
@endsection