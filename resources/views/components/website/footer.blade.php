<footer class="m-4 rounded-lg pt-10 dark:bg-gray-800">
    <div class="mx-auto w-full max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-500 dark:text-gray-400 sm:text-center">© {{ date('Y') }} <a
                href="{{ url('/') }}"
                class="hover:underline">{{ \App\Models\Setting::where('key', 'Title_Website')->first()->value }}</a>. All
            Rights
            Reserved.
        </span>
        <ul class="mt-3 flex flex-wrap items-center text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="#beranda" class="mr-4 hover:underline md:mr-6">Beranda</a>
            </li>
            <li>
                <a href="#visi-misi" class="mr-4 hover:underline md:mr-6">Visi Misi</a>
            </li>
            <li>
                <a href="#tentang-saya" class="mr-4 hover:underline md:mr-6">Tentang Saya</a>
            </li>
            <li>
                <a href="#jejak-digital" class="mr-4 hover:underline md:mr-6">Jejak Digital</a>
            </li>
            <li>
                <a href="#publikasi" class="mr-4 hover:underline md:mr-6">Publikasi</a>
            </li>
            <li>
                <a href="#aspirasi" class="mr-4 hover:underline md:mr-6">Aspirasi</a>
            </li>
            <li>
                <a href="#kontak" class="hover:underline">Kontak</a>
            </li>
        </ul>
    </div>
</footer>
