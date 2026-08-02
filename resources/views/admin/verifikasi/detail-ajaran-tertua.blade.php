@extends('admin.layouts.app')

@section('content')
    <div class="p-8">
        <!-- Header & Tombol Kembali -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Detail Verifikasi Ajaran Tertua</h1>
                <p class="text-sm text-gray-600 mt-1">Periksa konten ajaran sebelum memberikan keputusan verifikasi.</p>
            </div>
            <a href="{{ route('admin.verifikasi.ajaran-tertua') }}"
                class="px-5 py-2.5 border border-[#EFE3D3] rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition">
                Kembali
            </a>
        </div>

        <!-- Detail Card Krem -->
        <div class="bg-[#FBF6EE] border border-[#EFE3D3] rounded-2xl p-6 shadow-sm max-w-4xl space-y-6">
            
            <!-- Metadata: Penulis & Status -->
            <div class="flex justify-between items-center pb-4 border-b border-[#EFE3D3]">
                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-wider block">Penulis</span>
                    <span class="text-base font-bold text-gray-900">{{ $ajaranTertua->user->name ?? 'Penulis' }}</span>
                </div>
                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-wider block mb-1">Status Saat Ini</span>
                    @if(($ajaranTertua->status ?? 'pending') == 'pending')
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-[#FFF8E1] text-[#B78103] border border-[#FFE8A3]">
                            Pending
                        </span>
                    @elseif(($ajaranTertua->status ?? '') == 'disetujui')
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-50 text-green-700 border border-green-200">
                            Disetujui
                        </span>
                    @else
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-700 border border-red-200">
                            Ditolak
                        </span>
                    @endif
                </div>
            </div>

            <!-- Gambar Header -->
            @if($ajaranTertua->gambar)
                <div>
                    <span class="block text-sm font-bold text-gray-800 mb-2">Gambar Sampul</span>
                    <img src="{{ asset('storage/' . $ajaranTertua->gambar) }}" alt="Sampul Ajaran" class="max-h-80 rounded-xl object-cover border border-[#EFE3D3]">
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <span class="block text-xs font-semibold text-gray-500 uppercase">Tag / Kategori</span>
                    <p class="text-gray-900 font-medium">{{ $ajaranTertua->tags ?? '-' }}</p>
                </div>
                <div>
                    <span class="block text-xs font-semibold text-gray-500 uppercase">Judul Ajaran</span>
                    <p class="text-gray-900 font-bold text-lg">{{ $ajaranTertua->judul }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <span class="block text-xs font-semibold text-gray-500 uppercase">Lokasi</span>
                    <p class="text-gray-900 font-medium">{{ $ajaranTertua->lokasi ?? '-' }}</p>
                </div>
                <div>
                    <span class="block text-xs font-semibold text-gray-500 uppercase">Didirikan Tahun</span>
                    <p class="text-gray-900 font-medium">{{ $ajaranTertua->tahun ?? '-' }}</p>
                </div>
            </div>

            <!-- Penjelasan Lengkap -->
            <div>
                <span class="block text-xs font-semibold text-gray-500 uppercase mb-1">Penjelasan Lengkap</span>
                <div class="bg-white p-4 rounded-xl border border-[#EFE3D3] text-gray-800 leading-relaxed whitespace-pre-line">
                    {{ $ajaranTertua->deskripsi }}
                </div>
            </div>

            <!-- Tiga Prinsip Utama -->
            <div class="bg-white p-4 rounded-xl border border-[#EFE3D3] space-y-3">
                <h3 class="text-xs font-bold text-black uppercase tracking-wider">TIGA PRINSIP UTAMA</h3>
                <div class="space-y-2 text-sm text-gray-800">
                    <p><strong>1. {{ $ajaranTertua->prinsip1_nama ?? '-' }}:</strong> {{ $ajaranTertua->prinsip1_deskripsi ?? '-' }}</p>
                    <p><strong>2. {{ $ajaranTertua->prinsip2_nama ?? '-' }}:</strong> {{ $ajaranTertua->prinsip2_deskripsi ?? '-' }}</p>
                    <p><strong>3. {{ $ajaranTertua->prinsip3_nama ?? '-' }}:</strong> {{ $ajaranTertua->prinsip3_deskripsi ?? '-' }}</p>
                </div>
            </div>

            <!-- Contoh Penerapan & Sumber -->
            <div class="space-y-3">
                <div>
                    <span class="block text-xs font-semibold text-gray-500 uppercase">Contoh Penerapan</span>
                    <p class="text-gray-800 text-sm bg-white p-3 rounded-xl border border-[#EFE3D3]">{{ $ajaranTertua->contoh_penerapan ?? '-' }}</p>
                </div>
                <div>
                    <span class="block text-xs font-semibold text-gray-500 uppercase">Sumber Referensi</span>
                    <p class="text-gray-800 text-sm italic">{{ $ajaranTertua->sumber ?? '-' }}</p>
                </div>
            </div>

            <!-- Tombol Aksi Verifikasi -->
            <div class="pt-4 border-t border-[#EFE3D3] flex items-center gap-3">
                <form action="{{ route('admin.verifikasi.update-status-ajaran-tertua', $ajaranTertua->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="disetujui">
                    <button type="submit" onclick="return confirm('Setujui ajaran tertua ini?')"
                        class="bg-green-600 hover:bg-green-700 text-white font-medium px-6 py-2.5 rounded-xl transition shadow-sm">
                        Setujui 
                    </button>
                </form>

                <form action="{{ route('admin.verifikasi.update-status-ajaran-tertua', $ajaranTertua->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="ditolak">
                    <button type="submit" onclick="return confirm('Tolak ajaran tertua ini?')"
                        class="bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-2.5 rounded-xl transition shadow-sm">
                        Tolak 
                    </button>
                </form>
            </div>

        </div>
    </div>
@endsection