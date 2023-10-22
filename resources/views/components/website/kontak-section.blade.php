<div class="mx-auto w-full px-4 sm:px-6 lg:px-8">
    <div class="mx-auto text-center">
        <h1 class="text-utama text-3xl font-semibold md:text-5xl">Kontak</h1>
        <h4 class="mt-2 text-sm text-gray-400 md:text-xl">
            Silakan hubungi saya <br> melalui informasi kontak di bawah ini
        </h4>
    </div>

    <div class="relative mt-12 lg:mt-16">
        <div class="absolute inset-x-0 top-2 hidden md:block md:px-20 lg:px-28 xl:px-44">
            <img class="w-full"
                src="https://cdn.rareblocks.xyz/collection/celebration/images/steps/2/curved-dotted-line.svg"
                alt="" />
        </div>

        <div class="relative grid grid-cols-1 gap-y-12 gap-x-12 text-center md:grid-cols-3">
            <a href="https://wa.me/+62{{ substr($no_handphone, 1) }}" target="_blank">
                <div data-aos="flip-down"
                    class="mx-auto flex h-16 w-16 items-center justify-center rounded-full border-2 border-gray-200 bg-white shadow">
                    <span class="text-xl font-semibold">
                        <svg class="h-6 w-6 fill-current text-gray-700" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path
                                d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                        </svg>
                    </span>
                </div>
                <h3 class="mt-6 text-xl font-semibold leading-tight text-black md:mt-10">
                    No. Handphone
                </h3>
                <p class="mt-4 text-base text-gray-600">
                    {{ $no_handphone }}
                </p>
            </a>

            <a href="mailto:{{ $email }}" target="_blank">
                <div data-aos="flip-down"
                    class="mx-auto flex h-16 w-16 items-center justify-center rounded-full border-2 border-gray-200 bg-white shadow">
                    <span class="text-xl font-semibold text-gray-700">
                        <svg class="h-7 w-7 fill-current text-gray-700" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path
                                d="M215.4 96H144 107.8 96v8.8V144v40.4 89L.2 202.5c1.6-18.1 10.9-34.9 25.7-45.8L48 140.3V96c0-26.5 21.5-48 48-48h76.6l49.9-36.9C232.2 3.9 243.9 0 256 0s23.8 3.9 33.5 11L339.4 48H416c26.5 0 48 21.5 48 48v44.3l22.1 16.4c14.8 10.9 24.1 27.7 25.7 45.8L416 273.4v-89V144 104.8 96H404.2 368 296.6 215.4zM0 448V242.1L217.6 403.3c11.1 8.2 24.6 12.7 38.4 12.7s27.3-4.4 38.4-12.7L512 242.1V448v0c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64v0zM176 160H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                        </svg>
                    </span>
                </div>
                <h3 class="mt-6 text-xl font-semibold leading-tight text-black md:mt-10">
                    Email
                </h3>
                <p class="mt-4 text-base text-gray-600">
                    {{ $email }}
                </p>
            </a>

            <a href="https://www.google.com/maps/search/?api=1&query={{ str_replace(' ', '+', $location) }}
"
                target="_blank">
                <div data-aos="flip-down"
                    class="mx-auto flex h-16 w-16 items-center justify-center rounded-full border-2 border-gray-200 bg-white shadow">
                    <span class="text-xl font-semibold text-gray-700">
                        <svg class="h-7 w-7 fill-current text-gray-700" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512">
                            <path
                                d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                        </svg>
                    </span>
                </div>
                <h3 class="mt-6 text-xl font-semibold leading-tight text-black md:mt-10">
                    Alamat
                </h3>
                <p class="mt-4 text-base text-gray-600">
                    {{ $location }}
                </p>
            </a>
        </div>
    </div>
</div>
