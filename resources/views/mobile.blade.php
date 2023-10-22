<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

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

<body class="flex min-h-screen flex-col items-center justify-center">
    <svg class="bg-utama absolute top-0 w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1"
            d="M0,256L48,240C96,224,192,192,288,192C384,192,480,224,576,240C672,256,768,256,864,240C960,224,1056,192,1152,197.3C1248,203,1344,245,1392,266.7L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>
    <div class="relative text-center">
        <img src="{{ asset('img/mobile_illustration.png') }}" alt="On Board Image"
            class="relative z-10 mx-auto mb-4 h-48 w-48">
        <h1 class="text-2xl font-bold text-gray-800">Welcome to Voteman App!</h1>
        <p class="mt-3 text-sm text-gray-500">
            Berikan Data yang Lengkap dan Benar
        </p>
        <div class="mt-16 grid grid-cols-2 gap-5">
            <a href="{{ route('relawan.create') }}" class="text-white">
                <div class="bg-utama/80 flex items-center justify-center rounded-t-xl px-5 py-2">
                    <x-heroicon type="user-plus" class="h-8 w-8 text-center" />
                </div>
                <div class="bg-utama rounded-b-xl px-5 py-2 text-xs">
                    Tambah Calon Pemilih
                </div>
            </a>
            <a href="{{ route('saksi.create') }}" class="text-white">
                <div class="bg-utama/80 flex items-center justify-center rounded-t-xl px-5 py-2">
                    <x-heroicon type="archive-box-arrow-down" class="h-8 w-8 text-center" />
                </div>
                <div class="bg-utama rounded-b-xl px-5 py-2 text-xs">
                    Input Suara TPS
                </div>
            </a>
        </div>
    </div>

    <p class="tex-center absolute bottom-5 text-gray-300">
        Powered by Voter Management
    </p>
</body>

</html>
