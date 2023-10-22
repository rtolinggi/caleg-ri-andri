<div class="">
    <img src="{{ $logo_web == null ? asset(env('APP_LOGO')) : asset('storage/' . $logo_web) }}" alt="Logo"
        class="absolute w-16">
    <div class="mb-4 ml-10 text-center">
        <h1 class="text-3xl font-bold tracking-wider">{{ $title_website }}</h1>
        <p class="text-lg">
            Dapil {{ $dapil }}
        </p>
        <p class="text-sm text-gray-500">
            Alamat: {{ $location }}; No.Hp: {{ $no_handphone }}; Email: {{ $email }}
        </p>
    </div>

    <div class="mb-8 mt-4 h-px border-0 bg-gray-700"></div>
</div>
