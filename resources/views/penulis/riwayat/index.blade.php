@extends('penulis.layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Riwayat Kiriman
</h1>

<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-[#F5E9D7]">

            <tr>

                <th class="p-4 text-left">No</th>
                <th class="p-4 text-left">Jenis</th>
                <th class="p-4 text-left">Judul</th>
                <th class="p-4 text-left">Status</th>

            </tr>

        </thead>

        <tbody>

            @php $no = 1; @endphp

            @foreach($ajaran as $item)

            <tr class="border-t">

                <td class="p-4">{{ $no++ }}</td>
                <td class="p-4">Ajaran</td>
                <td class="p-4">{{ $item->judul }}</td>

                <td class="p-4">

                    <span class="
                    @if($item->status=='pending') text-yellow-600
                    @elseif($item->status=='disetujui') text-green-600
                    @else text-red-600
                    @endif
                    font-semibold">

                        {{ ucfirst($item->status) }}

                    </span>

                </td>

            </tr>

            @endforeach

            @foreach($cecimpedan as $item)

            <tr class="border-t">

                <td class="p-4">{{ $no++ }}</td>
                <td class="p-4">Cecimpedan</td>
                <td class="p-4">{{ $item->judul }}</td>

                <td class="p-4">

                    <span class="
                    @if($item->status=='pending') text-yellow-600
                    @elseif($item->status=='disetujui') text-green-600
                    @else text-red-600
                    @endif
                    font-semibold">

                        {{ ucfirst($item->status) }}

                    </span>

                </td>

            </tr>

            @endforeach

            @foreach($satua as $item)

            <tr class="border-t">

                <td class="p-4">{{ $no++ }}</td>
                <td class="p-4">Satua</td>
                <td class="p-4">{{ $item->judul }}</td>

                <td class="p-4">

                    <span class="
                    @if($item->status=='pending') text-yellow-600
                    @elseif($item->status=='disetujui') text-green-600
                    @else text-red-600
                    @endif
                    font-semibold">

                        {{ ucfirst($item->status) }}

                    </span>

                </td>

            </tr>

            @endforeach

            @foreach($istilah as $item)

            <tr class="border-t">

                <td class="p-4">{{ $no++ }}</td>
                <td class="p-4">Istilah</td>
                <td class="p-4">{{ $item->istilah }}</td>

                <td class="p-4">

                    <span class="
                    @if($item->status=='pending') text-yellow-600
                    @elseif($item->status=='disetujui') text-green-600
                    @else text-red-600
                    @endif
                    font-semibold">

                        {{ ucfirst($item->status) }}

                    </span>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection