@extends('templates.layout')
@include('templates.flash-message')

@section('scriptsAndLinks')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@endsection

@section('titleContent')
    <H1 class="font-weight-bold display-3">Restaurants</H1>
    <H4 id="tagline">Eateries around Pindi and Islamabad rated and reviewed by female travelers</H4>
    <p style="color:rgb(85, 77, 77); background-color: rgba(255, 255,255,0.5);">
        {{ $restaurant->name }}<br>
    </p>
@endsection

@section('content')   
    @php
        function generateStars($rating) {
            $stars = '';
            $fullStars = floor($rating);
            $halfStar = $rating % 1 !== 0;

            for ($i = 0; $i < $fullStars; $i++) {
                $stars .= '<span class="fa fa-star checked"></span>';
            }

            if ($halfStar) {
                $stars .= '<span class="fa fa-star-half-alt checked"></span>';
                $fullStars++; // Increment fullStars as we added a half star
            }

            // Fill the remaining stars with empty stars
            for ($j = $fullStars; $j < 5; $j++) {
                $stars .= '<span class="fa fa-star"></span>';
            }

            return $stars;
        }
    @endphp

    <div class="d-flex justify-content-end mb-3">
        @auth
            @php
                $user = auth()->user();
            @endphp
            @if ($user->role == 'admin')
                <a href="/check-restaurant-reviews/{{$restaurant->id}}" class="btn btnColor " >New Reviews</a>
            @else
                <a href="/home/twincities/addRestaurantReview/{{$restaurant->id}}" class="btn btnColor ">Add a Review</a>
            @endif
        @else
            <a href="/home/twincities/addRestaurantReview/{{$restaurant->id}}" class="btn btnColor ">Add a Review</a>
        @endauth
    </div>

    <div class="row">
        @foreach($restaurant_reviews as $index => $restaurant_review)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                    @php

                        <span class="reviewedBy">Reviewed by: 
                        {{ $restaurant_review->comments }}<br>
                        <span class="safety" rating={{$restaurant_review->safety}}>Safety: {!! generateStars($restaurant_review->safety) !!}</span><br>
                        <span class="hygiene" rating={{$restaurant_review->hygiene}}>Hygiene: {!! generateStars($restaurant_review->hygiene) !!}</span><br>
                        <span class="ambience" rating={{$restaurant_review->ambience}}>Ambiance: {!! generateStars($restaurant_review->ambience) !!}</span><br>
                        <span class="staff_behaviour" rating={{$restaurant_review->staff_behaviour}}>Staff Behaviour: {!! generateStars($restaurant_review->staff_behaviour) !!}</span>
                    </div>
                </div>
            </div>
            @if (($index + 1) % 3 == 0)
                </div><div class="row">
            @endif
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        function sortReviews(criteria, order) {
            // Get the reviews container
            var reviewsContainer = document.getElementById('reviews-container');
            
            // Convert the reviews to an array for sorting
            var reviewsArray = Array.from(reviewsContainer.children);

            // Sort the array based on the selected criteria and order
            reviewsArray.sort(function(a, b) {
                var aCriteria = parseInt((a.querySelector('span.' + criteria).getAttribute('rating')), 10);
                var bCriteria = parseInt((b.querySelector('span.' + criteria).getAttribute('rating')), 10);

                if (order === 'asc') {
                    return aCriteria - bCriteria;
                } else {
                    return bCriteria - aCriteria;
                }
            });

            // Empty the container
            reviewsContainer.innerHTML = '';

            // Append the sorted reviews to the container
            reviewsArray.forEach(function(review) {
                reviewsContainer.appendChild(review);
            });
        }
    </script>
    <style>
        .btnColor {
            background-color: #da9181; 
            color: white;
        }

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css/reviews.css') }}">
    @endpush
@endsection
