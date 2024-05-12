<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Stringable;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin::factory(10)->create();

        \App\Models\Admin::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'no_telp' => '080808080808',
            'address'=>'mastrip 163',
            'password'=> Hash::make('123'),
        ]);
    }
}
