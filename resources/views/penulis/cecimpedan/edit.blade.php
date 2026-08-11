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
        Edit Cecimpedan
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

    <form id="form-cecimpedan" action="{{ route('penulis.cecimpedan.update', $cecimpedan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Tingkat Kesulitan -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Tingkat Kesulitan</label>
            <select name="tingkat"
                class="w-full border border-gray-300 rounded-lg p-3 bg-white focus:outline-none focus:ring-2 focus:ring-[#C48D2D]"
                required>
                <option value="Mudah" {{ old('tingkat', $cecimpedan->tingkat) == 'Mudah' ? 'selected' : '' }}>Mudah</option>
                <option value="Sedang" {{ old('tingkat', $cecimpedan->tingkat) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                <option value="Sulit" {{ old('tingkat', $cecimpedan->tingkat) == 'Sulit' ? 'selected' : '' }}>Sulit</option>
            </select>
        </div>

        <!-- Pertanyaan -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Pertanyaan (Bahasa Bali)</label>
            <textarea name="pertanyaan" rows="3"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('pertanyaan', $cecimpedan->pertanyaan) }}</textarea>
        </div>

        <!-- Terjemahan -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Terjemahan / Arti (Bahasa Indonesia)</label>
            <textarea name="terjemahan" rows="2"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]" required>{{ old('terjemahan', $cecimpedan->terjemahan) }}</textarea>
        </div>

        <!-- Jawaban -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Jawaban</label>
            <input type="text" name="jawaban" value="{{ old('jawaban', $cecimpedan->jawaban) }}"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]"
                required>
        </div>

        <!-- Makna (QUILL EDITOR EDIT MODE) -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Makna</label>
            <div id="editor-makna">
                {!! old('makna', $cecimpedan->makna) !!}
            </div>
            <input type="hidden" name="makna" id="input-makna">
        </div>

        <!-- Nilai Filosofis / Pesan Moral (QUILL EDITOR EDIT MODE) -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Nilai Filosofis / Pesan Moral</label>
            <div id="editor-filosofi">
                {!! old('filosofi', $cecimpedan->filosofi ?? '') !!}
            </div>
            <input type="hidden" name="filosofi" id="input-filosofi">
        </div>

        <!-- Variasi Daerah -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Variasi Daerah (Opsional)</label>
            <textarea name="variasi_daerah" rows="2"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">{{ old('variasi_daerah', $cecimpedan->variasi_daerah ?? '') }}</textarea>
        </div>

        <!-- Asal Daerah -->
        <div class="mb-5">
            <label class="block font-semibold mb-2 text-gray-700">Asal Daerah</label>
            <input type="text" name="asal_daerah" value="{{ old('asal_daerah', $cecimpedan->asal_daerah ?? '') }}"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
        </div>

        <!-- Rekaman / Sumber -->
        <div class="mb-6">
            <label class="block font-semibold mb-2 text-gray-700">Rekaman / Sumber</label>
            <input type="text" name="rekaman" value="{{ old('rekaman', $cecimpedan->rekaman ?? '') }}"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
        </div>

        <!-- Tombol Aksi -->
        <div class="flex gap-4">
            <button type="submit"
                class="bg-[#C48D2D] hover:bg-[#B07C20] text-white px-6 py-3 rounded-lg font-semibold transition">
                Simpan Perubahan
            </button>
            <a href="{{ route('penulis.cecimpedan.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition">
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

        // Inisialisasi Quill Editor untuk "Makna"
        const quillMakna = new Quill('#editor-makna', {
            theme: 'snow',
            placeholder: 'Edit makna atau penjelasan teka-teki...',
            modules: { toolbar: toolbarOptions }
        });

        // Inisialisasi Quill Editor untuk "Filosofi"
        const quillFilosofi = new Quill('#editor-filosofi', {
            theme: 'snow',
            placeholder: 'Edit nilai filosofis atau pesan moral...',
            modules: { toolbar: toolbarOptions }
        });

        // Menyalin HTML dari Quill ke Input Hidden saat Form Disubmit
        const form = document.querySelector('#form-cecimpedan');
        form.onsubmit = function () {
            document.querySelector('#input-makna').value = quillMakna.root.innerHTML;
            document.querySelector('#input-filosofi').value = quillFilosofi.root.innerHTML;
        };
    });
</script>

@endsection