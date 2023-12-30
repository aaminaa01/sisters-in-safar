<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RestaurantReview>
 */
class RestaurantReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = DB::table('users')->where('role', 'user')->get();
        $restaurants = DB::table('restaurants')->get();
        return [
            'user_id'=>$this->faker->randomElement($users)->id,
            'restaurant_id'=>$this->faker->randomElement($restaurants)->id,
            'comments' => $this->faker->paragraph(2),
            'safety'=>$this->faker->numberBetween(1,5),
            'hygiene'=>$this->faker->numberBetween(1,5),
            'ambiance'=>$this->faker->numberBetween(1,5),
            'staff_behaviour'=>$this->faker->numberBetween(1,5),
        ];
    }
}
