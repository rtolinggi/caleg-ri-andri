<div class="container mt-5">
    <h3 class="">Daerah Pilih</h3>

     @foreach ($data as $item)
        <div class="mt-3 flex items-start gap-5">
            <div class="w-1/3 rounded-xl bg-gray-200 px-3 py-8 text-center text-gray-900">
                <p class="text-lg font-semibold">{{ $loop->iteration }}</p>
                <p class="text-xs">{{ $item->nama }}</p>
            </div>
            <div class="w-2/3">
                <div class="flex items-center justify-between rounded-lg py-2 px-3 shadow">
                    <div class="text-center text-xs">
                        <h4 class="mb-1">DPT</h4>
                        <h2 class="">{{ number_format($item->daftar_pemilihs->count(), 0, ',', '.') }}</h2>
                    </div>
                    <div class="text-center text-xs">
                        <h4 class="mb-1">Target</h4>
                        <h2 class="">
                            {{ number_format($item->rukun_tetanggas->sum('target_pemilih'), 0, ',', '.') }}</h2>
                    </div>
                    <div class="text-center text-xs">
                        <h4 class="mb-1">Calon</h4>
                        <h2 class="">{{ number_format($item->calon_pemilihs->count(), 0, ',', '.') }}</h2>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="w-full rounded-full bg-gray-200 dark:bg-gray-700">
                        <div class="bg-utama rounded-full p-0.5 text-center text-xs font-medium leading-none text-gray-100"
                            style="width: {{ persen($item->calon_pemilihs->count(), $item->rukun_tetanggas->sum('target_pemilih')) }}%">
                            {{ persen($item->calon_pemilihs->count(), $item->rukun_tetanggas->sum('target_pemilih')) }}%
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
