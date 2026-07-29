@extends('penulis.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-[#1A110A]">
            Data Istilah
        </h1>
        <p class="text-gray-500">
            Daftar Istilah yang telah Anda kirim.
        </p>
    </div>

    <a href="{{ route('penulis.istilah.create') }}"
       class="bg-[#C48D2D] text-white px-5 py-3 rounded-lg hover:bg-[#B07C20] flex items-center gap-2 transition">
        <i data-feather="plus-circle" class="w-5 h-5"></i>
        <span>Tambah Istilah</span>
    </a>
</div>

@if(session('success'))
<div class="bg-green-100 text-green-700 p-4 rounded-lg mb-5 flex items-center gap-2">
    <i data-feather="check-circle" class="w-5 h-5"></i>
    <span>{{ session('success') }}</span>
</div>
@endif

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-[#F5E9D7]">
            <tr>
                <th class="p-4 text-left">No</th>
                <th class="p-4 text-left">Istilah</th>
                <th class="p-4 text-left">Kategori</th>
                <th class="p-4 text-left">Status</th>
                <th class="p-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($istilahs as $item)
            <tr class="border-t hover:bg-gray-50 transition">
                <td class="p-4">
                    {{ $loop->iteration }}
                </td>
                <td class="p-4 font-semibold text-[#1A110A]">
                    {{ $item->istilah }}
                </td>
                <td class="p-4">
                    {{ $item->kategori ?? '-' }}
                </td>
                <td class="p-4">
                    @if($item->status == 'pending')
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
                    @if($item->status == 'disetujui')
                        <span class="text-xs text-gray-400 italic font-semibold">Terkunci (Disetujui)</span>
                    @else
                        <div class="flex items-center justify-center gap-2">
                            <!-- TOMBOL EDIT -->
                            <a href="{{ route('penulis.istilah.edit', $item->id) }}" 
                               title="Edit Data"
                               class="bg-amber-600 hover:bg-amber-700 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition inline-flex items-center gap-1 shadow-sm">
                                <i data-feather="edit-2" class="w-3.5 h-3.5"></i>
                            </a>

                            <!-- TOMBOL HAPUS -->
                            <form action="{{ route('penulis.istilah.destroy', $item->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus data istilah ini?');" 
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        title="Hapus Data"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition inline-flex items-center gap-1 shadow-sm">
                                    <i data-feather="trash-2" class="w-3.5 h-3.5"></i>
                                </button>
                            </form>
                        </div>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center p-8 text-gray-500">
                    <div class="flex flex-col items-center justify-center gap-2">
                        <i data-feather="inbox" class="w-8 h-8 text-gray-400"></i>
                        <span>Belum ada data Istilah.</span>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Inisialisasi Feather Icons -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>

@endsection