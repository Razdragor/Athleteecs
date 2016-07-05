<?php

use Illuminate\Database\Seeder;

class SportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sports')->insert([
            'name' => 'Football',
            'icon' => 'football.png',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
        DB::table('sports')->insert([
            'name' => 'Course à pied',
            'icon' => 'running.png',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
        DB::table('sports')->insert([
            'name' => 'Cyclisme',
            'icon' => 'cycling.png',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
        DB::table('sports')->insert([
            'name' => 'Basketball',
            'icon' => 'basketball.png',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
        DB::table('sports')->insert([
            'name' => 'Natation',
            'icon' => 'swimming.png',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
    }

}
