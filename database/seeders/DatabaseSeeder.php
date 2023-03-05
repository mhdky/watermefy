<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Muhammad Rizki',
            'email' => 'mhdky502@gmail.com',
            'password' => Hash::make('password')
        ]);
        Tenant::create([
            'name' => 'effenril agung',
            'status' => 'Kontrakan',
            'url' => uniqid()
        ]);
    }
}
