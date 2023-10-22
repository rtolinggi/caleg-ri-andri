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

        <h5 class="text-center text-xl font-bold tracking-wider">FORMULIR CALON PEMILIH</h5>

        <table class="mt-10 w-full table-fixed border-collapse">
            @foreach ($dataForm as $item)
                <tr class="">
                    <td width="28" class="py-3">{{ $item }}</td>
                    <td width="2%" class="py-3">:</td>
                    <td width="70" class="py-3">
                        @for ($i = 1; $i <= 22; $i++)
                            {{ '.....' }}
                        @endfor
                    </td>
                </tr>
            @endforeach
        </table>

        <section class="mt-10">
            <p class="">Pada Tanggal: ..............................</p>
            <p class="">Relawan, </p>
            <p class="mt-20">(..............................) </p>
        </section>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>
