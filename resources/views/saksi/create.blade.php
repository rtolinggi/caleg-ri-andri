@extends('saksi.template')

@section('extra-style')
    @livewireStyles
@endsection

@section('extra-script')
    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection

@section('content')
    <div class="container my-5">
        <livewire:saksi.update-suara-tps />
    </div>
@endsection
