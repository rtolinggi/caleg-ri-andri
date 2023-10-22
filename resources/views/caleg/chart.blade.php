@extends('caleg.template')

@section('content')
    <x-caleg.nav-title title="Grafik" />

    <div class="container mt-5">
        <div class="bg-white p-2 rounded-xl shadow mb-5">
            {!! $chart2->container() !!}
        </div>

        <div class="bg-white p-2 rounded-xl shadow mb-5">
            {!! $chart1->container() !!}
        </div>
    </div>
@endsection

@section('extra-script')
    <script src="{{ $chart1->cdn() }}"></script>

    {{ $chart1->script() }}
    {{ $chart2->script() }}
@endsection
