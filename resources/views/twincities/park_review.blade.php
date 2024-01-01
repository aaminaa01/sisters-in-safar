@extends('templates.layout')
@include('templates.flash-message')
@section('scriptsAndLinks')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@endsection
@section('titleContent')
    <H1 class="font-weight-bold display-3">Parks</H1>
        <H4 id="tagline">Parks around Pindi and Islamabad rated and reviewed by female travelers</H4>
        <p style="color:rgb(85, 77, 77); background-color: rgba(255, 255,255,0.5);">
            {{ $park->name }}<br>
            
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
 
 <div class="d-flex justify-content-end mb-3">
        @auth
            @php
                $user = auth()->user();
            @endphp
            @if ($user->role == 'admin')
                <a href="/check-park-reviews/{{$park->id}}" class="btn btnColor">New Reviews</a>
            @else
                <a href="/home/twincities/addParkReview/{{$park->id}}" class="btn btnColor">Add a Review</a>
            @endif
        @else
            <a href="/home/twincities/addParkReview/{{$park->id}}" class="btn btnColor">Add a Review</a>
        @endauth
    </div>

    <div class="d-flex  justify-content-start align-items-center mb-3">
    <div>
        <label for="sortCriteria">Sort by:</label>
        <select id="sortCriteria" class="btnColor rounded custom-select">
            <option  onclick="sortReviews('safety', 'desc')" value="safety">Safety(High to Low)</option>
            <option  onclick="sortReviews('safety', 'asc')" value="safety">Safety(Low to High)</option>
            <option  onclick="sortReviews('maintenance', 'desc')" value="maintenance">Maintenance(High to Low)</option>
            <option  onclick="sortReviews('maintenance', 'asc')" value="maintenance">Maintenance(Low to High)</option>
            <option  onclick="sortReviews('family_friendliness', 'desc')" value="family_friendliness">Family Friendliness(High to Low)</option>
            <option  onclick="sortReviews('family_friendliness', 'asc')" value="family_friendliness">Family Friendliness(Low to High)</option>
            </select>
    </div>
    </div>

    <div class="reviews-container row mx-3">

        @foreach($park_reviews as $index => $park_review)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        {{ $park_review->comments }}<br>
                        <span class="safety" rating={{$park_review->safety}}>Safety: {!! generateStars($park_review->safety) !!}</span><br>
                        <span class="maintenance" rating={{$park_review->maintenance}}>Maintenance: {!! generateStars($park_review->maintenance) !!}</span><br>
                        <span class="family_friendliness" rating={{$park_review->family_friendliness}}>Family Friendliness: {!! generateStars($park_review->family_friendliness) !!}</span><br>
                    </div>
                </div>
            </div>
            @if (($index + 1) % 3 == 0)
                </div><div class="row mx-3">
            @endif
        @endforeach
    </div>


    
<div class="d-flex justify-content-center ">
    {{ $park_reviews->links() }}
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        function sortReviews(criteria, order) {
            // Get the reviews container
            var reviewsContainer = document.querySelector('.reviews-container');
            
            // Convert the reviews to an array for sorting
            var reviewsArray = Array.from(reviewsContainer.children);
            console.log(reviewsArray);
            console.log(criteria);
            console.log("-----");

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
    <style>
        .btnColor {
            background-color: #da9181; 
            color: white;
        }
    </style>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css/reviews.css') }}">
        <link rel="stylesheet" href="{{ asset('css/park_reviews.css') }}">

    @endpush
@endsection