<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\TwinCitiesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', function () {return view('home');
            });
Route::get('/destination/{slug}', 'DestinationController@show')->name('destination');
Route::get('/travel_blogs', 'TravelBlogController@index')->name('travel_blogs');
Route::get('/contact_us', 'ContactUsController@index')->name('contact_us');

// signing up
Route::view('/signup', [UserAuthController::class, 'signup'])->name('signupform');
Route::post('/users/register', [UserAuthController::class, 'create'])->name('signup');

// signing in
Route::get('/login',[UserAuthController::class, 'login'])->name('login');
Route::post('/users/authenticate', [UserAuthController::class, 'authenticate']);


Route::view('/home', 'home');
Route::any('/home', [HomeController::class, 'index'])->name('home');

// city wise destinations
Route::get('/home/twincities', [TwinCitiesController::class, 'home']);
Route::get('/home/twincities/restaurants', [TwinCitiesController::class,'display_restaurants']);
Route::get('/home/twincities/restaurants/{restaurant}', [TwinCitiesController::class,'display_restaurant_reviews']);