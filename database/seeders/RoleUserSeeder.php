<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \DB::table('role_user')->insert([
            [ 'user_id' => '1','role_id'=>'1'],
            [ 'user_id' => '1','role_id'=>'2'],
            [ 'user_id' => '1','role_id'=>'3'],
            [ 'user_id' => '1','role_id'=>'4'],


            [ 'user_id' => '2','role_id'=>'1'], 
            [ 'user_id' => '3','role_id'=>'2'],
            [ 'user_id' => '4','role_id'=>'3'],
            [ 'user_id' => '5','role_id'=>'4'],
        ]);
    }
}
