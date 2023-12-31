@extends('templates.layout')
@include('templates.flash-message')
@section('titleContent')
<H1>Parks in the Twin Cities</H1>
    <H4 id="tagline">Parks and outdoor attractions rated and reviewed by female travelers</H4>
@endsection
@section('content')   
    <h1>Parks in City 1</h1>

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
        <label for="sortCriteria">Sort by(hight to low):</label>
        <select id="sortCriteria" class="btnColor" onchange="sortResults()">
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
   
    <style>
        .btnClor {
            background-color: #da9181; 
            color: white;
        }
    </style>
@endpush

@endsection