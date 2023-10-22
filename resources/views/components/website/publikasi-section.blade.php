<div class="mx-auto w-full px-4 sm:px-6 lg:px-8">
    <div class="mb-5 text-center">
        <h1 class="text-utama text-3xl font-semibold md:text-5xl">Kerja-Kerja Publikasi</h1>
        <h4 class="mt-2 text-sm text-gray-400 md:text-xl">
            Momen berharga bersama masyarakat tertuang <br> dalam gambar yang menginspirasi
        </h4>
    </div>

    <div class="grid grid-cols-2 gap-5 md:grid-cols-4">
        @php
            $duration = 0;
        @endphp
        @foreach ($data as $item)
            <a data-aos="zoom-in" data-aos-duration="{{ $duration += 500 }}" data-fancybox="gallery"
                href="{{ asset('storage/' . $item->foto) }}" class="cursor-pointer transition hover:scale-105">
                <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $item->foto) }}" alt="">
            </a>
        @endforeach
    </div>
</div>
