<section class="bg-[#8F2318] py-6 sm:py-8 px-4 sm:px-6">

    <div class="max-w-7xl mx-auto grid grid-cols-3 md:grid-cols-6 gap-y-6 gap-x-2 sm:gap-8 text-center">

        <!-- 1. Ajaran Tetua -->
        <div class="flex flex-col items-center">
            <div class="mb-1.5 sm:mb-2 flex justify-center">
                <i data-feather="book-open" class="w-4 h-4 sm:w-5 sm:h-5 text-[#D9B35D]"></i>
            </div>
            <h2 class="text-white text-2xl sm:text-4xl font-bold leading-tight">
                {{ number_format($totalAjaran ?? 0, 0, ',', '.') }}
            </h2>
            <p class="text-[#D9B35D] text-[8px] sm:text-[10px] tracking-[1.5px] sm:tracking-[3px] uppercase mt-1 sm:mt-2 font-medium">
                Ajaran Tetua
            </p>
        </div>

        <!-- 2. Cecimpedan -->
        <div class="flex flex-col items-center">
            <div class="mb-1.5 sm:mb-2 flex justify-center">
                <i data-feather="feather" class="w-4 h-4 sm:w-5 sm:h-5 text-[#D9B35D]"></i>
            </div>
            <h2 class="text-white text-2xl sm:text-4xl font-bold leading-tight">
                {{ number_format($totalCecimpedan ?? 0, 0, ',', '.') }}
            </h2>
            <p class="text-[#D9B35D] text-[8px] sm:text-[10px] tracking-[1.5px] sm:tracking-[3px] uppercase mt-1 sm:mt-2 font-medium">
                Cecimpedan
            </p>
        </div>

        <!-- 3. Satua Bali -->
        <div class="flex flex-col items-center">
            <div class="mb-1.5 sm:mb-2 flex justify-center">
                <i data-feather="globe" class="w-4 h-4 sm:w-5 sm:h-5 text-[#D9B35D]"></i>
            </div>
            <h2 class="text-white text-2xl sm:text-4xl font-bold leading-tight">
                {{ number_format($totalSatua ?? 0, 0, ',', '.') }}
            </h2>
            <p class="text-[#D9B35D] text-[8px] sm:text-[10px] tracking-[1.5px] sm:tracking-[3px] uppercase mt-1 sm:mt-2 font-medium">
                Satua Bali
            </p>
        </div>

        <!-- 4. Istilah Bali -->
        <div class="flex flex-col items-center">
            <div class="mb-1.5 sm:mb-2 flex justify-center">
                <i data-feather="tag" class="w-4 h-4 sm:w-5 sm:h-5 text-[#D9B35D]"></i>
            </div>
            <h2 class="text-white text-2xl sm:text-4xl font-bold leading-tight">
                {{ number_format($totalIstilah ?? 0, 0, ',', '.') }}
            </h2>
            <p class="text-[#D9B35D] text-[8px] sm:text-[10px] tracking-[1.5px] sm:tracking-[3px] uppercase mt-1 sm:mt-2 font-medium">
                Istilah Bali
            </p>
        </div>

        <!-- 5. Kontributor -->
        <div class="flex flex-col items-center">
            <div class="mb-1.5 sm:mb-2 flex justify-center">
                <i data-feather="users" class="w-4 h-4 sm:w-5 sm:h-5 text-[#D9B35D]"></i>
            </div>
            <h2 class="text-white text-2xl sm:text-4xl font-bold leading-tight">
                {{ number_format($totalKontributor ?? 0, 0, ',', '.') }}
            </h2>
            <p class="text-[#D9B35D] text-[8px] sm:text-[10px] tracking-[1.5px] sm:tracking-[3px] uppercase mt-1 sm:mt-2 font-medium">
                Kontributor
            </p>
        </div>

        <!-- 6. Terverifikasi -->
        <div class="flex flex-col items-center">
            <div class="mb-1.5 sm:mb-2 flex justify-center">
                <i data-feather="shield" class="w-4 h-4 sm:w-5 sm:h-5 text-[#D9B35D]"></i>
            </div>
            <h2 class="text-white text-2xl sm:text-4xl font-bold leading-tight">
                @php
                    $terverifikasi = $totalTerverifikasi ?? 0;
                @endphp
                @if ($terverifikasi >= 1000)
                    {{ number_format($terverifikasi / 1000, 1, ',', '.') }} ribu
                @else
                    {{ number_format($terverifikasi, 0, ',', '.') }}
                @endif
            </h2>
            <p class="text-[#D9B35D] text-[8px] sm:text-[10px] tracking-[1.5px] sm:tracking-[3px] uppercase mt-1 sm:mt-2 font-medium">
                Terverifikasi
            </p>
        </div>

    </div>

</section>