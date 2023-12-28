<!-- resources/views/login.blade.php -->

@extends('layouts.app')

@section('content')
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="{{ route('home') }}"><img width="50px" height="50px" src="{{ asset('images/logo.PNG') }}" alt="logo"></a>
            </div>
            <div id="menu">
                <a href="{{ route('home') }}">Home</a>
                <div class="dropdown">
                    <p class="dropbtn">Destinations
                        <i class="fa fa-caret-down"></i>
                    </p>
                    <div class="dropdown-content">
                        <a href="{{ route('destination', 'twin_cities') }}">Twin Cities</a>
                        <a href="{{ route('destination', 'northern_areas') }}">Northern Areas</a>
                        <a href="{{ route('destination', 'lahore') }}">Lahore</a>
                        <a href="{{ route('destination', 'karachi') }}">Karachi</a>
                    </div>
                </div>
                <a href="{{ route('travel_blogs') }}">Travel Blogs</a>
                <a href="{{ route('contact_us') }}">Contact Us</a>
                <a style="color: rgb(85, 77, 77);" id="active" href="{{ route('login') }}">Sign In/ Sign Up</a>
            </div>
        </div>

        <div id="title">
            <h1>sistersInسفر</h1>
            <h4 id="tagline">Empowering Pakistani women to travel and explore safely.</h4>
        </div>
    </header>

    <div class="pg-content">
        <div class="form-content">
            <div class="header">
                <p style="text-align: center;"><h2>Sign in</h2></p>
            </div>
            <form action="#">
                <div class="field input-field">
                    <input type="email" placeholder="Email" class="input">
                </div>
                <div class="field input-field">
                    <input type="password" placeholder="Password" class="password">
                    <!-- <i class='bx bx-hide eye-icon'></i> -->
                </div>
                <div class="form-link">
                    <a href="#" class="forgot-pass">Forgot password?</a>
                </div>
                <div class="field button-field">
                    <button>Login</button>
                </div>
            </form>
            <div class="form-link">
                <span>Don't have an account? <a href="{{ route('signup') }}" class="link signup-link">Sign up!</a></span>
            </div>
        </div>
    </div>
@endsection
