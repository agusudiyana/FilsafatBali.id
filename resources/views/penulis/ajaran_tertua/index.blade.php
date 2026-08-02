@extends('penulis.layouts.app')

@section('content')
    <div class="p-8">
        <!-- Header & Tombol Tambah -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Data Ajaran Tertua</h1>
                <p class="text-sm text-gray-600 mt-1">Daftar Sorotan Ajaran Tertua yang telah Anda kirim.</p>
            </div>
            <a href="{{ route('penulis.ajaran-tertua.create') }}"
                class="inline-flex items-center gap-2 bg-[#C48D2D] hover:bg-[#b07d26] text-white font-medium px-5 py-2.5 rounded-xl shadow-sm transition duration-150">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Tambah Ajaran Tertua
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Card Container Utama Tabel -->
        <div class="bg-[#FBF6EE] border border-[#EFE3D3] rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-gray-900 text-sm font-bold bg-[#F7EFE5] border-b border-[#EFE3D3]">
                            <th class="py-4 px-6 w-16 text-center">No</th>
                            <th class="py-4 px-6">Judul Ajaran</th>
                            <th class="py-4 px-6">Penulis</th>
                            <th class="py-4 px-6 text-center">Status</th>
                            <th class="py-4 px-6 text-center w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#EFE3D3] bg-white text-sm">
                        @forelse($ajaranTertua as $index => $item)
                            <tr class="hover:bg-[#FFFDF9] transition-colors">
                                <td class="py-4 px-6 font-semibold text-gray-800 text-center">{{ $index + 1 }}</td>
                                <td class="py-4 px-6 font-bold text-gray-900">{{ $item->judul }}</td>
                                <td class="py-4 px-6 text-gray-700 font-medium">{{ $item->user->name ?? 'Penulis' }}</td>
                                <td class="py-4 px-6 text-center">
                                    {{-- Badge Status --}}
                                    @if(($item->status ?? 'pending') == 'pending')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#FFF8E1] text-[#B78103] border border-[#FFE8A3]">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Pending
                                        </span>
                                    @elseif(($item->status ?? '') == 'disetujui')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-green-50 text-green-700 border border-green-200">
                                            Disetujui
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-700 border border-red-200">
                                            Ditolak
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center justify-center gap-2">
                                        <!-- Tombol Edit Oranye Keemasan (Pensil Garis Tipis Miring / Outline Stroke) -->
                                        <a href="{{ route('penulis.ajaran-tertua.edit', $item->id) }}"
                                            class="w-8 h-8 bg-[#D88E00] hover:bg-[#b57700] text-white rounded-xl flex items-center justify-center transition shadow-sm"
                                            title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                            </svg>
                                        </a>

                                        <!-- Tombol Hapus Merah -->
                                        <form action="{{ route('penulis.ajaran-tertua.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus ajaran ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-8 h-8 bg-[#DC2626] hover:bg-[#b91c1c] text-white rounded-xl flex items-center justify-center transition shadow-sm"
                                                title="Hapus">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-gray-500 bg-white">
                                    Belum ada data Ajaran Tertua yang ditambahkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection