<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use App\Models\Park;
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

        // City::factory()->create([
        //     'name' => 'Lahore',
        // ]);

        // City::factory()->create([
        //     'name' => 'Karachi',
        // ]);
        // \App\Models\User::factory(20)->create();

        // // \App\Models\User::factory()->create([
        // //     'name' => 'Test User',
        // //     'email' => 'test@example.com',
        // // ]);

        \App\Models\Restaurant::factory(15)->create();

        Park::factory(15)->create();
        
        for($i=0; $i<3; $i++){
            $restaurants = DB::table('restaurants')->get();
            foreach($restaurants as $restaurant){
                RestaurantReview::factory()->create([
                'restaurant_id' => $restaurant->id,
                ]);
            }
        }
    }
}
