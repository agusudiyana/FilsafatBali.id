@extends('admin.layouts.app')

@section('content')
<div class="p-4 text-gray-800">
    <!-- Header Halaman -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-[#2C221E]">Kelola Statistik Banner</h1>
        <p class="text-sm text-gray-600 mt-1">
            Ubah angka total statistik yang akan ditampilkan secara langsung di banner Landing Page.
        </p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-sm font-medium flex items-center gap-2">
            <i data-feather="check-circle" class="w-4 h-4"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('admin.statistik.update') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- 1. Ajaran Tetua -->
            <div class="bg-white p-5 rounded-2xl border border-[#E6D5B8] shadow-sm space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="font-bold text-[#2C221E]">Ajaran Tetua</h3>
                    <span class="p-2 bg-[#F5E9D7] text-[#C48D2D] rounded-lg">
                        <i data-feather="book-open" class="w-4 h-4"></i>
                    </span>
                </div>
                <div>
                    <label class="text-xs text-gray-600 block mb-1 font-medium">Jumlah Tampil</label>
                    <input type="number" name="total_ajaran_tetua" value="{{ $settings['total_ajaran_tetua'] ?? $realAjaran }}" 
                           class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
                </div>
            </div>

            <!-- 2. Cecimpedan -->
            <div class="bg-white p-5 rounded-2xl border border-[#E6D5B8] shadow-sm space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="font-bold text-[#2C221E]">Cecimpedan</h3>
                    <span class="p-2 bg-[#F5E9D7] text-[#C48D2D] rounded-lg">
                        <i data-feather="feather" class="w-4 h-4"></i>
                    </span>
                </div>
                <div>
                    <label class="text-xs text-gray-600 block mb-1 font-medium">Jumlah Tampil</label>
                    <input type="number" name="total_cecimpedan" value="{{ $settings['total_cecimpedan'] ?? $realCecimpedan }}" 
                           class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
                </div>
            </div>

            <!-- 3. Satua Bali -->
            <div class="bg-white p-5 rounded-2xl border border-[#E6D5B8] shadow-sm space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="font-bold text-[#2C221E]">Satua Bali</h3>
                    <span class="p-2 bg-[#F5E9D7] text-[#C48D2D] rounded-lg">
                        <i data-feather="globe" class="w-4 h-4"></i>
                    </span>
                </div>
                <div>
                    <label class="text-xs text-gray-600 block mb-1 font-medium">Jumlah Tampil</label>
                    <input type="number" name="total_satua_bali" value="{{ $settings['total_satua_bali'] ?? $realSatua }}" 
                           class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
                </div>
            </div>

            <!-- 4. Istilah Bali -->
            <div class="bg-white p-5 rounded-2xl border border-[#E6D5B8] shadow-sm space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="font-bold text-[#2C221E]">Istilah Bali</h3>
                    <span class="p-2 bg-[#F5E9D7] text-[#C48D2D] rounded-lg">
                        <i data-feather="tag" class="w-4 h-4"></i>
                    </span>
                </div>
                <div>
                    <label class="text-xs text-gray-600 block mb-1 font-medium">Jumlah Tampil</label>
                    <input type="number" name="total_istilah_bali" value="{{ $settings['total_istilah_bali'] ?? $realIstilah }}" 
                           class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
                </div>
            </div>

            <!-- 5. Kontributor -->
            <div class="bg-white p-5 rounded-2xl border border-[#E6D5B8] shadow-sm space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="font-bold text-[#2C221E]">Kontributor</h3>
                    <span class="p-2 bg-[#F5E9D7] text-[#C48D2D] rounded-lg">
                        <i data-feather="users" class="w-4 h-4"></i>
                    </span>
                </div>
                <div>
                    <label class="text-xs text-gray-600 block mb-1 font-medium">Jumlah Tampil</label>
                    <input type="number" name="total_kontributor" value="{{ $settings['total_kontributor'] ?? $realKontributor }}" 
                           class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
                </div>
            </div>

            <!-- 6. Terverifikasi -->
            <div class="bg-white p-5 rounded-2xl border border-[#E6D5B8] shadow-sm space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="font-bold text-[#2C221E]">Terverifikasi</h3>
                    <span class="p-2 bg-[#F5E9D7] text-[#C48D2D] rounded-lg">
                        <i data-feather="shield" class="w-4 h-4"></i>
                    </span>
                </div>
                <div>
                    <label class="text-xs text-gray-600 block mb-1 font-medium">Jumlah Tampil</label>
                    <input type="number" name="total_terverifikasi" value="{{ $settings['total_terverifikasi'] ?? $realTerverifikasi }}" 
                           class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#C48D2D]">
                </div>
            </div>

        </div>

        <div class="mt-8 flex justify-start">
            <button type="submit" class="bg-[#992B20] hover:bg-[#7A2219] text-white font-semibold px-6 py-3 rounded-xl transition shadow-sm flex items-center gap-2">
                <i data-feather="save" class="w-4 h-4"></i>
                <span>Simpan Perubahan Statistik</span>
            </button>
        </div>
    </form>
</div>
@endsection