@extends('admin.layouts.app')

@section('content')

<div>

    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="text-3xl font-bold text-[#1A110A]">
                Data Ajaran Tetua
            </h1>

            <p class="text-gray-500 mt-1">
                Kelola seluruh ajaran yang ada di FilsafatBali.id
            </p>

        </div>

        <a href="{{ route('ajaran.create') }}"
            class="bg-[#992B20] hover:bg-[#7E1F17] text-white px-5 py-3 rounded-lg">

            + Tambah Ajaran

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-5">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-[#F5E6CC]">

                <tr>

                    <th class="p-4 text-left">No</th>
                    <th class="p-4 text-left">Judul</th>
                    <th class="p-4 text-left">Penulis</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($ajarans as $a)

                <tr class="border-t">

                    <td class="p-4">
                        {{ $loop->iteration }}
                    </td>

                    <td class="p-4">
                        {{ $a->judul }}
                    </td>

                    <td class="p-4">
                        {{ $a->penulis }}
                    </td>

                    <td class="p-4">

                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">

                            {{ $a->status }}

                        </span>

                    </td>

                    <td class="p-4 flex gap-3">

                        <a href="{{ route('ajaran.edit',$a->id) }}"
                            class="text-blue-600">

                            Edit

                        </a>

                        <form action="{{ route('ajaran.destroy',$a->id) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                class="text-red-600">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="p-8 text-center text-gray-500">

                        Belum ada data ajaran.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection