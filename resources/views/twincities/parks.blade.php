<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistersInSafar</title>
    <link rel="stylesheet" href="../../../css/homepg_styles.css">
    <link rel="stylesheet" href="../../../css/restaurants.css">
    <link rel="icon" href="../../../images/logo.PNG" type="image/icon type">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
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
        <label for="sortCriteria">Sort by:</label>
        <select id="sortCriteria" onchange="sortResults()">
            <option value="safety">Safety</option>
            <option value="hygiene">Maintenance</option>
            <option value="ambiance">Family Friendliness</option>
        </select>
    </div>

    <ul id="parksList">
        @forelse ($parks as $park)
            <li>
                <a href="/home/twincities/parks/{{$park->id}}">
                    {{ $park->name }}
                </a>
                <p>Number of Reviews: {{ $park->review_count }}</p>
                <p>
                    Average Ratings: 
                    Safety - {!! convertToStars($park->safety_avg) !!},
                    Maintenance - {!! convertToStars($park->maintenance_avg) !!},
                    Family Friendliness - {!! convertToStars($park->family_friendliness_avg) !!}
                </p>
            </li>
        @empty
            <li>No parks found in this city.</li>
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
                // Extract numeric ratings from the text content of list items
                var ratingA = parseFloat(a.textContent.split("-")[1]);
                var ratingB = parseFloat(b.textContent.split("-")[1]);

                // Compare ratings for sorting based on the selected criteria
                if (sortCriteria === 'safety') return ratingB - ratingA;
                if (sortCriteria === 'hygiene') return ratingB - ratingA;
                if (sortCriteria === 'ambiance') return ratingB - ratingA;
                if (sortCriteria === 'staff_behaviour') return ratingB - ratingA;

                return 0;
            });

            // Clear the list and append the sorted items
            list.innerHTML = "";
            sortedItems.forEach(item => {
                list.appendChild(item);
            });
        }
    </script>
</body>
</html>
