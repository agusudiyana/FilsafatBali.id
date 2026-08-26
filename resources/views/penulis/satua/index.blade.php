@extends('penulis.layouts.app')

@section('content')
<!-- Container Utama: Mengunci tinggi area konten agar halaman tidak memiliki scrollbar luar -->
<div class="max-w-7xl mx-auto px-4 py-4 flex flex-col h-[calc(100vh-100px)] text-[#1A110A]">

    <!-- HEADER HALAMAN & TOMBOL TAMBAH (DIAM DI TEMPAT / TIDAK DI-SCROLL) -->
    <div class="flex-none">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 border-b border-[#E6D5B8] pb-4">
            <div>
                <h1 class="text-3xl font-bold text-[#1A110A]">
                    Data Satua
                </h1>
                <p class="text-gray-500 text-sm mt-1">
                    Daftar Satua yang telah Anda kirim.
                </p>
            </div>

            <div class="flex items-center gap-3 w-full md:w-auto">
                <!-- Dropdown Filter Status (Filter JavaScript Instan) -->
                <div class="relative">
                    <select id="status-filter" onchange="filterSatuaByStatus()" class="text-xs font-semibold py-2.5 pl-3.5 pr-8 border border-[#E2D5C3] bg-white text-[#1A110A] rounded-xl focus:border-[#C38E2A] focus:ring-[#C38E2A]/20 cursor-pointer outline-none shadow-sm transition">
                        <option value="semua">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="disetujui">Disetujui</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>

                <!-- Tombol Tambah Satua -->
                <a href="{{ route('penulis.satua.create') }}"
                    class="bg-[#C48D2D] text-white px-5 py-2.5 rounded-xl hover:bg-[#b07c20] flex items-center gap-2 transition shadow-sm font-semibold shrink-0 text-xs">
                    <i data-feather="plus-circle" class="w-4 h-4"></i>
                    <span>Tambah Satua</span>
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-4 flex items-center gap-2 border border-green-200 text-sm font-medium shadow-sm">
                <i data-feather="check-circle" class="w-5 h-5"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-4 flex items-center gap-2 border border-red-200 text-sm font-medium shadow-sm">
                <i data-feather="alert-circle" class="w-5 h-5"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif
    </div>

    <!-- AREA TABEL PUTIH FULL -->
    <div class="bg-white flex-1 rounded-2xl shadow-sm border border-[#E6D5B8] overflow-hidden flex flex-col min-h-0">
        <div id="table-scroll-container" class="overflow-y-auto overflow-x-auto flex-1 bg-white">
            <table class="w-full text-left border-collapse bg-white">

                <!-- Header Tabel Terkunci di Atas -->
                <thead class="bg-white text-[#1A110A] font-bold text-sm border-b border-[#E6D5B8] sticky top-0 z-10 shadow-sm">
                    <tr class="bg-white">
                        <th class="p-4 bg-white">No</th>
                        <th class="p-4 bg-white">Judul</th>
                        <th class="p-4 bg-white">Tokoh</th>
                        <th class="p-4 bg-white">Asal</th>
                        <th class="p-4 bg-white">Status</th>
                        <th class="p-4 text-center bg-white">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 bg-white text-sm">
                    @forelse($satuas as $item)
                        @php
                            $statusNama = strtolower($item->status ?? 'pending');
                        @endphp
                        <tr class="satua-row bg-white hover:bg-[#FAF6F0] transition" data-status="{{ $statusNama }}">

                            <td class="p-4 font-medium text-gray-500 row-number">{{ $loop->iteration }}</td>

                            <td class="p-4 font-semibold text-[#1A110A]">{{ $item->judul }}</td>

                            <td class="p-4 text-gray-700">{{ $item->tokoh ?? '-' }}</td>

                            <td class="p-4 text-gray-700">{{ $item->asal ?? '-' }}</td>

                            <td class="p-4">
                                @if ($item->status == 'pending')
                                    <span class="inline-flex items-center gap-1 bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        <i data-feather="clock" class="w-3.5 h-3.5"></i>
                                        Pending
                                    </span>
                                @elseif($item->status == 'disetujui')
                                    <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        <i data-feather="check-circle" class="w-3.5 h-3.5"></i>
                                        Disetujui
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        <i data-feather="x-circle" class="w-3.5 h-3.5"></i>
                                        Ditolak
                                    </span>
                                @endif
                            </td>

                            <td class="p-4 text-center">
                                @if ($item->status == 'disetujui')
                                    <span class="text-xs text-gray-400 italic font-semibold">Terkunci (Disetujui)</span>
                                @else
                                    <div class="flex items-center justify-center gap-2">

                                        <!-- TOMBOL EDIT -->
                                        <a href="{{ route('penulis.satua.edit', $item->id) }}" title="Edit Data"
                                            class="bg-amber-500 hover:bg-amber-600 text-white p-2 rounded-xl transition shadow-sm inline-flex items-center justify-center">
                                            <i data-feather="edit-2" class="w-4 h-4"></i>
                                        </a>

                                        <!-- TOMBOL HAPUS -->
                                        <form action="{{ route('penulis.satua.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data satua ini?');"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Data"
                                                class="bg-rose-500 hover:bg-rose-600 text-white p-2 rounded-xl transition shadow-sm inline-flex items-center justify-center">
                                                <i data-feather="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>

                                    </div>
                                @endif
                            </td>

                        </tr>
                    @empty
                        <tr id="empty-database-row" class="bg-white">
                            <td colspan="6" class="text-center p-8 text-gray-500 bg-white">
                                <div class="flex flex-col items-center justify-center gap-2 bg-white">
                                    <i data-feather="inbox" class="w-8 h-8 text-gray-400"></i>
                                    <span>Belum ada data Satua.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                    <!-- Row khusus jika data hasil filter kosong -->
                    <tr id="no-filtered-data" class="hidden bg-white">
                        <td colspan="6" class="text-center p-8 text-gray-500 bg-white">
                            <div class="flex flex-col items-center justify-center gap-2 bg-white">
                                <i data-feather="search" class="w-8 h-8 text-gray-400"></i>
                                <span>Belum ada data Satua yang sesuai dengan filter status.</span>
                            </div>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>

</div>

<!-- Script Filter JS & Inisialisasi Feather Icons -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
        filterSatuaByStatus();
    });

    function filterSatuaByStatus() {
        const statusSelect = document.getElementById('status-filter');
        const selectedStatus = statusSelect ? statusSelect.value.toLowerCase() : 'semua';

        const rows = document.querySelectorAll('.satua-row');
        let visibleCount = 0;

        rows.forEach(row => {
            const rowStatus = (row.getAttribute('data-status') || '').trim().toLowerCase();

            if (selectedStatus === 'semua' || rowStatus === selectedStatus) {
                row.classList.remove('hidden');
                visibleCount++;

                // Re-index penomoran baris yang terlihat
                const numCell = row.querySelector('.row-number');
                if (numCell) numCell.textContent = visibleCount;
            } else {
                row.classList.add('hidden');
            }
        });

        // Tampilkan pesan kosong jika filter tidak menemukan data
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