<div class="bg-gray-900 py-10 sm:py-16 lg:py-24">
    <div class="mx-auto w-full px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-x-12 gap-y-10 md:grid-cols-2 md:items-stretch lg:gap-x-20">
            <div class="flex flex-col justify-between lg:py-5">
                <div>
                    <h2 class="text-3xl font-bold leading-tight text-white sm:text-4xl lg:text-5xl lg:leading-tight">
                        Sampaikan Aspirasi Anda</h2>
                    <p class="mx-auto mt-4 max-w-xl text-base leading-relaxed text-white">
                        Saya percaya bahwa setiap suara Anda memiliki kekuatan untuk membawa perubahan positif
                        dalam
                        masyarakat
                    </p>

                    <img class="hidden w-full translate-x-24 translate-y-8 md:block"
                        src="https://cdn.rareblocks.xyz/collection/celebration/images/contact/4/curve-line.svg"
                        alt="" />
                </div>

                <div class="hidden md:mt-auto md:block">
                    <div class="flex items-center">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="text-utama h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>

                    <div class="mt-8 flex items-center">
                        <img class="h-10 w-10 flex-shrink-0 rounded-full object-cover"
                            src="{{ $avatar == null ? asset(env('CALEG_AVATAR')) : asset('storage/' . $avatar) }}"
                            alt="Avatar Image" />
                        <div class="ml-4">
                            <p class="text-base font-semibold text-white">
                                {{ $nama }}
                            </p>
                            <p class="mt-px text-sm text-gray-400">
                                Dapil {{ $dapil }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:pl-12">
                <livewire:website.aspirasi.form />
            </div>
        </div>
    </div>
</div>
