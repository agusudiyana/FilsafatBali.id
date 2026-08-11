@extends('admin.layouts.app') {{-- Samakan nama path layout jika berbeda --}}

@section('content')
<div class="p-2 text-gray-800">
    
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Manajemen Pengguna</h1>
        <p class="text-sm text-gray-500">Kelola dan pantau seluruh akun terdaftar dengan peran Pengguna.</p>
    </div>

    <!-- Ringkasan Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex items-center gap-4">
            <div class="p-3 bg-blue-100 text-blue-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-500 font-medium uppercase tracking-wider">Total Pengguna</p>
                <h3 class="text-xl font-bold text-gray-800">{{ $pengguna->total() }} Akun</h3>
            </div>
        </div>
    </div>

    <!-- Tabel Container -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        
        <!-- Filter & Search Bar -->
        <div class="p-4 border-b border-gray-200 bg-gray-50/50 flex items-center justify-between gap-4">
            <div class="relative w-full max-w-xs">
                <input type="text" id="searchInput" placeholder="Cari berdasarkan huruf depan..." 
                       class="w-full pl-9 pr-4 py-2 bg-white border border-gray-300 rounded-lg text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse table-fixed">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-gray-500 uppercase text-xs font-semibold tracking-wider">
                        <th class="p-4 w-16 text-center">No</th>
                        <th class="p-4 w-auto">Pengguna</th>
                        <th class="p-4 w-64">Email</th>
                        <th class="p-4 w-32">Status</th>
                        <th class="p-4 w-44">Terdaftar Sejak</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="userTableBody">
                    @forelse ($pengguna as $index => $item)
                        <tr class="user-row hover:bg-blue-50/30 transition-colors">
                            <td class="p-4 text-sm text-gray-500 font-medium text-center">{{ $pengguna->firstItem() + $index }}</td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-800 font-bold flex items-center justify-center text-sm shrink-0">
                                        {{ strtoupper(substr($item->name, 0, 1)) }}
                                    </div>
                                    <span class="font-semibold text-gray-800 text-sm user-name truncate">{{ $item->name }}</span>
                                </div>
                            </td>
                            <td class="p-4 text-sm text-gray-600 truncate">{{ $item->email }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200 rounded-full inline-block">
                                    Aktif
                                </span>
                            </td>
                            <td class="p-4 text-sm text-gray-500">{{ $item->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-400 text-sm">
                                Belum ada data pengguna terdaftar.
                            </td>
                        </tr>
                    @endforelse

                    <!-- Pesan saat pencarian tidak cocok -->
                    <tr id="noResultsRow" class="hidden">
                        <td colspan="5" class="p-8 text-center text-gray-400 text-sm">
                            Pengguna dengan awalan nama tersebut tidak ditemukan.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 bg-gray-50">
            {{ $pengguna->links() }}
        </div>
    </div>

</div>

<!-- Script Filter Pencarian Awalan Huruf (StartsWith) -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById('searchInput');
        const userRows = document.querySelectorAll('.user-row');
        const noResultsRow = document.getElementById('noResultsRow');

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const keyword = this.value.toLowerCase().trim();
                let visibleCount = 0;

                userRows.forEach(row => {
                    const nameText = row.querySelector('.user-name').textContent.trim().toLowerCase();

                    // Menggunakan startsWith() agar hanya mencocokkan huruf depannya saja
                    if (keyword === '' || nameText.startsWith(keyword)) {
                        row.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        row.classList.add('hidden');
                    }
                });

                // Menampilkan/menyembunyikan pesan jika tidak ada hasil
                if (userRows.length > 0 && visibleCount === 0) {
                    noResultsRow.classList.remove('hidden');
                } else {
                    noResultsRow.classList.add('hidden');
                }
            });
        }
    });
</script>
@endsection