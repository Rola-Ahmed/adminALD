<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ImportersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('importers')->insert([
            [
                'id' => 1,
                'user_id' => 3,
                'company_name' => 'importer company name',
                'import_license_number' => '2345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
