@extends('templates.layout')
@include('templates.flash-message')

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

    <div class="navbar">
      <div class="logo">
            <a href="../../../html/home.html"><img width="50px" height="50px" src="../../../images/logo.PNG" alt="logo"></a>
        </div>
        <!-- Navbar Links -->
        <div id="menu">
            <a href="../../../html/home.html">Home</a>
            <div class="dropdown">
                <p class="dropbtn" style="color: rgb(85, 77, 77);" id="active">Destinations
                    <i class="fa fa-caret-down"></i>
                </p>
                <div class="dropdown-content">
                    <a href="../../../html/destinations/twin_cities/twin_cities.html">Twin Cities</a>
                    <a href="../../../html/destinations/northern_areas/northern_areas.html">Northern Areas</a>
                    <a href="../../../html/destinations/lahore/lahore.html">Lahore</a>
                    <a href="../../../html/destinations/karachi/karachi.html">Karachi</a>
                </div>
            </div>
            <a href="../../../html/safety_tips/safety_tips.html">Safety Tips</a>
            <a href="../../../html/contact_us.html">Contact Us</a>
            <a href="../../../html/login.html">Sign In/ Sign Up</a>
        </div>
    </div>

    <div id="title">
        <H1>Parks</H1>
        <H4 id="tagline">Parks around Pindi and Islamabad rated and reviewed by female travelers</H4>
        <p style="color:rgb(85, 77, 77); background-color: rgba(255, 255,255,0.5);">
            {{ $park->name }}<br>
            
        </p>
    </div>

    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Sort by:
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#" onclick="sortReviews('safety', 'desc')">Safety (High to Low)</a>
            <a class="dropdown-item" href="#" onclick="sortReviews('safety', 'asc')">Safety (Low to High)</a>
            <a class="dropdown-item" href="#" onclick="sortReviews('maintenance', 'desc')">Maintenance (High to Low)</a>
            <a class="dropdown-item" href="#" onclick="sortReviews('maintenance', 'asc')">Maintenance (Low to High)</a>
            <a class="dropdown-item" href="#" onclick="sortReviews('family_friendliness', 'desc')">Family Friendliness (High to Low)</a>
            <a class="dropdown-item" href="#" onclick="sortReviews('family_friendliness', 'asc')">Family Friendliness (Low to High)</a>
        </div>
    </div>

    <div id="reviews-container">
        @foreach($park_reviews as $park_review)
            <div class="card">
                {{ $park_review->comments }}<br>
                <span class="safety" rating={{$park_review->safety}}>Safety: {!! generateStars($park_review->safety) !!}</span>
               <span class="maintenance" rating={{$park_review->maintenance}}>Maintenance: {!! generateStars($park_review->maintenance) !!}</span>
               <span class="family_friendliness" rating={{$park_review->family_friendliness}}>Family Friendliness: {!! generateStars($park_review->family_friendliness) !!}</span>
        </div>
        @endforeach
    </div>

    <div class="addReview">
        @auth
            @php
                $user = auth()->user();
            @endphp
            @if ( $user->role == 'admin')
                <a href="/check-park-reviews/{{$park->id}}" >New Reviews</a>
            @else
                <a href="/home/twincities/addParkReview/{{$park->id}}">Add Review</a>
            @endif
        @else
            <a href="/home/twincities/addParkReview/{{$park->id}}">Add Review</a>
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
@endsection