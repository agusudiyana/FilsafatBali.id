@extends('admin.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg p-8">

        <!-- Header Judul & Status -->
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-3xl font-bold text-[#1A110A]" style="font-family: 'Cormorant Garamond', serif;">
                    "{{ $ajaran->judul ?? '-' }}"
                </h1>
                <div class="flex items-center gap-4 text-sm text-gray-500 mt-2">
                    <p>Penulis: <strong>{{ $ajaran->penulis ?? ($ajaran->user->name ?? 'Penulis') }}</strong></p>
                </div>
            </div>

            <!-- Badge Status -->
            <span class="px-4 py-2 rounded-full font-medium text-sm
                @if (($ajaran->status ?? 'pending') == 'pending') bg-yellow-100 text-yellow-700
                @elseif(($ajaran->status ?? '') == 'disetujui') bg-green-100 text-green-700
                @else bg-red-100 text-red-700 @endif">
                {{ ucfirst($ajaran->status ?? 'Pending') }}
            </span>
        </div>

        <!-- 1. Kategori (Teks Diubah Menjadi Hitam) -->
        <div class="mb-6">
            <div class="p-4 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <h2 class="font-bold text-base text-[#1A110A] mb-1">Kategori</h2>
                <div class="text-sm font-semibold text-gray-900">
                    {{ $ajaran->kategori ?? '-' }}
                </div>
            </div>
        </div>

        <!-- 2. Gambar (Jika ada) -->
        @if(!empty($ajaran->gambar))
            <div class="mb-6 rounded-xl overflow-hidden shadow-sm">
                <h2 class="font-bold text-base text-[#1A110A] mb-2">Gambar</h2>
                <img src="{{ asset('storage/' . $ajaran->gambar) }}" 
                     class="rounded-xl w-full h-[420px] object-cover" 
                     alt="Ilustrasi Artikel">
            </div>
        @endif

        <!-- 3. Isi Artikel -->
        <div class="mb-6">
            <div class="p-5 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <h2 class="font-bold text-base text-[#1A110A] mb-2">Isi Artikel</h2>
                <div class="leading-relaxed text-gray-900 text-sm whitespace-pre-line">
                    {{ $ajaran->isi ?? '-' }}
                </div>
            </div>
        </div>

        <!-- 4. Kesimpulan -->
        <div class="mb-6">
            <div class="p-5 bg-white border border-gray-200 rounded-2xl shadow-sm">
                <h2 class="font-bold text-base text-[#1A110A] mb-2">Kesimpulan</h2>
                <div class="leading-relaxed text-gray-900 text-sm whitespace-pre-line">
                    {{ $ajaran->kesimpulan ?? '-' }}
                </div>
            </div>
        </div>

        <!-- Tombol Aksi Verifikasi -->
        <div class="flex items-center gap-3 mt-10 pt-6 border-t border-gray-100">
            @if (($ajaran->status ?? 'pending') == 'pending')
                <form action="{{ route('admin.verifikasi.ajaran.setujui', $ajaran->id) }}" method="POST" class="inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menyetujui artikel ini?')"
                        class="bg-[#059669] hover:bg-[#047857] text-white px-5 py-2.5 rounded-2xl font-semibold flex items-center gap-2 shadow-sm transition">
                        <i data-feather="check-circle" class="w-5 h-5"></i>
                        <span>Setujui</span>
                    </button>
                </form>

                <form action="{{ route('admin.verifikasi.ajaran.tolak', $ajaran->id) }}" method="POST" class="inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menolak artikel ini?')"
                        class="bg-[#E11D48] hover:bg-[#BE123C] text-white px-5 py-2.5 rounded-2xl font-semibold flex items-center gap-2 shadow-sm transition">
                        <i data-feather="x-circle" class="w-5 h-5"></i>
                        <span>Tolak</span>
                    </button>
                </form>
            @endif

            <a href="{{ route('admin.verifikasi.artikel') }}"
               class="bg-[#F1F5F9] hover:bg-[#E2E8F0] text-[#1E293B] px-5 py-2.5 rounded-2xl font-semibold flex items-center gap-2 transition">
                <i data-feather="arrow-left" class="w-5 h-5"></i>
                <span>Kembali</span>
            </a>
        </div>

    </div>

</div>

<!-- Script Ikon Feather -->
<script src="https://unpkg.com/feather-icons"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>
@endsection