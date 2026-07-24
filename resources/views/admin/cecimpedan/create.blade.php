@extends('admin.layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <h1 class="text-3xl font-bold text-[#1A110A] mb-6">

        Tambah Cecimpedan

    </h1>

    <form action="{{ route('cecimpedan.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white rounded-xl shadow p-8">

        @csrf

        <div class="mb-5">

            <label class="font-semibold">

                Judul

            </label>

            <input type="text"
                name="judul"
                class="w-full border rounded-lg p-3 mt-2">

        </div>

        <div class="mb-5">

            <label class="font-semibold">

                Isi Cecimpedan

            </label>

            <textarea
                name="isi"
                rows="4"
                class="w-full border rounded-lg p-3 mt-2"></textarea>

        </div>

        <div class="mb-5">

            <label class="font-semibold">

                Jawaban

            </label>

            <textarea
                name="jawaban"
                rows="4"
                class="w-full border rounded-lg p-3 mt-2"></textarea>

        </div>

        <div class="mb-5">

            <label class="font-semibold">

                Kategori

            </label>

            <input
                type="text"
                name="kategori"
                class="w-full border rounded-lg p-3 mt-2">

        </div>

        <div class="mb-5">

            <label class="font-semibold">

                Gambar

            </label>

            <input
                type="file"
                name="gambar"
                class="w-full border rounded-lg p-3 mt-2">

        </div>

        <div class="flex gap-4">

            <button
                class="bg-[#992B20] text-white px-6 py-3 rounded-lg">

                Simpan

            </button>

            <a href="{{ route('cecimpedan.index') }}"
                class="bg-gray-300 px-6 py-3 rounded-lg">

                Batal

            </a>

        </div>

    </form>

</div>

@endsection