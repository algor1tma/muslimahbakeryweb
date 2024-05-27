<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Kategori;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ambil semua ID dari tabel kategoris
        $kategoriIds = Kategori::pluck('id')->toArray();

        return [
            'name' => $this->faker->name(),
            'harga' => $this->faker->randomNumber(5, true),  // Generates a random number with 5 digits
            'spesifikasi' => $this->faker->sentence(),  // Generates a random sentence
            'gambar' => $this->faker->imageUrl(640, 480, 'products', true),  // Generates a URL for a product image
            'kategori_id' => $this->faker->randomElement($kategoriIds),  // Randomly select an existing kategori_id
        ];
    }
}
