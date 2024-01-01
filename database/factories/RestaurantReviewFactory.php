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
        
    $reviews = ["As a woman, I felt incredibly safe dining at this restaurant. The well-lit parking area and attentive staff contributed to a comfortable atmosphere. I appreciate the establishment's commitment to ensuring a secure environment for all patrons.",
    "The restaurant offers a generally safe environment for women. While the location is well-maintained, some areas could use improved lighting. Staff presence is noticeable, but additional measures for increased safety awareness would enhance the overall experience.",
        " Dimly lit parking and an apparent lack of security personnel made me uneasy. I recommend the management invest in better safety measures to encourage more female patrons."];
        $users = DB::table('users')->where('role', 'user')->get();
        $restaurants = DB::table('restaurants')->get();
        return [
            'user_id'=>$this->faker->randomElement($users)->id,
            'restaurant_id'=>$this->faker->randomElement($restaurants)->id,
            'comments' => $this->faker->randomElement($reviews),
            'safety'=>$this->faker->numberBetween(1,5),
            'hygiene'=>$this->faker->numberBetween(1,5),
            'ambiance'=>$this->faker->numberBetween(1,5),
            'staff_behaviour'=>$this->faker->numberBetween(1,5),
        ];
    }
}
