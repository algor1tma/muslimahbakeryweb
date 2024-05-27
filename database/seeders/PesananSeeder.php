<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pesanan;
use App\Models\User;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = User::all();

        \App\Models\Pesanan::factory(10)->create();

        \App\Models\Pesanan::factory()->create([
            'user_id' => $users->random()->id,
            'address' => 'Test Address',
            'catatan' => 'Specific notes',
            'total_harga' => 1000.00,
            'status' => 'Belum lunas'
        ]);
    }
}
