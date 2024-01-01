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
        $parkReviews = [
            "This park is a hidden gem! As a woman, I appreciate the well-maintained pathways and the presence of security personnel. It's a perfect spot for a peaceful stroll or a family picnic, offering a safe and enjoyable experience.",
            
            "While the park has beautiful greenery, the lack of proper lighting in some areas raises concerns about safety, especially during the evening. I hope the management considers enhancing the lighting infrastructure to make it more welcoming for women and families.",
            
            "A visit to this park left me with mixed feelings. On the positive side, the open spaces and recreational facilities are great. However, the limited security measures, especially after dark, can be a deterrent for female visitors. A stronger focus on safety would significantly improve the overall experience.",
            
            "Kudos to the park management for creating a safe haven for women and families! From well-lit paths to visible security personnel, every detail is taken care of. It's a joy to visit, knowing that safety is a top priority."
        ];
        $users = DB::table('users')->where('role', 'user')->get();
        $parks = DB::table('parks')->get();
        return [
            'user_id'=>$this->faker->randomElement($users)->id,
            'park_id'=>$this->faker->randomElement($parks)->id,
            'comments' => $this->faker->randomElement($parkReviews),
            'safety'=>$this->faker->numberBetween(1,5),
            'maintenance'=>$this->faker->numberBetween(1,5),
            'family_friendliness'=>$this->faker->numberBetween(1,5),
        ];
        
    }
}
