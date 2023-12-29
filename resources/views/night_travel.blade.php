<!-- resources/views/night_travel.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistersInSafar</title>
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/safety_tips_styles.css') }}">
    <link rel="icon" href="{{ asset('images/logo.PNG') }}" type="image/icon type">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="{{ url('home') }}"><img width="50px" height="50px" src="{{ asset('images/logo.PNG') }}" alt="logo"></a>
            </div>
            <div id="menu">
                <a href="{{ url('home') }}">Home</a>
                <div class="dropdown">
                    <p class="dropbtn">Destinations
                        <i class="fa fa-caret-down"></i>
                    </p>
                    <div class="dropdown-content">
                        <a href="{{ url('destinations/twin_cities') }}">Twin Cities</a>
                        <a href="{{ url('destinations/northern_areas') }}">Northern Areas</a>
                        <a href="{{ url('destinations/lahore') }}">Lahore</a>
                        <a href="{{ url('destinations/karachi') }}">Karachi</a>
                    </div>
                </div>
                <a style="color: rgb(85, 77, 77);" id="active" href="{{ url('safety_tips') }}">Travel Blogs</a>
                <a href="{{ url('contact_us') }}">Contact Us</a>
                <a href="{{ url('login') }}">Sign In/ Sign Up</a>
            </div>
        </div>

        <div id="title">
            <h1>Staying Safe</h1>
            <h4 id="tagline">Safety tips and travel advice to make sure all your adventures are safe and sound</h4>
        </div>
    </header>

    <div class="pg-content">
        <section>
            <h2 style="color: #aa8371;">Travel Safety at Night</h2>
            <p>
                <!-- Add the content dynamically here -->
            </p>
        </section>
    </div>
</body>
</html>
