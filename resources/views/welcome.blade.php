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
    @livewireStyles
</head>

<body class="bg-gray-50 font-sans antialiased">
    <x-website.navbar />

    <section class="pt-16 md:pt-28" id="beranda">
        <x-website.hero-section />
    </section>

    <section class="pt-16 md:pt-28" id="visi-misi">
        <x-website.visi-misi-section />
    </section>

    <section class="pt-16 md:pt-28" id="tentang-saya">
        <x-website.profile-section />
    </section>

    <section class="pt-16 md:pt-28" id="jejak-digital">
        <x-website.jejak-digital-section />
    </section>

    <section class="pt-16 md:pt-28" id="publikasi">
        <x-website.publikasi-section />
    </section>

    <section class="pt-14 md:pt-20" id="aspirasi">
        <x-website.aspirasi-section />
    </section>

    <section class="pt-16 md:pt-28" id="kontak">
        <x-website.kontak-section />
    </section>

    <x-website.footer />

    @livewireScripts
</body>

</html>
