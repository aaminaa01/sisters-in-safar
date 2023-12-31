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
        $stars .= '<span class="fa fa-star-half checked"></span>';
        $fullStars++; // Increment fullStars as we added a half star
    }

    // Fill the remaining stars with empty stars
    for ($j = $fullStars; $j < 5; $j++) {
        $stars .= '<span class="fa fa-star"></span>';
    }

    return $stars;
}
@endphp

    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Sort by:
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#" onclick="sortReviews('safety', 'desc')">Safety (High to Low)</a>
            <a class="dropdown-item" href="#" onclick="sortReviews('safety', 'asc')">Safety (Low to High)</a>
            <a class="dropdown-item" href="#" onclick="sortReviews('hygiene', 'desc')">Hygiene (High to Low)</a>
            <a class="dropdown-item" href="#" onclick="sortReviews('hygiene', 'asc')">Hygiene (Low to High)</a>
            <a class="dropdown-item" href="#" onclick="sortReviews('ambiance', 'desc')">Ambience (High to Low)</a>
            <a class="dropdown-item" href="#" onclick="sortReviews('ambiance', 'asc')">Ambience (Low to High)</a>
            <a class="dropdown-item" href="#" onclick="sortReviews('staff_behaviour', 'desc')">Staff Behaviour (High to Low)</a>
            <a class="dropdown-item" href="#" onclick="sortReviews('staff_behaviour', 'asc')">Staff Behaviour (Low to High)</a>
        </div>
    </div>

    <div id="reviews-container">
        @foreach($restaurant_reviews as $restaurant_review)
            <div class="card">
                {{ $restaurant_review->comments }}<br>
                <span class="safety" rating={{$restaurant_review->safety}}>Safety: {!! generateStars($restaurant_review->safety) !!}</span>
               <span class="hygiene" rating={{$restaurant_review->hygiene}}>Hygiene: {!! generateStars($restaurant_review->hygiene) !!}</span>
               <span class="ambience" rating={{$restaurant_review->ambience}}>Ambiance: {!! generateStars($restaurant_review->ambiance) !!}</span>
               <span class="staff_behaviour" rating={{$restaurant_review->staff_behaviour}}>Staff Behaviour: {!! generateStars($restaurant_review->staff_behaviour) !!}</span>
        </div>
        @endforeach
    </div>

    <div class="addReview">
    @auth
        @php
            $user = auth()->user();
        @endphp
        @if ( $user->role == 'admin')
            <a href="/check-restaurant-reviews/{{$restaurant->id}}" >New Reviews</a>
        @else
            <a href="/home/twincities/addRestaurantReview/{{$restaurant->id}}">Add Review</a>
        @endif
    @else
        <a href="/home/twincities/addRestaurantReview/{{$restaurant->id}}">Add Review</a>
    @endauth
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

        // Function to get the numeric value of the star rating
        function getRatingValue(ratingHtml) {
            // Count the checked stars in the HTML string
            return (ratingHtml.match(/fa-star checked/g) || []).length;
        }

    </script>
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">

    <link rel="stylesheet" href="{{ asset('css/reviews.css') }}">
@endpush
@endsection