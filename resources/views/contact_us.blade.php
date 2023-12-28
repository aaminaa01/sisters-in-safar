<!-- resources/views/contact_us.blade.php -->

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
                <a style="color: rgb(85, 77, 77);" id="active" href="{{ route('contact_us') }}">Contact Us</a>
                <a href="{{ route('login') }}">Sign In/ Sign Up</a>
            </div>
        </div>

        <div id="title">
            <h1>sistersInسفر</h1>
            <h4 id="tagline">Empowering Pakistani women to travel and explore safely.</h4>
        </div>
    </header>

    <div class="pg-content row">
        <div class="col-5 send-a-msg">
            <h2>Get in touch!</h2>
            <p style="font-weight: lighter;">Have questions or concerns? Want to learn how you can become a part of sistersInSafar? Send us a message at:<br> <a style="color: #aa8371;" href="mailto:contact@sistersInSafar.com">contact@sistersInSafar.com</a></p>
            <div class="form">
                <form action="#">
                    <div class="input-box">
                        <label for="name-box">Name:</label>
                        <input type="text" id="name-box" placeholder="Name">
                    </div>
                    <div class="input-box">
                        <label for="email-box">Email:</label>
                        <input type="text"id="email-box" placeholder="Email">
                    </div>
                    <div class="input-box message-box">
                        <label for="msg-box">Your message:</label>
                        <textarea style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;" type="textarea" id="msg-box" placeholder="Message"></textarea>
                    </div>
                    <div class="button">
                        <input type="button" value="Send Now" >
                    </div>
                </form>
            </div>
        </div>   
        <div class="col-5 socials">
            <h2>Join the community!</h2>
            <p style="color: #151015;">Keep up with all the latest news by following our socials:</p>
            <p>Instagram&nbsp;&nbsp;<a href="">@sistersInSafar</a></p>
            <p>Facebook&nbsp;&nbsp;<a href="">Sisters In Safar</a></p>
            <p>YouTube&nbsp;&nbsp;<a href="">sistersInSafar</a></p>
        </div>
    </div>

@endsection
