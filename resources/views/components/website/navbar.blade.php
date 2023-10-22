<nav class="fixed top-0 left-0 z-20 w-full bg-white shadow dark:bg-gray-900">
    <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between px-4 py-2 sm:px-6 md:py-6 lg:px-8">
        <span class="self-center whitespace-nowrap text-2xl font-bold dark:text-white" data-aos="fade-down-right">
            {{ \App\Models\Setting::where('key', 'Title_Website')->first()->value }}
        </span>
        <button data-collapse-toggle="navbar-default" type="button"
            class="ml-3 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
            aria-controls="navbar-default" aria-expanded="text-utama">
            <span class="sr-only">Open main menu</span>
            <svg class="text-grey-600 h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="mt-4 flex flex-col gap-3 rounded-lg border border-gray-100 bg-gray-50 p-4 font-medium dark:border-gray-700 dark:bg-gray-800 md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-white md:p-0 md:dark:bg-gray-900">
                <li>
                    <a data-aos="fade-down-right" href="#beranda"
                        class="md:hover:text-utama md:dark:hover:text-utama block rounded py-2 pl-3 pr-4 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:dark:hover:bg-transparent">Beranda</a>
                </li>
                <li>
                    <a data-aos="fade-down-right" href="#visi-misi"
                        class="md:hover:text-utama md:dark:hover:text-utama block rounded py-2 pl-3 pr-4 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:dark:hover:bg-transparent">Visi
                        Misi</a>
                </li>
                <li>
                    <a data-aos="fade-down-right" href="#tentang-saya"
                        class="md:hover:text-utama md:dark:hover:text-utama block rounded py-2 pl-3 pr-4 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:dark:hover:bg-transparent">Tentang
                        Saya</a>
                </li>
                <li>
                    <a data-aos="fade-down-right" href="#jejak-digital"
                        class="md:hover:text-utama md:dark:hover:text-utama block rounded py-2 pl-3 pr-4 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:dark:hover:bg-transparent">Jejak
                        Digital</a>
                </li>
                <li>
                    <a data-aos="fade-down-right" href="#publikasi"
                        class="md:hover:text-utama md:dark:hover:text-utama block rounded py-2 pl-3 pr-4 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:dark:hover:bg-transparent">Publikasi</a>
                </li>
                <li>
                    <a data-aos="fade-down-right" href="#aspirasi"
                        class="md:hover:text-utama md:dark:hover:text-utama block rounded py-2 pl-3 pr-4 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:dark:hover:bg-transparent">Aspirasi</a>
                </li>
                <li>
                    <a data-aos="fade-down-right" href="#kontak"
                        class="md:hover:text-utama md:dark:hover:text-utama block rounded py-2 pl-3 pr-4 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:dark:hover:bg-transparent">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
