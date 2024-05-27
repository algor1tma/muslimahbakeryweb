<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pesanan>
 */
class PesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::factory(), // Create a new user if not provided
            'address' => $this->faker->address,
            'catatan' => $this->faker->sentence,
            'total_harga' => $this->faker->randomFloat(2, 10, 500), // Random price between 10.00 and 500.00
            // 'status' => $this->faker->randomElement(['lunas', 'belum lunas']),
            'status' => 'belum lunas', // Set status to "belum lunas"

        ];
    }
}
