<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistersInSafar</title>
    <link rel="stylesheet" href="../../../css/homepg_styles.css">
    <link rel="stylesheet" href="../../../css/restaurants.css">
    <link rel="icon" href="../../../images/logo.PNG" type="image/icon type">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
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
        <H1>Restaurants</H1>
        <H4 id="tagline">Eateries around Pindi and Islamabad rated and reviewed by female travelers</H4>
        <p style="color:rgb(85, 77, 77); background-color: rgba(255, 255,255,0.5);">
            {{ $restaurant->name }}<br>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span><br>
        </p>
    </div>

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
                Safety: <span class="safety">{{ $restaurant_review->safety }}</span><br>
                hygiene: <span class="hygiene">{{ $restaurant_review->hygiene }}</span><br>
                ambiance: <span class="ambiance">{{ $restaurant_review->ambiance }}</span><br>
                staff_behaviour: <span class="staff_behaviour">{{ $restaurant_review->staff_behaviour }}</span>
            </div>
        @endforeach
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
                var aCriteria = parseFloat(a.querySelector('span.' + criteria).textContent);
                var bCriteria = parseFloat(b.querySelector('span.' + criteria).textContent);

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
    </script>
</body>
</html>