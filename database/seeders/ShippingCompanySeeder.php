<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       

        \DB::table('shipping_companies')->insert([
            'shippingCotunries' => json_encode(['Country1', 'Country2']), // Encode array to JSON
            'shippingCities' => json_encode(['City1', 'City2']), // Encode array to JSON
            'company_name' => 'Shipping Company Name',
            'user_id' => 5, // Ensure this ID exists in your users table
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
