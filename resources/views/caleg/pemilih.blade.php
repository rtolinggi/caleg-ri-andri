@extends('caleg.template')

@section('extra-style')
    @livewireStyles
@endsection

@section('extra-script')
    @livewireScripts
@endsection

@section('content')
    <x-caleg.nav-title title="Calon Pemilih" />

    <livewire:caleg.pemilih-list />
@endsection
