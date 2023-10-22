@extends('relawan.template')

@section('content')
    <div class="flex min-h-screen flex-col items-center justify-center text-center">
        <div class="flex flex-col gap-4">
            <img src="{{ asset('img/success.svg') }}" alt="" class="w-52">
            <h1 class="text-3xl font-semibold">
                Input Berhasil
            </h1>
            <p class="text-lg text-black/50">
                Calon Pemilih <br> telah berhasil ditambahkan
            </p>
        </div>
        <a href="{{ route('relawan.create') }}"
            class="bg-utama dark:hover:bg-utama focus:ring-utama/50 hover:bg-utama/80 dark:focus:ring-utama/80 fixed bottom-10 inline-flex items-center rounded-full px-16 py-4 text-center text-sm font-medium text-white shadow-lg focus:outline-none focus:ring-4 dark:bg-blue-600">
            Tambah Calon Pemilih
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="ml-2 -mr-1 h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
            </svg>
        </a>
    </div>
@endsection
