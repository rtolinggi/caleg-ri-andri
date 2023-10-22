<div class="container mt-5">
    <form>
        <div class="flex">
            <button id="dropdown-button" data-dropdown-toggle="dropdown"
                class="z-10 inline-flex flex-shrink-0 items-center rounded-l-lg border border-gray-300 bg-gray-100 py-2.5 px-4 text-center text-sm font-medium text-gray-900 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                type="button">Jenjang <svg aria-hidden="true" class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg></button>
            <div id="dropdown"
                class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700">
                <ul class="space-y-3 p-3 text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownRadioButton">
                    <li>
                        <div class="flex items-center">
                            <input id="Semua" type="radio" value="SEMUA" wire:model="jenjang"
                                class="text-utama focus:ring-utama dark:focus:ring-utama h-4 w-4 border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700">
                            <label for="Semua"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Semua</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="Kecamatan" type="radio" value="KECAMATAN" wire:model="jenjang"
                                class="text-utama focus:ring-utama dark:focus:ring-utama h-4 w-4 border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700">
                            <label for="Kecamatan"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kecamatan</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="Kelurahan" type="radio" value="KELURAHAN" wire:model="jenjang"
                                class="text-utama focus:ring-utama dark:focus:ring-utama h-4 w-4 border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700">
                            <label for="Kelurahan"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kelurahan</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input id="RT" type="radio" value="RT" wire:model="jenjang"
                                class="text-utama focus:ring-utama dark:focus:ring-utama h-4 w-4 border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700">
                            <label for="RT"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Rukun Tetangga</label>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="relative w-full">
                <input type="search" id="search-dropdown" wire:model="search"
                    class="focus:ring-utama focus:border-utama dark:focus:border-utama z-20 block w-full rounded-r-lg border border-l-2 border-gray-300 border-l-gray-50 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:border-l-gray-700 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                    placeholder="Pencarian.." required>
                <div
                    class="bg-utama border-utama hover:bg-utama focus:ring-utama dark:bg-utama dark:hover:bg-utama dark:focus:ring-utama absolute top-0 right-0 rounded-r-lg border p-2.5 text-sm font-medium text-white focus:outline-none focus:ring-4">
                    <svg wire:loading.remove wire:target="search" aria-hidden="true" class="h-5 w-5" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>

                    <svg wire:loading wire:target="search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="h-5 w-5 animate-spin" fill="currentColor">
                        <path
                            d="M222.7 32.1c5 16.9-4.6 34.8-21.5 39.8C121.8 95.6 64 169.1 64 256c0 106 86 192 192 192s192-86 192-192c0-86.9-57.8-160.4-137.1-184.1c-16.9-5-26.6-22.9-21.5-39.8s22.9-26.6 39.8-21.5C434.9 42.1 512 140 512 256c0 141.4-114.6 256-256 256S0 397.4 0 256C0 140 77.1 42.1 182.9 10.6c16.9-5 34.8 4.6 39.8 21.5z" />
                    </svg>
                </div>
            </div>
        </div>
    </form>


    <!-- LIST DATA COMPONENT -->
    <div class="mt-3 rounded-xl bg-white p-3 shadow-lg">
        <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($relawans as $relawan)
                <li class="pb-3 sm:pb-4">
                    <div class="flex items-center space-x-4">
                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm font-medium text-gray-900 dark:text-white">
                                {{ $relawan->nama }}
                            </p>
                            <p class="truncate text-sm text-gray-500 dark:text-gray-400">
                                {{ $relawan->jenjang }}
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            {{ $relawan->calon_pemilihs->count() }}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
