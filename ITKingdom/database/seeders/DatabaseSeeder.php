<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\laptopCategory;
use App\Models\phoneCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('123456789')
        ]);
        laptopCategory::create([
            'brand_name' => 'Acer'
        ]);
        phoneCategory::create([
            'brand_name' => 'Samsung'
        ]);
    }
}
