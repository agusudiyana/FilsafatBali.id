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
        border-color: #E2D5C3;
        background-color: #FAF6F0;
    }
    .ql-container.ql-snow {
        border-bottom-left-radius: 0.75rem;
        border-bottom-right-radius: 0.75rem;
        border-color: #E2D5C3;
        background-color: #FFFFFF;
        font-size: 0.875rem;
    }
    .ql-editor {
        min-height: 200px;
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

<div class="max-w-4xl mx-auto p-6 bg-[#F6F0E6] text-[#1A110A]">
    
    <!-- Header Section -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-[#1A110A]">Tambah Artikel Baru</h1>
        <p class="text-sm text-[#7A6B5D] mt-1">Lengkapi form di bawah untuk mengirimkan artikel baru.</p>
    </div>

    <!-- Container Form Card -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#E2D5C3]">
        
        <form id="form-artikel" action="{{ route('penulis.artikel.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- 1. JUDUL -->
            <div>
                <label class="block text-sm font-bold text-[#1A110A] mb-1">Judul Artikel</label>
                <input type="text" name="judul" value="{{ old('judul') }}" required
                       class="w-full px-4 py-2.5 rounded-xl border border-[#E2D5C3] focus:ring-2 focus:ring-[#C38E2A] focus:outline-none">
                @error('judul')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- 2. KATEGORI -->
            <div>
                <label class="block text-sm font-bold text-[#1A110A] mb-1">Kategori</label>
                <select name="kategori" required
                        class="w-full px-4 py-2.5 rounded-xl border border-[#E2D5C3] focus:ring-2 focus:ring-[#C38E2A] focus:outline-none bg-white">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Istilah Bali" {{ old('kategori') == 'Istilah Bali' ? 'selected' : '' }}>Istilah Bali</option>
                    <option value="Cecimpedan" {{ old('kategori') == 'Cecimpedan' ? 'selected' : '' }}>Cecimpedan</option>
                    <option value="Ajaran Tertua" {{ old('kategori') == 'Ajaran Tertua' ? 'selected' : '' }}>Ajaran Tertua</option>
                    <option value="Filsafat" {{ old('kategori') == 'Filsafat' ? 'selected' : '' }}>Filsafat</option>
                </select>
                @error('kategori')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- 3. ISI ARTIKEL (QUILL EDITOR) -->
            <div>
                <label class="block text-sm font-bold text-[#1A110A] mb-1">Isi Artikel</label>
                <div id="editor-isi">
                    {!! old('isi') !!}
                </div>
                <input type="hidden" name="isi" id="input-isi">
                @error('isi')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- 4. KESIMPULAN (QUILL EDITOR) -->
            <div>
                <label class="block text-sm font-bold text-[#1A110A] mb-1">Kesimpulan (Opsional)</label>
                <div id="editor-kesimpulan">
                    {!! old('kesimpulan') !!}
                </div>
                <input type="hidden" name="kesimpulan" id="input-kesimpulan">
                @error('kesimpulan')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- 5. GAMBAR -->
            <div>
                <label class="block text-sm font-bold text-[#1A110A] mb-1">Unggah Gambar / Sampul</label>
                <input type="file" name="gambar" accept="image/*"
                       class="w-full px-4 py-2 rounded-xl border border-[#E2D5C3] focus:outline-none bg-[#FAF6F0]">
                @error('gambar')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- TOMBOL SIMPAN -->
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('penulis.artikel.index') }}" 
                   class="px-5 py-2.5 text-sm font-semibold rounded-xl border border-[#E2D5C3] text-[#7A6B5D] hover:bg-[#FAF6F0]">
                    Batal
                </a>
                <button type="submit" 
                        style="background-color: #C38E2A; color: #ffffff;"
                        class="px-5 py-2.5 text-sm font-semibold rounded-xl shadow-sm hover:opacity-90 transition">
                    Simpan Artikel
                </button>
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

        // Inisialisasi Quill Editor untuk "Isi Artikel"
        const quillIsi = new Quill('#editor-isi', {
            theme: 'snow',
            placeholder: 'Tuliskan isi artikel secara lengkap di sini...',
            modules: { toolbar: toolbarOptions }
        });

        // Inisialisasi Quill Editor untuk "Kesimpulan"
        const quillKesimpulan = new Quill('#editor-kesimpulan', {
            theme: 'snow',
            placeholder: 'Tuliskan kesimpulan artikel di sini (jika ada)...',
            modules: { toolbar: toolbarOptions }
        });

        // Menyalin HTML ke Input Hidden saat Form Disubmit
        const form = document.querySelector('#form-artikel');
        form.onsubmit = function () {
            document.querySelector('#input-isi').value = quillIsi.root.innerHTML;
            document.querySelector('#input-kesimpulan').value = quillKesimpulan.root.innerHTML;
        };
    });
</script>

@endsection