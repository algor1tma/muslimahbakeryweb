<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Produk::factory(10)->create();

        \App\Models\Produk::factory()->create([
            'name' => 'Test',
            'harga' => '1000',
            'spesifikasi' => 'apik',
            'gambar' => '',
            'kategori_id' => '1',
        ]);
    }
}
