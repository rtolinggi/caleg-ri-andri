@extends('caleg.template')

@section('extra-style')
    @livewireStyles
@endsection

@section('extra-script')
    @livewireScripts
@endsection

@section('content')
    <x-caleg.nav-title title="Relawan" />

    <livewire:caleg.relawan-list />
@endsection
