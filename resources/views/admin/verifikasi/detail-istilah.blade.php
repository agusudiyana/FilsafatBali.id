@extends('admin.layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg p-8">

        <!-- Header Detail Istilah -->
        <div class="flex justify-between items-start mb-8">

            <div>
                <!-- Judul / Istilah -->
                <h1 class="text-4xl font-bold text-[#1A110A]" style="font-family: 'Cormorant Garamond', serif;">
                    {{ $istilah->istilah ?? ($istilah->judul ?? '-') }}
                </h1>

                <!-- Kategori & Penulis -->
                <div class="flex items-center gap-4 text-sm text-gray-500 mt-3">
                    <p>Kategori: <strong>{{ $istilah->kategori ?? 'Umum' }}</strong></p>
                    <span>•</span>
                    <p>Penulis: <strong>{{ $istilah->penulis ?? ($istilah->user->name ?? 'Penulis') }}</strong></p>
                </div>
            </div>

            <!-- Badge Status -->
            <span class="px-4 py-2 rounded-full font-medium text-sm
                @if (($istilah->status ?? 'pending') == 'pending') bg-yellow-100 text-yellow-700
                @elseif(($istilah->status ?? '') == 'disetujui' || ($istilah->status ?? '') == 'published') bg-green-100 text-green-700
                @else bg-red-100 text-red-700 @endif">
                {{ ucfirst($istilah->status ?? 'Pending') }}
            </span>

        </div>

        <!-- Gambar (Jika ada) -->
        @if(!empty($istilah->gambar))
            <div class="mb-8 rounded-xl overflow-hidden shadow-sm">
                <img src="{{ asset('storage/'.$istilah->gambar) }}" class="rounded-xl w-full h-[420px] object-cover" alt="{{ $istilah->istilah }}">
            </div>
        @endif

        <!-- Informasi Lengkap Istilah Bali -->
        <div class="space-y-6">

            <!-- 1. Arti / Definisi -->
            <div class="p-5 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <h2 class="font-bold text-base text-[#1A110A] mb-2">
                    Arti / Definisi
                </h2>
                <div class="leading-relaxed text-gray-700 text-sm whitespace-pre-line">
                    {!! nl2br(e($istilah->arti ?? ($istilah->definisi ?? '-'))) !!}
                </div>
            </div>

            <!-- 2. Sejarah / Penjelasan (Kotak Tersendiri) -->
            <div class="p-5 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <h2 class="font-bold text-base text-[#1A110A] mb-2">
                    Sejarah / Penjelasan
                </h2>
                <div class="leading-relaxed text-gray-700 text-sm whitespace-pre-line">
                    {!! nl2br(e($istilah->sejarah ?? ($istilah->penjelasan ?? '-'))) !!}
                </div>
            </div>

            <!-- Grid 2 Kolom untuk Contoh & Padanan Kata -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">

                <!-- 3. Contoh Penggunaan -->
                <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-sm">
                    <h2 class="font-bold text-base text-[#1A110A] mb-2">
                        Contoh Penggunaan
                    </h2>
                    <div class="leading-relaxed text-gray-700 text-sm whitespace-pre-line">
                        {!! nl2br(e($istilah->contoh_penggunaan ?? ($istilah->contoh ?? '-'))) !!}
                    </div>
                </div>

                <!-- 4. Padanan Kata / Keterangan Terkait -->
                <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-sm">
                    <h2 class="font-bold text-base text-[#1A110A] mb-2">
                        Padanan Kata / Keterangan Terkait
                    </h2>
                    <div class="leading-relaxed text-gray-700 text-sm whitespace-pre-line">
                        {!! nl2br(e($istilah->padanan_kata ?? ($istilah->keterangan ?? '-'))) !!}
                    </div>
                </div>

            </div>

        </div>

        <!-- Tombol Aksi Verifikasi Bergaya Pill dengan Ikon -->
        <div class="flex items-center gap-3 mt-10 pt-6 border-t border-gray-100">

            @if (($istilah->status ?? 'pending') == 'pending')
                <!-- 1. Tombol Setujui (Hijau) -->
                <form action="{{ route('admin.verifikasi.istilah.setujui', $istilah->id) }}" method="POST" class="inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" 
                            onclick="return confirm('Apakah Anda yakin ingin menyetujui kiriman Istilah ini?')"
                            class="bg-[#059669] hover:bg-[#047857] text-white px-5 py-2.5 rounded-2xl font-semibold flex items-center gap-2 shadow-sm transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Setujui
                    </button>
                </form>

                <!-- 2. Tombol Tolak (Merah) -->
                <form action="{{ route('admin.verifikasi.istilah.tolak', $istilah->id) }}" method="POST" class="inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" 
                            onclick="return confirm('Apakah Anda yakin ingin menolak kiriman Istilah ini?')"
                            class="bg-[#E11D48] hover:bg-[#BE123C] text-white px-5 py-2.5 rounded-2xl font-semibold flex items-center gap-2 shadow-sm transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Tolak
                    </button>
                </form>
            @endif

            <!-- 3. Tombol Kembali (Abu-abu Muda) -->
            <a href="{{ route('admin.verifikasi.istilah') }}"
               class="bg-[#F1F5F9] hover:bg-[#E2E8F0] text-[#1E293B] px-5 py-2.5 rounded-2xl font-semibold flex items-center gap-2 shadow-sm transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>

        </div>

    </div>

</div>

@endsection