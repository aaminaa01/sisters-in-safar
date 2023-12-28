<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="{{ route('home') }}"><img width="50px" height="50px" src="{{ asset('images/logo.PNG') }}" alt="logo"></a>
            </div>
            <div id="menu">
                <a href="{{ route('home') }}" style="color: rgb(85, 77, 77);" id="active">Home</a>
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
                <a href="{{ route('login') }}">Sign In/ Sign Up</a>
            </div>
        </div>

        <div id="title">
            <h1>sistersInسفر</h1>
            <h4 id="tagline">Empowering Pakistani women to travel and explore safely.</h4>
        </div>
    </header>

    <div class="pg-content row">
        <div class="about-section col-8">
            <div class="overview">
                <p>Culture, nature, traditions, and food - Pakistan is a country that holds immense potential for exploration...</p>
                <p>At sistersInسفر, we believe that every woman should have the opportunity to explore the world fearlessly...</p>
            </div>
            <div class="what-we-do">
                <p>
                    <h2>What do we do?</h2>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry...
                    <ul>
                        <li>what we do point one</li>
                        <li>what we do point two</li>
                        <li>what we do point three</li>
                        <li>what we do point four</li>
                    </ul>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry...
                </p>
            </div>
        </div>
        <div class="mission col-4">
            <h3 style="text-shadow: 2px 2px 6px #6e585e;">Our Story</h3>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...</p>
            <h3 style="text-shadow: 2px 2px 6px #6e585e;">Our Mission</h3>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...</p>
        </div>
    </div>

    <footer></footer>

@endsection
