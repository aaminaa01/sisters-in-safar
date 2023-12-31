@extends('templates.layout')
@include('templates.flash-message')
@section('titleContent')
    <H1>Restaurants in the Twin Cities</H1>
    <H4 id="tagline">Eateries around Pindi and Islamabad rated and reviewed by female travelers</H4>
@endsection        
@section('content')   
    <h1>Restaurants in City 1</h1>

    @php
        // Function to convert numeric rating to yellow star representation
        function convertToStars($rating) {
            $fullStars = floor($rating);
            $halfStar = ceil($rating - $fullStars);

            $stars = str_repeat('<i class="fa fa-star" style="color: yellow;"></i>', $fullStars);
            
            if ($halfStar > 0) {
                $stars .= '<i class="fa fa-star-half-alt" style="color: yellow;"></i>';
            }

            return $stars;
        }
    @endphp

    <div>
        <label for="sortCriteria">Sort by(high to low):</label>
        <select id="sortCriteria" onchange="sortResults()">
            <option value="safety">Safety Rating</option>
            <option value="hygiene">Hygiene Rating</option>
            <option value="ambiance">Ambiance Rating</option>
            <option value="staff_behaviour">Staff Behaviour Rating</option>
        </select>
    </div>

    <ul id="restaurantsList">
        @forelse ($restaurants as $restaurant)
            <li data-safety="{{ $restaurant->safety_avg }}" data-ambiance="{{ $restaurant->ambiance_avg }}" data-hygiene="{{ $restaurant->hygiene_avg }}" data-staff-behaviour="{{ $restaurant->staff_behaviour_avg }}">
                <a href="/home/twincities/restaurants/{{$restaurant->id}}">
                    {{ $restaurant->name }}
                </a>
                <p>Number of Reviews: {{ $restaurant->review_count }}</p>
                <p>
                    Average Ratings: 
                    Safety - {!! convertToStars($restaurant->safety_avg) !!},
                    Hygiene - {!! convertToStars($restaurant->hygiene_avg) !!},
                    Ambiance - {!! convertToStars($restaurant->ambiance_avg) !!},
                    Staff Behavior - {!! convertToStars($restaurant->staff_behaviour_avg) !!}
                </p>
            </li>
        @empty
            <li>No restaurants found in this city.</li>
        @endforelse
    </ul>

    <a href="#" class="btn"><i class="fa fa-arrow-up"></i></a>
    <a href="#" class="btn hidden-btn"><i class="fa fa-arrow-up"></i></a>

    <script>
        function sortResults() {
            var list = document.getElementById("restaurantsList");
            var items = list.getElementsByTagName("li");
            var sortCriteria = document.getElementById("sortCriteria").value;

            var sortedItems = Array.from(items).sort((a, b) => {
                var ratingA = parseFloat(a.getAttribute("data-" + sortCriteria)) || 0;
                var ratingB = parseFloat(b.getAttribute("data-" + sortCriteria)) || 0;

                return ratingB - ratingA;
            });

            // Clear the list and append the sorted items
            list.innerHTML = "";
            sortedItems.forEach(item => {
                list.appendChild(item);
            });
        }
    </script>
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">

    <link rel="stylesheet" href="{{ asset('css/restaurants.css') }}">
@endpush
@endsection