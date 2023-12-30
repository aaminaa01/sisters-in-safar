<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Restaurant Review</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="container mt-5">
        <h1>Create Restaurant Review</h1>
        <form action="{{  route("addUncheckedRestaurantReview")  }}" method="post">
            @csrf
            
            <div class="mb-3">
                <label for="safety" class="form-label">Safety Rating<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="safety" name="safety" step="1" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label for="hygiene" class="form-label">Hygiene Rating<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="hygiene" name="hygiene" step="1" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label for="ambiance" class="form-label">Ambiance Rating<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="ambiance" name="ambiance" step="1" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label for="staff_behaviour" class="form-label">Staff Behaviour Rating<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="staff_behaviour" name="staff_behaviour" step="1" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label for="comments" class="form-label">Comments</label>
                <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
            </div>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    </div>

    <!-- Include Bootstrap JS (Optional, only if you need JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
