@extends('admin.layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Halaman -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-[#1A110A]">Verifikasi Artikel</h1>
            <p class="text-sm text-gray-600">Daftar kiriman konten dari penulis yang menunggu verifikasi.</p>
        </div>

        <!-- Tombol Filter / Kategori (Tab Sorting) -->
        <div class="flex flex-wrap gap-2 mb-6 border-b border-gray-200 pb-4">
            <!-- Tombol Ajaran Tetua -->
            <a href="{{ route('admin.verifikasi.artikel') }}"
                class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.verifikasi.artikel') ? 'bg-[#C48D2D] text-white shadow-sm' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200' }}">
                Ajaran Tetua
            </a>

            <!-- Tombol Cecimpedan -->
            <a href="{{ route('admin.verifikasi.cecimpedan') }}"
                class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.verifikasi.cecimpedan') ? 'bg-[#C48D2D] text-white shadow-sm' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200' }}">
                Cecimpedan
            </a>

            <!-- Tombol Satua Bali -->
            <a href="{{ route('admin.verifikasi.satua') }}"
                class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.verifikasi.satua') ? 'bg-[#C48D2D] text-white shadow-sm' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200' }}">
                Satua Bali
            </a>

            <!-- Tombol Istilah Bali -->
            <a href="{{ route('admin.verifikasi.istilah') }}"
                class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.verifikasi.istilah') ? 'bg-[#C48D2D] text-white shadow-sm' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200' }}">
                Istilah Bali
            </a>
        </div>

        <!-- Tabel Data Artikel -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-[#FDFBF7] border-b border-gray-100 text-xs uppercase text-gray-500 tracking-wider">
                            <th class="py-4 px-6 font-semibold">No</th>
                            <th class="py-4 px-6 font-semibold">ID</th>
                            <th class="py-4 px-6 font-semibold">Judul</th>
                            <th class="py-4 px-6 font-semibold">Penulis</th>
                            <th class="py-4 px-6 font-semibold">Status</th>
                            <th class="py-4 px-6 text-center font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                        @forelse($ajarans ?? [] as $index => $item)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 px-6">{{ $index + 1 }}</td>
                                <td class="py-4 px-6 font-medium text-gray-900">{{ $item->id }}</td>
                                <td class="py-4 px-6 font-medium text-gray-900">{{ $item->judul ?? '-' }}</td>
                                <td class="py-4 px-6">{{ $item->user->name ?? 'Penulis' }}</td>
                                <td class="py-4 px-6">
                                    <span
                                        class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Pending
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <a href="{{ route('admin.verifikasi.artikel.detail', $item->id) }}"
                                        class="inline-block bg-[#A13333] hover:bg-[#8B2929] text-white px-4 py-1.5 rounded-lg text-xs font-semibold shadow-sm transition">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-8 text-gray-400">
                                    Belum ada data ajaran yang menunggu verifikasi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
