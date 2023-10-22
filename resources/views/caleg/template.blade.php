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

    @yield('extra-style')
</head>

<body class="bg-gray-50 font-sans antialiased">

    @yield('content')

    <div class="mt-20"></div>
    <x-caleg.nav-bottom />

    @yield('extra-script')
</body>

</html>
