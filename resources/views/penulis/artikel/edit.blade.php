@extends('penulis.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white rounded-xl shadow p-8">

    <h1 class="text-3xl font-bold text-[#1A110A] mb-6">
        Edit Artikel
    </h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-lg mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penulis.artikel.update', $ajaran->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Judul -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Judul Artikel</label>
            <input type="text" name="judul" value="{{ old('judul', $ajaran->judul) }}"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>
        </div>

        <!-- Kategori -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Kategori</label>
            <select name="kategori" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Ajaran Tertua" {{ old('kategori', $ajaran->kategori ?? '') == 'Ajaran Tertua' ? 'selected' : '' }}>Ajaran Tertua</option>
                <option value="Cecimpedan" {{ old('kategori', $ajaran->kategori ?? '') == 'Cecimpedan' ? 'selected' : '' }}>Cecimpedan</option>
                <option value="Satua Bali" {{ old('kategori', $ajaran->kategori ?? '') == 'Satua Bali' ? 'selected' : '' }}>Satua Bali</option>
                <option value="Istilah Bali" {{ old('kategori', $ajaran->kategori ?? '') == 'Istilah Bali' ? 'selected' : '' }}>Istilah Bali</option>
            </select>
        </div>

        <!-- Gambar -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Gambar (Opsional)</label>
            @if(!empty($ajaran->gambar))
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $ajaran->gambar) }}" alt="Preview" class="w-32 h-20 object-cover rounded-lg border">
                </div>
            @endif
            <input type="file" name="gambar"
                   class="w-full border border-gray-300 rounded-lg p-3 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
        </div>

        <!-- Isi -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Isi Artikel</label>
            <textarea name="isi" rows="6"
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('isi', $ajaran->isi) }}</textarea>
        </div>

        <!-- Kesimpulan -->
        <div class="mb-6">
            <label class="block font-semibold mb-2 text-gray-700">Kesimpulan</label>
            <textarea name="kesimpulan" rows="4"
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('kesimpulan', $ajaran->kesimpulan ?? '') }}</textarea>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex gap-4">
            <button type="submit" class="bg-[#C48D2D] hover:bg-[#B07C20] text-white px-6 py-3 rounded-lg font-semibold transition">
                Simpan Perubahan
            </button>
            <a href="{{ route('penulis.artikel.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection