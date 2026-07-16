<x-app-layout>

    <div class="p-6">

        <h2 class="text-2xl font-bold mb-4">
            Edit Ajaran
        </h2>

        <form action="{{ route('ajaran.update', $ajaran->id) }}" method="POST">

            @csrf
            @method('PUT')

            <p>Judul</p>
            <input type="text" name="judul" value="{{ $ajaran->judul }}">

            <br><br>

            <p>Penulis</p>
            <input type="text" name="penulis" value="{{ $ajaran->penulis }}">

            <br><br>

            <p>Desa</p>
            <input type="text" name="desa" value="{{ $ajaran->desa }}">

            <br><br>

            <p>Tahun</p>
            <input type="text" name="tahun" value="{{ $ajaran->tahun }}">

            <br><br>

            <p>Isi</p>
            <textarea name="isi" rows="6">{{ $ajaran->isi }}</textarea>

            <br><br>

            <button type="submit">
                Update
            </button>

        </form>

    </div>

</x-app-layout>