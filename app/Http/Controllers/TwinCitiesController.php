<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\RestaurantReview;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TwinCitiesController extends Controller
{
    public function home(){
        return view('twincities.home');
    }

    public function display_restaurants(){
        $restaurantsWithInfo = DB::select("
                SELECT restaurants.id, restaurants.name, COUNT(reviews.id) as review_count,
                AVG(reviews.safety) as safety_avg,
                AVG(reviews.hygiene) as hygiene_avg,
                AVG(reviews.ambiance) as ambiance_avg,
                AVG(reviews.staff_behaviour) as staff_behaviour_avg
        FROM restaurants
        LEFT JOIN restaurant_reviews as reviews ON restaurants.id = reviews.restaurant_id
        WHERE restaurants.city_id = 1
        GROUP BY restaurants.id, restaurants.name
        ");

        $restaurants = Restaurant::where('city_id', 1)->get();

        return view('twincities.restaurants', [
            'restaurants' => $restaurantsWithInfo,
        ]);
    }

    public function display_restaurant_reviews(Restaurant $restaurant){
        $restaurantId = $restaurant->id;
        $restaurant_reviews = RestaurantReview::where('restaurant_id', $restaurantId)->get();
        return view('twincities.restaurant_review',['restaurant'=>$restaurant, 'restaurant_reviews'=>$restaurant_reviews]);
    }

    public function add_restaurant_review(Restaurant $restaurant){
        // echo "dfghj";
        if (Auth::check()){
            // dd(auth()->user()->id, $restaurant->id);  // Add this line for debugging
            return view('twincities.add_restaurant_review',['restaurant'=>$restaurant]);
        }
        else{
            return redirect('/login')->with('message', 'You must sign in to add a review.');
        }
    }

}
