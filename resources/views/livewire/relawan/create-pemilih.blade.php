<form enctype="multipart/form-data" wire:submit.prevent="store">
    <h1 class="mb-3 text-2xl font-semibold">1. Identitas Personal</h1>
    <div class="mb-6">
        <label for="nik" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">NIK</label>
        <input type="number" wire:model="nik"
            class="focus:border-utama focus:ring-utama dark:focus:border-utama dark:focus:ring-utama block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
            placeholder="Masukkan NIK Pemilih">
        @error('nik')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="text" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            Nama Lengkap
        </label>
        <input type="text" wire:model="nama"
            class="focus:border-utama focus:ring-utama dark:focus:border-utama dark:focus:ring-utama block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
            placeholder="Masukkan Nama Lengkap">
        @error('nama')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="website-admin" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Umur</label>
        <div class="flex">
            <input type="number" wire:model="umur"
                class="focus:border-utama focus:ring-utama dark:focus:border-utama dark:focus:ring-utama block w-full min-w-0 flex-1 rounded-none rounded-l-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                placeholder="0">
            <span
                class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-gray-200 px-3 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-400">
                Tahun
            </span>
        </div>
        @error('umur')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-6 flex items-center gap-3">
        <div class="flex items-center">
            <input wire:model="jenis_kelamin" type="radio" value="PRIA"
                class="text-utama focus:ring-utama dark:focus:ring-utama h-4 w-4 border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800">
            <label for="PRIA" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                PRIA
            </label>
        </div>
        <div class="flex items-center">
            <input wire:model="jenis_kelamin" type="radio" value="WANITA"
                class="text-utama focus:ring-utama dark:focus:ring-utama h-4 w-4 border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800">
            <label for="WANITA" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                WANITA
            </label>
        </div>
        @error('jenis_kelamin')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="no_hp" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            No. HP
        </label>
        <input type="tel" wire:model="no_hp"
            class="focus:border-utama focus:ring-utama dark:focus:border-utama dark:focus:ring-utama block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
            placeholder="081122334455">
        @error('no_hp')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <h1 class="mb-3 text-2xl font-semibold">2. Area Pemilih</h1>
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
        <label for="selectedRT" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            Rukun Tetangga (RT)
        </label>
        <select wire:model="selectedRT"
            class="focus:border-utama focus:ring-utama dark:focus:border-utama dark:focus:ring-utama block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">
            <option value="" selected>Pilih RT</option>
            @foreach ($rtOptions as $rt)
                <option value="{{ $rt->id }}">{{ $rt->nama }}</option>
            @endforeach
        </select>
        @error('selectedRT')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="selectedRelawan" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            Relawan
        </label>
        <select wire:model="selectedRelawan"
            class="focus:border-utama focus:ring-utama dark:focus:border-utama dark:focus:ring-utama block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">
            <option value="" selected>Pilih Relawan</option>
            @foreach ($relawanOptions as $relawan)
                <option value="{{ $relawan->id }}">{{ $relawan->nama }}</option>
            @endforeach
        </select>
        @error('selectedRelawan')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <h1 class="mb-3 text-2xl font-semibold">3. Upload Berkas</h1>
    <div class="mb-6">
        <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false; progress = 5"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">
            <label
                class="mb-2 flex items-center justify-between gap-3 text-sm font-medium text-gray-900 dark:text-white"
                for="file_identitas">
                Identitas Pemilih
                <div class="text-utama/50 flex items-center gap-2" wire:loading.inline-flex
                    wire:target="file_identitas">
                    <x-heroicon type="arrow-path" class="h-4 w-4 animate-spin" />
                </div>
            </label>
            <input
                class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                wire:model="file_identitas" type="file">
            @error('file_identitas')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror

            <div x-show.transition="isUploading" class="mt-3 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                <div class="bg-utama rounded-full p-0.5 text-center text-xs font-medium leading-none text-white"
                    x-bind:style="`width: ${progress}%`">
                    <span x-text="progress"></span>%
                </div>
            </div>
        </div>

        @if ($file_identitas)
            <div class="mt-3">
                Preview:
                <img src="{{ $file_identitas->temporaryUrl() }}" class="w-full rounded-xl">
            </div>
        @endif
    </div>
    <button type="submit" wire:loading.attr="disabled"
        class="bg-utama hover:bg-utama focus:ring-utama dark:bg-utama dark:hover:bg-utama dark:focus:ring-utama w-full rounded-lg px-5 py-2.5 text-center text-sm font-medium text-white focus:outline-none focus:ring-4 sm:w-auto">
        <span wire:loading.remove wire:target="store">
            Submit
        </span>
        <span wire:loading wire:target="store">
            <x-heroicon type="arrow-path" class="h-5 w-5 animate-spin" />
        </span>
    </button>
</form>
