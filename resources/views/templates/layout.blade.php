

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistersInSafar</title>
    <link rel="icon" href="{{ asset('images/logo.PNG') }}" type="image/icon type">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
     .checked {color: orange;
     }
    </style>
    @yield('scriptsAndLinks')
    @stack('styles')

</head>
<body>
    <header>
        <div class="navbar fixed-top">
            <div class="logo">
                <a href="/"><img width="50px" height="50px" src="{{ asset('images/logo.PNG') }}" alt="logo"></a>
            </div>
                <!-- Navbar Links -->
            <div id="menu">
                <a href="/" >Home</a>
                <div class="dropdown">
                    <p class="dropbtn">Destinations
                      <i class="fa fa-caret-down"></i>
                    </p>
                    <div class="dropdown-content">
                      <a href="/home/twincities">Twin Cities</a>
                    </div>
                </div>
                @auth
                    @php
                    $user = auth()->user();
                    @endphp
                    @if ( $user->role == 'admin')
                        <!-- Add links for admin -->
                        <a href="{{ url('/view-messages') }}" >View Messages</a>
                        <a href="{{ url('/check-reviews') }}" >Check Reviews</a>
                    @else
                    <a href="/contact_us">Contact Us</a>
                    @endif
                @else
                <a href="/contact_us">Contact Us</a>
                @endauth
                @auth 
                        <a href="/logout">Logout</a>
                    @else 
                    <a href="/login">Sign in</a>
                @endauth
            </div>
        </div>

        <div id="title">
                @yield('titleContent')
        </div>
        @include('templates.flash-message')
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2024 sistersInسفر   All rights reserved.</p>
         
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
    
</body>
</html>
