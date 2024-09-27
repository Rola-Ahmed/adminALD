<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'rolawafi',
        //     'email' => 'rolawafi209@gmail.com',
        // 'password'=>\Hash::make('123456')
        // ]);

        $this->call([
        RoleSeeder::class,
        UserSeeder::class,
        RoleUserSeeder::class,
        FactoriesSeeder::class,
        ImportersSeeder::class,
        ShippingCompanySeeder::class,
    ]);
    }
}
