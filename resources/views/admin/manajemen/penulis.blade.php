@extends('admin.layouts.app') {{-- Sesuaikan nama path layout jika berbeda (misal: layouts.admin) --}}

@section('content')
<div class="p-2 text-gray-800">
    
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Manajemen Penulis</h1>
        <p class="text-sm text-gray-500">Kelola dan pantau seluruh akun terdaftar dengan peran Penulis.</p>
    </div>

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
                <h3 class="text-xl font-bold text-gray-800">{{ $penulis->total() }} Akun</h3>
            </div>
        </div>
    </div>

    <!-- Tabel Container -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        
        <!-- Filter & Search Bar -->
        <div class="p-4 border-b border-gray-200 bg-gray-50/50 flex items-center justify-between gap-4">
            <div class="relative w-full max-w-xs">
                <input type="text" placeholder="Cari penulis..." 
                       class="w-full pl-9 pr-4 py-2 bg-white border border-gray-300 rounded-lg text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all">
                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-gray-500 uppercase text-xs font-semibold tracking-wider">
                        <th class="p-4">No</th>
                        <th class="p-4">Penulis</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Terdaftar Sejak</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($penulis as $index => $item)
                        <tr class="hover:bg-amber-50/30 transition-colors">
                            <td class="p-4 text-sm text-gray-500 font-medium">{{ $penulis->firstItem() + $index }}</td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-800 font-bold flex items-center justify-center text-sm">
                                        {{ strtoupper(substr($item->name, 0, 1)) }}
                                    </div>
                                    <span class="font-semibold text-gray-800 text-sm">{{ $item->name }}</span>
                                </div>
                            </td>
                            <td class="p-4 text-sm text-gray-600">{{ $item->email }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200 rounded-full">
                                    Aktif
                                </span>
                            </td>
                            <td class="p-4 text-sm text-gray-500">{{ $item->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-400 text-sm">
                                Belum ada data penulis terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 bg-gray-50">
            {{ $penulis->links() }}
        </div>
    </div>

</div>
@endsection