<?php

namespace Database\Factories;

use App\Models\PesananDetail;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PesananDetail>
 */
class PesananDetailFactory extends Factory
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
            'pesanan_id' => Pesanan::factory(),
            'produk_id' => Produk::factory(),
            'qty' => $this->faker->numberBetween(1, 100),
            'harga' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
