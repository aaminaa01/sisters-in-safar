@extends('templates.layout')
@include('templates.flash-message')

@section('content')
    <a href="/check-restaurant-reviews">Restaurants</a><br/>
    <a href="/check-park-reviews">Parks</a><br/>
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">
@endpush
@endsection