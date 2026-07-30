@extends('penulis.layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        
        <!-- Header Halaman -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 border-b border-[#E6D5B8] pb-6">
            <div>
                <span class="text-xs font-semibold tracking-widest text-[#C48D2D] uppercase">Aktivitas Penulis</span>
                <h1 class="text-3xl font-bold font-serif text-[#2C221E] mt-1">
                    Riwayat Kiriman
                </h1>
                <p class="text-[#6B635B] text-sm mt-1">
                    Pantau seluruh riwayat dan status verifikasi dari semua jenis konten yang telah Anda kontribusikan.
                </p>
            </div>
        </div>

        <!-- Tabel Data Riwayat Kiriman -->
        <div class="bg-white rounded-2xl shadow-sm border border-[#E6D5B8]/60 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-[#FBF9F5] text-[#2C221E] uppercase text-xs tracking-wider border-b border-[#E6D5B8]">
                        <tr>
                            <th class="p-4 font-semibold">No</th>
                            <th class="p-4 font-semibold">Jenis Kiriman</th>
                            <th class="p-4 font-semibold">Judul / Istilah</th>
                            <th class="p-4 font-semibold">Status Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @php $no = 1; @endphp

                        {{-- Loop Data Ajaran --}}
                        @foreach($ajaran as $item)
                            <tr class="hover:bg-[#FBF9F5]/60 transition">
                                <td class="p-4 font-medium text-gray-500">{{ $no++ }}</td>
                                <td class="p-4">
                                    <span class="bg-[#F3E7D0] text-[#2C221E] px-3 py-1 rounded-full text-xs font-medium inline-block">
                                        Ajaran
                                    </span>
                                </td>
                                <td class="p-4 font-semibold text-[#2C221E]">{{ $item->judul }}</td>
                                <td class="p-4">
                                    @if ($item->status == 'pending')
                                        <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="clock" class="w-3.5 h-3.5"></i> Pending
                                        </span>
                                    @elseif($item->status == 'disetujui')
                                        <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="check-circle" class="w-3.5 h-3.5"></i> Disetujui
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 bg-rose-50 text-rose-700 border border-rose-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="x-circle" class="w-3.5 h-3.5"></i> Ditolak
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        {{-- Loop Data Cecimpedan --}}
                        @foreach($cecimpedan as $item)
                            <tr class="hover:bg-[#FBF9F5]/60 transition">
                                <td class="p-4 font-medium text-gray-500">{{ $no++ }}</td>
                                <td class="p-4">
                                    <span class="bg-[#F3E7D0] text-[#2C221E] px-3 py-1 rounded-full text-xs font-medium inline-block">
                                        Cecimpedan
                                    </span>
                                </td>
                                <td class="p-4 font-semibold text-[#2C221E]">{{ $item->judul }}</td>
                                <td class="p-4">
                                    @if ($item->status == 'pending')
                                        <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="clock" class="w-3.5 h-3.5"></i> Pending
                                        </span>
                                    @elseif($item->status == 'disetujui')
                                        <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="check-circle" class="w-3.5 h-3.5"></i> Disetujui
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 bg-rose-50 text-rose-700 border border-rose-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="x-circle" class="w-3.5 h-3.5"></i> Ditolak
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        {{-- Loop Data Satua --}}
                        @foreach($satua as $item)
                            <tr class="hover:bg-[#FBF9F5]/60 transition">
                                <td class="p-4 font-medium text-gray-500">{{ $no++ }}</td>
                                <td class="p-4">
                                    <span class="bg-[#F3E7D0] text-[#2C221E] px-3 py-1 rounded-full text-xs font-medium inline-block">
                                        Satua Bali
                                    </span>
                                </td>
                                <td class="p-4 font-semibold text-[#2C221E]">{{ $item->judul }}</td>
                                <td class="p-4">
                                    @if ($item->status == 'pending')
                                        <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="clock" class="w-3.5 h-3.5"></i> Pending
                                        </span>
                                    @elseif($item->status == 'disetujui')
                                        <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="check-circle" class="w-3.5 h-3.5"></i> Disetujui
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 bg-rose-50 text-rose-700 border border-rose-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="x-circle" class="w-3.5 h-3.5"></i> Ditolak
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        {{-- Loop Data Istilah --}}
                        @foreach($istilah as $item)
                            <tr class="hover:bg-[#FBF9F5]/60 transition">
                                <td class="p-4 font-medium text-gray-500">{{ $no++ }}</td>
                                <td class="p-4">
                                    <span class="bg-[#F3E7D0] text-[#2C221E] px-3 py-1 rounded-full text-xs font-medium inline-block">
                                        Istilah Bali
                                    </span>
                                </td>
                                <td class="p-4 font-semibold text-[#2C221E]">{{ $item->istilah }}</td>
                                <td class="p-4">
                                    @if ($item->status == 'pending')
                                        <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="clock" class="w-3.5 h-3.5"></i> Pending
                                        </span>
                                    @elseif($item->status == 'disetujui')
                                        <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="check-circle" class="w-3.5 h-3.5"></i> Disetujui
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 bg-rose-50 text-rose-700 border border-rose-200 px-3 py-1 rounded-full text-xs font-semibold">
                                            <i data-feather="x-circle" class="w-3.5 h-3.5"></i> Ditolak
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        {{-- Tampilan Saat Tidak Ada Data Sama Sekali --}}
                        @if($ajaran->isEmpty() && $cecimpedan->isEmpty() && $satua->isEmpty() && $istilah->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center py-12 text-gray-400">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <i data-feather="history" class="w-10 h-10 stroke-1 text-gray-300"></i>
                                        <span class="text-base font-medium text-gray-500">Belum ada riwayat kiriman.</span>
                                        <p class="text-xs text-gray-400">Kontribusi yang Anda buat akan muncul di sini.</p>
                                    </div>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Script Inisialisasi Feather Icons -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>
@endsection