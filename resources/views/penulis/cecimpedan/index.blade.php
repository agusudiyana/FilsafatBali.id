@extends('penulis.layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="text-3xl font-bold text-[#1A110A]">
                Data Cecimpedan
            </h1>

            <p class="text-gray-500">
                Daftar Cecimpedan yang telah Anda kirim.
            </p>

        </div>

        <a href="{{ route('penulis.cecimpedan.create') }}"
            class="bg-[#C48D2D] text-white px-5 py-3 rounded-lg hover:bg-[#b07c20] flex items-center gap-2 transition">

            <i data-feather="plus-circle" class="w-5 h-5"></i>
            <span>Tambah Cecimpedan</span>

        </a>

    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4 flex items-center gap-2">

            <i data-feather="check-circle" class="w-5 h-5"></i>
            <span>{{ session('success') }}</span>

        </div>
    @endif

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-[#F5E9D7]">

                <tr>

                    <th class="p-4 text-left">No</th>

                    <th class="p-4 text-left">Judul</th>

                    <th class="p-4 text-left">Kategori</th>

                    <th class="p-4 text-left">Status</th>

                    <th class="p-4 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($cecimpedans as $item)
                    <tr class="border-t hover:bg-gray-50 transition">

                        <td class="p-4">

                            {{ $loop->iteration }}

                        </td>

                        <td class="p-4 font-semibold text-[#1A110A]">

                            {{ $item->judul }}

                        </td>

                        <td class="p-4">

                            {{ $item->kategori ?? '-' }}

                        </td>

                        <td class="p-4">

                            @if ($item->status == 'pending')
                                <span
                                    class="inline-flex items-center gap-1 bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    <i data-feather="clock" class="w-3.5 h-3.5"></i>
                                    Pending
                                </span>
                            @elseif($item->status == 'disetujui')
                                <span
                                    class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    <i data-feather="check-circle" class="w-3.5 h-3.5"></i>
                                    Disetujui
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center gap-1 bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    <i data-feather="x-circle" class="w-3.5 h-3.5"></i>
                                    Ditolak
                                </span>
                            @endif

                        </td>

                        <td class="p-4 text-center">

                            <div class="flex items-center justify-center gap-2">

                                <!-- TOMBOL EDIT -->
                                <a href="{{ route('penulis.cecimpedan.edit', $item->id) }}" title="Edit Data"
                                    class="bg-amber-600 hover:bg-amber-700 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition inline-flex items-center gap-1 shadow-sm">
                                    <i data-feather="edit-2" class="w-3.5 h-3.5"></i>
                                </a>

                                <!-- TOMBOL HAPUS -->
                                <form action="{{ route('penulis.cecimpedan.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data cecimpedan ini?');"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus Data"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition inline-flex items-center gap-1 shadow-sm">
                                        <i data-feather="trash-2" class="w-3.5 h-3.5"></i>
                                    </button>
                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center p-8 text-gray-500">

                            <div class="flex flex-col items-center justify-center gap-2">
                                <i data-feather="inbox" class="w-8 h-8 text-gray-400"></i>
                                <span>Belum ada data Cecimpedan.</span>
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
