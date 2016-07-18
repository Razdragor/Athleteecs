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
        DB::table('sports')->insert([
            'name' => 'Football Américain',
            'icon' => 'american-football.png',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
        DB::table('sports')->insert([
            'name' => 'Tir à l\'arc',
            'icon' => 'archery.png',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
        DB::table('sports')->insert([
            'name' => 'Badmington',
            'icon' => 'badmington.png',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
        DB::table('sports')->insert([
            'name' => 'Baseball',
            'icon' => 'baseball.png',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
        DB::table('sports')->insert([
            'name' => 'Boxe',
            'icon' => 'boxing.png',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
        DB::table('sports')->insert([
            'name' => 'Golf',
            'icon' => 'golf.png',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
        DB::table('sports')->insert([
            'name' => 'Ski',
            'icon' => 'ski.png',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
        DB::table('sports')->insert([
            'name' => 'Tennis',
            'icon' => 'tennis.png',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
        DB::table('sports')->insert([
            'name' => 'Volleyball',
            'icon' => 'volleyball.png',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
        DB::table('sports')->insert([
            'name' => 'Musculation',
            'icon' => 'weightlifting.png',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
    }

}
