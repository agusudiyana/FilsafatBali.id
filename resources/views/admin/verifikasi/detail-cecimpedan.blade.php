@extends('admin.layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg p-8">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-4xl font-bold">
                    {{ $cecimpedan->judul }}
                </h1>

                <p class="text-gray-500 mt-2">
                    Penulis :
                    <strong>{{ $cecimpedan->penulis }}</strong>
                </p>

            </div>

            <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700">
                {{ ucfirst($cecimpedan->status) }}
            </span>

        </div>

        @if($cecimpedan->gambar)

            <img src="{{ asset('storage/'.$cecimpedan->gambar) }}"
                class="rounded-xl w-full h-[420px] object-cover mb-8">

        @endif

        <div class="space-y-8">

            <div>

                <h2 class="font-bold text-xl mb-3">
                    Isi Cecimpedan
                </h2>

                <p class="leading-8">
                    {{ $cecimpedan->isi }}
                </p>

            </div>

            <div>

                <h2 class="font-bold text-xl mb-3">
                    Jawaban
                </h2>

                <p class="leading-8">
                    {{ $cecimpedan->jawaban }}
                </p>

            </div>

            <div>

                <h2 class="font-bold text-xl mb-3">
                    Referensi
                </h2>

                <p class="leading-8">
                    {{ $cecimpedan->referensi }}
                </p>

            </div>

        </div>

        <div class="flex gap-4 mt-10">

            <form action="{{ route('admin.verifikasi.cecimpedan.setujui',$cecimpedan->id) }}" method="POST">

                @csrf
                @method('PUT')

                <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">
                    ✔ Setujui
                </button>

            </form>

            <form action="{{ route('admin.verifikasi.cecimpedan.tolak',$cecimpedan->id) }}" method="POST">

                @csrf
                @method('PUT')

                <button class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg">
                    ✖ Tolak
                </button>

            </form>

            <a href="{{ route('admin.verifikasi.cecimpedan') }}"
                class="bg-gray-300 hover:bg-gray-400 px-6 py-3 rounded-lg">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection