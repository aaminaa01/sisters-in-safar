<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\TwinCitiesController;
use App\Http\Controllers\UncheckedParkReviewController;
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
Route::view('/signup', [UserAuthController::class, 'signup'])->name('register');
Route::post('/users/register', [UserAuthController::class, 'create'])->name('signup');

// signing in
Route::get('/login',[UserAuthController::class, 'login'])->name('login');
Route::post('/users/authenticate', [UserAuthController::class, 'authenticate']);

Route::any('/logout', [UserAuthController::class, 'logoutUser'])->name('logout');;


Route::view('/home', 'home');
Route::any('/home', [HomeController::class, 'index'])->name('home');

// city wise destinations
Route::get('/home/twincities', [TwinCitiesController::class, 'home']);

// twin cities' restaurants
Route::get('/home/twincities/restaurants', [TwinCitiesController::class,'display_restaurants']);
Route::any('/home/twincities/addRestaurantReview/{restaurant}', [TwinCitiesController::class, 'add_restaurant_review']);
Route::get('/home/twincities/restaurants/{restaurant}', [TwinCitiesController::class,'display_restaurant_reviews']);
Route::post('/home/twincities/newRestaurantReview', [UncheckedRestaurantReviewController::class, 'addReview'])->name('addUncheckedRestaurantReview');

// twin cities' parks
Route::get('/home/twincities/parks', [TwinCitiesController::class,'display_parks']);
Route::any('/home/twincities/addParkReview/{park}', [TwinCitiesController::class, 'add_park_review']);
Route::get('/home/twincities/parks/{park}', [TwinCitiesController::class,'display_park_reviews']);
Route::post('/home/twincities/newParkReview', [UncheckedParkReviewController::class, 'addReview'])->name('addUncheckedParkReview');

// sending and viewing contact us messages
Route::get('/contact_us', [MessageController::class, 'contact_us_form'])->name('contact_us');
Route::post('/contact_us', [MessageController::class, 'create']);
Route::get('/view-messages', [MessageController::class, 'view_messages']);

Route::get('/check-reviews', function() { return view('unchecked_reviews');});

// check restaurant reviews
Route::get('/check-restaurant-reviews/{id?}', [UncheckedRestaurantReviewController::class, 'check_reviews']);
// Route for approving a review
Route::post('/approve-restaurant-review/{id}', [UncheckedRestaurantReviewController::class, 'approveReview'])->name('approveRestaurantReview');
// Route for discarding a review
Route::post('/discard-restaurant-review/{id}', [UncheckedRestaurantReviewController::class, 'discardReview'])->name('discardRestaurantReview');

// check park reviews
Route::get('/check-park-reviews/{id?}', [UncheckedParkReviewController::class, 'check_reviews']);
// Route for approving a review
Route::post('/approve-park-review/{id}', [UncheckedParkReviewController::class, 'approveReview'])->name('approveParkReview');
// Route for discarding a review
Route::post('/discard-park-review/{id}', [UncheckedParkReviewController::class, 'discardReview'])->name('discardParkReview');


