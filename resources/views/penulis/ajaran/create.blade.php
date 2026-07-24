@extends('penulis.layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">

Tambah Ajaran

</h1>

<form action="{{ route('penulis.ajaran.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="bg-white p-8 rounded-xl shadow">

@csrf

<div class="mb-5">

<label>Judul</label>

<input
type="text"
name="judul"
class="w-full border rounded-lg p-3 mt-2">

</div>

<div class="mb-5">

<label>Isi</label>

<textarea
name="isi"
rows="7"
class="w-full border rounded-lg p-3 mt-2"></textarea>

</div>

<div class="mb-5">

<label>Contoh</label>

<textarea
name="contoh"
rows="4"
class="w-full border rounded-lg p-3 mt-2"></textarea>

</div>

<div class="mb-5">

<label>Referensi</label>

<input
type="text"
name="referensi"
class="w-full border rounded-lg p-3 mt-2">

</div>

<div class="mb-5">

<label>Gambar</label>

<input
type="file"
name="gambar"
class="mt-2">

</div>

<button
class="bg-[#C48D2D] hover:bg-[#A9781F] text-white px-8 py-3 rounded-lg">

Kirim ke Admin

</button>

</form>

@endsection