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
        min-height: 250px;
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
        Tambah Satua
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

    <form id="form-satua" action="{{ route('penulis.satua.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Judul -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Judul</label>
            <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Contoh: Ni Ketimun Mas"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>
        </div>

        <!-- Subtitle / Judul Inggris -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Sub Judul / Terjemahan Inggris (Opsional)</label>
            <input type="text" name="sub_judul" value="{{ old('sub_judul', old('subtitle')) }}" placeholder="Contoh: Golden Cucumber Girl"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
        </div>

        <!-- Gambar Utama -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Gambar Banner / Ilustrasi</label>
            <input type="file" name="gambar"
                   class="w-full border border-gray-300 rounded-lg p-3 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
        </div>

        <!-- Ringkasan Cerita -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Ringkasan Cerita</label>
            <textarea name="ringkasan" rows="3" placeholder="Tuliskan ringkasan singkat cerita..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('ringkasan') }}</textarea>
        </div>

        <!-- Isi Satua / Cerita Lengkap -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Isi Satua / Cerita Lengkap</label>
            
            <!-- Editor Quill -->
            <div id="editor-isi">
                {!! old('isi') !!}
            </div>

            <!-- Input Hidden untuk Backend -->
            <input type="hidden" name="isi" id="input-isi">
        </div>

        <!-- Tokoh Utama -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Tokoh Utama</label>
            <textarea name="tokoh" rows="3" placeholder="Sebutkan dan jelaskan tokoh utama..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('tokoh', old('tokoh_utama')) }}</textarea>
        </div>

        <!-- Alur Cerita -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Alur Cerita</label>
            <textarea name="alur" rows="4" placeholder="Jelaskan alur atau jalan cerita..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('alur', old('alur_cerita')) }}</textarea>
        </div>

        <!-- Nilai Moral -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Nilai Moral</label>
            <textarea name="moral" rows="3" placeholder="Tuliskan nilai moral yang terkandung..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('moral', old('nilai_moral')) }}</textarea>
        </div>

        <!-- Pesan Filosofi -->
        <div class="mb-6">
            <label class="block font-semibold mb-2 text-gray-700">Pesan Filosofi</label>
            <textarea name="filosofi" rows="3" placeholder="Tuliskan pesan filosofi cerita..."
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('filosofi', old('pesan_filosofi')) }}</textarea>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex gap-4">
            <button type="submit" class="bg-[#C48D2D] hover:bg-[#B07C20] text-white px-6 py-3 rounded-lg font-semibold transition">
                Simpan
            </button>
            <a href="{{ route('penulis.satua.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition">
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

        // Konfigurasi Toolbar
        const toolbarOptions = [
            [{ 'font': Font.whitelist }],                     // Dropdown Font yang sudah diisi font lengkap
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

        // Inisialisasi Quill Editor
        const quillIsi = new Quill('#editor-isi', {
            theme: 'snow',
            placeholder: 'Tuliskan isi cerita satua secara lengkap di sini...',
            modules: {
                toolbar: toolbarOptions
            }
        });

        // Menyalin HTML ke Input Hidden saat Submit
        const form = document.querySelector('#form-satua');
        form.onsubmit = function () {
            const inputIsi = document.querySelector('#input-isi');
            inputIsi.value = quillIsi.root.innerHTML;
        };
    });
</script>

@endsection