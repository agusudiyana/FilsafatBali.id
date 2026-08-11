@extends('penulis.layouts.app')

@section('content')

<!-- CSS Quill JS -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

<!-- Load Font Tambahan dari Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins:wght@400;600&family=Merriweather&display=swap" rel="stylesheet">

<style>
    /* 1. Tampilan Toolbar dan Container Editor */
    .ql-toolbar.ql-snow {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
        border-color: #D1D5DB;
        background-color: #F9FAFB;
    }
    .ql-container.ql-snow {
        border-bottom-left-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
        border-color: #D1D5DB;
        font-size: 1rem;
    }
    .ql-editor {
        min-height: 150px;
    }

    /* 2. Definisi Keluarga Font untuk Quill JS */
    .ql-font-arial { font-family: Arial, sans-serif; }
    .ql-font-courier { font-family: "Courier New", Courier, monospace; }
    .ql-font-georgia { font-family: Georgia, serif; }
    .ql-font-inter { font-family: 'Inter', sans-serif; }
    .ql-font-lucida { font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif; }
    .ql-font-merriweather { font-family: 'Merriweather', serif; }
    .ql-font-poppins { font-family: 'Poppins', sans-serif; }
    .ql-font-times { font-family: "Times New Roman", Times, serif; }
    .ql-font-trebuchet { font-family: "Trebuchet MS", sans-serif; }
    .ql-font-verdana { font-family: Verdana, sans-serif; }

    /* 3. Tampilan Nama Font pada Dropdown Toolbar Quill */
    .ql-snow .ql-picker.ql-font .ql-picker-label[data-value="arial"]::before,
    .ql-snow .ql-picker.ql-font .ql-picker-item[data-value="arial"]::before { content: 'Arial'; font-family: Arial, sans-serif; }

    .ql-snow .ql-picker.ql-font .ql-picker-label[data-value="courier"]::before,
    .ql-snow .ql-picker.ql-font .ql-picker-item[data-value="courier"]::before { content: 'Courier'; font-family: "Courier New", monospace; }

    .ql-snow .ql-picker.ql-font .ql-picker-label[data-value="georgia"]::before,
    .ql-snow .ql-picker.ql-font .ql-picker-item[data-value="georgia"]::before { content: 'Georgia'; font-family: Georgia, serif; }

    .ql-snow .ql-picker.ql-font .ql-picker-label[data-value="inter"]::before,
    .ql-snow .ql-picker.ql-font .ql-picker-item[data-value="inter"]::before { content: 'Inter'; font-family: 'Inter', sans-serif; }

    .ql-snow .ql-picker.ql-font .ql-picker-label[data-value="lucida"]::before,
    .ql-snow .ql-picker.ql-font .ql-picker-item[data-value="lucida"]::before { content: 'Lucida'; font-family: "Lucida Sans", sans-serif; }

    .ql-snow .ql-picker.ql-font .ql-picker-label[data-value="merriweather"]::before,
    .ql-snow .ql-picker.ql-font .ql-picker-item[data-value="merriweather"]::before { content: 'Merriweather'; font-family: 'Merriweather', serif; }

    .ql-snow .ql-picker.ql-font .ql-picker-label[data-value="poppins"]::before,
    .ql-snow .ql-picker.ql-font .ql-picker-item[data-value="poppins"]::before { content: 'Poppins'; font-family: 'Poppins', sans-serif; }

    .ql-snow .ql-picker.ql-font .ql-picker-label[data-value="times"]::before,
    .ql-snow .ql-picker.ql-font .ql-picker-item[data-value="times"]::before { content: 'Times New Roman'; font-family: "Times New Roman", serif; }

    .ql-snow .ql-picker.ql-font .ql-picker-label[data-value="trebuchet"]::before,
    .ql-snow .ql-picker.ql-font .ql-picker-item[data-value="trebuchet"]::before { content: 'Trebuchet MS'; font-family: "Trebuchet MS", sans-serif; }

    .ql-snow .ql-picker.ql-font .ql-picker-label[data-value="verdana"]::before,
    .ql-snow .ql-picker.ql-font .ql-picker-item[data-value="verdana"]::before { content: 'Verdana'; font-family: Verdana, sans-serif; }
</style>

