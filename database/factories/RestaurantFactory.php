<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory; 

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
            // Additional Restaurants for Rawalpindi and Islamabad
            "Islamabad Serena Hotel" => 1,
            "Khaadi Cafe" => 1,
            "Chaaye Khana" => 1,
            "Tuscany Courtyard" => 1,
            "Dera Restaurant" => 1,
            "Street 1 Cafe" => 1,
            "Ginyaki Sushi Bar" => 1,
            "Savour Foods" => 1,
            "China Town" => 1,
            "Nando's" => 1,
            // More additions
            "KFC" => 1,
            "Pizza Hut" => 1,
            "McDonald's" => 1,
            "Café Aylanto" => 1,
            "The Warehouse" => 1,
            "OPTP" => 1,
            "Arizona Grill" => 1,
            "Cafe 99" => 1,
            "Kabul Restaurant" => 1,
            "Gloria Jean's Coffees" => 1,
            // Add more as needed
        ];
        
        do{

        // Check for available restaurants:
        $restaurantKey = null;
        $cityId = null;
        $restaurantKey = array_rand($cityOneRestaurants);
        $cityId = $cityOneRestaurants[$restaurantKey];
        $existingRecord =  DB::table('restaurants')->where('city_id',$cityId)->where('name', $restaurantKey)->find(1); 
        if(!$existingRecord) {
            return [
                'name' => $restaurantKey,
                'city_id' => $cityId,
            ];
        }
        }while($existingRecord);
    }
}
