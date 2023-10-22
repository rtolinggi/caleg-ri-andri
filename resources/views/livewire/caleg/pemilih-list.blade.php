<div class="container mt-5">

    <ul class="items-center w-full gap-4 text-sm font-medium text-gray-800 flex dark:bg-gray-700 dark:text-white">
        <li class="">
            <div class="flex items-center">
                <input id="semua" type="radio" value="SEMUA" wire:model="is_calon"
                    class="w-4 h-4 text-utama bg-gray-100 border-gray-300 focus:ring-utama dark:focus:ring-utama dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                <label for="semua" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Semua
                </label>
            </div>
        </li>
        <li class="">
            <div class="flex items-center">
                <input id="calon_pemilih" type="radio" value="TRUE" wire:model="is_calon"
                    class="w-4 h-4 text-utama bg-gray-100 border-gray-300 focus:ring-utama dark:focus:ring-utama dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                <label for="calon_pemilih"
                    class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Calon Pemilih
                </label>
            </div>
        </li>
        <li class="">
            <div class="flex items-center">
                <input id="dpt" type="radio" value="FALSE" wire:model="is_calon"
                    class="w-4 h-4 text-utama bg-gray-100 border-gray-300 focus:ring-utama dark:focus:ring-utama dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                <label for="dpt" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    DPT
                </label>
            </div>
        </li>
    </ul>


    <form>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg wire:loading.remove wire:target="search" aria-hidden="true" class="w-5 h-5 text-gray-500"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>

                <svg wire:loading wire:target="search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    class="w-5 h-5 text-gray-500 animate-spin" fill="currentColor">
                    <path
                        d="M222.7 32.1c5 16.9-4.6 34.8-21.5 39.8C121.8 95.6 64 169.1 64 256c0 106 86 192 192 192s192-86 192-192c0-86.9-57.8-160.4-137.1-184.1c-16.9-5-26.6-22.9-21.5-39.8s22.9-26.6 39.8-21.5C434.9 42.1 512 140 512 256c0 141.4-114.6 256-256 256S0 397.4 0 256C0 140 77.1 42.1 182.9 10.6c16.9-5 34.8 4.6 39.8 21.5z" />
                </svg>
            </div>
            <input type="search" wire:model="search"
                class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-utama focus:border-utama dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-utama dark:focus:border-utama"
                placeholder="Search" required>
        </div>
    </form>

    <ul role="list" class="w-full mt-3 divide-y divide-gray-200 dark:divide-gray-700">
        @foreach ($pemilihs as $pemilih)
            <li class="py-3 sm:py-4">
                <div class="flex items-center space-x-3">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-900 truncate dark:text-white">
                            {{ $pemilih->nama }}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{ $pemilih->jenis_kelamin }}
                        </p>
                    </div>

                    @if ($pemilih->is_calon == true)
                        <span
                            class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                            <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                            Calon Pemilih
                        </span>
                    @endif

                    @if ($pemilih->is_calon == false)
                        <span
                            class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                            <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                            DPT
                        </span>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>

</div>
