<?php

use Illuminate\Database\Seeder;

class CaracteristiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('caracteristiques')->insert([
            'id' => 1,
            'value'=> "Lourd",
            'product_id' => 1,
            'detail_id' => 1

        ]);
        DB::table('caracteristiques')->insert([
            'id' => 2,
            'value'=> "2 heures",
            'product_id' => 1,
            'detail_id' => 3
        ]);
        DB::table('caracteristiques')->insert([
            'id' => 3,
            'value'=> "Lourd",
            'product_id' => 2,
            'detail_id' => 1
        ]);

    }
}
