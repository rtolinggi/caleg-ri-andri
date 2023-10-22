@extends('saksi.template')

@section('content')
    <div class="flex min-h-screen flex-col items-center justify-center text-center">
        <div class="flex flex-col gap-4">
            <img src="{{ asset('img/success.svg') }}" alt="" class="w-52">
            <h1 class="text-3xl font-semibold">
                Update Berhasil
            </h1>
            <p class="text-lg text-black/50">
                Suara TPS <br> telah berhasil diperbarui
            </p>
        </div>
        <a href="{{ route('saksi.create') }}"
            class="bg-utama dark:hover:bg-utama focus:ring-utama/50 hover:bg-utama/80 dark:focus:ring-utama/80 fixed bottom-10 inline-flex items-center rounded-full px-16 py-4 text-center text-sm font-medium text-white shadow-lg focus:outline-none focus:ring-4 dark:bg-blue-600">
            Input Suara TPS
            <x-heroicon type="archive-box-arrow-down" class="ml-2 -mr-1 h-5 w-5" />
        </a>
    </div>
@endsection
