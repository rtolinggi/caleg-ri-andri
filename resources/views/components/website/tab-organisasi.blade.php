<div class="hidden rounded-lg bg-gray-50 p-4 dark:bg-gray-800" id="organisasi" role="tabpanel"
    aria-labelledby="organisasi-tab">
    <dl class="w-full divide-y divide-gray-200 text-gray-900 dark:divide-gray-700 dark:text-white">
        @foreach ($data as $item)
            <div class="flex flex-col pb-3">
                <dt class="mb-2 text-sm text-gray-500 dark:text-gray-400 md:text-base">
                    {{ $item->tahun }}
                </dt>
                <dd class="text-sm font-semibold md:text-lg">
                    {{ $item->sebagai }}
                </dd>
            </div>
        @endforeach
    </dl>
</div>
