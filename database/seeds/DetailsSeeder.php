<?php

use Illuminate\Database\Seeder;

class DetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('details')->insert([
            'id' => 1,
            'name'=> "Poid"
        ]);
        DB::table('details')->insert([
            'id' => 2,
            'name'=> "Amorti"
        ]);
        DB::table('details')->insert([
            'id' => 3,
            'name'=> "Autonomie"
        ]);
    }
}
