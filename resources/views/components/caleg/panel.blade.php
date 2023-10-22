<div class="container mt-5">
    <div class="bg-utama rounded-2xl py-4 px-6 text-white">
        <div class="text-center">
            <h6 class="text-sm">Hasil Real Count</h6>
            <h1 class="mt-3 text-3xl font-semibold">
                {{ number_format($suaraTPS, 0, ',', '.') }}
            </h1>
        </div>
        <div class="mt-3 rounded-xl bg-white p-3 text-black">
            <div class="flex items-center justify-around">
                <div class="text-center">
                    <p class="text-base font-semibold">
                        {{ number_format($totalDPT, 0, ',', '.') }}
                    </p>
                    <p class="text-xs text-gray-500">Total DPT</p>
                </div>
                <div class="text-center">
                    <p class="text-base font-semibold">
                        {{ number_format($target, 0, ',', '.') }}
                    </p>
                    <p class="text-xs text-gray-500">Target</p>
                </div>
                <div class="text-center">
                    <p class="text-base font-semibold">
                        {{ number_format($daftarPemilih, 0, ',', '.') }}
                    </p>
                    <p class="text-xs text-gray-500">Pemilih</p>
                </div>
            </div>
        </div>
    </div>
</div>
