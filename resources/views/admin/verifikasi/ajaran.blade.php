@extends('admin.layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-[#1A110A]">
            Verifikasi Ajaran Tetua
        </h1>

        <p class="text-gray-500">
            Daftar kiriman penulis yang menunggu verifikasi.
        </p>

    </div>

</div>

<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-[#F5E6CC]">

            <tr>
                <th class="p-4">No</th>
                <th class="p-4">ID</th>
                <th class="p-4 text-left">Judul</th>
                <th class="p-4 text-left">Penulis</th>
                <th class="p-4">Status</th>
                <th class="p-4">Aksi</th>
            </tr>

        </thead>

        <tbody>

        @forelse($ajarans as $a)

            <tr class="border-b">

                <td class="p-4 text-center">
                    {{ $loop->iteration }}
                </td>

                <td class="p-4 text-center">
                    {{ $a->id }}
                </td>

                <td class="p-4">
                    {{ $a->judul }}
                </td>

                <td class="p-4">
                    {{ $a->penulis }}
                </td>

                <td class="p-4 text-center">

                    @if($a->status == 'pending')

                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                            Pending
                        </span>

                    @elseif($a->status == 'disetujui')

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                            Disetujui
                        </span>

                    @else

                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                            Ditolak
                        </span>

                    @endif

                </td>

                <td class="p-4 text-center">

                    <a href="{{ route('admin.verifikasi.ajaran.detail', $a->id) }}"
                        class="bg-[#992B20] hover:bg-[#7E1F17] text-white px-4 py-2 rounded-lg">

                        Detail

                    </a>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="6" class="p-8 text-center text-gray-500">
                    Belum ada kiriman dari penulis.
                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection