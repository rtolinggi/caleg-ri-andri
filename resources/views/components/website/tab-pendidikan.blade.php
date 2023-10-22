<div class="hidden rounded-lg bg-gray-50 p-4 dark:bg-gray-800" id="pendidikan" role="tabpanel"
    aria-labelledby="pendidikan-tab">
    <ol class="relative border-l border-gray-200 dark:border-gray-700">
        @foreach ($data as $item)
            <li class="mb-10 ml-6">
                <span
                    class="absolute -left-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 ring-8 ring-white dark:bg-blue-900 dark:ring-gray-900">
                    <x-heroicon type="academic-cap" class="text-utama dark:text-utama/30 h-5 w-5" />
                </span>
                <h3 class="mb-1 flex items-center text-lg font-semibold text-gray-900 dark:text-white">
                    {{ $item->nama }}
                </h3>
                <time class="mb-2 block text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                    {{ $item->tahun }}
                </time>
                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                    {{ $item->tempat }}
                </p>
            </li>
        @endforeach
    </ol>

</div>
