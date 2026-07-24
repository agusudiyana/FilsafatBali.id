@extends('penulis.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-8">

    <h1 class="text-3xl font-bold text-[#1A110A] mb-6">
        Tambah Cecimpedan
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

    <form action="{{ route('penulis.cecimpedan.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <!-- Judul -->
        <div class="mb-5">
            <label class="block font-semibold mb-2">
                Judul Cecimpedan
            </label>

            <input
                type="text"
                name="judul"
                value="{{ old('judul') }}"
                class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]"
                required>
        </div>

        <!-- Isi -->
        <div class="mb-5">
            <label class="block font-semibold mb-2">
                Isi Cecimpedan
            </label>

            <textarea
                name="isi"
                rows="5"
                class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]"
                required>{{ old('isi') }}</textarea>
        </div>

        <!-- Jawaban -->
        <div class="mb-5">
            <label class="block font-semibold mb-2">
                Jawaban
            </label>

            <input
                type="text"
                name="jawaban"
                value="{{ old('jawaban') }}"
                class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]"
                required>
        </div>

        <!-- Kategori -->
        <div class="mb-5">
            <label class="block font-semibold mb-2">
                Kategori
            </label>

            <input
                type="text"
                name="kategori"
                value="{{ old('kategori') }}"
                class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
        </div>

        <!-- Gambar -->
        <div class="mb-6">
            <label class="block font-semibold mb-2">
                Upload Gambar
            </label>

            <input
                type="file"
                name="gambar"
                class="w-full border rounded-lg p-3">
        </div>

        <!-- Tombol -->
        <div class="flex gap-4">

            <button
                type="submit"
                class="bg-[#C48D2D] hover:bg-[#B07C20] text-white px-6 py-3 rounded-lg">
                Simpan
            </button>

            <a href="{{ route('penulis.cecimpedan.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">
                Kembali
            </a>

        </div>

    </form>

</div>

@endsection