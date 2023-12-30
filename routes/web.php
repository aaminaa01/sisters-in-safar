<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\TwinCitiesController;
use App\Http\Controllers\UncheckedRestaurantReviewController;
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


    
// signing up
Route::view('/signup', [UserAuthController::class, 'signup'])->name('signupform');
Route::post('/users/register', [UserAuthController::class, 'create'])->name('signup');

// signing in
Route::get('/login',[UserAuthController::class, 'login'])->name('login');
Route::post('/users/authenticate', [UserAuthController::class, 'authenticate']);

Route::any('/logout', [UserAuthController::class, 'logoutUser'])->name('logout');;


Route::view('/home', 'home');
Route::any('/home', [HomeController::class, 'index'])->name('home');

// city wise destinations
Route::get('/home/twincities', [TwinCitiesController::class, 'home']);
Route::get('/home/twincities/restaurants', [TwinCitiesController::class,'display_restaurants']);
Route::any('/home/twincities/addRestaurantReview/{restaurant}', [TwinCitiesController::class, 'add_restaurant_review']);

Route::get('/home/twincities/restaurants/{restaurant}', [TwinCitiesController::class,'display_restaurant_reviews']);

Route::post('/home/twincities/newRestaurantReview', [UncheckedRestaurantReviewController::class, 'addReview'])->name('addUncheckedRestaurantReview');

Route::get('/contact_us', [MessageController::class, 'contact_us_form']);
Route::post('/contact_us', [MessageController::class, 'create']);

Route::get('/check-reviews', [UncheckedRestaurantReviewController::class, 'check_reviews']);
Route::get('/view-messages', [MessageController::class, 'view_messages']);