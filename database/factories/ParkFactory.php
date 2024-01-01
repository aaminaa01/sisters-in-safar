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
            "Daman-e-Koh (Islamabad)" => 1,
            "Pindi Cricket Stadium Park (Rawalpindi)" => 1,
            "Rawal Lake View Park (Islamabad)" => 1,
            "Rose and Jasmine Garden (Islamabad)" => 1,
            "Fatima Jinnah Park (Islamabad)" => 1,
            "Japanese Park (Rawalpindi)" => 1,
            "Cactus and Succulent Garden (Islamabad)" => 1,
            "Chaklala Scheme 3 Park (Rawalpindi)" => 1,
            "Rose Garden (Rawalpindi)" => 1,
            "Centaurus Mall Rooftop Park (Islamabad)" => 1,
            "Children's Park (Islamabad)" => 1,
        );

  
    do{
        // Shuffle restaurant names from all cities to avoid early selection bias
        Arr::shuffle($cityOneParks);

        // Check for available restaurants:
        $parkKey = null;
        $cityId = null;
        $parkKey = array_rand($cityOneParks);
        $cityId = $cityOneParks[$parkKey];
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
