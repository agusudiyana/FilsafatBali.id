@extends('penulis.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white rounded-xl shadow p-8">

    <h1 class="text-3xl font-bold text-[#1A110A] mb-6">
        Edit Satua
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

    <form action="{{ route('penulis.satua.update', $satua->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Judul -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $satua->judul) }}"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>
        </div>

        <!-- Subtitle -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Sub Judul / Terjemahan Inggris (Opsional)</label>
            <input type="text" name="subtitle" value="{{ old('subtitle', $satua->subtitle ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
        </div>

        <!-- Gambar -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Gambar Banner / Ilustrasi (Opsional)</label>
            @if(!empty($satua->gambar))
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $satua->gambar) }}" alt="Preview" class="w-32 h-20 object-cover rounded-lg border">
                </div>
            @endif
            <input type="file" name="gambar"
                   class="w-full border border-gray-300 rounded-lg p-3 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
        </div>

        <!-- Ringkasan Cerita -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Ringkasan Cerita</label>
            <textarea name="ringkasan" rows="3"
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('ringkasan', $satua->ringkasan) }}</textarea>
        </div>

        <!-- Tokoh Utama -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Tokoh Utama</label>
            <textarea name="tokoh_utama" rows="3"
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('tokoh_utama', $satua->tokoh_utama) }}</textarea>
        </div>

        <!-- Alur Cerita -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Alur Cerita</label>
            <textarea name="alur_cerita" rows="4"
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('alur_cerita', $satua->alur_cerita) }}</textarea>
        </div>

        <!-- Nilai Moral -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Nilai Moral</label>
            <textarea name="nilai_moral" rows="3"
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('nilai_moral', $satua->nilai_moral) }}</textarea>
        </div>

        <!-- Pesan Filosofi -->
        <div class="mb-6">
            <label class="block font-semibold mb-2 text-gray-700">Pesan Filosofi</label>
            <textarea name="pesan_filosofi" rows="3"
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('pesan_filosofi', $satua->pesan_filosofi ?? '') }}</textarea>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex gap-4">
            <button type="submit" class="bg-[#C48D2D] hover:bg-[#B07C20] text-white px-6 py-3 rounded-lg font-semibold transition">
                Simpan Perubahan
            </button>
            <a href="{{ route('penulis.satua.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection