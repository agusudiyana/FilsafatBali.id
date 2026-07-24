@extends('penulis.layouts.app')

@section('content')

<div class="flex justify-between items-center">

    <div>
        <h1 class="text-4xl font-bold text-[#1A110A]">
            Dashboard Penulis
        </h1>

        <p class="text-gray-500 mt-2">
            Selamat datang. Silakan kirim karya baru.
        </p>
    </div>


    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit"
            class="bg-red-500 text-white px-5 py-2 rounded-lg hover:bg-red-600">
            Logout
        </button>

    </form>

</div>


<div class="grid grid-cols-3 gap-6 mt-10">

    <div class="bg-yellow-100 rounded-xl shadow p-6">

        <h3>
            Total Kiriman
        </h3>

        <h1 class="text-5xl font-bold mt-4">
            {{ $total }}
        </h1>

    </div>


    <div class="bg-yellow-100 rounded-xl shadow p-6">

        <h3>
            Pending
        </h3>

        <h1 class="text-5xl font-bold mt-4">
            {{ $pending }}
        </h1>

    </div>


    <div class="bg-green-100 rounded-xl shadow p-6">

        <h3>
            Disetujui
        </h3>

        <h1 class="text-5xl font-bold mt-4">
            {{ $disetujui }}
        </h1>

    </div>

</div>


@endsection