<div class="max-w-4xl mx-auto bg-white rounded-xl shadow p-8">

    <h1 class="text-3xl font-bold text-[#1A110A] mb-6">
        Tambah Istilah
    </h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-lg mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="form-istilah" action="{{ route('penulis.istilah.store') }}" method="POST">
        @csrf

        <!-- Istilah -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Istilah</label>
            <input type="text" name="istilah" value="{{ old('istilah') }}" placeholder="Contoh: Ngaben"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>
        </div>

        <!-- Kategori -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Kategori</label>
            <select name="kategori" class="w-full border border-gray-300 rounded-lg p-3 bg-white focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>
                <option value="" disabled selected>Pilih Kategori</option>
                <option value="Umum" {{ old('kategori') == 'Umum' ? 'selected' : '' }}>Umum</option>
                <option value="Agama" {{ old('kategori') == 'Agama' ? 'selected' : '' }}>Agama</option>
                <option value="Adat" {{ old('kategori') == 'Adat' ? 'selected' : '' }}>Adat</option>
                <option value="Tempat" {{ old('kategori') == 'Tempat' ? 'selected' : '' }}>Tempat</option>
                <option value="Ritual" {{ old('kategori') == 'Ritual' ? 'selected' : '' }}>Ritual</option>
                <option value="Sosial" {{ old('kategori') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                <option value="Ruang" {{ old('kategori') == 'Ruang' ? 'selected' : '' }}>Ruang</option>
            </select>
        </div>

        <!-- Arti / Definisi Singkat (QUILL EDITOR) -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Arti / Definisi</label>
            <div id="editor-arti">
                {!! old('arti') !!}
            </div>
            <input type="hidden" name="arti" id="input-arti">
        </div>

        <!-- Sejarah / Penjelasan Lengkap (QUILL EDITOR) -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Sejarah / Penjelasan</label>
            <div id="editor-sejarah">
                {!! old('sejarah') !!}
            </div>
            <input type="hidden" name="sejarah" id="input-sejarah">
        </div>

        <!-- Contoh Penggunaan -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Contoh Penggunaan</label>
            <textarea name="contoh_penggunaan" rows="2" placeholder="Contoh: Kremasi (Indonesia)"
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('contoh_penggunaan') }}</textarea>
        </div>

        <!-- Padanan Kata -->
        <div class="mb-6">
            <label class="block font-semibold mb-2 text-gray-700">Padanan Kata / Keterangan Terkait</label>
            <input type="text" name="padanan_kata" value="{{ old('padanan_kata') }}" placeholder="Contoh: Digunakan dalam upacara Pitra Yadnya"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
        </div>

        <!-- Tombol Aksi -->
        <div class="flex gap-4">
            <button type="submit" class="bg-[#C48D2D] hover:bg-[#B07C20] text-white px-6 py-3 rounded-lg font-semibold transition">
                Simpan
            </button>
            <a href="{{ route('penulis.istilah.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                Kembali
            </a>
        </div>

    </form>

</div>

<!-- JS Quill JS -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Registrasi Font Baru ke Quill JS
        const Font = Quill.import('formats/font');
        Font.whitelist = [
            'arial', 
            'courier', 
            'georgia', 
            'inter', 
            'lucida', 
            'merriweather', 
            'poppins', 
            'times', 
            'trebuchet', 
            'verdana'
        ];
        Quill.register(Font, true);

        // Konfigurasi Toolbar Fitur Lengkap
        const toolbarOptions = [
            [{ 'font': Font.whitelist }],
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            ['bold', 'italic', 'underline', 'strike'],        
            [{ 'color': [] }, { 'background': [] }],          
            [{ 'script': 'sub'}, { 'script': 'super' }],      
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],     
            [{ 'indent': '-1'}, { 'indent': '+1' }],          
            [{ 'align': [] }],                                
            ['blockquote', 'code-block'],                     
            ['link', 'image'],                                
            ['clean']                                         
        ];

        // Inisialisasi Quill Editor untuk "Arti"
        const quillArti = new Quill('#editor-arti', {
            theme: 'snow',
            placeholder: 'Tuliskan definisi atau arti singkat...',
            modules: { toolbar: toolbarOptions }
        });

        // Inisialisasi Quill Editor untuk "Sejarah"
        const quillSejarah = new Quill('#editor-sejarah', {
            theme: 'snow',
            placeholder: 'Tuliskan sejarah atau penjelasan mendalam...',
            modules: { toolbar: toolbarOptions }
        });

        // Menyalin HTML ke Input Hidden saat Form Disubmit
        const form = document.querySelector('#form-istilah');
        form.onsubmit = function () {
            document.querySelector('#input-arti').value = quillArti.root.innerHTML;
            document.querySelector('#input-sejarah').value = quillSejarah.root.innerHTML;
        };
    });
</script>

@endsection