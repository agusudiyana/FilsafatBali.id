@extends('penulis.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white rounded-xl shadow p-8">

    <h1 class="text-3xl font-bold text-[#1A110A] mb-6">
        Tambah Istilah
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

    <form action="{{ route('penulis.istilah.store') }}" method="POST">
        @csrf

        <!-- Istilah -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Istilah</label>
            <input type="text" name="istilah" value="{{ old('istilah') }}" placeholder="Contoh: Ngaben"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>
        </div>

        <!-- Kategori -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Kategori</label>
            <select name="kategori" class="w-full border border-gray-300 rounded-lg p-3 bg-white focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>
                <option value="" disabled selected>Pilih Kategori</option>
                <option value="Umum" {{ old('kategori') == 'Umum' ? 'selected' : '' }}>Umum</option>
                <option value="Agama" {{ old('kategori') == 'Agama' ? 'selected' : '' }}>Agama</option>
                <option value="Adat" {{ old('kategori') == 'Adat' ? 'selected' : '' }}>Adat</option>
                <option value="Tempat" {{ old('kategori') == 'Tempat' ? 'selected' : '' }}>Tempat</option>
                <option value="Ritual" {{ old('kategori') == 'Ritual' ? 'selected' : '' }}>Ritual</option>
                <option value="Sosial" {{ old('kategori') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                <option value="Ruang" {{ old('kategori') == 'Ruang' ? 'selected' : '' }}>Ruang</option>
            </select>
        </div>

        <!-- Arti / Definisi Singkat -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Arti / Definisi</label>
            <textarea name="arti" rows="3" placeholder="Tuliskan definisi atau arti singkat..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('arti') }}</textarea>
        </div>

        <!-- Sejarah / Penjelasan Lengkap -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Sejarah / Penjelasan</label>
            <textarea name="sejarah" rows="5" placeholder="Tuliskan sejarah atau penjelasan mendalam..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('sejarah') }}</textarea>
        </div>

        <!-- Contoh Penggunaan -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Contoh Penggunaan</label>
            <textarea name="contoh_penggunaan" rows="2" placeholder="Contoh: Kremasi (Indonesia)"
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('contoh_penggunaan') }}</textarea>
        </div>

        <!-- Padanan Kata -->
        <div class="mb-6">
            <label class="block font-semibold mb-2 text-gray-700">Padanan Kata / Keterangan Terkait</label>
            <input type="text" name="padanan_kata" value="{{ old('padanan_kata') }}" placeholder="Contoh: Digunakan dalam upacara Pitra Yadnya"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
        </div>

        <!-- Tombol Aksi -->
        <div class="flex gap-4">
            <button type="submit" class="bg-[#C48D2D] hover:bg-[#B07C20] text-white px-6 py-3 rounded-lg font-semibold transition">
                Simpan
            </button>
            <a href="{{ route('penulis.istilah.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection