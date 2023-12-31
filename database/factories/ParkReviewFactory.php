<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParkReview>
 */
class ParkReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       
        $users = DB::table('users')->where('role', 'user')->get();
        $parks = DB::table('parks')->get();
        return [
            'user_id'=>$this->faker->randomElement($users)->id,
            'park_id'=>$this->faker->randomElement($parks)->id,
            'comments' => $this->faker->paragraph(2),
            'safety'=>$this->faker->numberBetween(1,5),
            'maintenance'=>$this->faker->numberBetween(1,5),
            'family_friendliness'=>$this->faker->numberBetween(1,5),
        ];
        
    }
}
