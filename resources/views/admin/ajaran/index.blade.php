<x-app-layout>

    <div class="p-6">

        <h1 class="text-3xl font-bold mb-4">
            Data Ajaran
        </h1>

        <a href="{{ route('ajaran.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            + Tambah Ajaran
        </a>

        @if(session('success'))
            <div style="margin-top:15px; color:green;">
                {{ session('success') }}
            </div>
        @endif

        <table border="1" cellpadding="10" cellspacing="0" class="mt-4">

            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            @forelse($ajarans as $a)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->judul }}</td>
                    <td>{{ $a->penulis }}</td>
                    <td>{{ $a->status }}</td>

                    <td>

                        <a href="{{ route('ajaran.edit', $a->id) }}">
                            ✏ Edit
                        </a>

                        |

                        <form action="{{ route('ajaran.destroy', $a->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                🗑 Hapus
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" align="center">
                        Belum ada data.
                    </td>
                </tr>

            @endforelse

        </table>

    </div>

</x-app-layout>