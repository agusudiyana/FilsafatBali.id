@extends('penulis.layouts.app')

@section('content')
<!-- Container Utama: Mengunci tinggi area konten agar halaman tidak memiliki scrollbar luar -->
<div class="max-w-7xl mx-auto px-4 py-4 flex flex-col h-[calc(100vh-100px)] text-[#1A110A]">
    
    <!-- HEADER HALAMAN (DIAM DI TEMPAT / TIDAK DI-SCROLL) -->
    <div class="flex-none">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 border-b border-[#E2D5C3] pb-4">
            <div>
                <h1 class="text-3xl font-bold text-[#1A110A]">Data Cecimpedan</h1>
                <p class="text-sm text-[#7A6B5D] mt-1">Daftar Cecimpedan yang telah Anda kirim.</p>
            </div>

            <div class="flex items-center gap-3 w-full md:w-auto">
                <!-- Dropdown Filter Status -->
                <form method="GET" action="{{ route('penulis.cecimpedan.index') }}" class="flex items-center">
                    <select name="status" onchange="this.form.submit()" class="text-xs font-semibold py-2.5 pl-3.5 pr-8 border border-[#E2D5C3] bg-white text-[#1A110A] rounded-xl focus:border-[#C38E2A] focus:ring-[#C38E2A]/20 cursor-pointer outline-none shadow-sm transition">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </form>

                <!-- Tombol Tambah Cecimpedan -->
                <a href="{{ route('penulis.cecimpedan.create') }}" 
                   style="background-color: #C38E2A; color: #ffffff;"
                   class="inline-flex items-center gap-2 px-5 py-2.5 text-xs font-semibold rounded-xl shadow-sm transition hover:opacity-90 shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Tambah Cecimpedan
                </a>
            </div>
        </div>

        <!-- Alert Notifikasi Hijau Soft -->
        @if (session('success'))
            <div style="background-color: #E6F4EA; border-color: #C3E6CB; color: #1E7E34;" 
                 class="mb-4 p-4 rounded-xl border flex items-center gap-2.5 text-sm font-medium shadow-sm">
                <svg class="w-5 h-5 flex-shrink-0" style="color: #1E7E34;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif
    </div>

    <!-- AREA TABEL PUTIH FULL -->
    <div class="bg-white flex-1 rounded-2xl shadow-sm border border-[#E2D5C3] overflow-hidden flex flex-col min-h-0">
        <div id="table-scroll-container" class="overflow-y-auto overflow-x-auto flex-1 bg-white">
            <table class="w-full text-left border-collapse bg-white">
                <!-- Header Tabel Terkunci di Atas -->
                <thead class="sticky top-0 z-10 shadow-sm bg-white">
                    <tr class="text-[#1A110A] text-sm font-bold border-b border-[#E2D5C3] bg-white">
                        <th class="py-4 px-6 w-12 bg-white">No</th>
                        <th class="py-4 px-6 bg-white">Judul / Pertanyaan</th>
                        <th class="py-4 px-6 bg-white">Tingkat Kesulitan</th>
                        <th class="py-4 px-6 bg-white">Status</th>
                        <th class="py-4 px-6 text-center w-36 bg-white">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-[#E2D5C3] text-sm font-medium text-[#2D241E]">
                    @forelse($cecimpedans as $index => $item)
                        <tr class="hover:bg-[#FAF6F0] transition bg-white">
                            <td class="py-4 px-6 text-[#1A110A]">
                                {{ $loop->iteration }}
                            </td>

                            <!-- Menampilkan Judul / Pertanyaan Cecimpedan -->
                            <td class="py-4 px-6 font-bold text-[#1A110A]">
                                {{ $item->pertanyaan ?? $item->judul ?? $item->cecimpedan ?? $item->teka_teki ?? '-' }}
                            </td>

                            <!-- Menampilkan Tingkat Kesulitan -->
                            <td class="py-4 px-6 text-[#1A110A]">
                                {{ $item->tingkat_kesulitan ?? $item->kesulitan ?? $item->level ?? $item->kategori ?? $item->tingkat ?? '-' }}
                            </td>

                            <!-- Badge Status -->
                            <td class="py-4 px-6">
                                @if ($item->status == 'disetujui')
                                    <span style="background-color: #DCFCE7; color: #15803D;" 
                                          class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold rounded-full">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Disetujui
                                    </span>
                                @elseif($item->status == 'ditolak')
                                    <span style="background-color: #FEE2E2; color: #B91C1C;" 
                                          class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold rounded-full">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                        Ditolak
                                    </span>
                                @else
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
                                        <a href="{{ route('penulis.cecimpedan.edit', $item->id) }}" 
                                           style="background-color: #D98200; color: #ffffff;"
                                           class="p-2 font-semibold rounded-xl shadow-sm transition hover:opacity-90 inline-block" 
                                           title="Edit Data">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.03H3v-3.572L16.732 3.732z"/>
                                            </svg>
                                        </a>
                                        
                                        <form action="{{ route('penulis.cecimpedan.destroy', $item->id) }}" method="POST" 
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data cecimpedan ini?');">
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
                        <tr class="bg-white">
                            <td colspan="5" class="py-12 text-center text-[#8C7B6C] bg-white">
                                Belum ada data Cecimpedan yang sesuai dengan filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection