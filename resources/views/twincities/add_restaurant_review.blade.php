@extends('templates.layout')
@section('scriptsAndLinks')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@endsection

@section('titleContent')
    <H1 class="font-weight-bold display-2">Add a Review</H1>
    <H4 id="tagline">Share your experience - let others know what to expect of this place.</H4>
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-5">
        <h1>{{ $restaurant->name}}</h1>
        <form action="{{ route("addUncheckedRestaurantReview") }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="safety" class="form-label">Safety Rating<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="safety" name="safety" step="1" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label for="hygiene" class="form-label">Hygiene Rating<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="hygiene" name="hygiene" step="1" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label for="ambiance" class="form-label">Ambiance Rating<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="ambiance" name="ambiance" step="1" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label for="staff_behaviour" class="form-label">Staff Behaviour Rating<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="staff_behaviour" name="staff_behaviour" step="1" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label for="comments" class="form-label">Comments</label>
                <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
            </div>
           
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    </div>
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">

    @endpush
@endsection