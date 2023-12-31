@extends('templates.layout')
@include('templates.flash-message')
@section('titleContent')
    <H1>sistersInسفر</H1>
    <H4 id="tagline">Empowering Pakistani women to travel and explore safely.</H4>
@endsection
@section('content')
    <div class="container">
        <form action="/users/register" method="post">
        @csrf
            <div class="mb-6">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <p class="error text-danger-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <p class="error text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" value="{{ old('email') }}">
                @error('password')
                    <p class="error text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
                <!-- <i class='bx bx-hide eye-icon'></i> -->
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="form-label">Confirm password</label>
                <input type="password_confirmation" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                    <p class="error text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <button type="submit" class="py-2 px-4 hover-bg-pink text-white rounded">Sign up</button>
            </div>
   
            <div class="mt-8">
                <span>Don't have an account? <a href="/login" class="link signup-link">Log in!</a></span>
            </div>
             </form>
            
    </div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">

    <link rel="stylesheet" href="{{ asset('css/login_up_styles.css') }}">
@endpush
@endsection