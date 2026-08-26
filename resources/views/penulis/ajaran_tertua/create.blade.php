@extends('penulis.layouts.app')

@section('content')

<!-- CSS Quill JS -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

<!-- Load Font Tambahan dari Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins:wght@400;600&family=Merriweather&display=swap" rel="stylesheet">

<style>
    /* 1. Tampilan Toolbar dan Container Editor yang disesuaikan dengan skema warna Putih */
    .ql-toolbar.ql-snow {
        border-top-left-radius: 0.75rem;
        border-top-right-radius: 0.75rem;
        border-color: #E2D5C3;
        background-color: #FFFFFF;
    }
    .ql-container.ql-snow {
        border-bottom-left-radius: 0.75rem;
        border-bottom-right-radius: 0.75rem;
        border-color: #E2D5C3;
        background-color: #FFFFFF;
        font-size: 0.875rem;
    }
    .ql-editor {
        min-height: 180px;
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

<div class="p-8">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Tambah Ajaran Tertua</h1>
        <p class="text-sm text-gray-600 mt-1">Isi formulir berikut untuk menambahkan ajaran tertua baru.</p>
    </div>

    <!-- Form Card Container Putih -->
    <div class="bg-white border border-[#E2D5C3] rounded-2xl p-6 shadow-sm max-w-4xl">
        <form id="form-ajaran-tertua" action="{{ route('penulis.ajaran-tertua.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- 1. Gambar Header / Sampul -->
            <div>
                <label class="block text-sm font-bold text-[#1A110A] mb-1">Unggah Gambar</label>
                <input type="file" name="gambar" accept="image/*"
                    class="w-full px-4 py-2 rounded-xl border border-[#E2D5C3] focus:outline-none bg-white text-sm">
                @error('gambar')
                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- 2. Tag / Kategori -->
                <div>
                    <label for="tags" class="block text-sm font-semibold text-gray-800 mb-1.5">Tag / Kategori</label>
                    <input type="text" name="tags" id="tags" placeholder="Contoh: FILOSOFI, HARMONI"
                        value="{{ old('tags') }}"
                        class="w-full bg-white border border-[#E2D5C3] rounded-xl p-3 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D] text-gray-900">
                    @error('tags')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- 3. Judul Ajaran -->
                <div>
                    <label for="judul" class="block text-sm font-semibold text-gray-800 mb-1.5">Judul Ajaran</label>
                    <input type="text" name="judul" id="judul" required placeholder="Contoh: Tri Hita Karana"
                        value="{{ old('judul') }}"
                        class="w-full bg-white border border-[#E2D5C3] rounded-xl p-3 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D] text-gray-900">
                    @error('judul')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- 4. Lokasi -->
                <div>
                    <label for="lokasi" class="block text-sm font-semibold text-gray-800 mb-1.5">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" placeholder="Contoh: UBUD, GIANYAR"
                        value="{{ old('lokasi') }}"
                        class="w-full bg-white border border-[#E2D5C3] rounded-xl p-3 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D] text-gray-900">
                    @error('lokasi')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- 5. Didirikan Tahun -->
                <div>
                    <label for="tahun" class="block text-sm font-semibold text-gray-800 mb-1.5">Didirikan Tahun / Periode</label>
                    <input type="text" name="tahun" id="tahun" placeholder="Contoh: DIDIRIKAN TAHUN 1965"
                        value="{{ old('tahun') }}"
                        class="w-full bg-white border border-[#E2D5C3] rounded-xl p-3 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D] text-gray-900">
                    @error('tahun')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- 6. Penjelasan Lengkap (QUILL EDITOR) -->
            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-1.5">Penjelasan Lengkap</label>
                <div id="editor-deskripsi" class="bg-white">
                    {!! old('deskripsi') !!}
                </div>
                <input type="hidden" name="deskripsi" id="input-deskripsi">
                @error('deskripsi')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- 7. Tiga Prinsip Utama -->
            <div class="bg-white border border-[#E2D5C3] p-4 rounded-xl space-y-3">
                <h3 class="text-xs font-bold text-black tracking-wider uppercase">TIGA PRINSIP UTAMA</h3>

                <!-- Prinsip 1 -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <input type="text" name="prinsip1_nama" placeholder="Nama Prinsip 1 (ex: Parhyangan)"
                        value="{{ old('prinsip1_nama') }}"
                        class="bg-white border border-[#E2D5C3] rounded-xl p-2.5 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D]">
                    <input type="text" name="prinsip1_deskripsi" placeholder="Penjelasan Prinsip 1"
                        value="{{ old('prinsip1_deskripsi') }}"
                        class="md:col-span-2 bg-white border border-[#E2D5C3] rounded-xl p-2.5 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D]">
                </div>

                <!-- Prinsip 2 -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <input type="text" name="prinsip2_nama" placeholder="Nama Prinsip 2 (ex: Pawongan)"
                        value="{{ old('prinsip2_nama') }}"
                        class="bg-white border border-[#E2D5C3] rounded-xl p-2.5 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D]">
                    <input type="text" name="prinsip2_deskripsi" placeholder="Penjelasan Prinsip 2"
                        value="{{ old('prinsip2_deskripsi') }}"
                        class="md:col-span-2 bg-white border border-[#E2D5C3] rounded-xl p-2.5 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D]">
                </div>

                <!-- Prinsip 3 -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <input type="text" name="prinsip3_nama" placeholder="Nama Prinsip 3 (ex: Palemahan)"
                        value="{{ old('prinsip3_nama') }}"
                        class="bg-white border border-[#E2D5C3] rounded-xl p-2.5 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D]">
                    <input type="text" name="prinsip3_deskripsi" placeholder="Penjelasan Prinsip 3"
                        value="{{ old('prinsip3_deskripsi') }}"
                        class="md:col-span-2 bg-white border border-[#E2D5C3] rounded-xl p-2.5 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D]">
                </div>
            </div>

            <!-- 8. Contoh Penerapan (QUILL EDITOR) -->
            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-1.5">Contoh Penerapan</label>
                <div id="editor-contoh" class="bg-white">
                    {!! old('contoh_penerapan') !!}
                </div>
                <input type="hidden" name="contoh_penerapan" id="input-contoh">
                @error('contoh_penerapan')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- 9. Sumber Referensi -->
            <div>
                <label for="sumber" class="block text-sm font-semibold text-gray-800 mb-1.5">Sumber Referensi / Buku</label>
                <input type="text" name="sumber" id="sumber"
                    placeholder="Contoh: Sadia, I.W. (1965). Tri Hita Karana dalam Kehidupan Orang Bali..."
                    value="{{ old('sumber') }}"
                    class="w-full bg-white border border-[#E2D5C3] rounded-xl p-3 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D] text-gray-900">
                @error('sumber')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tombol Aksi di Bawah Kiri -->
            <div class="flex justify-start gap-3 pt-4 border-t border-[#E2D5C3]">
                <button type="submit"
                    class="bg-[#C48D2D] hover:bg-[#b07d26] text-white font-medium px-6 py-2.5 rounded-xl transition shadow-sm">
                    Simpan
                </button>
                <a href="{{ route('penulis.ajaran-tertua.index') }}"
                    class="px-5 py-2.5 border border-[#E2D5C3] rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition">
                    Batal
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

        // Inisialisasi Quill Editor untuk "Deskripsi"
        const quillDeskripsi = new Quill('#editor-deskripsi', {
            theme: 'snow',
            placeholder: 'Tri Hita Karana berasal dari bahasa Sanskerta...',
            modules: { toolbar: toolbarOptions }
        });

        // Inisialisasi Quill Editor untuk "Contoh Penerapan"
        const quillContoh = new Quill('#editor-contoh', {
            theme: 'snow',
            placeholder: 'Sistem Subak Bali yang mengatur irigasi sawah secara kolektif...',
            modules: { toolbar: toolbarOptions }
        });

        // Menyalin HTML ke Input Hidden saat Form Disubmit
        const form = document.querySelector('#form-ajaran-tertua');
        form.onsubmit = function () {
            document.querySelector('#input-deskripsi').value = quillDeskripsi.root.innerHTML;
            document.querySelector('#input-contoh').value = quillContoh.root.innerHTML;
        };
    });
</script>

@endsection