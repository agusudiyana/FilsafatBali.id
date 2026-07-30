@extends('admin.layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        
        <!-- Header Halaman -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 border-b border-[#E6D5B8] pb-6">
            <div>
                <span class="text-xs font-semibold tracking-widest text-[#C48D2D] uppercase">Manajemen Konten Admin</span>
                <h1 class="text-3xl font-bold font-serif text-[#2C221E] mt-1">
                    Daftar Artikel & Kiriman
                </h1>
                <p class="text-[#6B635B] text-sm mt-1">
                    Kelola, pantau status verifikasi, dan sesuaikan seluruh kontribusi artikel di sini.
                </p>
            </div>

            <a href="{{ route('ajaran.create') }}"
                class="bg-[#C48D2D] hover:bg-[#A9781F] text-white px-5 py-3 rounded-xl flex items-center gap-2 shadow-md transition-all transform hover:-translate-y-0.5">
                <i data-feather="plus-circle" class="w-5 h-5"></i>
                <span class="font-medium">Tambah Artikel Baru</span>
            </a>
        </div>

        <!-- Filter Kategori (Tab Navigasi) -->
        <div class="flex flex-wrap gap-2 mb-6 border-b border-gray-200 pb-3">
            <button onclick="filterCategory('semua', this)" 
                class="tab-btn px-4 py-2 text-sm font-semibold text-white bg-[#2C221E] rounded-lg shadow-sm transition">
                Semua
            </button>
            <button onclick="filterCategory('Ajaran Tertua', this)" 
                class="tab-btn px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-gray-100 rounded-lg transition">
                Ajaran Tertua
            </button>
            <button onclick="filterCategory('Cecimpedan', this)" 
                class="tab-btn px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-gray-100 rounded-lg transition">
                Cecimpedan
            </button>
            <button onclick="filterCategory('Satua Bali', this)" 
                class="tab-btn px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-gray-100 rounded-lg transition">
                Satua Bali
            </button>
            <button onclick="filterCategory('Istilah Bali', this)" 
                class="tab-btn px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-gray-100 rounded-lg transition">
                Istilah Bali
            </button>
        </div>

        @if (session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-xl mb-6 flex items-center gap-3 shadow-sm">
                <i data-feather="check-circle" class="w-5 h-5 text-emerald-600"></i>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Tabel Data -->
        <div class="bg-white rounded-2xl shadow-sm border border-[#E6D5B8]/60 overflow-hidden">
            <div class="overflow-x-auto">
                <!-- Tambahkan table-fixed agar ukuran kolom terkunci dan tidak bergeser -->
                <table class="w-full text-left border-collapse table-fixed">
                    <thead class="bg-[#FBF9F5] text-[#2C221E] uppercase text-xs tracking-wider border-b border-[#E6D5B8]">
                        <tr>
                            <!-- Lebar setiap kolom ditentukan di sini (Total 100%) -->
                            <th class="p-4 font-semibold w-[8%]">NO</th>
                            <th class="p-4 font-semibold w-[37%]">JUDUL ARTIKEL</th>
                            <th class="p-4 font-semibold w-[20%]">KATEGORI</th>
                            <th class="p-4 font-semibold w-[18%]">STATUS</th>
                            <th class="p-4 text-center font-semibold w-[17%]">AKSI VERIFIKASI</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#E6D5B8]/40 text-sm">
                        @forelse($ajarans as $a)
                            @php
                                $kategoriNama = $a->kategori ?? 'Ajaran Tertua';
                            @endphp
                            <tr class="article-row hover:bg-[#FBF9F5]/60 transition border-b border-[#E6D5B8]/30" data-category="{{ $kategoriNama }}">
                                <!-- NO -->
                                <td class="p-4 font-medium text-gray-500">
                                    {{ $loop->iteration }}
                                </td>
                                
                                <!-- Judul Artikel -->
                                <td class="p-4 font-semibold text-[#2C221E] truncate">
                                    {{ $a->judul }}
                                </td>
                                
                                <!-- Kategori Artikel (Pill Badge) -->
                                <td class="p-4">
                                    <span class="bg-[#F3E7D0] text-[#2C221E] px-3.5 py-1.5 rounded-full text-xs font-medium inline-block">
                                        {{ $kategoriNama }}
                                    </span>
                                </td>
                                
                                <!-- Status Artikel -->
                                <td class="p-4">
                                    @if ($a->status == 'pending')
                                        <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="clock" class="w-3.5 h-3.5"></i> Pending
                                        </span>
                                    @elseif($a->status == 'disetujui' || $a->status == 'publish')
                                        <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="check-circle" class="w-3.5 h-3.5"></i> Disetujui
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 bg-rose-50 text-rose-700 border border-rose-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="x-circle" class="w-3.5 h-3.5"></i> Ditolak
                                        </span>
                                    @endif
                                </td>
                                
                                <!-- Tombol Aksi Edit & Hapus -->
                                <td class="p-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('ajaran.edit', $a->id) }}" title="Edit Artikel"
                                            class="bg-amber-500 hover:bg-amber-600 text-white p-2 rounded-xl transition shadow-sm">
                                            <i data-feather="edit-2" class="w-4 h-4"></i>
                                        </a>

                                        <form action="{{ route('ajaran.destroy', $a->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Artikel"
                                                class="bg-rose-500 hover:bg-rose-600 text-white p-2 rounded-xl transition shadow-sm">
                                                <i data-feather="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr id="empty-database-row">
                                <td colspan="5" class="text-center py-12 text-gray-400">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <i data-feather="inbox" class="w-10 h-10 stroke-1 text-gray-300"></i>
                                        <span class="text-base font-medium text-gray-500">Belum ada data artikel.</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                        <!-- Baris Tambahan saat Filter Tidak Menemukan Data -->
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

    <!-- Script Interaktif Filter Tab -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });

        function filterCategory(category, selectedBtn) {
            // Reset style semua tombol
            const buttons = document.querySelectorAll('.tab-btn');
            buttons.forEach(btn => {
                btn.className = "tab-btn px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-gray-100 rounded-lg transition";
            });

            // Beri style aktif untuk tombol terpilih
            selectedBtn.className = "tab-btn px-4 py-2 text-sm font-semibold text-white bg-[#2C221E] rounded-lg shadow-sm transition";

            // Filter baris berdasarkan kategori
            const rows = document.querySelectorAll('.article-row');
            let visibleCount = 0;

            rows.forEach(row => {
                const rowCategory = row.getAttribute('data-category');
                
                if (category === 'semua' || rowCategory === category) {
                    row.classList.remove('hidden');
                    visibleCount++;
                } else {
                    row.classList.add('hidden');
                }
            });

            // Tampilkan pesan kosong jika tidak ada data pada kategori tersebut
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