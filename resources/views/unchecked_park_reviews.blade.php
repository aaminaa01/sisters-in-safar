@extends('templates.layout')
@section('scriptsAndLinks')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@endsection

@section('titleContent')
    <H1 class="font-weight-bold display-3">Unchecked Park Reviews</H1>
@endsection
@section('content')
    <div class="container mt-5">

        @foreach($uncheckedParkReviews as $review)
            <div class="card mb-3">
                <div class="card-header">
                    @php
                        // Retrieve the corresponding park object
                        $park = \App\Models\Park::find($review->park_id);
                        $city = \App\Models\City::find($park->city_id);
                    @endphp
                    Park: {{ $park->name }} (City: {{ $city->name }})
                </div>
                <div class="card-body">
                    <p class="card-text">User ID: {{ $review->user_id }}</p>
                    <p class="card-text">Comments: {{ $review->comments }}</p>
                    <p class="card-text">Safety: {{ $review->safety }}</p>
                    <p class="card-text">Maintenance: {{ $review->maintenance }}</p>
                    <p class="card-text">Family Friendliness: {{ $review->family_friendliness }}</p>
                    <p class="card-text">Created at: {{ $review->created_at }}</p>
                </div>
                <div class="card-footer text-muted">
                    <form method="post" action="{{ route('approveParkReview', $review->id) }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form method="post" action="{{ route('discardParkReview', $review->id) }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Discard</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">
@endpush
@endsection