@extends('admin.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-[#1A110A]">
            Verifikasi Cecimpedan
        </h1>
        <p class="text-gray-500">
            Daftar kiriman penulis yang menunggu verifikasi.
        </p>
    </div>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-[#F5E6CC]">
            <tr>
                <th class="p-4">No</th>
                <th class="p-4 text-left">Judul</th>
                <th class="p-4 text-left">Penulis</th>
                <th class="p-4">Status</th>
                <th class="p-4">AKSI VERIFIKASI</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cecimpedans as $c)
            <tr class="border-b">
                <td class="p-4 text-center">
                    {{ $loop->iteration }}
                </td>

                <td class="p-4">
                    {{ $c->judul }}
                </td>

                <td class="p-4">
                    {{ $c->penulis }}
                </td>

                <td class="p-4 text-center">
                    @if($c->status=='pending')
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">
                            Pending
                        </span>
                    @elseif($c->status=='disetujui')
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                            Disetujui
                        </span>
                    @else
                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium">
                            Ditolak
                        </span>
                    @endif
                </td>

                <!-- Bagian Tombol Aksi Verifikasi yang Diubah -->
                <td class="p-4 text-center">
                    <div class="flex items-center justify-center gap-3">
                        
                        <!-- 1. Tombol Detail (Mata Biru) -->
                        <a href="{{ route('admin.verifikasi.cecimpedan.detail', $c->id) }}" 
                           title="Detail / Lihat" 
                           class="text-sky-500 hover:text-sky-700 transition transform hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>

                        <!-- 2. Tombol Setujui (Centang Hijau) -->
                        <form action="{{ route('admin.verifikasi.cecimpedan.setujui', $c->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" 
                                    title="Setujui" 
                                    onclick="return confirm('Apakah Anda yakin ingin menyetujui kiriman ini?')"
                                    class="text-emerald-500 hover:text-emerald-700 transition transform hover:scale-110 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </form>

                        <!-- 3. Tombol Tolak (Silang Merah) -->
                        <form action="{{ route('admin.verifikasi.cecimpedan.tolak', $c->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" 
                                    title="Tolak" 
                                    onclick="return confirm('Apakah Anda yakin ingin menolak kiriman ini?')"
                                    class="text-rose-500 hover:text-rose-700 transition transform hover:scale-110 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-8 text-center text-gray-500">
                    Belum ada kiriman Cecimpedan.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection