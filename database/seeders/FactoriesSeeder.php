<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \DB::table('factories')->insert([
            [
                'id' => 1,
                'user_id' => 4,
                'factory_name' => 'factory 124 name',
                'location' => 'sheraton',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
