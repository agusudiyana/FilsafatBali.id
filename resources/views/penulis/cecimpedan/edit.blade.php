@extends('penulis.layouts.app')

@section('content')

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow p-8">

        <h1 class="text-3xl font-bold text-[#1A110A] mb-6">
            Edit Cecimpedan
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

        <form action="{{ route('penulis.cecimpedan.update', $cecimpedan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Tingkat Kesulitan -->
            <div class="mb-5">
                <label class="block font-semibold mb-2 text-gray-700">Tingkat Kesulitan</label>
                <select name="tingkat"
                    class="w-full border border-gray-300 rounded-lg p-3 bg-white focus:outline-none focus:ring-2 focus:ring-[#C48D2D]"
                    required>
                    <option value="Mudah" {{ old('tingkat', $cecimpedan->tingkat) == 'Mudah' ? 'selected' : '' }}>Mudah
                    </option>
                    <option value="Sedang" {{ old('tingkat', $cecimpedan->tingkat) == 'Sedang' ? 'selected' : '' }}>Sedang
                    </option>
                    <option value="Sulit" {{ old('tingkat', $cecimpedan->tingkat) == 'Sulit' ? 'selected' : '' }}>Sulit
                    </option>
                </select>
            </div>

            <!-- Pertanyaan -->
            <div class="mb-5">
                <label class="block font-semibold mb-2 text-gray-700">Pertanyaan (Bahasa Bali)</label>
                <textarea name="pertanyaan" rows="3"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('pertanyaan', $cecimpedan->pertanyaan) }}</textarea>
            </div>

            <!-- Terjemahan -->
            <div class="mb-5">
                <label class="block font-semibold mb-2 text-gray-700">Terjemahan / Arti (Bahasa Indonesia)</label>
                <textarea name="terjemahan" rows="2"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('terjemahan', $cecimpedan->terjemahan) }}</textarea>
            </div>

            <!-- Jawaban -->
            <div class="mb-5">
                <label class="block font-semibold mb-2 text-gray-700">Jawaban</label>
                <input type="text" name="jawaban" value="{{ old('jawaban', $cecimpedan->jawaban) }}"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]"
                    required>
            </div>

            <!-- Makna (Terpisah) -->
            <div class="mb-5">
                <label class="block font-semibold mb-2 text-gray-700">Makna</label>
                <textarea name="makna" rows="3"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('makna', $cecimpedan->makna) }}</textarea>
            </div>

            <!-- Nilai Filosofis / Pesan Moral (Terpisah) -->
            <div class="mb-5">
                <label class="block font-semibold mb-2 text-gray-700">Nilai Filosofis / Pesan Moral</label>
                <textarea name="filosofi" rows="3"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('filosofi', $cecimpedan->filosofi ?? '') }}</textarea>
            </div>

            <!-- Variasi Daerah -->
            <div class="mb-5">
                <label class="block font-semibold mb-2 text-gray-700">Variasi Daerah (Opsional)</label>
                <textarea name="variasi_daerah" rows="2"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('variasi_daerah', $cecimpedan->variasi_daerah ?? '') }}</textarea>
            </div>

            <!-- Asal Daerah -->
            <div class="mb-5">
                <label class="block font-semibold mb-2 text-gray-700">Asal Daerah</label>
                <input type="text" name="asal_daerah" value="{{ old('asal_daerah', $cecimpedan->asal_daerah ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
            </div>

            <!-- Rekaman / Sumber -->
            <div class="mb-6">
                <label class="block font-semibold mb-2 text-gray-700">Rekaman / Sumber</label>
                <input type="text" name="rekaman" value="{{ old('rekaman', $cecimpedan->rekaman ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
            </div>

            <!-- Tombol Aksi -->
            <div class="flex gap-4">
                <button type="submit"
                    class="bg-[#C48D2D] hover:bg-[#B07C20] text-white px-6 py-3 rounded-lg font-semibold transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('penulis.cecimpedan.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                    Kembali
                </a>
            </div>

        </form>

    </div>

@endsection
