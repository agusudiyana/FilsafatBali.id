@extends('penulis.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-[#F6F0E6] text-[#1A110A]">
    
    <!-- Header Section -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-[#1A110A]">Edit Artikel</h1>
        <p class="text-sm text-[#7A6B5D] mt-1">Perbarui data artikel Anda di bawah ini.</p>
    </div>

    <!-- Container Form Card -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E2D5C3]">
        
        <!-- PENTING: enctype="multipart/form-data" DAN @method('PUT') WAJIB ADA -->
        <form action="{{ route('penulis.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- 1. JUDUL -->
            <div>
                <label class="block text-sm font-bold text-[#1A110A] mb-1">Judul Artikel</label>
                <input type="text" name="judul" value="{{ old('judul', $artikel->judul) }}" required
                       class="w-full px-4 py-2.5 rounded-xl border border-[#E2D5C3] focus:ring-2 focus:ring-[#C38E2A] focus:outline-none">
            </div>

            <!-- 2. KATEGORI -->
            <div>
                <label class="block text-sm font-bold text-[#1A110A] mb-1">Kategori</label>
                <select name="kategori" required
                        class="w-full px-4 py-2.5 rounded-xl border border-[#E2D5C3] focus:ring-2 focus:ring-[#C38E2A] focus:outline-none bg-white">
                    <option value="Istilah Bali" {{ old('kategori', $artikel->kategori) == 'Istilah Bali' ? 'selected' : '' }}>Istilah Bali</option>
                    <option value="Cecimpedan" {{ old('kategori', $artikel->kategori) == 'Cecimpedan' ? 'selected' : '' }}>Cecimpedan</option>
                    <option value="Ajaran Tertua" {{ old('kategori', $artikel->kategori) == 'Ajaran Tertua' ? 'selected' : '' }}>Ajaran Tertua</option>
                    <option value="Filsafat" {{ old('kategori', $artikel->kategori) == 'Filsafat' ? 'selected' : '' }}>Filsafat</option>
                </select>
            </div>

            <!-- 3. ISI ARTIKEL -->
            <div>
                <label class="block text-sm font-bold text-[#1A110A] mb-1">Isi Artikel</label>
                <textarea name="isi" rows="6" required
                          class="w-full px-4 py-2.5 rounded-xl border border-[#E2D5C3] focus:ring-2 focus:ring-[#C38E2A] focus:outline-none">{{ old('isi', $artikel->isi) }}</textarea>
            </div>

            <!-- 4. KESIMPULAN -->
            <div>
                <label class="block text-sm font-bold text-[#1A110A] mb-1">Kesimpulan</label>
                <textarea name="kesimpulan" rows="3"
                          class="w-full px-4 py-2.5 rounded-xl border border-[#E2D5C3] focus:ring-2 focus:ring-[#C38E2A] focus:outline-none">{{ old('kesimpulan', $artikel->kesimpulan) }}</textarea>
            </div>

            <!-- 5. GAMBAR -->
            <div>
                <label class="block text-sm font-bold text-[#1A110A] mb-1">Ganti Gambar (Biarkan kosong jika tidak diganti)</label>
                
                @if($artikel->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" class="w-32 h-20 object-cover rounded-lg border">
                    </div>
                @endif

                <input type="file" name="gambar" accept="image/*"
                       class="w-full px-4 py-2 rounded-xl border border-[#E2D5C3] focus:outline-none bg-[#FAF6F0]">
            </div>

            <!-- TOMBOL SIMPAN -->
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('penulis.artikel.index') }}" 
                   class="px-5 py-2.5 text-sm font-semibold rounded-xl border border-[#E2D5C3] text-[#7A6B5D]">
                    Batal
                </a>
                <button type="submit" 
                        style="background-color: #C38E2A; color: #ffffff;"
                        class="px-5 py-2.5 text-sm font-semibold rounded-xl shadow-sm hover:opacity-90">
                    Update Artikel
                </button>
            </div>

        </form>
    </div>

</div>
@endsection