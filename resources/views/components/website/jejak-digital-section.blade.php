<div class="mx-auto w-full px-4 sm:px-6 lg:px-8">
    <div class="mb-5 text-center">
        <h1 class="text-utama text-3xl font-semibold md:text-5xl">Rekam Jejak Digital</h1>
        <h4 class="mt-2 text-sm text-gray-400 md:text-xl">
            Bersama-sama Kita membangun <br> masa depan yang lebih baik
        </h4>
    </div>

    <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
        @php
            $duration = 0;
        @endphp
        @foreach ($data as $item)
            <div class="w-full rounded-xl bg-white p-5 shadow-xl dark:bg-gray-800" data-aos="fade-up"
                data-aos-duration="{{ $duration += 500 }}">
                <img class="rounded-xl" src="{{ asset('storage/' . $item->image) }}" alt="" />
                <div class="mt-5 flex items-center gap-4">
                    <p class="mb-3 flex items-center gap-1 text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                        </svg>
                        <span class="">{{ $item->publisher }}</span>
                    </p>
                    <p class="mb-3 flex items-center gap-1 text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                        </svg>
                        <span class="">{{ $item->date }}</span>
                    </p>
                </div>
                <a href="{{ $item->url }}" target="_blank">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $item->title }}
                    </h5>
                </a>

                <a href="{{ $item->url }}" target="_blank"
                    class="bg-utama hover:bg-utama focus:ring-utama/40 dark:bg-utama dark:hover:bg-utama dark:focus:ring-utama/40 inline-flex items-center rounded-lg px-3 py-2 text-center text-sm font-medium text-white focus:outline-none focus:ring-4">
                    Lihat Selengkapnya
                    <svg aria-hidden="true" class="ml-2 -mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        @endforeach
    </div>

    {{-- <div class="mt-3">
        {{ $data->links() }}
    </div> --}}
</div>
