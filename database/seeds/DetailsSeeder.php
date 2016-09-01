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
            'name'=> "Légèreté"
        ]);
        DB::table('details')->insert([
            'id' => 2,
            'name'=> "Ventilation"
        ]);
        DB::table('details')->insert([
            'id' => 3,
            'name'=> "Protection"
        ]);
        DB::table('details')->insert([
            'id' => 4,
            'name'=> "Toucher de balle"
        ]);
        DB::table('details')->insert([
            'id' => 5,
            'name'=> "Garantie"
        ]);
        DB::table('details')->insert([
            'id' => 6,
            'name'=> "Entretien"
        ]);


    }
}
