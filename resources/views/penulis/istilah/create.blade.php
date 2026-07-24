@extends('penulis.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white rounded-xl shadow p-8">

    <h1 class="text-3xl font-bold text-[#1A110A] mb-6">

        Tambah Istilah

    </h1>

    @if ($errors->any())

    <div class="bg-red-100 text-red-700 p-4 rounded mb-6">

        <ul class="list-disc pl-5">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    <form action="{{ route('penulis.istilah.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-5">

            <label class="block font-semibold mb-2">

                Istilah

            </label>

            <input
                type="text"
                name="istilah"
                value="{{ old('istilah') }}"
                class="w-full border rounded-lg p-3"
                required>

        </div>

        <div class="mb-5">

            <label class="block font-semibold mb-2">

                Arti

            </label>

            <textarea
                name="arti"
                rows="5"
                class="w-full border rounded-lg p-3"
                required>{{ old('arti') }}</textarea>

        </div>

        <div class="mb-5">

            <label class="block font-semibold mb-2">

                Kategori

            </label>

            <input
                type="text"
                name="kategori"
                value="{{ old('kategori') }}"
                class="w-full border rounded-lg p-3">

        </div>

        <div class="mb-6">

            <label class="block font-semibold mb-2">

                Gambar

            </label>

            <input
                type="file"
                name="gambar"
                class="w-full border rounded-lg p-3">

        </div>

        <div class="flex gap-4">

            <button
                type="submit"
                class="bg-[#C48D2D] hover:bg-[#B07C20] text-white px-6 py-3 rounded-lg">

                Simpan

            </button>

            <a href="{{ route('penulis.istilah.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection