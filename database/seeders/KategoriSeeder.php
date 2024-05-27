<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Kategori::factory(10)->create();

        \App\Models\Kategori::factory()->create([
            'name' => 'Test Kategori',
        ]);
    }
}
