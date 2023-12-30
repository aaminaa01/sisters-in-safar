<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\RestaurantReview;
use Illuminate\Support\Facades\Auth;

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

    public function add_restaurant_review(Restaurant $restaurant){
        // echo "dfghj";
        if (Auth::check()){
            return view('twincities.add_restaurant_review',['restaurant'=>$restaurant]);
        }
        else{
            return redirect('/login')->with('message', 'You must sign in to add a review.');
        }
    }

}
