<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>sistersInSafar</title>
        <link rel="stylesheet" href="../../../css/homepg_styles.css">
        <link rel="stylesheet" href="../../../css/restaurants.css">
        <link rel="icon" href="../../../images/logo.PNG" type="image/icon type">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <h1>Restaurants in City 1</h1>

    <ul>
        @forelse ($restaurants as $restaurant)
            
            <a href="/home/twincities/restaurants/{{$restaurant->id}}"><li>{{ $restaurant->name }}</li></a>
        @empty
            <li>No restaurants found in this city.</li>
        @endforelse
    </ul>
    <a href="#" class="btn"><i class="fa fa-arrow-up"></i></a>
    <a href="#" class="btn hidden-btn"><i class="fa fa-arrow-up"></i></a>
</body>
</html>