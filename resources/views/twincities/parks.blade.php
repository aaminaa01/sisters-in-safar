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

    <div  class="d-flex  justify-content-end align-items-center">
        <label for="sortCriteria">Sort by(high to low):</label>
        <select id="sortCriteria" class="btnColor  rounded custom-select" onchange="sortResults()">
            <option value="safety">Safety</option>
            <option value="maintenance">Maintenance</option>
            <option value="family_friendliness">Family Friendliness</option>
        </select>
    </div>

    <ul id="parksList">
        @forelse ($parks as $park)
            <li data-safety="{{ $park->safety_avg }}" data-maintenance="{{ $park->maintenance_avg }}" data-family-friendliness="{{ $park->family_friendliness_avg }}">
                <a href="/home/twincities/parks/{{$park->id}}">
                    {{ $park->name }}
                </a>
                <p>Number of Reviews: {{ $park->review_count }}</p>
                <p>
                    Average Ratings:<br/>
                    Safety - {!! convertToStars($park->safety_avg) !!}<br/>
                    Maintenance - {!! convertToStars($park->maintenance_avg) !!}<br/>
                    Family Friendliness - {!! convertToStars($park->family_friendliness_avg) !!}
                </p>
            </li>
        @empty
            <li>No parks found in this city.</li>
        @endforelse
    </ul>

    <a href="#" class="btn hidden-btn"><i class="fa fa-arrow-up"></i></a>

    <script>
        function sortResults() {
            var list = document.getElementById("parksList");
            var items = list.getElementsByTagName("li");
            var sortCriteria = document.getElementById("sortCriteria").value;

            var sortedItems = Array.from(items).sort((a, b) => {
                var ratingA = parseFloat(a.getAttribute("data-" + sortCriteria)) || 0;
                var ratingB = parseFloat(b.getAttribute("data-" + sortCriteria)) || 0;

                return ratingB - ratingA;
            });

            list.innerHTML = ""; // Clear the list
            sortedItems.forEach(item => {
                list.appendChild(item);
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