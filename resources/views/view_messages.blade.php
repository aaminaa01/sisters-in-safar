@extends('templates.layout')
@include('templates.flash-message')

@section('content')
    <div class="container mt-5">
        <h1>Messages</h1>

        @foreach($messages as $message)
            <div class="card mb-3">
                <div class="card-header">
                    Sender Email: {{ $message->sender_email }}
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $message->message }}</p>
                </div>
                <div class="card-footer text-muted">
                    Created at: {{ $message->created_at }}
                </div>
            </div>
        @endforeach

    </div>

    <!-- Include Bootstrap JS (Optional, only if you need JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">
@endpush
@endsection