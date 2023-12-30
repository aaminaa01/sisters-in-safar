<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    protected $fillable = [
        'comments', 'safety', 'hygiene', 'ambiance', 'staff_behaviour', 'restaurant_id', 'user_id'
    ];
}
