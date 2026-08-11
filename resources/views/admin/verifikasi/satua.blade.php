@extends('admin.layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <!-- Font Judul Disesuaikan Sesuai Gambar Acuan -->
            <h1 class="text-3xl font-bold text-[#2C221E] tracking-tight">
                Verifikasi Satua Bali
            </h1>
            <p class="text-[#6B635B] text-sm mt-1">
                Kelola dan lakukan verifikasi karya naskah Satua Bali yang diajukan oleh Penulis.
            </p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#F5E9D7] text-[#2C221E] text-xs uppercase font-semibold">
                    <tr>
                        <th class="p-4 text-center w-12">No</th>
                        <th class="p-4">Judul Satua</th>
                        <th class="p-4">Penulis</th>
                        <th class="p-4">Sub Judul</th>
                        <th class="p-4 text-center">Status</th>
                        <th class="p-4 text-center">Aksi Verifikasi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($satuas as $satua)
                        <tr class="hover:bg-gray-50/80 transition">
                            <td class="p-4 text-center text-gray-500 font-medium">
                                {{ $loop->iteration }}
                            </td>

                            <td class="p-4 font-semibold text-[#2C221E]">
                                {{ $satua->judul ?? ($satua->nama ?? '-') }}
                            </td>

                            <td class="p-4 text-gray-600">
                                {{ $satua->penulis ?? ($satua->user->name ?? 'Penulis') }}
                            </td>

                            <td class="p-4 text-gray-500 italic text-xs">
                                {{ $satua->sub_judul ?? ($satua->asal ?? '-') }}
                            </td>

                            <td class="p-4 text-center">
                                @if (($satua->status ?? 'pending') == 'pending')
                                    <span style="background-color: #FEF9C3; color: #A16207;"
                                        class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-bold rounded-full">
                                        <svg class="w-3.5 h-3.5" style="color: #A16207;" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Pending
                                    </span>
                                @elseif(($satua->status ?? '') == 'disetujui' || ($satua->status ?? '') == 'published')
                                    <span
                                        class="inline-flex items-center gap-1 bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Disetujui
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1 bg-rose-50 text-rose-700 border border-rose-200 px-3 py-1 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Ditolak
                                    </span>
                                @endif
                            </td>

                            <!-- Bagian Tombol Aksi Verifikasi -->
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-3">

                                    <!-- 1. Tombol Detail -->
                                    <a href="{{ route('admin.verifikasi.satua.detail', $satua->id) }}"
                                        title="Detail Verifikasi"
                                        class="p-1.5 text-sky-600 hover:text-sky-800 hover:bg-sky-50 rounded-lg transition transform hover:scale-105">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                    @if (($satua->status ?? 'pending') == 'pending')
                                        <!-- 2. Tombol Setujui -->
                                        <form action="{{ route('admin.verifikasi.satua.setujui', $satua->id) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" title="Setujui Satua Ini"
                                                onclick="return confirm('Apakah Anda yakin ingin menyetujui kiriman Satua ini?')"
                                                class="p-1.5 text-emerald-600 hover:text-emerald-800 hover:bg-emerald-50 rounded-lg transition transform hover:scale-105 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </button>
                                        </form>

                                        <!-- 3. Tombol Tolak -->
                                        <form action="{{ route('admin.verifikasi.satua.tolak', $satua->id) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" title="Tolak Satua Ini"
                                                onclick="return confirm('Apakah Anda yakin ingin menolak kiriman Satua ini?')"
                                                class="p-1.5 text-rose-600 hover:text-rose-800 hover:bg-rose-50 rounded-lg transition transform hover:scale-105 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-10 text-center text-gray-400">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    <span class="font-medium text-sm">Belum ada kiriman Satua Bali yang perlu diverifikasi.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection