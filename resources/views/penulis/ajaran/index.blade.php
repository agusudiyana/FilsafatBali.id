@extends('penulis.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-[#1A110A]">
            Data Ajaran
        </h1>

        <p class="text-gray-500">
            Daftar kiriman Anda.
        </p>

    </div>

    <a href="{{ route('penulis.ajaran.create') }}"
        class="bg-[#C48D2D] hover:bg-[#A9781F] text-white px-5 py-3 rounded-lg">

        + Tambah Ajaran

    </a>

</div>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">

    {{ session('success') }}

</div>

@endif

<div class="bg-white rounded-xl shadow overflow-hidden">

<table class="w-full">

<thead class="bg-[#F3E7D0]">

<tr>

<th class="p-4">No</th>
<th>Judul</th>
<th>Status</th>

</tr>

</thead>

<tbody>

@forelse($ajarans as $a)

<tr class="border-b">

<td class="p-4">

{{ $loop->iteration }}

</td>

<td>

{{ $a->judul }}

</td>

<td>

@if($a->status=='pending')

<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded">

Pending

</span>

@elseif($a->status=='disetujui')

<span class="bg-green-100 text-green-700 px-3 py-1 rounded">

Disetujui

</span>

@else

<span class="bg-red-100 text-red-700 px-3 py-1 rounded">

Ditolak

</span>

@endif

</td>

</tr>

@empty

<tr>

<td colspan="3" class="text-center p-8">

Belum ada data.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection