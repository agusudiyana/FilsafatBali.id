@extends('penulis.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>

        <h1 class="text-3xl font-bold text-[#1A110A]">
            Data Istilah
        </h1>

        <p class="text-gray-500">
            Daftar Istilah yang telah Anda kirim.
        </p>

    </div>

    <a href="{{ route('penulis.istilah.create') }}"
       class="bg-[#C48D2D] text-white px-5 py-3 rounded-lg hover:bg-[#B07C20]">

        + Tambah Istilah

    </a>

</div>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded-lg mb-5">

    {{ session('success') }}

</div>

@endif

<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-[#F5E9D7]">

            <tr>

                <th class="p-4 text-left">No</th>

                <th class="p-4 text-left">Istilah</th>

                <th class="p-4 text-left">Kategori</th>

                <th class="p-4 text-left">Status</th>

            </tr>

        </thead>

        <tbody>

            @forelse($istilahs as $item)

            <tr class="border-t">

                <td class="p-4">
                    {{ $loop->iteration }}
                </td>

                <td class="p-4">
                    {{ $item->istilah }}
                </td>

                <td class="p-4">
                    {{ $item->kategori }}
                </td>

                <td class="p-4">

                    @if($item->status=='pending')

                        <span class="text-yellow-600 font-semibold">
                            Pending
                        </span>

                    @elseif($item->status=='disetujui')

                        <span class="text-green-600 font-semibold">
                            Disetujui
                        </span>

                    @else

                        <span class="text-red-600 font-semibold">
                            Ditolak
                        </span>

                    @endif

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="4" class="text-center p-8">

                    Belum ada data Istilah.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection