@extends('templates.layout')
@include('templates.flash-message')

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
            <select id="sortCriteria" class="btn-color rounded custom-select" onchange="sortResults()">
                <option value="safety">Safety</option>
                <option value="hygiene">Hygiene</option>
                <option value="ambiance">Ambiance</option>
                <option value="staff_behaviour">Staff Behaviour</option>
            </select>
        </div>
    </div>

    <div class="row justify-content-center">
        @forelse ($restaurants as $restaurant)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <a href="/home/twincities/restaurants/{{$restaurant->id}}">
                        <img src="{{ asset('images/twin_cities_restaurant.jpg') }}" alt="{{ $restaurant->name }}" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                        <p class="card-text">Number of Reviews: {{ $restaurant->review_count }}</p>
                        <p class="card-text display-6">
                            Average Ratings:<br/> 
                            Safety - {!! convertToStars($restaurant->safety_avg) !!}<br/> 
                            Hygiene - {!! convertToStars($restaurant->hygiene_avg) !!}<br/> 
                            Ambiance - {!! convertToStars($restaurant->ambiance_avg) !!}<br/> 
                            Staff Behavior - {!! convertToStars($restaurant->staff_behaviour_avg) !!}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p>No restaurants found in this city.</p>
        @endforelse
    </div>

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
   
    <style>
        .btn-color {
            background-color: #da9181; 
            color: white;
        }
    </style>
@endpush

@endsection
