<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\RestaurantReview;

class TwinCitiesController extends Controller
{
    public function home(){
        return view('twincities.home');
    }

    public function display_restaurants(){
        $restaurants = Restaurant::where('city_id', 1)->get();
        return view('twincities.restaurants',['restaurants' => $restaurants]);
    }

    public function display_restaurant_reviews(Restaurant $restaurant){
        $restaurantId = $restaurant->id;
        $restaurant_reviews = RestaurantReview::where('restaurant_id', $restaurantId)->get();
        return view('twincities.restaurant_review',['restaurant'=>$restaurant, 'restaurant_reviews'=>$restaurant_reviews]);
    }
}
