@extends('penulis.layouts.app')

@section('content')

<!-- CSS Quill JS -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

<!-- Load Font Tambahan dari Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins:wght@400;600&family=Merriweather&display=swap" rel="stylesheet">

<style>
    /* 1. Tampilan Toolbar dan Container Editor */
    .ql-toolbar.ql-snow {
        border-top-left-radius: 0.75rem;
        border-top-right-radius: 0.75rem;
        border-color: #D5C7B5;
        background-color: #F6F0E6;
    }
    .ql-container.ql-snow {
        border-bottom-left-radius: 0.75rem;
        border-bottom-right-radius: 0.75rem;
        border-color: #D5C7B5;
        background-color: #FFFFFF;
        font-size: 0.875rem;
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

<div class="p-6 bg-[#F6F0E6] text-[#1A110A]">
    <!-- Container Card Putih -->
    <div class="max-w-4xl mx-auto p-8 bg-white rounded-2xl shadow-sm border border-[#E2D5C3]">
        <h2 class="text-2xl font-bold mb-6 text-[#1A110A]">Tambah Wawasan Filsafat</h2>

        <form id="form-filsafat" action="{{ route('penulis.filsafat.store') }}" method="POST">
            @csrf

            <!-- Judul Filsafat -->
            <div class="mb-5">
                <label class="block text-sm font-semibold text-[#1A110A] mb-2">Judul Filsafat</label>
                <input type="text" name="judul" value="{{ old('judul') }}" required placeholder="Contoh: Filsafat Barat"
                    class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition">
            </div>

            <!-- Deskripsi Singkat (QUILL EDITOR) -->
            <div class="mb-5">
                <label class="block text-sm font-semibold text-[#1A110A] mb-2">Deskripsi / Pengantar</label>
                <div id="editor-deskripsi">
                    {!! old('deskripsi') !!}
                </div>
                <input type="hidden" name="deskripsi" id="input-deskripsi">
            </div>

            <!-- Grid: Asal & Fokus -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                <div>
                    <label class="block text-sm font-semibold text-[#1A110A] mb-2">Asal / Wilayah Perkembangan</label>
                    <input type="text" name="asal" value="{{ old('asal') }}" placeholder="Contoh: Yunani Kuno / Bali"
                        class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-[#1A110A] mb-2">Fokus / Pokok Bahasan</label>
                    <input type="text" name="fokus" value="{{ old('fokus') }}" placeholder="Contoh: Logika & Rasionalitas / Etika & Harmoni"
                        class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition">
                </div>
            </div>

            <!-- Tokoh Terkenal (QUILL EDITOR) -->
            <div class="mb-5">
                <label class="block text-sm font-semibold text-[#1A110A] mb-2">Tokoh Terkenal & Pemikirannya</label>
                <div id="editor-tokoh">
                    {!! old('tokoh_terkenal') !!}
                </div>
                <input type="hidden" name="tokoh_terkenal" id="input-tokoh">
            </div>

            <!-- Karakteristik (QUILL EDITOR) -->
            <div class="mb-5">
                <label class="block text-sm font-semibold text-[#1A110A] mb-2">Karakteristik Utama</label>
                <div id="editor-karakteristik">
                    {!! old('karakteristik') !!}
                </div>
                <input type="hidden" name="karakteristik" id="input-karakteristik">
            </div>

            <!-- Implikasi / Penutup (QUILL EDITOR) -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-[#1A110A] mb-2">Implikasi & Manfaat Dalam Kehidupan</label>
                <div id="editor-implikasi">
                    {!! old('implikasi') !!}
                </div>
                <input type="hidden" name="implikasi" id="input-implikasi">
            </div>

            <!-- Tombol Simpan & Kembali -->
            <div class="flex items-center gap-3 pt-2">
                <button type="submit" 
                        style="background-color: #C38E2A; color: #ffffff;"
                        class="px-7 py-2.5 font-semibold rounded-xl shadow-sm transition hover:opacity-90">
                    Simpan
                </button>
                <a href="{{ route('penulis.filsafat.index') }}" 
                   style="background-color: #6C757D; color: #ffffff;"
                   class="px-7 py-2.5 font-semibold rounded-xl shadow-sm transition hover:opacity-90 inline-block">
                    Kembali
                </a>
            </div>
        </form>
    </div>
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

        // Inisialisasi Quill Editor
        const quillDeskripsi = new Quill('#editor-deskripsi', {
            theme: 'snow',
            placeholder: 'Filsafat Barat berkembang sejak Yunani Kuno dan menjadi dasar lahirnya ilmu pengetahuan...',
            modules: { toolbar: toolbarOptions }
        });

        const quillTokoh = new Quill('#editor-tokoh', {
            theme: 'snow',
            placeholder: 'Socrates: Mengajarkan pentingnya berpikir kritis...',
            modules: { toolbar: toolbarOptions }
        });

        const quillKarakteristik = new Quill('#editor-karakteristik', {
            theme: 'snow',
            placeholder: '- Berpikir logis.\n- Argumentasi rasional...',
            modules: { toolbar: toolbarOptions }
        });

        const quillImplikasi = new Quill('#editor-implikasi', {
            theme: 'snow',
            placeholder: 'Menjadi dasar perkembangan ilmu pengetahuan, demokrasi, pendidikan...',
            modules: { toolbar: toolbarOptions }
        });

        // Menyalin HTML ke Input Hidden saat Form Disubmit
        const form = document.querySelector('#form-filsafat');
        form.onsubmit = function () {
            document.querySelector('#input-deskripsi').value = quillDeskripsi.root.innerHTML;
            document.querySelector('#input-tokoh').value = quillTokoh.root.innerHTML;
            document.querySelector('#input-karakteristik').value = quillKarakteristik.root.innerHTML;
            document.querySelector('#input-implikasi').value = quillImplikasi.root.innerHTML;
        };
    });
</script>

@endsection