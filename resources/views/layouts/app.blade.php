<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistersInSafar</title>
    <link rel="stylesheet" href="{{ asset('css/homepg_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login_up_styles.css') }}">
    <link rel="icon" href="{{ asset('images/logo.PNG') }}" type="image/icon type">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    @yield('content')

    <footer></footer>
</body>
</html>
