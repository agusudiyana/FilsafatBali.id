@extends('admin.layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg p-8">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-4xl font-bold text-[#1A110A]">

                    {{ $satua->judul }}

                </h1>

                <p class="text-gray-500 mt-2">

                    Asal :
                    <strong>{{ $satua->asal }}</strong>

                </p>

            </div>

            <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700">

                {{ ucfirst($satua->status) }}

            </span>

        </div>

        @if($satua->gambar)

            <img src="{{ asset('storage/'.$satua->gambar) }}"
                class="rounded-xl w-full h-[420px] object-cover mb-8">

        @endif

        <div class="space-y-8">

            <div>

                <h2 class="font-bold text-xl mb-3">

                    Isi Satua

                </h2>

                <p class="leading-8 text-gray-700">

                    {{ $satua->isi }}

                </p>

            </div>

            <div>

                <h2 class="font-bold text-xl mb-3">

                    Tokoh

                </h2>

                <p class="leading-8 text-gray-700">

                    {{ $satua->tokoh }}

                </p>

            </div>

        </div>

        <div class="flex gap-4 mt-10">

            <form action="{{ route('admin.verifikasi.satua.setujui',$satua->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <button
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">

                    ✔ Setujui

                </button>

            </form>

            <form action="{{ route('admin.verifikasi.satua.tolak',$satua->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <button
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg">

                    ✖ Tolak

                </button>

            </form>

            <a href="{{ route('admin.verifikasi.satua') }}"
                class="bg-gray-300 hover:bg-gray-400 px-6 py-3 rounded-lg">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection