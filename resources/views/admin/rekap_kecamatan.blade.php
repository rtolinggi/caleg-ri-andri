<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ \App\Models\Setting::where('key', 'Title_Website')->first()->value }}
    </title>

    <link rel="shortcut icon"
        href="{{ \App\Models\Media::where('title', 'Logo Web')->first()->image == null ? asset(env('APP_LOGO')) : asset('storage/' . \App\Models\Media::where('title', 'Logo Web')->first()->image) }}"
        type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="my-3 px-5">
        <x-kop-surat />

        <h5 class="mb-6 text-center text-xl font-bold tracking-wider underline">
            Rekapan Kecamatan {{ $kecamatan->nama }}
        </h5>

        <div class="relative overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-700">
                <thead class="bg-gray-100 text-sm uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Kelurahan
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            RT
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            TPS
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Relawan
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            DPT
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Calon Pemilih
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kecamatan->kelurahans as $kelurahan)
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $kelurahan->nama }}
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{ $kelurahan->rukun_tetanggas->count() }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $kelurahan->pemungutan_suaras->count() }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $kelurahan->relawans->count() }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $kelurahan->daftar_pemilihs->count() }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $kelurahan->calon_pemilihs->count() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>
