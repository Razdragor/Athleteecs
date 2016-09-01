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
            'value'=> "6 aérations",
            'product_id' => 1,
            'detail_id' => 2
        ]);

        DB::table('caracteristiques')->insert([
            'id' => 2,
            'value'=> "160g",
            'product_id' => 1,
            'detail_id' => 1
        ]);

        DB::table('caracteristiques')->insert([
            'id' => 3,
            'value'=> "10 aérations",
            'product_id' => 2,
            'detail_id' => 2
        ]);

        DB::table('caracteristiques')->insert([
            'id' => 4,
            'value'=> "200g",
            'product_id' => 2,
            'detail_id' => 1
        ]);


        DB::table('caracteristiques')->insert([
            'id' => 5,
            'value'=> "Ballon plus léger pour réduire la douleur et faciliter la pratique.",
            'product_id' => 4,
            'detail_id' => 4
        ]);
        DB::table('caracteristiques')->insert([
            'id' => 6,
            'value'=> "Revêtement double densité cousu à la machine",
            'product_id' => 5,
            'detail_id' => 4
        ]);

    }
}
