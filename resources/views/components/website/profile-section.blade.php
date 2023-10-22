<div class="mx-auto w-full px-4 sm:px-6 lg:px-8">
    <div
        class="block w-full rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="flex flex-col sm:justify-between md:flex-row md:items-center">
            <div class="itesm-start flex flex-col gap-6 md:flex-row md:items-center">
                <img src="{{ $avatar == null ? asset(env('CALEG_AVATAR')) : asset('storage/' . $avatar) }}"
                    alt="Avatar Image" class="w-20 rounded-full md:w-32">

                <div class="flex flex-col">
                    <p class="mb-2 text-2xl font-semibold">{{ $nama_lengkap }}</p>
                    <p class="md:text-md text-sm text-gray-500">Caleg {{ $tingkat }}</p>
                    <p class="md:text-md text-sm text-gray-500">Daerah Pilih {{ $dapil }}</p>
                </div>
            </div>

            <div class="item-center mt-3 flex gap-3 md:mt-0">
                <x-website.sosmed-button link="{{ $facebook }}">
                    <x-heroicon type="facebook" class="h-4 w-4 fill-current md:h-6 md:w-6" />
                </x-website.sosmed-button>

                <x-website.sosmed-button link="{{ $facebook }}">
                    <x-heroicon type="instagram" class="h-4 w-4 fill-current md:h-6 md:w-6" />
                </x-website.sosmed-button>
                <x-website.sosmed-button link="{{ $youtube }}">
                    <x-heroicon type="youtube" class="h-4 w-4 fill-current md:h-6 md:w-6" />
                </x-website.sosmed-button>
            </div>
        </div>

        <div class="mt-6 mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="-mb-px flex flex-wrap text-center text-sm font-medium text-gray-500 dark:text-gray-400"
                id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button
                        class="aria-selected:text-utama aria-selected:border-utama inline-block rounded-t-lg border-b-2 p-4 text-[8px] hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300 md:text-base"
                        id="curiculum-vitae-tab" data-tabs-target="#curiculum-vitae" type="button" role="tab"
                        aria-controls="curiculum-vitae" aria-selected="true">
                        <span class="inline md:hidden">CV</span>
                        <span class="hidden md:inline">Curriculum Vitae</span>
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="aria-selected:text-utama aria-selected:border-utama inline-block rounded-t-lg border-b-2 border-transparent p-4 text-[8px] hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300 md:text-base"
                        id="pendidikan-tab" data-tabs-target="#pendidikan" type="button" role="tab"
                        aria-controls="pendidikan" aria-selected="false">Pendidikan</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="aria-selected:text-utama aria-selected:border-utama inline-block rounded-t-lg border-b-2 border-transparent p-4 text-[8px] hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300 md:text-base"
                        id="organisasi-tab" data-tabs-target="#organisasi" type="button" role="tab"
                        aria-controls="organisasi" aria-selected="false">Organisasi</button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <x-website.curriculum-vitae />
            <x-website.tab-pendidikan />
            <x-website.tab-organisasi />
        </div>
    </div>
</div>
