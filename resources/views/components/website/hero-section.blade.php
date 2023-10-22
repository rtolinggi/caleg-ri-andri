<div class="mx-auto w-full px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2">
        <div class="order-last text-center md:order-none md:text-left">
            <p class="text-utama text-base font-semibold uppercase tracking-wider">
                Calon Legislatif
            </p>
            <h1 class="mt-3 text-4xl font-bold text-gray-900 md:text-7xl lg:mt-6">
                {{ $copywriting }}
            </h1>
            <a href="#tentang-saya"
                class="bg-utama hover:bg-utama focus:bg-utama mt-4 inline-flex items-center gap-3 rounded-full px-6 py-4 font-semibold text-gray-50 transition-all duration-200 lg:mt-8"
                role="button">
                <x-heroicon type="check-badge" class="h-6 w-6" />
                {{ $nama_lengkap }}
            </a>
        </div>

        <div class="order-first md:order-none">
            <img class="w-full rounded-2xl shadow"
                src="{{ $banner == null ? asset(env('CALEG_BANNER')) : asset('storage/' . $banner) }}"
                alt="Banner Image" />
        </div>
    </div>
</div>
