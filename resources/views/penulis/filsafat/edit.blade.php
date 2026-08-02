@extends('penulis.layouts.app')

@section('content')
<div class="p-6 bg-[#F6F0E6] text-[#1A110A]">
    <!-- Container Card Putih -->
    <div class="max-w-4xl mx-auto p-8 bg-white rounded-2xl shadow-sm border border-[#E2D5C3]">
        <h2 class="text-2xl font-bold mb-6 text-[#1A110A]">Edit Filsafat</h2>

        <form action="{{ route('penulis.filsafat.update', $filsafat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Judul Filsafat -->
            <div class="mb-5">
                <label class="block text-sm font-semibold text-[#1A110A] mb-2">Judul Filsafat</label>
                <input type="text" name="judul" value="{{ old('judul', $filsafat->judul) }}" required placeholder="Contoh: Tri Hita Karana"
                    class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition">
            </div>

            <!-- Grid 2 Kolom: Asal & Fokus Bahasan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                <!-- Asal -->
                <div>
                    <label class="block text-sm font-semibold text-[#1A110A] mb-2">Asal / Sumber</label>
                    <input type="text" name="asal" value="{{ old('asal', $filsafat->asal) }}" placeholder="Contoh: Lontar Agama Tattwa / Tradisional"
                        class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition">
                </div>

                <!-- Fokus Bahasan -->
                <div>
                    <label class="block text-sm font-semibold text-[#1A110A] mb-2">Fokus Bahasan</label>
                    <input type="text" name="fokus" value="{{ old('fokus', $filsafat->fokus) }}" placeholder="Contoh: Keharmonisan Alam & Manusia"
                        class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition">
                </div>
            </div>

            <!-- Grid 2 Kolom: Tokoh & Karakteristik -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                <!-- Tokoh Terkenal -->
                <div>
                    <label class="block text-sm font-semibold text-[#1A110A] mb-2">Tokoh Terkenal / Pengembang</label>
                    <input type="text" name="tokoh_terkenal" value="{{ old('tokoh_terkenal', $filsafat->tokoh_terkenal ?? $filsafat->tokoh) }}" placeholder="Contoh: Dang Hyang Nirartha"
                        class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition">
                </div>

                <!-- Karakteristik Utama -->
                <div>
                    <label class="block text-sm font-semibold text-[#1A110A] mb-2">Karakteristik Utama</label>
                    <input type="text" name="karakteristik" value="{{ old('karakteristik', $filsafat->karakteristik) }}" placeholder="Contoh: Kosmis, Etis, Teologis"
                        class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition">
                </div>
            </div>

            <!-- Deskripsi & Makna -->
            <div class="mb-5">
                <label class="block text-sm font-semibold text-[#1A110A] mb-2">Deskripsi & Makna</label>
                <textarea name="deskripsi" rows="4" required placeholder="Penjelasan mendalam mengenai ajaran/konsep filsafat..."
                    class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition">{{ old('deskripsi', $filsafat->deskripsi) }}</textarea>
            </div>

            <!-- Penerapan / Implikasi Kehidupan -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-[#1A110A] mb-2">Penerapan / Implikasi Kehidupan</label>
                <textarea name="implikasi" rows="3" placeholder="Implementasi nyata dalam kehidupan sehari-hari..."
                    class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition">{{ old('implikasi', $filsafat->implikasi ?? $filsafat->penerapan) }}</textarea>
            </div>

            <!-- Tombol Simpan & Kembali -->
            <div class="flex items-center gap-3 pt-2">
                <button type="submit" 
                        style="background-color: #C38E2A; color: #ffffff;"
                        class="px-7 py-2.5 font-semibold rounded-xl shadow-sm transition hover:opacity-90">
                    Simpan
                </button>
                <a href="{{ route('penulis.filsafat.index') }}" 
                   style="background-color: #6B7280; color: #ffffff;"
                   class="px-7 py-2.5 font-semibold rounded-xl shadow-sm transition hover:opacity-90">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection