<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;
    

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   $femalePakistaniNames = [
        'Aisha Khan',
        'Fatima Ahmed',
        'Hira Ali',
        'Sana Shah',
        'Zainab Malik',
        'Mehak Khan',
        'Sara Ahmed',
        'Ayesha Siddiqui',
        'Mariam Khan',
        'Anam Malik',
        'Naima Riaz',
        'Farah Abbas',
        'Sania Sheikh',
        'Bushra Rizvi',
        'Rabia Iqbal',
        'Sumaira Khan',
        'Alina Zafar',
        'Hina Baig',
        'Nadia Hassan',
        'Yasmeen Akhtar',
    ];
    
        return [
            'name'=>$this->faker->randomElement($femalePakistaniNames),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'role'=> $this->faker->randomElement(['user','admin']),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
