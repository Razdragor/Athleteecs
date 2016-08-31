<?php

use Illuminate\Database\Seeder;

class SportsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sports_categories')->insert([
            'id' => 1,
            'sport_id' => 1,
            'category_id' => 1

        ]);
        DB::table('sports_categories')->insert([
            'id' => 2,
            'sport_id' => 1,
            'category_id' => 2

        ]);
        DB::table('sports_categories')->insert([
            'id' => 3,
            'sport_id' => 2,
            'category_id' => 1
        ]);

    }
}
