@extends('admin.layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto">

        <!-- Header Atas: Judul di Kiri & Tombol Kembali di Kanan -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-[#1A110A]">
                    Detail Verifikasi Filsafat
                </h1>
                <p class="text-sm text-gray-600 mt-1">
                    Periksa konten filsafat sebelum memberikan keputusan verifikasi.
                </p>
            </div>
            <!-- Tombol Kembali Sesuai Desain Request -->
            <a href="{{ route('admin.verifikasi.filsafat') }}"
                class="px-6 py-2.5 bg-white hover:bg-gray-50 border border-[#E2D5C3] rounded-xl text-gray-700 font-medium text-sm transition shadow-sm">
                Kembali
            </a>
        </div>

        <!-- Detail Konten Filsafat -->
        <div class="bg-white rounded-2xl shadow-sm border border-[#E2D5C3] p-8 space-y-6">

            <!-- Judul & Penulis -->
            <div class="border-b border-[#E2D5C3] pb-4">
                <span class="text-xs font-bold text-[#1A110A] uppercase tracking-wider">
                    Detail Verifikasi Filsafat
                </span>
                <h1 class="text-3xl font-bold text-[#1A110A] mt-1">
                    {{ $filsafat->judul ?? ($filsafat->judul_filsafat ?? '-') }}
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Penulis: <span
                        class="font-semibold text-gray-700">{{ $filsafat->user->name ?? ($filsafat->penulis ?? 'Penulis') }}</span>
                </p>
            </div>

            <!-- Grid Atribut Filsafat (Asal, Fokus, Tokoh, Karakteristik) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Asal / Sumber -->
                <div class="bg-[#FAF6F0] p-4 rounded-xl border border-[#E2D5C3]">
                    <span class="text-xs font-bold text-[#1A110A] uppercase tracking-wider block mb-1">
                        Asal / Sumber
                    </span>
                    <p class="text-sm font-medium text-gray-800">
                        {{ $filsafat->asal ?? ($filsafat->sumber ?? '-') }}
                    </p>
                </div>

                <!-- Fokus Bahasan -->
                <div class="bg-[#FAF6F0] p-4 rounded-xl border border-[#E2D5C3]">
                    <span class="text-xs font-bold text-[#1A110A] uppercase tracking-wider block mb-1">
                        Fokus Bahasan
                    </span>
                    <p class="text-sm font-medium text-gray-800">
                        {{ $filsafat->fokus ?? ($filsafat->fokus_bahasan ?? '-') }}
                    </p>
                </div>

                <!-- Tokoh Terkenal / Pengembang -->
                <div class="bg-[#FAF6F0] p-4 rounded-xl border border-[#E2D5C3]">
                    <span class="text-xs font-bold text-[#1A110A] uppercase tracking-wider block mb-1">
                        Tokoh Terkenal / Pengembang
                    </span>
                    <p class="text-sm font-medium text-gray-800">
                        {{ $filsafat->tokoh ?? ($filsafat->pengembang ?? '-') }}
                    </p>
                </div>

                <!-- Karakteristik Utama -->
                <div class="bg-[#FAF6F0] p-4 rounded-xl border border-[#E2D5C3]">
                    <span class="text-xs font-bold text-[#1A110A] uppercase tracking-wider block mb-1">
                        Karakteristik Utama
                    </span>
                    <p class="text-sm font-medium text-gray-800">
                        {{ $filsafat->karakteristik ?? ($filsafat->karakteristik_utama ?? '-') }}
                    </p>
                </div>

            </div>

            <!-- Deskripsi & Makna -->
            <div class="border-t border-[#E2D5C3] pt-4">
                <h3 class="text-xs font-bold text-[#1A110A] uppercase tracking-wider mb-2">
                    Deskripsi & Makna
                </h3>
                <div
                    class="text-gray-800 leading-relaxed whitespace-pre-line text-base bg-[#FAF6F0] p-4 rounded-xl border border-[#E2D5C3]">
                    {{ $filsafat->deskripsi ?? ($filsafat->makna ?? ($filsafat->isi ?? '-')) }}
                </div>
            </div>

            <!-- Penerapan / Implikasi Kehidupan -->
            <div class="border-t border-[#E2D5C3] pt-4">
                <h3 class="text-xs font-bold text-[#1A110A] uppercase tracking-wider mb-2">
                    Penerapan / Implikasi Kehidupan
                </h3>
                <div
                    class="text-gray-800 leading-relaxed whitespace-pre-line text-base bg-[#FAF6F0] p-4 rounded-xl border border-[#E2D5C3]">
                    {{ $filsafat->penerapan ?? ($filsafat->implikasi ?? ($filsafat->kesimpulan ?? '-')) }}
                </div>
            </div>

            <!-- Gambar (jika ada) -->
            @if (!empty($filsafat->gambar))
                <div class="border-t border-[#E2D5C3] pt-4">
                    <h3 class="text-xs font-bold text-[#1A110A] uppercase tracking-wider mb-2">
                        Gambar / Lampiran
                    </h3>
                    <div class="w-full max-h-96 overflow-hidden rounded-xl border border-[#E2D5C3]">
                        <img src="{{ asset('storage/' . $filsafat->gambar) }}" alt="Gambar Filsafat"
                            class="w-full h-full object-cover">
                    </div>
                </div>
            @endif

            <!-- Tombol Aksi Verifikasi (Di Bawah Kiri Tanpa Tombol Kembali) -->
            <div class="border-t border-[#E2D5C3] pt-6 flex items-center justify-start gap-3">
                <!-- Setujui -->
                <form action="{{ route('admin.verifikasi.filsafat.setujui', $filsafat->id) }}" method="POST">
                    @csrf
                    <button type="submit" onclick="return confirm('Setujui kiriman filsafat ini?')"
                        class="bg-emerald-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-emerald-700 shadow-sm transition">
                        Setujui
                    </button>
                </form>

                <!-- Tolak -->
                <form action="{{ route('admin.verifikasi.filsafat.tolak', $filsafat->id) }}" method="POST">
                    @csrf
                    <button type="submit" onclick="return confirm('Tolak kiriman filsafat ini?')"
                        class="bg-rose-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-rose-700 shadow-sm transition">
                        Tolak
                    </button>
                </form>
            </div>

        </div>

    </div>
@endsection
