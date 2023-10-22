<form enctype="multipart/form-data" wire:submit.prevent="update">
    <h1 class="mb-3 text-2xl font-semibold">1. Data TPS</h1>
    <div class="mb-6">
        <label for="selectedKecamatan" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            Kecamatan
        </label>
        <select wire:model="selectedKecamatan"
            class="focus:border-utama focus:ring-utama dark:focus:border-utama dark:focus:ring-utama block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">
            <option value="" selected>Pilih Kecamatan</option>
            @foreach ($kecamatans as $kecamatan)
                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
            @endforeach
        </select>
        @error('selectedKecamatan')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="selectedKelurahan" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            Kelurahan
        </label>
        <select wire:model="selectedKelurahan"
            class="focus:border-utama focus:ring-utama dark:focus:border-utama dark:focus:ring-utama block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">
            <option value="" selected>Pilih Kelurahan</option>
            @foreach ($kelurahanOptions as $kelurahan)
                <option value="{{ $kelurahan->id }}">{{ $kelurahan->nama }}</option>
            @endforeach
        </select>
        @error('selectedKelurahan')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="selectedTPS" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            TPS
        </label>
        <select wire:model="selectedTPS"
            class="focus:border-utama focus:ring-utama dark:focus:border-utama dark:focus:ring-utama block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">
            <option value="" selected>Pilih TPS</option>
            @foreach ($tpsOptions as $tps)
                <option value="{{ $tps->id }}">{{ $tps->nama }}</option>
            @endforeach
        </select>
        @error('selectedTPS')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="jumlah_suara" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            Jumlah Suara
        </label>
        <input type="number" wire:model="jumlah_suara"
            class="focus:border-utama focus:ring-utama dark:focus:border-utama dark:focus:ring-utama block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
            placeholder="Masukkan jumlah suara">
        @error('jumlah_suara')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <h1 class="mb-3 text-2xl font-semibold">2. Upload Bukti</h1>
    <div class="mb-6">
        <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false; progress = 5"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">
            <label
                class="mb-2 flex items-center justify-between gap-3 text-sm font-medium text-gray-900 dark:text-white"
                for="file_bukti">
                Foto Hasil Suara
                <div class="text-utama/50 flex items-center gap-2" wire:loading.inline-flex wire:target="file_bukti">
                    <x-heroicon type="arrow-path" class="h-4 w-4 animate-spin" />
                </div>
            </label>
            <input
                class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                wire:model="file_bukti" type="file" id="fileInput">
            @error('file_bukti')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror


            <div x-show.transition="isUploading" class="mt-3 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                <div class="bg-utama rounded-full p-0.5 text-center text-xs font-medium leading-none text-white"
                    x-bind:style="`width: ${progress}%`">
                    <span x-text="progress"></span>%
                </div>
            </div>
        </div>


        @if ($file_bukti)
            <div class="mt-3">
                Preview:
                <img src="{{ $file_bukti->temporaryUrl() }}" class="w-full rounded-xl" wire:ignore>
            </div>
        @endif
    </div>
    <button type="submit" wire:loading.attr="disabled"
        class="bg-utama hover:bg-utama focus:ring-utama dark:bg-utama dark:hover:bg-utama dark:focus:ring-utama w-full rounded-lg px-5 py-2.5 text-center text-sm font-medium text-white focus:outline-none focus:ring-4 sm:w-auto">
        <span wire:loading.remove wire:target="update">
            Submit
        </span>
        <span wire:loading wire:target="update">
            <x-heroicon type="arrow-path" class="h-5 w-5 animate-spin" />
        </span>
    </button>
</form>
