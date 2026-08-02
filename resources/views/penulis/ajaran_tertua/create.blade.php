@extends('penulis.layouts.app')

@section('content')
    <div class="p-8">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Tambah Ajaran Tertua</h1>
            <p class="text-sm text-gray-600 mt-1">Isi formulir berikut untuk menambahkan ajaran tertua baru.</p>
        </div>

        <!-- Form Card Container Krem -->
        <div class="bg-[#FBF6EE] border border-[#EFE3D3] rounded-2xl p-6 shadow-sm max-w-4xl">
            <form action="{{ route('penulis.ajaran-tertua.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf

                <!-- 1. Gambar Header / Sampul -->
                <div>
                    <label class="block text-sm font-bold text-[#1A110A] mb-1">Unggah Gambar</label>
                    <input type="file" name="gambar" accept="image/*"
                        class="w-full px-4 py-2 rounded-xl border border-[#E2D5C3] focus:outline-none bg-[#FAF6F0]">
                    @error('gambar')
                        <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- 2. Tag / Kategori -->
                    <div>
                        <label for="tags" class="block text-sm font-semibold text-gray-800 mb-1.5">Tag /
                            Kategori</label>
                        <input type="text" name="tags" id="tags" placeholder="Contoh: FILOSOFI, HARMONI"
                            value="{{ old('tags') }}"
                            class="w-full bg-white border border-[#EFE3D3] rounded-xl p-3 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D] text-gray-900">
                        @error('tags')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- 3. Judul Ajaran -->
                    <div>
                        <label for="judul" class="block text-sm font-semibold text-gray-800 mb-1.5">Judul Ajaran</label>
                        <input type="text" name="judul" id="judul" required placeholder="Contoh: Tri Hita Karana"
                            value="{{ old('judul') }}"
                            class="w-full bg-white border border-[#EFE3D3] rounded-xl p-3 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D] text-gray-900">
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
                            class="w-full bg-white border border-[#EFE3D3] rounded-xl p-3 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D] text-gray-900">
                        @error('lokasi')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- 5. Didirikan Tahun -->
                    <div>
                        <label for="tahun" class="block text-sm font-semibold text-gray-800 mb-1.5">Didirikan Tahun /
                            Periode</label>
                        <input type="text" name="tahun" id="tahun" placeholder="Contoh: DIDIRIKAN TAHUN 1965"
                            value="{{ old('tahun') }}"
                            class="w-full bg-white border border-[#EFE3D3] rounded-xl p-3 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D] text-gray-900">
                        @error('tahun')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- 6. Penjelasan Lengkap -->
                <div>
                    <label for="deskripsi" class="block text-sm font-semibold text-gray-800 mb-1.5">Penjelasan
                        Lengkap</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" required
                        placeholder="Tri Hita Karana berasal dari bahasa Sanskerta..."
                        class="w-full bg-white border border-[#EFE3D3] rounded-xl p-3 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D] text-gray-900">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- 7. Tiga Prinsip Utama (Judul Diubah Jadi Hitam) -->
                <div class="bg-white border border-[#EFE3D3] p-4 rounded-xl space-y-3">
                    <h3 class="text-xs font-bold text-black tracking-wider uppercase">TIGA PRINSIP UTAMA</h3>

                    <!-- Prinsip 1 -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                        <input type="text" name="prinsip1_nama" placeholder="Nama Prinsip 1 (ex: Parhyangan)"
                            value="{{ old('prinsip1_nama') }}"
                            class="bg-[#FBF6EE] border border-[#EFE3D3] rounded-xl p-2.5 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D]">
                        <input type="text" name="prinsip1_deskripsi" placeholder="Penjelasan Prinsip 1"
                            value="{{ old('prinsip1_deskripsi') }}"
                            class="md:col-span-2 bg-[#FBF6EE] border border-[#EFE3D3] rounded-xl p-2.5 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D]">
                    </div>

                    <!-- Prinsip 2 -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                        <input type="text" name="prinsip2_nama" placeholder="Nama Prinsip 2 (ex: Pawongan)"
                            value="{{ old('prinsip2_nama') }}"
                            class="bg-[#FBF6EE] border border-[#EFE3D3] rounded-xl p-2.5 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D]">
                        <input type="text" name="prinsip2_deskripsi" placeholder="Penjelasan Prinsip 2"
                            value="{{ old('prinsip2_deskripsi') }}"
                            class="md:col-span-2 bg-[#FBF6EE] border border-[#EFE3D3] rounded-xl p-2.5 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D]">
                    </div>

                    <!-- Prinsip 3 -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                        <input type="text" name="prinsip3_nama" placeholder="Nama Prinsip 3 (ex: Palemahan)"
                            value="{{ old('prinsip3_nama') }}"
                            class="bg-[#FBF6EE] border border-[#EFE3D3] rounded-xl p-2.5 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D]">
                        <input type="text" name="prinsip3_deskripsi" placeholder="Penjelasan Prinsip 3"
                            value="{{ old('prinsip3_deskripsi') }}"
                            class="md:col-span-2 bg-[#FBF6EE] border border-[#EFE3D3] rounded-xl p-2.5 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D]">
                    </div>
                </div>

                <!-- 8. Contoh Penerapan -->
                <div>
                    <label for="contoh_penerapan" class="block text-sm font-semibold text-gray-800 mb-1.5">Contoh
                        Penerapan</label>
                    <textarea name="contoh_penerapan" id="contoh_penerapan" rows="3"
                        placeholder="Sistem Subak Bali yang mengatur irigasi sawah secara kolektif..."
                        class="w-full bg-white border border-[#EFE3D3] rounded-xl p-3 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D] text-gray-900">{{ old('contoh_penerapan') }}</textarea>
                    @error('contoh_penerapan')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- 9. Sumber Referensi -->
                <div>
                    <label for="sumber" class="block text-sm font-semibold text-gray-800 mb-1.5">Sumber Referensi /
                        Buku</label>
                    <input type="text" name="sumber" id="sumber"
                        placeholder="Contoh: Sadia, I.W. (1965). Tri Hita Karana dalam Kehidupan Orang Bali..."
                        value="{{ old('sumber') }}"
                        class="w-full bg-white border border-[#EFE3D3] rounded-xl p-3 text-sm focus:ring-[#C48D2D] focus:border-[#C48D2D] text-gray-900">
                    @error('sumber')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tombol Aksi di Bawah Kiri -->
                <div class="flex justify-start gap-3 pt-4 border-t border-[#EFE3D3]">
                    <button type="submit"
                        class="bg-[#C48D2D] hover:bg-[#b07d26] text-white font-medium px-6 py-2.5 rounded-xl transition shadow-sm">
                        Simpan
                    </button>
                    <a href="{{ route('penulis.ajaran-tertua.index') }}"
                        class="px-5 py-2.5 border border-[#EFE3D3] rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
