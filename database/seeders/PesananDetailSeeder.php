<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesananDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\PesananDetail::factory(10)->create();

        \App\Models\PesananDetail::factory()->create([
            'pesanan_id' => '5',
            'produk_id' => '3',
            'qty' => '2',
            'harga' => '10000',
        ]);
    }
}
