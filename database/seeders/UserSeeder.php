<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //
        \DB::table('users')->insert([
            ['id' => 1, 'email' => 'rolawafi209@gmail.com', 'password' => bcrypt('123456')],
            ['id' => 2, 'email' => 'admin@example.com', 'password' => bcrypt('123456')],
            ['id' => 3, 'email' => 'importer@example.com', 'password' => bcrypt('123456')],
            ['id' => 4, 'email' => 'factory@example.com', 'password' => bcrypt('123456')],
            ['id' => 5, 'email' => 'shipping@example.com', 'password' => bcrypt('123456')],
        ]);
         // Make sure to include the email field
        //  User::create([
        //     'name' => 'factory',
        //     'email' => 'factory@example.com', // Add a valid email
        //     'password' => bcrypt('password'), // Include a password if necessary
        // ]);
    }
}
