@extends('admin.layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-[#1A110A]">
                Verifikasi Ajaran Tertua
            </h1>
            <p class="text-gray-500">
                Daftar kiriman penulis yang menunggu verifikasi.
            </p>
        </div>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full border-collapse">
            <!-- Header tabel diubah menjadi bg-white dengan border bawah -->
            <thead class="bg-white border-b border-gray-100">
                <tr>
                    <th class="p-4 w-12 text-center text-[#1A110A] font-bold">No</th>
                    <th class="p-4 text-left text-[#1A110A] font-bold">Judul Ajaran</th>
                    <th class="p-4 text-left text-[#1A110A] font-bold">Penulis</th>
                    <th class="p-4 text-center text-[#1A110A] font-bold">Status</th>
                    <th class="p-4 text-center text-[#1A110A] font-bold">AKSI VERIFIKASI</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($ajaranTertua as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-center font-medium text-gray-500">
                            {{ $loop->iteration }}
                        </td>

                        <!-- Menampilkan Judul Ajaran -->
                        <td class="p-4 font-semibold text-[#1A110A]">
                            {{ $item->judul ?? '-' }}
                        </td>

                        <!-- Menampilkan Penulis -->
                        <td class="p-4 text-gray-700">
                            {{ $item->user->name ?? ($item->penulis ?? 'Penulis') }}
                        </td>

                        <!-- Badge Status -->
                        <td class="p-4 text-center">
                            @if (($item->status ?? 'pending') == 'pending')
                                <span style="background-color: #FEF9C3; color: #A16207;"
                                    class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold rounded-full">
                                    <svg class="w-3.5 h-3.5" style="color: #A16207;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Pending
                                </span>
                            @elseif(($item->status ?? '') == 'disetujui')
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold inline-block">
                                    Disetujui
                                </span>
                            @else
                                <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-bold inline-block">
                                    Ditolak
                                </span>
                            @endif
                        </td>

                        <!-- Tombol Aksi Verifikasi -->
                        <td class="p-4 text-center">
                            <div class="flex items-center justify-center gap-3">

                                <!-- 1. Tombol Detail -->
                                <a href="{{ route('admin.verifikasi.detail-ajaran-tertua', $item->id) }}" title="Detail / Lihat"
                                    class="text-sky-500 hover:text-sky-700 transition transform hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>

                                <!-- 2. Tombol Setujui -->
                                <form action="{{ route('admin.verifikasi.update-status-ajaran-tertua', $item->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="disetujui">
                                    <button type="submit" title="Setujui"
                                        onclick="return confirm('Apakah Anda yakin ingin menyetujui kiriman ini?')"
                                        class="text-emerald-500 hover:text-emerald-700 transition transform hover:scale-110 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                </form>

                                <!-- 3. Tombol Tolak -->
                                <form action="{{ route('admin.verifikasi.update-status-ajaran-tertua', $item->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="ditolak">
                                    <button type="submit" title="Tolak"
                                        onclick="return confirm('Apakah Anda yakin ingin menolak kiriman ini?')"
                                        class="text-rose-500 hover:text-rose-700 transition transform hover:scale-110 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-gray-500">
                            Belum ada kiriman Ajaran Tertua.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection