<x-app-layout>

<div class="p-6">

    <h2>Tambah Ajaran</h2>

    <form action="{{ route('ajaran.store') }}" method="POST">

        @csrf

        <p>Judul</p>
        <input type="text" name="judul">

        <br><br>

        <p>Penulis</p>
        <input type="text" name="penulis">

        <br><br>

        <p>Desa</p>
        <input type="text" name="desa">

        <br><br>

        <p>Tahun</p>
        <input type="text" name="tahun">

        <br><br>

        <p>Isi</p>
        <textarea name="isi"></textarea>

        <br><br>

        <button type="submit">
            Simpan
        </button>

    </form>

</div>

</x-app-layout>