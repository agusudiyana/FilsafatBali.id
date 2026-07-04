<x-app-layout>

    <div class="p-6">

        <h1 class="text-3xl font-bold mb-4">
            Data Ajaran
        </h1>

        <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded">
            + Tambah Ajaran
        </a>

        <table border="1" cellpadding="10" class="mt-4">

            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Status</th>
            </tr>

            @forelse($ajarans as $a)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->judul }}</td>
                    <td>{{ $a->penulis }}</td>
                    <td>{{ $a->status }}</td>
                </tr>

            @empty

                <tr>
                    <td colspan="4">Belum ada data.</td>
                </tr>

            @endforelse

        </table>

    </div>

</x-app-layout>