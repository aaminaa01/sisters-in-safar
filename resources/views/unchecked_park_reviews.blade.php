<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unchecked Park Reviews</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Unchecked Park Reviews</h1>

        @foreach($uncheckedParkReviews as $review)
            <div class="card mb-3">
                <div class="card-header">
                    @php
                        // Retrieve the corresponding park object
                        $park = \App\Models\Park::find($review->park_id);
                        $city = \App\Models\City::find($park->city_id);
                    @endphp
                    Park: {{ $park->name }} (City: {{ $city->name }})
                </div>
                <div class="card-body">
                    <p class="card-text">User ID: {{ $review->user_id }}</p>
                    <p class="card-text">Comments: {{ $review->comments }}</p>
                    <p class="card-text">Safety: {{ $review->safety }}</p>
                    <p class="card-text">Maintenance: {{ $review->maintenance }}</p>
                    <p class="card-text">Family Friendliness: {{ $review->family_friendliness }}</p>
                    <p class="card-text">Created at: {{ $review->created_at }}</p>
                </div>
                <div class="card-footer text-muted">
                    <form method="post" action="{{ route('approveParkReview', $review->id) }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form method="post" action="{{ route('discardParkReview', $review->id) }}" class="d-inline">
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