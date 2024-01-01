@extends('templates.layout')

@section('scriptsAndLinks')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@endsection

@section('titleContent')
    <H1 class="font-weight-bold display-3">Restaurants in the Twin Cities</H1>
    <H4 id="tagline">Eateries around Pindi and Islamabad rated and reviewed by female travelers</H4>
@endsection        

@section('content')   
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

    <div class="d-flex  justify-content-end align-items-center">
        <div>
            <label for="sortCriteria">Sort by (high to low):</label>
            <select id="sortCriteria" class="btn-color rounded custom-select">
                <option onclick="sortResults('safety')" value="safety">Safety</option>
                <option onclick="sortResults('hygiene')"  value="hygiene">Hygiene</option>
                <option onclick="sortResults('ambiance')" value="ambiance">Ambiance</option>
                <option onclick="sortResults('staff_behaviour')" value="staff_behaviour">Staff Behaviour</option>
            </select>
        </div>
    </div>

    <div id="restaurantsList" class="row justify-content-center">
        @forelse ($restaurants as $restaurant)
            <div class="col-md-3 mb-4 mx-4">
                <div class="card" data-safety="{{ $restaurant->safety_avg }}" data-hygiene="{{ $restaurant->hygiene_avg }}" data-ambiance="{{ $restaurant->ambiance_avg }}" data-staff_behaviour="{{ $restaurant->staff_behaviour_avg }}">
                    <a href="/home/twincities/restaurants/{{$restaurant->id}}">
                        <img src="{{ asset('images/twin_cities_restaurant.jpg') }}" alt="{{ $restaurant->name }}" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                        <p class="card-text">Number of Reviews: {{ $restaurant->review_count }}</p>
  
                            Average Ratings:<br/> 
                            <span class="safety" rating={{$restaurant->safety_avg}}>Safety - {!! convertToStars($restaurant->safety_avg) !!}</span><br>
                            <span class="hygiene" rating={{$restaurant->hygiene_avg}}>Hygiene - {!! convertToStars($restaurant->hygiene_avg) !!}</span><br>
                            <span class="ambiance" rating={{$restaurant->ambiance_avg}}>Ambiance - {!! convertToStars($restaurant->ambiance_avg) !!}</span><br>
                            <span class="staff_behaviour" rating={{$restaurant->staff_behaviour_avg}}>Staff Behavior - {!! convertToStars($restaurant->staff_behaviour_avg) !!}</span><br>
                    </div>
                </div>
            </div>
        @empty
            <p>No restaurants found in this city.</p>
        @endforelse
    </div>

    <a href="#" class="btn"><i class="fa fa-arrow-up"></i></a>

    <script>
        function sortResults(criteria) {
            var restaurantsList = document.querySelector('#restaurantsList');
            
            // Convert the reviews to an array for sorting
            var restaurantsArray = Array.from(restaurantsList.children);
            console.log(restaurantsArray);
            console.log(criteria);

            restaurantsArray.sort(function(a, b) {
                var aCriteria = parseInt((a.querySelector('span.' + criteria).getAttribute('rating')), 10);
                var bCriteria = parseInt((b.querySelector('span.' + criteria).getAttribute('rating')), 10);

                return bCriteria - aCriteria;
               
            });

            // Empty the container
            restaurantsList.innerHTML = '';

            // Append the sorted reviews to the container
            restaurantsArray.forEach(function(review) {
                restaurantsList.appendChild(review);
            });
        }
        
    </script>

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/restaurants.css') }}">
   
    <style>
        .btn-color {
            background-color: #da9181; 
            color: white;
        }
    </style>
@endpush

@endsection
