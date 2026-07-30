@extends('admin.layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg p-8">

        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-4xl font-bold text-[#1A110A]">
                    {{ $istilah->istilah }}
                </h1>

                <p class="text-gray-500 mt-2">
                    Kategori :
                    <strong>{{ $istilah->kategori }}</strong>
                </p>
            </div>

            <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 font-medium">
                {{ ucfirst($istilah->status) }}
            </span>

        </div>

        @if($istilah->gambar)
            <img src="{{ asset('storage/'.$istilah->gambar) }}"
                class="rounded-xl w-full h-[420px] object-cover mb-8">
        @endif

        <div class="space-y-8">

            <div>
                <h2 class="font-bold text-xl mb-3">
                    Arti
                </h2>

                <p class="leading-8 text-gray-700">
                    {{ $istilah->arti }}
                </p>
            </div>

        </div>

        <!-- Tombol Aksi Verifikasi Bergaya Pill dengan Ikon -->
        <div class="flex items-center gap-3 mt-10">

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