@extends('admin.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg p-8">

        <!-- Header Detail -->
        <div class="flex justify-between items-start mb-8">
            <div>
                <h1 class="text-3xl font-bold text-[#1A110A]" style="font-family: 'Cormorant Garamond', serif;">
                    "{{ $cecimpedan->pertanyaan ?? ($cecimpedan->judul ?? '-') }}"
                </h1>
                <div class="flex items-center gap-4 text-sm text-gray-500 mt-3">
                    <p>Penulis: <strong>{{ $cecimpedan->penulis ?? ($cecimpedan->user->name ?? 'Penulis') }}</strong></p>
                </div>
            </div>

            <span class="px-4 py-2 rounded-full font-medium text-sm
                @if (($cecimpedan->status ?? 'pending') == 'pending') bg-yellow-100 text-yellow-700
                @elseif(($cecimpedan->status ?? '') == 'disetujui') bg-green-100 text-green-700
                @else bg-red-100 text-red-700 @endif">
                {{ ucfirst($cecimpedan->status ?? 'Pending') }}
            </span>
        </div>

        <!-- Gambar (Jika ada) -->
        @if(!empty($cecimpedan->gambar))
            <div class="mb-8 rounded-xl overflow-hidden shadow-sm">
                <img src="{{ asset('storage/'.$cecimpedan->gambar) }}" 
                     class="rounded-xl w-full h-[420px] object-cover" 
                     alt="Ilustrasi Cecimpedan">
            </div>
        @endif

        <!-- Informasi Lengkap Sesuai Urutan Penulis -->
        <div class="space-y-6">

            <!-- 1. Tingkat Kesulitan -->
            <div class="p-5 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <h2 class="font-bold text-base text-[#1A110A] mb-2">Tingkat Kesulitan</h2>
                <div class="text-sm font-semibold text-gray-700">{{ $cecimpedan->tingkat ?? ($cecimpedan->tingkat_kesulitan ?? '-') }}</div>
            </div>

            <!-- 2. Pertanyaan (Bahasa Bali) -->
            <div class="p-5 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <h2 class="font-bold text-base text-[#1A110A] mb-2">Pertanyaan (Bahasa Bali)</h2>
                <div class="leading-relaxed text-gray-700 text-sm whitespace-pre-line">{{ $cecimpedan->pertanyaan ?? ($cecimpedan->isi ?? '-') }}</div>
            </div>

            <!-- 3. Terjemahan / Arti (Bahasa Indonesia) -->
            <div class="p-5 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <h2 class="font-bold text-base text-[#1A110A] mb-2">Terjemahan / Arti (Bahasa Indonesia)</h2>
                <div class="leading-relaxed text-gray-700 text-sm whitespace-pre-line">{{ $cecimpedan->terjemahan ?? '-' }}</div>
            </div>

            <!-- 4. Jawaban -->
            <div class="p-5 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <h2 class="font-bold text-base text-[#1A110A] mb-2">Jawaban</h2>
                <div class="text-lg font-semibold text-gray-700">{{ $cecimpedan->jawaban ?? '-' }}</div>
            </div>

            <!-- 5. Makna -->
            <div class="p-5 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <h2 class="font-bold text-base text-[#1A110A] mb-2">Makna</h2>
                <div class="leading-relaxed text-gray-700 text-sm whitespace-pre-line">{{ $cecimpedan->makna ?? '-' }}</div>
            </div>

            <!-- 6. Nilai Filosofis / Pesan Moral -->
            <div class="p-5 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <h2 class="font-bold text-base text-[#1A110A] mb-2">Nilai Filosofis / Pesan Moral</h2>
                <div class="leading-relaxed text-gray-700 text-sm whitespace-pre-line">{{ $cecimpedan->filosofi ?? '-' }}</div>
            </div>

            <!-- 7. Variasi Daerah -->
            <div class="p-5 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <h2 class="font-bold text-base text-[#1A110A] mb-2">Variasi Daerah (Opsional)</h2>
                <div class="leading-relaxed text-gray-700 text-sm whitespace-pre-line">{{ $cecimpedan->variasi_daerah ?? '-' }}</div>
            </div>

            <!-- 8. Asal Daerah -->
            <div class="p-5 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <h2 class="font-bold text-base text-[#1A110A] mb-2">Asal Daerah</h2>
                <div class="leading-relaxed text-gray-700 text-sm whitespace-pre-line">{{ $cecimpedan->asal_daerah ?? '-' }}</div>
            </div>

            <!-- 9. Rekaman / Sumber -->
            <div class="p-5 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <h2 class="font-bold text-base text-[#1A110A] mb-2">Rekaman / Sumber</h2>
                <div class="leading-relaxed text-gray-700 text-sm whitespace-pre-line">{{ $cecimpedan->rekaman ?? '-' }}</div>
            </div>

        </div>

        <!-- Tombol Aksi Verifikasi -->
        <div class="flex items-center gap-3 mt-10 pt-6 border-t border-gray-100">
            @if (($cecimpedan->status ?? 'pending') == 'pending')
                <form action="{{ route('admin.verifikasi.cecimpedan.setujui', $cecimpedan->id) }}" method="POST" class="inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menyetujui Cecimpedan ini?')"
                        class="bg-[#059669] hover:bg-[#047857] text-white px-5 py-2.5 rounded-2xl font-semibold transition">
                        Setujui
                    </button>
                </form>

                <form action="{{ route('admin.verifikasi.cecimpedan.tolak', $cecimpedan->id) }}" method="POST" class="inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menolak Cecimpedan ini?')"
                        class="bg-[#E11D48] hover:bg-[#BE123C] text-white px-5 py-2.5 rounded-2xl font-semibold transition">
                        Tolak
                    </button>
                </form>
            @endif

            <a href="{{ route('admin.verifikasi.cecimpedan') }}"
               class="bg-[#F1F5F9] hover:bg-[#E2E8F0] text-[#1E293B] px-5 py-2.5 rounded-2xl font-semibold transition">
                Kembali
            </a>
        </div>

    </div>

</div>
@endsection