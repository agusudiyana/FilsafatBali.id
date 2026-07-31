@extends('penulis.layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow p-8">

        <h1 class="text-3xl font-bold text-[#1A110A] mb-6">
            Edit Istilah
        </h1>

        <form action="{{ route('penulis.istilah.update', $istilah->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Istilah -->
            <div class="mb-5">
                <label class="block font-semibold mb-2 text-gray-700">Istilah</label>
                <input type="text" name="istilah" value="{{ old('istilah', $istilah->istilah) }}"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]"
                    required>
            </div>

            <!-- Kategori -->
            <div class="mb-5">
                <label class="block font-semibold mb-2 text-gray-700">Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori', $istilah->kategori) }}"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]"
                    required>
            </div>

            <!-- Arti / Definisi -->
            <div class="mb-5">
                <label class="block font-semibold mb-2 text-gray-700">Arti / Definisi</label>
                <textarea name="arti" rows="3"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('arti', $istilah->arti) }}</textarea>
            </div>

            <!-- Sejarah / Penjelasan -->
            <div class="mb-5">
                <label class="block font-semibold mb-2 text-gray-700">Sejarah / Penjelasan</label>
                <textarea name="sejarah" rows="3"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('sejarah', $istilah->sejarah) }}</textarea>
            </div>

            <!-- Contoh Penggunaan -->
            <div class="mb-5">
                <label class="block font-semibold mb-2 text-gray-700">Contoh Penggunaan</label>
                <textarea name="contoh_penggunaan" rows="2"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('contoh_penggunaan', $istilah->contoh_penggunaan) }}</textarea>
            </div>

            <!-- Padanan Kata / Keterangan Terkait -->
            <div class="mb-6">
                <label class="block font-semibold mb-2 text-gray-700">Padanan Kata / Keterangan Terkait</label>
                <textarea name="padanan_kata" rows="2"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('padanan_kata', $istilah->padanan_kata) }}</textarea>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex gap-4">
                <button type="submit"
                    class="bg-[#C48D2D] hover:bg-[#B07C20] text-white px-6 py-3 rounded-lg font-semibold transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('penulis.istilah.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                    Kembali
                </a>
            </div>

        </form>

    </div>
@endsection
