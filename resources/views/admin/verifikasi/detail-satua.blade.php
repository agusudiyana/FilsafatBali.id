@extends('admin.layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto">

        <div class="bg-white rounded-xl shadow-lg p-8">

            <!-- Header Detail Satua -->
            <div class="flex justify-between items-start mb-8">

                <div>
                    <!-- Judul Satua -->
                    <h1 class="text-4xl font-bold text-[#1A110A]" style="font-family: 'Cormorant Garamond', serif;">
                        {{ $satua->judul ?? ($satua->nama ?? '-') }}
                    </h1>

                    <!-- Sub Judul / Terjemahan (Opsional) -->
                    @if (!empty($satua->sub_judul) || !empty($satua->terjemahan))
                        <p class="text-gray-500 italic text-sm mt-1">
                            {{ $satua->sub_judul ?? $satua->terjemahan }}
                        </p>
                    @endif

                    <!-- Asal & Penulis -->
                    <div class="flex items-center gap-4 text-sm text-gray-500 mt-3">
                        <p>Asal: <strong>{{ $satua->asal ?? '-' }}</strong></p>
                        <span>•</span>
                        <p>Penulis: <strong>{{ $satua->penulis ?? ($satua->user->name ?? 'Penulis') }}</strong></p>
                    </div>
                </div>

                <!-- Badge Status -->
                <span
                    class="px-4 py-2 rounded-full font-medium text-sm
                @if (($satua->status ?? 'pending') == 'pending') bg-yellow-100 text-yellow-700
                @elseif(($satua->status ?? '') == 'disetujui' || ($satua->status ?? '') == 'published') bg-green-100 text-green-700
                @else bg-red-100 text-red-700 @endif">
                    {{ ucfirst($satua->status ?? 'Pending') }}
                </span>

            </div>

            <!-- Gambar Banner / Ilustrasi Satua -->
            @if (!empty($satua->gambar))
                <div class="mb-8 rounded-xl overflow-hidden shadow-sm">
                    <img src="{{ asset('storage/' . $satua->gambar) }}" class="rounded-xl w-full h-[420px] object-cover"
                        alt="{{ $satua->judul ?? 'Gambar Satua' }}">
                </div>
            @endif

            <!-- Informasi Lengkap Naskah Satua -->
            <div class="space-y-8">

                <!-- 1. Ringkasan Cerita -->
                @if (!empty($satua->ringkasan) || !empty($satua->ringkasan_cerita))
                    <div class="p-5 bg-white border border-gray-200 rounded-2xl shadow-sm">
                        <h2 class="font-bold text-base text-[#1A110A] mb-2">
                            Ringkasan Cerita
                        </h2>
                        <p class="leading-relaxed text-gray-700 text-sm">
                            {{ $satua->ringkasan ?? $satua->ringkasan_cerita }}
                        </p>
                    </div>
                @endif

                <!-- 2. Isi Satua (Judul Tanpa 'Cerita Lengkap' & Tanpa Garis Bawah) -->
                <div class="p-5 bg-white border border-gray-200 rounded-2xl shadow-sm">
                    <h2 class="font-bold text-base text-[#1A110A] mb-3">
                        Isi Satua
                    </h2>
                    <div class="leading-8 text-gray-700 whitespace-pre-line text-base">
                        {!! nl2br(e($satua->isi ?? ($satua->cerita ?? ($satua->isi_satua ?? '-')))) !!}
                    </div>
                </div>

                <!-- Grid 4 Pilar Cerita Satua Bali -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-100">

                    <!-- 3. Tokoh Utama -->
                    <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-sm">
                        <h2 class="font-bold text-base text-[#1A110A] mb-2">
                            Tokoh Utama
                        </h2>
                        <div class="leading-relaxed text-gray-700 text-sm whitespace-pre-line">
                            {!! nl2br(e($satua->tokoh ?? ($satua->tokoh_utama ?? '-'))) !!}
                        </div>
                    </div>

                    <!-- 4. Alur Cerita -->
                    <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-sm">
                        <h2 class="font-bold text-base text-[#1A110A] mb-2">
                            Alur Cerita
                        </h2>
                        <div class="leading-relaxed text-gray-700 text-sm whitespace-pre-line">
                            {!! nl2br(e($satua->alur ?? ($satua->alur_cerita ?? '-'))) !!}
                        </div>
                    </div>

                    <!-- 5. Nilai Moral -->
                    <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-sm">
                        <h2 class="font-bold text-base text-[#1A110A] mb-2">
                            Nilai Moral
                        </h2>
                        <div class="leading-relaxed text-gray-700 text-sm whitespace-pre-line">
                            {!! nl2br(e($satua->moral ?? ($satua->nilai_moral ?? '-'))) !!}
                        </div>
                    </div>

                    <!-- 6. Pesan Filosofi -->
                    <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-sm">
                        <h2 class="font-bold text-base text-[#1A110A] mb-2">
                            Pesan Filosofi
                        </h2>
                        <div class="leading-relaxed text-gray-700 text-sm whitespace-pre-line">
                            {!! nl2br(e($satua->filosofi ?? ($satua->pesan_filosofi ?? '-'))) !!}
                        </div>
                    </div>

                </div>

            </div>

            <!-- Tombol Aksi Verifikasi Bergaya Pill dengan Ikon -->
            <div class="flex items-center gap-3 mt-10 pt-6 border-t border-gray-100">

                @if (($satua->status ?? 'pending') == 'pending')
                    <!-- 1. Tombol Setujui (Hijau) -->
                    <form action="{{ route('admin.verifikasi.satua.setujui', $satua->id) }}" method="POST" class="inline">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            onclick="return confirm('Apakah Anda yakin ingin menyetujui kiriman Satua ini?')"
                            class="bg-[#059669] hover:bg-[#047857] text-white px-5 py-2.5 rounded-2xl font-semibold flex items-center gap-2 shadow-sm transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Setujui
                        </button>
                    </form>

                    <!-- 2. Tombol Tolak (Merah) -->
                    <form action="{{ route('admin.verifikasi.satua.tolak', $satua->id) }}" method="POST" class="inline">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            onclick="return confirm('Apakah Anda yakin ingin menolak kiriman Satua ini?')"
                            class="bg-[#E11D48] hover:bg-[#BE123C] text-white px-5 py-2.5 rounded-2xl font-semibold flex items-center gap-2 shadow-sm transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Tolak
                        </button>
                    </form>
                @endif

                <!-- 3. Tombol Kembali (Abu-abu Muda) -->
                <a href="{{ route('admin.verifikasi.satua') }}"
                    class="bg-[#F1F5F9] hover:bg-[#E2E8F0] text-[#1E293B] px-5 py-2.5 rounded-2xl font-semibold flex items-center gap-2 shadow-sm transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>

            </div>

        </div>

    </div>
@endsection