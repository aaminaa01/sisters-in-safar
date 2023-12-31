<?php

namespace App\Http\Controllers;

use App\Models\Park;
use App\Models\ParkReview;
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

    public function display_parks(){
        $parksWithInfo = DB::select("
                SELECT parks.id, parks.name, COUNT(reviews.id) as review_count,
                AVG(reviews.safety) as safety_avg,
                AVG(reviews.maintenance) as maintenance_avg,
                AVG(reviews.family_friendliness) as family_friendliness_avg
        FROM parks
        LEFT JOIN park_reviews as reviews ON parks.id = reviews.park_id
        WHERE parks.city_id = 1
        GROUP BY parks.id, parks.name
        ");

        $parks = Park::where('city_id', 1)->get();

        return view('twincities.parks', [
            'parks' => $parksWithInfo,
        ]);
    }

    public function display_park_reviews(Park $park){
        $parkId = $park->id;
        $park_reviews = ParkReview::where('park_id', $parkId)->get();
        return view('twincities.park_review',['park'=>$park, 'park_reviews'=>$park_reviews]);
    }

    public function add_park_review(Park $park){
        // echo "dfghj";
        if (Auth::check()){
            // dd(auth()->user()->id, $restaurant->id);  // Add this line for debugging
            return view('twincities.add_park_review',['park'=>$park]);
        }
        else{
            return redirect('/login')->with('message', 'You must sign in to add a review.');
        }
    }

}
