<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwinCitiesController extends Controller
{
    public function home(){
        return view('twincities.home');
    }

    public function display_restaurants(){
        return view('twincities.restaurants');
    }

    public function display_restaurant_reviews($restaurant){
        echo $restaurant;
    }
}
