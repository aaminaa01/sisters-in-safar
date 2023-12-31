@extends('templates.layout')
@include('templates.flash-message')
@section('titleContent')
    <H1>The Twin Cities</H1>
@endsection
@section('content')      
    <div class="pg-content">
        <a href="twincities/restaurants"><div class="restaurants"><h1>Restaurants</h1></div></a>
        <a href="twincities/parks"><div class="parks"><h1>Parks</h1></div></a>
    </div>
    <footer></footer>

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/twin_cities_styles.css') }}">
@endpush
@endsection