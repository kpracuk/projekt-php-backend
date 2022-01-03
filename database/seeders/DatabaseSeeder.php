<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
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
             'name' => 'Test User',
             'email' => 'user@example.com',
             'email_verified_at' => now(),
             'password' => Hash::make('123123123'),
             'role' => 'user'
         ]);

        User::create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123123123'),
            'role' => 'admin'
        ]);

         User::factory(10)->create();
         Product::factory(20)->create();
         Order::factory(50)->create();
    }
}
