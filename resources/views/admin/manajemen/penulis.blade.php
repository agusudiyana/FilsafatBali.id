@extends('admin.layouts.app') {{-- Sesuaikan nama path layout jika berbeda (misal: layouts.admin) --}}

@section('content')
<div class="p-2 text-gray-800">
    
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Manajemen Penulis</h1>
        <p class="text-sm text-gray-500">Kelola dan pantau seluruh akun terdaftar dengan peran Penulis.</p>
    </div>

    <!-- Alert Notifikasi Flash Message -->
    @if (session('status'))
        <div class="mb-4 p-3.5 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 text-sm rounded-r-lg shadow-sm">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 p-3.5 bg-rose-50 border-l-4 border-rose-500 text-rose-800 text-sm rounded-r-lg shadow-sm">
            {{ session('error') }}
        </div>
    @endif

    <!-- Ringkasan Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex items-center gap-4">
            <div class="p-3 bg-amber-100 text-amber-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-500 font-medium uppercase tracking-wider">Total Penulis</p>
                <!-- PERBAIKAN DI SINI: Menggunakan count() agar tidak error -->
                <h3 class="text-xl font-bold text-gray-800">{{ count($penulis) }} Akun</h3>
            </div>
        </div>
    </div>

    <!-- Tabel Container -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        
        <!-- Filter & Search Bar -->
        <div class="p-4 border-b border-gray-200 bg-gray-50/50 flex flex-col sm:flex-row items-center justify-between gap-4">
            <!-- Search Input -->
            <div class="relative w-full max-w-xs">
                <input type="text" id="searchInput" placeholder="Cari berdasarkan huruf depan..." 
                       class="w-full pl-9 pr-4 py-2 bg-white border border-gray-300 rounded-lg text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all">
                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>

            <!-- Dropdown Filter Status -->
            <div class="w-full sm:w-48">
                <select id="statusFilter" class="w-full px-3 py-2 bg-white border border-gray-300 rounded-lg text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all cursor-pointer font-medium">
                    <option value="all">Semua Status</option>
                    <option value="1">Aktif</option>
                    <option value="0">Pending</option>
                    <option value="2">Ditolak</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse table-fixed">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-gray-500 uppercase text-xs font-semibold tracking-wider">
                        <th class="p-4 w-16 text-center">No</th>
                        <th class="p-4 w-auto">Penulis</th>
                        <th class="p-4 w-64">Email</th>
                        <th class="p-4 w-36">Status</th>
                        <th class="p-4 w-40">Terdaftar Sejak</th>
                        <th class="p-4 w-28 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="writerTableBody">
                    @forelse ($penulis as $index => $item)
                        <tr class="writer-row hover:bg-amber-50/30 transition-colors" data-status="{{ $item->is_verified ?? 0 }}">
                            <!-- Penomoran otomatis -->
                            <td class="p-4 text-sm text-gray-500 font-medium text-center number-cell">{{ $index + 1 }}</td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-800 font-bold flex items-center justify-center text-sm shrink-0">
                                        {{ strtoupper(substr($item->name, 0, 1)) }}
                                    </div>
                                    <span class="font-semibold text-gray-800 text-sm writer-name truncate">{{ $item->name }}</span>
                                </div>
                            </td>
                            <td class="p-4 text-sm text-gray-600 truncate">{{ $item->email }}</td>
                            
                            {{-- STATUS BERDASARKAN ANGKA KOLOM IS_VERIFIED (1=AKTIF, 2=DITOLAK, 0=PENDING) --}}
                            <td class="p-4">
                                @if($item->is_verified == 1)
                                    <span class="px-2.5 py-1 text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200 rounded-full inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Aktif
                                    </span>
                                @elseif($item->is_verified == 2)
                                    <span class="px-2.5 py-1 text-xs font-medium bg-rose-50 text-rose-700 border border-rose-200 rounded-full inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                        Ditolak
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200 rounded-full inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        Pending
                                    </span>
                                @endif
                            </td>

                            <td class="p-4 text-sm text-gray-500">{{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</td>
                            
                            {{-- AKSI SETUJUI DAN TOLAK --}}
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-1.5">
                                    <!-- Tombol Setujui -->
                                    <form action="{{ route('admin.penulis.setujui', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                onclick="return confirm('Apakah Anda yakin ingin menyetujui Penulis ini?')"
                                                title="Setujui Penulis (Aktif)"
                                                class="p-1.5 {{ $item->is_verified == 1 ? 'bg-emerald-100 text-emerald-400 cursor-not-allowed' : 'bg-emerald-500 hover:bg-emerald-600 text-white shadow-sm' }} rounded-lg transition-colors"
                                                {{ $item->is_verified == 1 ? 'disabled' : '' }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </button>
                                    </form>

                                    <!-- Tombol Tolak -->
                                    <form action="{{ route('admin.penulis.tolak', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                onclick="return confirm('Apakah Anda yakin ingin menolak Penulis ini?')"
                                                title="Tolak Penulis"
                                                class="p-1.5 {{ $item->is_verified == 2 ? 'bg-rose-100 text-rose-400 cursor-not-allowed' : 'bg-rose-500 hover:bg-rose-600 text-white shadow-sm' }} rounded-lg transition-colors"
                                                {{ $item->is_verified == 2 ? 'disabled' : '' }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-400 text-sm">
                                Belum ada data penulis terdaftar.
                            </td>
                        </tr>
                    @endforelse

                    <!-- Pesan saat pencarian/filter tidak cocok -->
                    <tr id="noResultsRow" class="hidden">
                        <td colspan="6" class="p-8 text-center text-gray-400 text-sm">
                            Penulis yang sesuai dengan kriteria filter tidak ditemukan.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Script Filter Pencarian & Status -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const writerRows = document.querySelectorAll('.writer-row');
        const noResultsRow = document.getElementById('noResultsRow');

        function filterTable() {
            const keyword = searchInput ? searchInput.value.toLowerCase().trim() : '';
            const selectedStatus = statusFilter ? statusFilter.value : 'all';
            let visibleCount = 0;

            writerRows.forEach(row => {
                const nameText = row.querySelector('.writer-name').textContent.trim().toLowerCase();
                const rowStatus = row.getAttribute('data-status');

                const matchesSearch = keyword === '' || nameText.startsWith(keyword);
                const matchesStatus = selectedStatus === 'all' || rowStatus === selectedStatus;

                if (matchesSearch && matchesStatus) {
                    row.classList.remove('hidden');
                    visibleCount++;
                    const numCell = row.querySelector('.number-cell');
                    if (numCell) numCell.textContent = visibleCount;
                } else {
                    row.classList.add('hidden');
                }
            });

            if (writerRows.length > 0 && visibleCount === 0) {
                noResultsRow.classList.remove('hidden');
            } else {
                noResultsRow.classList.add('hidden');
            }
        }

        if (searchInput) searchInput.addEventListener('input', filterTable);
        if (statusFilter) statusFilter.addEventListener('change', filterTable);
    });
</script>
@endsection