<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory; 


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Park>
 */
class ParkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { 
        $cityOneParks = array(
            "Ayub Park (Rawalpindi)" => 1,
            "Soan Valley Park (Rawalpindi)" => 1,
            "Jinnah Park (Rawalpindi)" => 1,
            "Army Museum Park (Rawalpindi)" => 1,
            "Lake View Park (Islamabad)" => 1,
            "Shakarparian Hills National Park (Islamabad)" => 1,
            "Faisal Mosque Garden (Islamabad)" => 1,
            "F-9 Park (Islamabad)" => 1,
            "Daman-e-Koh (Islamabad)" => 1
        );
    $cityTwoParks = array("Greater Iqbal Park" => 2,
    "Bagh-e-Jinnah" => 2,
    "Jallo Wildlife Park" => 2,
    "Race Course (Jilani Park)" => 2,
    "Shalimar Gardens" => 2,
    "Baghbanpura Mughal Gardens" => 2
    );
    $cityThreeParks = array(
        "Bagh Ibn Qasim" => 3, // Largest urban park in Asia
        "Zamzama Park" => 3, // Lush gardens and vibrant atmosphere
        "Shaheed Benazir Bhutto Park" => 3, // Central location with recreational facilities
        "Hilal Park" => 3, // Well-maintained green space and walking paths
        "Karachi Safari Park" => 3, // Unique experience with wildlife and adventure trails
        "Abdullah Khan Park" => 3, // Family-friendly with children's play areas
        "Nazir Hussain Shaheed Family Park" => 3, // Beautiful lake and recreational activities
        "Numaish Chowrangi Park" => 3, // Iconic landmark with amusement rides and gardens
        "Gulshan-e-Iqbal Park" => 3, // Extensive greenery and historical significance
        "DHA Phase 8 Park" => 3, // Modern amenities and scenic waterfront location
    );

    $allParks = array_merge($cityOneParks, $cityTwoParks, $cityThreeParks); // Merge all city arrays


        
    do{
        // Shuffle restaurant names from all cities to avoid early selection bias
        Arr::shuffle($allParks);

        // Check for available restaurants:
        $parkKey = null;
        $cityId = null;
        $parkKey = array_rand($allParks);
        $cityId = $allParks[$parkKey];
        $existingRecord =  DB::table('parks')->where('city_id',$cityId)->where('name', $parkKey)->find(1); 
        if(!$existingRecord) {
            return [
                'name' => $parkKey,
                'city_id' => $cityId,
            ];
        }
        }while($existingRecord);
    }
}
