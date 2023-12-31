@extends('templates.layout')
@include('templates.flash-message')

@section('content')
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
        <h1>Create Park Review</h1>
        <form action="{{ route("addUncheckedParkReview") }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="safety" class="form-label">Safety Rating<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="safety" name="safety" step="1" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label for="maintenance" class="form-label">Maintenance Rating<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="maintenance" name="maintenance" step="1" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label for="family_friendliness" class="form-label">Family-Friendliness Rating<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="family_friendliness" name="family_friendliness" step="1" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label for="comments" class="form-label">Comments</label>
                <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
            </div>
           
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="park_id" id="park_id" value="{{ $park->id }}">
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    </div>

    <!-- Include Bootstrap JS (Optional, only if you need JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
@endsection