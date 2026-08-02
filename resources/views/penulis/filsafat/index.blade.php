@extends('penulis.layouts.app')

@section('content')
<div class="p-6 bg-[#F6F0E6] text-[#1A110A]">
    
    <!-- Header Section -->
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-3xl font-bold text-[#1A110A]">Data Filsafat</h1>
            <p class="text-sm text-[#7A6B5D] mt-1">Daftar Wawasan Filsafat yang telah Anda kirim.</p>
        </div>
        <a href="{{ route('penulis.filsafat.create') }}" 
           style="background-color: #C38E2A; color: #ffffff;"
           class="inline-flex items-center gap-2 px-5 py-2.5 font-semibold rounded-xl shadow-sm transition hover:opacity-90">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Tambah Filsafat
        </a>
    </div>

    <!-- Alert Notifikasi Hijau Soft -->
    @if(session('success'))
        <div style="background-color: #E6F4EA; border-color: #C3E6CB; color: #1E7E34;" 
             class="mb-6 p-4 rounded-xl border flex items-center gap-2.5 text-sm font-medium shadow-sm">
            <svg class="w-5 h-5 flex-shrink-0" style="color: #1E7E34;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Container Tabel Card -->
    <div style="background-color: #F8EFE3;" class="rounded-2xl shadow-sm border border-[#E2D5C3] overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <!-- Warna Header disamakan persis dengan Cecimpedan (#F8EFE3) -->
                <tr style="background-color: #F8EFE3;" class="text-[#1A110A] text-sm font-bold">
                    <th class="py-4 px-6 w-12">No</th>
                    <th class="py-4 px-6">Judul</th>
                    <th class="py-4 px-6">Kategori</th>
                    <th class="py-4 px-6">Status</th>
                    <th class="py-4 px-6 text-center w-36">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-[#E2D5C3] text-sm font-medium text-[#2D241E]">
                @forelse($filsafat as $index => $item)
                    <tr class="hover:bg-[#FAF6F0] transition">
                        <td class="py-4 px-6 text-[#1A110A]">
                            {{ $filsafat->firstItem() + $index }}
                        </td>

                        <td class="py-4 px-6 font-bold text-[#1A110A]">
                            <div>{{ $item->judul }}</div>
                            <div class="text-xs font-normal text-[#7A6B5D] line-clamp-1 mt-0.5">
                                {{ $item->deskripsi }}
                            </div>
                        </td>

                        <td class="py-4 px-6 text-[#1A110A]">
                            {{ $item->kategori ?? $item->fokus ?? '-' }}
                        </td>

                        <!-- Badge Status -->
                        <td class="py-4 px-6">
                            @if($item->status == 'disetujui')
                                <span style="background-color: #DCFCE7; color: #15803D;" 
                                      class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold rounded-full">
                                    <svg class="w-3.5 h-3.5" style="color: #15803D;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Disetujui
                                </span>
                            @elseif($item->status == 'ditolak')
                                <span style="background-color: #FEE2E2; color: #B91C1C;" 
                                      class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold rounded-full">
                                    <svg class="w-3.5 h-3.5" style="color: #B91C1C;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Ditolak
                                </span>
                            @else
                                <!-- Badge Pending Soft Kuning Kapsul -->
                                <span style="background-color: #FEF9C3; color: #A16207;" 
                                      class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold rounded-full">
                                    <svg class="w-3.5 h-3.5" style="color: #A16207;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Pending
                                </span>
                            @endif
                        </td>

                        <!-- Tombol Aksi -->
                        <td class="py-4 px-6 text-center">
                            @if($item->status == 'disetujui')
                                <span class="text-xs italic text-[#9C8C7C]">Terkunci (Disetujui)</span>
                            @else
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('penulis.filsafat.edit', $item->id) }}" 
                                       style="background-color: #D98200; color: #ffffff;"
                                       class="p-2 font-semibold rounded-xl shadow-sm transition hover:opacity-90 inline-block" 
                                       title="Edit Data">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.03H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </a>
                                    
                                    <form action="{{ route('penulis.filsafat.destroy', $item->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                style="background-color: #DC2626; color: #ffffff;"
                                                class="p-2 font-semibold rounded-xl shadow-sm transition hover:opacity-90"
                                                title="Hapus Data">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-[#8C7B6C]">
                            Belum ada data filsafat yang ditambahkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $filsafat->links() }}
    </div>
</div>
@endsection