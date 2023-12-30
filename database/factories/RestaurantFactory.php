<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory; 
use Illuminate\Support\Arr;

class RestaurantFactory extends Factory
{
     /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { 
        $cityOneRestaurants = [
            "Monal Restaurant" => 1,
            "Haveli Restaurant" => 1,
            "Jashan-e-Kabab" => 1,
            "Butt Karahi & BBQ" => 1,
            "Mehran Hotel" => 1,
            "Dawat-e-Khaas" => 1,
            "Cafe Flo" => 1,
            "Bun Bun Bake & Grill" => 1,
            "The Mall 1927" => 1,
            "Cafe Crunch" => 1,
        ];
    $cityTwoRestaurants = array(
        "Monal Restaurant Lahore" => 2,
        "Cosa Nostra" => 2,
        "Cafe Zouk" => 2,
        "Lahore Social" => 2,
        "Cafe Aylanto" => 2,
        "Cooco's Den" => 2,
        "Butler's Chocolate Cafe" => 2,
        "Arcadian Cafe" => 2,
        "Andaaz Restaurant" => 2,
        "Nando's" => 2,
        "Gourmet Restaurant" => 2,
        "SALT Bistro" => 2,
        "Cafe Barbera" => 2,
        "Gloria Jean's Coffees" => 2,
        "Spice Bazaar" => 2,
        "The Lahore Social" => 2,
        "Bundu Khan Restaurant" => 2,
        "Ziafat" => 2,
        "Gun Smoke" => 2,
        "Yum Chinese & Thai" => 2,
        "Wok This Way" => 2,
        "Dera Restaurant" => 2,
        "Hardees" => 2,
        "Cafe Costa" => 2,
        "Cinnamon Kitchen" => 2,
        "Ginsoy Extreme Chinese" => 2,
        "Del Frio" => 2
    );
    $cityThreeRestaurants = array(
        "BBQ Tonight" => 3,
        "Kolachi Restaurant" => 3,
        "Bombay Chowpatty" => 3,
        "Ginsoy - SMCHS Branch" => 3,
        "Mocha Cafe" => 3,
        "Cafe Zaiqa" => 3,
        "Sakura" => 3,
        "Chachi Restaurant" => 3,
        "Kabab-Ji" => 3,
        "Pizza Hut" => 3
    );

    $allRestaurants = array_merge($cityOneRestaurants, $cityTwoRestaurants, $cityThreeRestaurants); // Merge all city arrays


        // Shuffle restaurant names from all cities to avoid early selection bias
        Arr::shuffle($allRestaurants);

        // Check for available restaurants:
        $restaurantKey = null;
        $cityId = null;
        $previousCityIds = []; // Initialize empty array to track used city IDs

        while (!$cityId) {
            $restaurantKey = array_rand($allRestaurants);

            $cityId = $allRestaurants[$restaurantKey];
            unset($allRestaurants[$restaurantKey]); // Remove used restaurant

            // Handle cases where all city IDs have been used for the restaurant
            if (in_array($cityId, $previousCityIds)) {
                $restaurantKey = null; // Reset and try again
                $cityId = null;
            }
        }

        return [
            'name' => $restaurantKey,
            'city_id' => $cityId,
        ];
    }
}
