<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unchecked Restaurant Reviews</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Unchecked Restaurant Reviews</h1>

        @foreach($uncheckedRestaurantReviews as $review)
            <div class="card mb-3">
                <div class="card-header">
                    @php
                        // Retrieve the corresponding restaurant object
                        $restaurant = \App\Models\Restaurant::find($review->restaurant_id);
                        $city = \App\Models\City::find($restaurant->city_id);
                    @endphp
                    Restaurant: {{ $restaurant->name }} (City: {{ $city->name }})
                </div>
                <div class="card-body">
                    <p class="card-text">User ID: {{ $review->user_id }}</p>
                    <p class="card-text">Comments: {{ $review->comments }}</p>
                    <p class="card-text">Safety: {{ $review->safety }}</p>
                    <p class="card-text">Hygiene: {{ $review->hygiene }}</p>
                    <p class="card-text">Ambiance: {{ $review->ambiance }}</p>
                    <p class="card-text">Staff Behaviour: {{ $review->staff_behaviour }}</p>
                    <p class="card-text">Created at: {{ $review->created_at }}</p>
                </div>
                <div class="card-footer text-muted">
                    <form method="post" action="{{ route('approveRestaurantReview', $review->id) }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form method="post" action="{{ route('discardRestaurantReview', $review->id) }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Discard</button>
                    </form>
                </div>
            </div>
        @endforeach

    </div>

    <!-- Include Bootstrap JS (Optional, only if you need JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
