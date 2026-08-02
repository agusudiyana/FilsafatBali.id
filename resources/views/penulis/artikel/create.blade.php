@extends('penulis.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-[#F6F0E6] text-[#1A110A]">
    
    <!-- Header Section -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-[#1A110A]">Tambah Artikel Baru</h1>
        <p class="text-sm text-[#7A6B5D] mt-1">Lengkapi form di bawah untuk mengirimkan artikel baru.</p>
    </div>

    <!-- Container Form Card -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E2D5C3]">
        
        <!-- PENTING: enctype="multipart/form-data" wajib ada untuk upload gambar -->
        <form action="{{ route('penulis.artikel.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- 1. JUDUL -->
            <div>
                <label class="block text-sm font-bold text-[#1A110A] mb-1">Judul Artikel</label>
                <input type="text" name="judul" value="{{ old('judul') }}" required
                       class="w-full px-4 py-2.5 rounded-xl border border-[#E2D5C3] focus:ring-2 focus:ring-[#C38E2A] focus:outline-none">
                @error('judul')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- 2. KATEGORI -->
            <div>
                <label class="block text-sm font-bold text-[#1A110A] mb-1">Kategori</label>
                <select name="kategori" required
                        class="w-full px-4 py-2.5 rounded-xl border border-[#E2D5C3] focus:ring-2 focus:ring-[#C38E2A] focus:outline-none bg-white">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Istilah Bali" {{ old('kategori') == 'Istilah Bali' ? 'selected' : '' }}>Istilah Bali</option>
                    <option value="Cecimpedan" {{ old('kategori') == 'Cecimpedan' ? 'selected' : '' }}>Cecimpedan</option>
                    <option value="Ajaran Tertua" {{ old('kategori') == 'Ajaran Tertua' ? 'selected' : '' }}>Ajaran Tertua</option>
                    <option value="Filsafat" {{ old('kategori') == 'Filsafat' ? 'selected' : '' }}>Filsafat</option>
                </select>
                @error('kategori')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- 3. ISI ARTIKEL -->
            <div>
                <label class="block text-sm font-bold text-[#1A110A] mb-1">Isi Artikel</label>
                <textarea name="isi" rows="6" required
                          class="w-full px-4 py-2.5 rounded-xl border border-[#E2D5C3] focus:ring-2 focus:ring-[#C38E2A] focus:outline-none">{{ old('isi') }}</textarea>
                @error('isi')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- 4. KESIMPULAN -->
            <div>
                <label class="block text-sm font-bold text-[#1A110A] mb-1">Kesimpulan (Opsional)</label>
                <textarea name="kesimpulan" rows="3"
                          class="w-full px-4 py-2.5 rounded-xl border border-[#E2D5C3] focus:ring-2 focus:ring-[#C38E2A] focus:outline-none">{{ old('kesimpulan') }}</textarea>
                @error('kesimpulan')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- 5. GAMBAR -->
            <div>
                <label class="block text-sm font-bold text-[#1A110A] mb-1">Unggah Gambar / Sampul</label>
                <input type="file" name="gambar" accept="image/*"
                       class="w-full px-4 py-2 rounded-xl border border-[#E2D5C3] focus:outline-none bg-[#FAF6F0]">
                @error('gambar')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- TOMBOL SIMPAN -->
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('penulis.artikel.index') }}" 
                   class="px-5 py-2.5 text-sm font-semibold rounded-xl border border-[#E2D5C3] text-[#7A6B5D] hover:bg-[#FAF6F0]">
                    Batal
                </a>
                <button type="submit" 
                        style="background-color: #C38E2A; color: #ffffff;"
                        class="px-5 py-2.5 text-sm font-semibold rounded-xl shadow-sm hover:opacity-90 transition">
                    Simpan Artikel
                </button>
            </div>

        </form>
    </div>

</div>
@endsection