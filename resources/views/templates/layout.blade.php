

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistersInSafar</title>
    <link rel="icon" href="{{ asset('images/logo.PNG') }}" type="image/icon type">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
     .checked {color: orange;
     }
    </style>
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
                <a href="/" style="color: rgb(85, 77, 77);" id="active">Home</a>
                <div class="dropdown">
                    <p class="dropbtn">Destinations
                      <i class="fa fa-caret-down"></i>
                    </p>
                    <div class="dropdown-content">
                      <a href="/home/twincities">Twin Cities</a>
                      <a href="../html/destinations/lahore/lahore.html">Lahore</a>
                      <a href="../html/destinations/karachi/karachi.html">Karachi</a>
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
    </header>

    <main>
        @yield('content')
    </main>
    <footer>
    </footer>
</body>
</html>
