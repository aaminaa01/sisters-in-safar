<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/destination/{slug}', 'DestinationController@show')->name('destination');
Route::get('/travel_blogs', 'TravelBlogController@index')->name('travel_blogs');
Route::get('/contact_us', 'ContactUsController@index')->name('contact_us');
Route::get('/login', 'LoginController@index')->name('login');
Route::get('/signup', 'SignupController@index')->name('signup');

Route::view('/signup', 'signup')->name('signup');


// Route::view('/login','login');
Route::post('user', [UserAuthController::class, 'login']);