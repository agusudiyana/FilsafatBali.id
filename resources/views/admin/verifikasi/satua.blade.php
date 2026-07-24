@extends('admin.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>
        <h1 class="text-3xl font-bold text-[#1A110A]">
            Verifikasi Satua Bali
        </h1>

        <p class="text-gray-500">
            Daftar kiriman Satua yang menunggu verifikasi.
        </p>
    </div>

</div>

<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-[#F5E6CC]">

            <tr>
                <th class="p-4">No</th>
                <th class="p-4 text-left">Judul</th>
                <th class="p-4 text-left">Asal</th>
                <th class="p-4">Status</th>
                <th class="p-4">Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse($satuas as $satua)

            <tr class="border-b">

                <td class="p-4 text-center">
                    {{ $loop->iteration }}
                </td>

                <td class="p-4">
                    {{ $satua->judul }}
                </td>

                <td class="p-4">
                    {{ $satua->asal }}
                </td>

                <td class="p-4 text-center">

                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                        Pending
                    </span>

                </td>

                <td class="p-4 text-center">

                    <a href="{{ route('admin.verifikasi.satua.detail',$satua->id) }}"
                        class="bg-[#992B20] hover:bg-[#7E1F17] text-white px-4 py-2 rounded-lg">

                        Detail

                    </a>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5" class="p-8 text-center text-gray-500">

                    Belum ada kiriman Satua.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection