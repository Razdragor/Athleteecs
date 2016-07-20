<?php

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activities')->insert([
            'description' => '10 Km de paris',
            'status' => 'Success',
            'user_id' => 1,
            'sport_id' => 2,
            'time' => 3600,
            'created_at' => Carbon\Carbon::now()->subHour(2),
            'updated_at' => Carbon\Carbon::now()->subHour(2)
        ]);

        DB::table('activities')->insert([
            'description' => 'Entrainement pectoraux',
            'status' => 'Success',
            'picture' => '/images/muscle.jpg',
            'user_id' => 2,
            'sport_id' => 15,
            'time' => 7200,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
    }
}
