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

        <section class="mb-8">
            <h1 class="mb-2 text-2xl font-semibold tracking-wider">
                1. Identitas Relawan
            </h1>
            <table class="w-full">
                <tr>
                    <td width="25%">NIK</td>
                    <td width="2%">:</td>
                    <td>{{ $relawan->nik }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td width="2%">:</td>
                    <td>{{ $relawan->nama }}</td>
                </tr>
                <tr>
                    <td>No. Handphone</td>
                    <td width="2%">:</td>
                    <td>{{ $relawan->phone }}</td>
                </tr>
                <tr>
                    <td>Jenjang</td>
                    <td width="2%">:</td>
                    <td>{{ $relawan->jenjang }}</td>
                </tr>
                <tr>
                    <td>Tipe Relawan</td>
                    <td width="2%">:</td>
                    <td>{{ $relawan->tipe }}</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td width="2%">:</td>
                    <td>{{ $relawan->kecamatan->nama ?? '' }}</td>
                </tr>
                <tr>
                    <td>Kelurahan</td>
                    <td width="2%">:</td>
                    <td>{{ $relawan->kelurahan->nama ?? '' }}</td>
                </tr>
                <tr>
                    <td>Rukun Tetangga</td>
                    <td width="2%">:</td>
                    <td>{{ $relawan->rukun_tetangga->nama ?? '' }}</td>
                </tr>
                <tr>
                    <td>Jumlah Rekrutmen</td>
                    <td width="2%">:</td>
                    <td>{{ $relawan->daftar_pemilihs->count() }}</td>
                </tr>
            </table>
        </section>

        <div class="relative overflow-x-auto">
            <h1 class="mb-2 text-2xl font-semibold tracking-wider">
                2. Daftar Rekrutmen
            </h1>
            <table class="w-full text-left text-sm text-gray-700">
                <thead class="bg-gray-100 text-sm uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            NIK
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Umur
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No. HP
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            TPS
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Calon Pemilih
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($relawan->daftar_pemilihs as $rekrutmen)
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <td class="px-6 py-4">
                                {{ $rekrutmen->nik }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $rekrutmen->nama }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $rekrutmen->umur }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $rekrutmen->no_hp }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $rekrutmen->pemungutan_suara !== null ? $rekrutmen->pemungutan_suara->nama : '' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $rekrutmen->is_calon ? '✅' : '❌' }}
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
