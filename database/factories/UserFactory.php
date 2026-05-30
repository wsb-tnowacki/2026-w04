<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
    {
    $plec = fake()->randomElement(['male','female']); 
    $nazwa = fake('pl_PL')->firstName($plec)." ".fake('pl_PL')->lastName($plec);   
    return [
            
            'name' => $nazwa,
            'email' => fake('pl_PL')->unique()->freeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('zaq1@WSX'),
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
