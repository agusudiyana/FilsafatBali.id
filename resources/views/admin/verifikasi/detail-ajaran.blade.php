@extends('admin.layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto">

        <div class="bg-white rounded-xl shadow-lg p-8">

            <div class="flex justify-between items-center mb-8">

                <div>

                    <h1 class="text-4xl font-bold text-[#1A110A]">

                        {{ $ajaran->judul }}

                    </h1>

                    <p class="text-gray-500 mt-2">

                        Penulis :
                        <strong>{{ $ajaran->penulis }}</strong>

                    </p>

                </div>

                <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700">

                    {{ ucfirst($ajaran->status) }}

                </span>

            </div>

            @if ($ajaran->gambar)
                <img src="{{ asset('storage/' . $ajaran->gambar) }}" class="rounded-xl w-full h-[420px] object-cover mb-8">
            @endif

            <div class="space-y-8">

                <div>

                    <h2 class="font-bold text-xl mb-3">

                        Isi Ajaran

                    </h2>

                    <p class="leading-8 text-gray-700">

                        {{ $ajaran->isi }}

                    </p>

                </div>

                <div>

                    <h2 class="font-bold text-xl mb-3">

                        Contoh

                    </h2>

                    <p class="leading-8 text-gray-700">

                        {{ $ajaran->contoh }}

                    </p>

                </div>

                <div>

                    <h2 class="font-bold text-xl mb-3">

                        Referensi

                    </h2>

                    <p class="leading-8 text-gray-700">

                        {{ $ajaran->referensi }}

                    </p>

                </div>

            </div>

            <!-- Tombol Aksi yang Diperbarui -->
            <div class="flex items-center gap-3 mt-10 pt-6 border-t border-gray-100">

                <form action="{{ route('admin.verifikasi.ajaran.setujui', $ajaran->id) }}" method="POST" class="inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium px-6 py-3 rounded-xl flex items-center gap-2 shadow-sm transition">
                        <i data-feather="check-circle" class="w-5 h-5"></i>
                        <span>Setujui</span>
                    </button>
                </form>

                <form action="{{ route('admin.verifikasi.ajaran.tolak', $ajaran->id) }}" method="POST" class="inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white font-medium px-6 py-3 rounded-xl flex items-center gap-2 shadow-sm transition">
                        <i data-feather="x-circle" class="w-5 h-5"></i>
                        <span>Tolak</span>
                    </button>
                </form>

                <a href="{{ route('admin.verifikasi.artikel') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-6 py-3 rounded-xl flex items-center gap-2 transition">
                    <i data-feather="arrow-left" class="w-5 h-5"></i>
                    <span>Kembali</span>
                </a>

            </div>

        </div>

    </div>

    <!-- Script Ikon Feather -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>
@endsection