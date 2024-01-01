<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use App\Models\Park;
use App\Models\ParkReview;
use Illuminate\Database\Seeder;
use App\Models\RestaurantReview;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // City::factory()->create([
        //     'name' => 'Twin Cities',
        // ]);

       
        // \App\Models\User::factory(20)->create();

       
        // \App\Models\Restaurant::factory(15)->create();

        // Park::factory(15)->create();
        
        // for($i=0; $i<6; $i++){
        //     $restaurants = DB::table('restaurants')->get();
        //     foreach($restaurants as $restaurant){
        //         RestaurantReview::factory()->create([
        //         'restaurant_id' => $restaurant->id,
        //         ]);
        //     }
        // }

        for($i=0; $i<7; $i++){
            $parks = DB::table('parks')->get();
            foreach($parks as $park){
                ParkReview::factory()->create([
                'park_id' => $park->id,
                ]);
            }
        }
    }
}
