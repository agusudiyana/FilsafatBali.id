@extends('admin.layouts.app')

@section('content')

<div class="mb-8">

    <h1 class="text-4xl font-bold text-[#1A110A]">
        Dashboard Admin
    </h1>

    <p class="text-gray-500 mt-2">
        Selamat datang di Panel Administrasi FilsafatBali.id
    </p>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    <!-- Total Ajaran -->
    <div class="bg-white rounded-xl shadow p-6">

        <p class="text-gray-500 text-sm">
            Total Ajaran
        </p>

        <h2 class="text-5xl font-bold text-[#992B20] mt-3">
            {{ $totalAjaran }}
        </h2>

    </div>

    <!-- Menunggu Verifikasi -->
    <div class="bg-white rounded-xl shadow p-6">

        <p class="text-gray-500 text-sm">
            Menunggu Verifikasi
        </p>

        <h2 class="text-5xl font-bold text-[#C48D2D] mt-3">
            {{ $pending }}
        </h2>

    </div>

    <!-- Total Disetujui -->
    <div class="bg-white rounded-xl shadow p-6">

        <p class="text-gray-500 text-sm">
            Total Disetujui
        </p>

        <h2 class="text-5xl font-bold text-green-600 mt-3">
            {{ $disetujui }}
        </h2>

    </div>

    <!-- Total Pengguna -->
    <div class="bg-white rounded-xl shadow p-6">

        <p class="text-gray-500 text-sm">
            Total Pengguna
        </p>

        <h2 class="text-5xl font-bold text-[#1A110A] mt-3">
            {{ $totalPengguna }}
        </h2>

    </div>

</div>

@endsection