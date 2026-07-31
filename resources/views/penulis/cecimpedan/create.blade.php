@extends('penulis.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white rounded-xl shadow p-8">

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

    <form action="{{ route('penulis.cecimpedan.store') }}" method="POST">
        @csrf

        <!-- Tingkat Kesulitan -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Tingkat Kesulitan</label>
            <select name="tingkat" class="w-full border border-gray-300 rounded-lg p-3 bg-white focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>
                <option value="" disabled selected>Pilih Tingkat Kesulitan</option>
                <option value="Mudah" {{ old('tingkat') == 'Mudah' ? 'selected' : '' }}>Mudah</option>
                <option value="Sedang" {{ old('tingkat') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                <option value="Sulit" {{ old('tingkat') == 'Sulit' ? 'selected' : '' }}>Sulit</option>
            </select>
        </div>

        <!-- Pertanyaan Cecimpedan (Bahasa Bali) -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Pertanyaan (Bahasa Bali)</label>
            <textarea name="pertanyaan" rows="3" placeholder='Contoh: "Nongos di tegale, ngelah baju liu pesan..."'
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('pertanyaan') }}</textarea>
        </div>

        <!-- Terjemahan / Arti -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Terjemahan / Arti (Bahasa Indonesia)</label>
            <textarea name="terjemahan" rows="2" placeholder="Contoh: Tinggal di ladang, punya baju banyak sekali..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('terjemahan') }}</textarea>
        </div>

        <!-- Jawaban -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Jawaban</label>
            <input type="text" name="jawaban" value="{{ old('jawaban') }}" placeholder="Contoh: Pohon Pisang"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>
        </div>

        <!-- 1. Makna -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Makna</label>
            <textarea name="makna" rows="3" placeholder="Tuliskan makna atau penjelasan singkat teka-teki..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('makna') }}</textarea>
        </div>

        <!-- 2. Nilai Filosofis -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Nilai Filosofis / Pesan Moral</label>
            <textarea name="filosofi" rows="3" placeholder="Tuliskan nilai filosofis atau pesan moral mendalam yang terkandung..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('filosofi') }}</textarea>
        </div>

        <!-- Variasi Daerah -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Variasi Daerah (Opsional)</label>
            <textarea name="variasi_daerah" rows="2" placeholder="Contoh: Kadang disebut juga melambangkan..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('variasi_daerah') }}</textarea>
        </div>

        <!-- Asal Daerah -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Asal Daerah</label>
            <input type="text" name="asal_daerah" value="{{ old('asal_daerah') }}" placeholder="Contoh: Tabanan, Bali Barat"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
        </div>

        <!-- Rekaman / Sumber -->
        <div class="mb-6">
            <label class="block font-semibold mb-2 text-gray-700">Rekaman / Sumber</label>
            <input type="text" name="rekaman" value="{{ old('rekaman') }}" placeholder="Contoh: Balai Bahasa Provinsi Bali"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
        </div>

        <!-- Tombol Aksi -->
        <div class="flex gap-4">
            <button type="submit" class="bg-[#C48D2D] hover:bg-[#B07C20] text-white px-6 py-3 rounded-lg font-semibold transition">
                Simpan
            </button>
            <a href="{{ route('penulis.cecimpedan.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection