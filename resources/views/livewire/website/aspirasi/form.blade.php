<div class="overflow-hidden rounded-md bg-white">
    <div class="p-6 sm:p-10">
        <h3 class="text-3xl font-semibold text-black">Kolom Aspirasi</h3>
        <p class="mt-1 text-base text-gray-600">
            Berbagi aspirasi, ide, dan harapan Anda
        </p>

        <form wire:submit.prevent="store" class="mt-4">
            @if (session()->has('message'))
                <div id="alert-border-1"
                    class="border-utama text-utama dark:border-utama bg-utama/10 mb-4 flex border-t-4 p-4 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    <x-heroicon type="check-circle" class="h-6 w-6 flex-shrink-0" />
                    <div class="ml-3 text-sm font-medium">
                        {{ session('message') }}
                    </div>
                </div>
            @endif

            <div class="space-y-6">
                <div>
                    <label for="" class="text-base font-medium text-gray-900">Nama Anda
                    </label>
                    <div class="relative mt-2.5">
                        <input type="text" wire:model="nama" required placeholder="Masukkan Nama Lengkap Anda"
                            class="caret-utama focus:border-utama focus:ring-utama block w-full rounded-md border border-gray-200 bg-white px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 focus:outline-none" />
                    </div>
                </div>

                <div>
                    <label for="" class="text-base font-medium text-gray-900">No.
                        Handphone</label>
                    <div class="relative mt-2.5">
                        <input type="tel" wire:model="no_hp" required placeholder="Masukkan No. HP Aktif"
                            class="caret-utama focus:border-utama focus:ring-utama block w-full rounded-md border border-gray-200 bg-white px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 focus:outline-none" />
                    </div>
                </div>

                <div>
                    <label for="" class="text-base font-medium text-gray-900">Aspirasi</label>
                    <div class="relative mt-2.5">
                        <textarea wire:model="aspirasi" required placeholder="Tuliskan Harapan, Ide, atau Aspirasi Anda"
                            class="caret-utama focus:border-utama focus:ring-utama block w-full resize-y rounded-md border border-gray-200 bg-white px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 focus:outline-none"
                            rows="4"></textarea>
                    </div>
                </div>

                <div>
                    <button type="submit" wire:loading.attr="disabled"
                        class="bg-utama hover:bg-utama focus:bg-utama inline-flex w-full items-center justify-center rounded-full border border-transparent px-4 py-4 text-base font-semibold text-white transition-all duration-200 focus:outline-none">
                        <span wire:loading.remove wire:target="store">
                            Kirim Aspirasi
                        </span>
                        <span wire:loading wire:target="store">
                            <x-heroicon type="arrow-path" class="h-5 w-5 animate-spin" />
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
