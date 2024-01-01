@extends('templates.layout')
@include('templates.flash-message')

@section('scriptsAndLinks')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
@endsection

@section('titleContent')
<H1 class="font-weight-bold display-3">Parks in the Twin Cities</H1>
    <H4 id="tagline">Parks and outdoor attractions rated and reviewed by female travelers</H4>
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

    <div class="d-flex justify-content-end align-items-center">
        <div>
            <label for="sortCriteria">Sort by (high to low):</label>
            <select id="sortCriteria" class="btnColor rounded custom-select">
                <option onclick="sortResults('safety')" value="safety">Safety</option>
                <option onclick="sortResults('maintenance')" value="maintenance">Maintenance</option>
                <option onclick="sortResults('family_friendliness')" value="family_friendliness">Family Friendliness</option>
            </select>
        </div>
    </div>

    <div id="parksList" class="row justify-content-center">
        @forelse ($parks as $park)
            <div class="col-md-3 mb-4 mx-4">
                <div class="card" data-safety="{{ $park->safety_avg }}" data-maintenance="{{ $park->maintenance_avg }}" data-family_friendliness="{{ $park->family_friendliness_avg }}">
                    <a href="/home/twincities/parks/{{$park->id}}">
                        <img src="{{ asset('images/twincities_park.jpg') }}" alt="{{ $park->name }}" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $park->name }}</h5>
                        <p class="card-text">Number of Reviews: {{ $park->review_count }}</p>
                        
                            Average Ratings:<br/> 
                            <span class="safety" rating={{$park->safety_avg}}>Safety - {!! convertToStars($park->safety_avg) !!}</span><br>
                            <span class="maintenance" rating={{$park->maintenance_avg}}>Maintenance - {!! convertToStars($park->maintenance_avg) !!}</span><br>
                            <span class="family_friendliness" rating={{$park->family_friendliness_avg}}>Family Friendliness - {!! convertToStars($park->family_friendliness_avg) !!}</span><br>
                    </div>
                </div>
            </div>
        @empty
            <p>No parks found in this city.</p>
        @endforelse
    </div>

    <a href="#" class="btn hidden-btn"><i class="fa fa-arrow-up"></i></a>

    <script>
        function sortResults(criteria) {
            var parksList = document.querySelector('#parksList');
            
            // Convert the reviews to an array for sorting
            var parksArray = Array.from(parksList.children);
            console.log(parksArray);
            console.log(criteria);

            parksArray.sort(function(a, b) {
                var aCriteria = parseInt((a.querySelector('span.' + criteria).getAttribute('rating')), 10);
                var bCriteria = parseInt((b.querySelector('span.' + criteria).getAttribute('rating')), 10);

                return bCriteria - aCriteria;
               
            });

            // Empty the container
            parksList.innerHTML = '';

            // Append the sorted reviews to the container
            parksArray.forEach(function(review) {
                parksList.appendChild(review);
            });
        }
    </script>
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/parks.css') }}">
    
    <style>
        .btnColor {
            background-color: #da9181; 
            color: white;
        }
    </style>
@endpush

@endsection