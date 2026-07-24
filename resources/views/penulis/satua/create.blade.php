@extends('penulis.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white rounded-xl shadow p-8">

    <h1 class="text-3xl font-bold text-[#1A110A] mb-6">
        Tambah Satua
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

    <form action="{{ route('penulis.satua.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-5">

            <label class="block font-semibold mb-2">
                Judul Satua
            </label>

            <input type="text"
                   name="judul"
                   class="w-full border rounded-lg p-3"
                   value="{{ old('judul') }}"
                   required>

        </div>

        <div class="mb-5">

            <label class="block font-semibold mb-2">
                Isi Satua
            </label>

            <textarea name="isi"
                      rows="6"
                      class="w-full border rounded-lg p-3"
                      required>{{ old('isi') }}</textarea>

        </div>

        <div class="mb-5">

            <label class="block font-semibold mb-2">
                Tokoh
            </label>

            <input type="text"
                   name="tokoh"
                   class="w-full border rounded-lg p-3"
                   value="{{ old('tokoh') }}">

        </div>

        <div class="mb-5">

            <label class="block font-semibold mb-2">
                Asal Daerah
            </label>

            <input type="text"
                   name="asal"
                   class="w-full border rounded-lg p-3"
                   value="{{ old('asal') }}">

        </div>

        <div class="mb-6">

            <label class="block font-semibold mb-2">
                Gambar
            </label>

            <input type="file"
                   name="gambar"
                   class="w-full border rounded-lg p-3">

        </div>

        <div class="flex gap-4">

            <button type="submit"
                    class="bg-[#C48D2D] hover:bg-[#B07C20] text-white px-6 py-3 rounded-lg">

                Simpan

            </button>

            <a href="{{ route('penulis.satua.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection