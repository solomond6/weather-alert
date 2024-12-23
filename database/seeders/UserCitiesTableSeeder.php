<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->insert([
            ['name' => 'New York', 'state' => 'New York', 'country' => 'USA'],
            ['name' => 'Los Angeles', 'state' => 'California', 'country' => 'USA'],
            ['name' => 'Chicago', 'state' => 'Illinois', 'country' => 'USA'],
            ['name' => 'Houston', 'state' => 'Texas', 'country' => 'USA'],
            ['name' => 'Phoenix', 'state' => 'Arizona', 'country' => 'USA'],
        ]);

        DB::table('users')->insert([
            ['name' => 'Test Test', 'email' => 'testing@yahoo.com', 'password' => md5('1234567890'), 'rain_threshold' => 10, 'uv_threshold'=>8],
            ['name' => 'Test1 Test2', 'email' => 'testing2@yahoo.com', 'password' => md5('1234567890'), 'rain_threshold' => 10, 'uv_threshold'=>4],
        ]);

        DB::table('user_cities')->insert([
            ['user_id' => 1, 'city_id' => 1],
            ['user_id' => 1, 'city_id' => 2],
            ['user_id' => 1, 'city_id' => 3],
            ['user_id' => 1, 'city_id' => 4],
            ['user_id' => 2, 'city_id' => 1],
            ['user_id' => 2, 'city_id' => 2],
            ['user_id' => 2, 'city_id' => 3],
            ['user_id' => 2, 'city_id' => 4],
        ]);
    }
}
