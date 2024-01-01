@extends('templates.layout')
@section('scriptsAndLinks')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@endsection

@section('titleContent')
    <H1 class="font-weight-bold display-3">Reviews Pending Approval</H1>
@endsection
@section('content')      
    <div class="pg-content">
        <a href="/check-restaurant-reviews"><div class="restaurants"><h1>Restaurants</h1></div></a>
        <a href="/check-restaurant-reviews"><div class="parks"><h1>Parks</h1></div></a>
    </div>
    <footer></footer>

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/twin_cities_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">

@endpush
@endsection