@extends('penulis.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white rounded-xl shadow p-8">

    <h1 class="text-3xl font-bold text-[#1A110A] mb-6">
        Tambah Satua
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

    <form action="{{ route('penulis.satua.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Judul -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Judul</label>
            <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Contoh: Ni Ketimun Mas"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>
        </div>

        <!-- Subtitle / Judul Inggris -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Sub Judul / Terjemahan Inggris (Opsional)</label>
            <input type="text" name="subtitle" value="{{ old('subtitle') }}" placeholder="Contoh: Golden Cucumber Girl"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
        </div>

        <!-- Gambar Utama -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Gambar Banner / Ilustrasi</label>
            <input type="file" name="gambar"
                   class="w-full border border-gray-300 rounded-lg p-3 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
        </div>

        <!-- Ringkasan Cerita -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Ringkasan Cerita</label>
            <textarea name="ringkasan" rows="3" placeholder="Tuliskan ringkasan singkat cerita..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('ringkasan') }}</textarea>
        </div>

        <!-- Isi Satua / Cerita Lengkap (FIELD YANG DITAMBAHKAN) -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Isi Satua / Cerita Lengkap</label>
            <textarea name="isi" rows="6" placeholder="Tuliskan isi cerita satua secara lengkap di sini..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('isi') }}</textarea>
        </div>

        <!-- Tokoh Utama -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Tokoh Utama</label>
            <textarea name="tokoh_utama" rows="3" placeholder="Sebutkan dan jelaskan tokoh utama..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('tokoh_utama') }}</textarea>
        </div>

        <!-- Alur Cerita -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Alur Cerita</label>
            <textarea name="alur_cerita" rows="4" placeholder="Jelaskan alur atau jalan cerita..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('alur_cerita') }}</textarea>
        </div>

        <!-- Nilai Moral -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Nilai Moral</label>
            <textarea name="nilai_moral" rows="3" placeholder="Tuliskan nilai moral yang terkandung..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('nilai_moral') }}</textarea>
        </div>

        <!-- Pesan Filosofi -->
        <div class="mb-6">
            <label class="block font-semibold mb-2 text-gray-700">Pesan Filosofi</label>
            <textarea name="pesan_filosofi" rows="3" placeholder="Tuliskan pesan filosofi cerita..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('pesan_filosofi') }}</textarea>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex gap-4">
            <button type="submit" class="bg-[#C48D2D] hover:bg-[#B07C20] text-white px-6 py-3 rounded-lg font-semibold transition">
                Simpan
            </button>
            <a href="{{ route('penulis.satua.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection