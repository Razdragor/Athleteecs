<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'ean' => 'admin',
            'name' => 'Casque velo enfant bleu',
            'description' => 'Simple, léger et ventilé, il assure la sécurité des jeunes cyclistes.',
            'picture' => 'images/default_picture/default-equipement.jpg',
            'price' => 5,
            'url' => "http://www.fnac.com/mp26613509/Body-one-halteres-poignets-chevilles-2-x-2kg/w-4?ectrans=1&gclid=CjwKEAjwtqe8BRCs-9DdpMOilBoSJAAyqWz_35PUvahHE7tBNlmZhD1OtL7xoazGFEKi5DjQvCld4BoCadzw_wcB&mckv=lSI5HSi4_dc&oref=90999964-51c3-5033-4764-8c95e99ce66e&Origin=CMP_GOOGLE_MP_SPORT&pcrid=77401522223",
            'brand_id' => 4,
            'active' => true,
            'category_id' => 1,
            'sport_id' => 3,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
        DB::table('products')->insert([
            'ean' => 'admin',
            'name' => 'Casque vélo 500 noir',
            'description' => 'D\'un design sportif : ce casque est très bien ventilé grâce à ses 21 aérations. Son système 3D de réglage du tour de tête offre un excellent confort et un bon maintien en s\'ajustant en hauteur.',
            'picture' => 'images/default_picture/default-equipement.jpg',
            'price' => 30,
            'url' => "http://www.fnac.com/mp26613509/Body-one-halteres-poignets-chevilles-2-x-2kg/w-4?ectrans=1&gclid=CjwKEAjwtqe8BRCs-9DdpMOilBoSJAAyqWz_35PUvahHE7tBNlmZhD1OtL7xoazGFEKi5DjQvCld4BoCadzw_wcB&mckv=lSI5HSi4_dc&oref=90999964-51c3-5033-4764-8c95e99ce66e&Origin=CMP_GOOGLE_MP_SPORT&pcrid=77401522223",
            'brand_id' => 4,
            'active' => true,
            'category_id' => 1,
            'sport_id' => 3,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
        DB::table('products')->insert([
            'ean' => 'admin',
            'name' => 'Maillot vélo 300',
            'description' => 'Conçu pour pour les enfants pratiquant régulièrement le vélo par temps chaud et sec.',
            'picture' => 'images/default_picture/default-equipement.jpg',
            'price' => 6,
            'url' => "http://www.fnac.com/mp26613509/Body-one-halteres-poignets-chevilles-2-x-2kg/w-4?ectrans=1&gclid=CjwKEAjwtqe8BRCs-9DdpMOilBoSJAAyqWz_35PUvahHE7tBNlmZhD1OtL7xoazGFEKi5DjQvCld4BoCadzw_wcB&mckv=lSI5HSi4_dc&oref=90999964-51c3-5033-4764-8c95e99ce66e&Origin=CMP_GOOGLE_MP_SPORT&pcrid=77401522223",
            'brand_id' => 4,
            'active' => true,
            'category_id' => 1,
            'sport_id' => 2,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'ean' => 'admin',
            'name' => 'Ballon Football Sunny',
            'description' => 'Ce mini ballon de football en plastique est idéal pour jouer partout en famille.',
            'picture' => 'images/default_picture/default-equipement.jpg',
            'price' => 2,
            'url' => "http://www.fnac.com/mp26613509/Body-one-halteres-poignets-chevilles-2-x-2kg/w-4?ectrans=1&gclid=CjwKEAjwtqe8BRCs-9DdpMOilBoSJAAyqWz_35PUvahHE7tBNlmZhD1OtL7xoazGFEKi5DjQvCld4BoCadzw_wcB&mckv=lSI5HSi4_dc&oref=90999964-51c3-5033-4764-8c95e99ce66e&Origin=CMP_GOOGLE_MP_SPORT&pcrid=77401522223",
            'brand_id' => 3,
            'active' => true,
            'category_id' => 3,
            'sport_id' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'ean' => 'admin',
            'name' => 'Ballon Football Euro 16 TOP ',
            'description' => 'Le ballon de l\'Euro 2016 !',
            'picture' => 'images/default_picture/default-equipement.jpg',
            'price' => 25,
            'url' => "http://www.fnac.com/mp26613509/Body-one-halteres-poignets-chevilles-2-x-2kg/w-4?ectrans=1&gclid=CjwKEAjwtqe8BRCs-9DdpMOilBoSJAAyqWz_35PUvahHE7tBNlmZhD1OtL7xoazGFEKi5DjQvCld4BoCadzw_wcB&mckv=lSI5HSi4_dc&oref=90999964-51c3-5033-4764-8c95e99ce66e&Origin=CMP_GOOGLE_MP_SPORT&pcrid=77401522223",
            'brand_id' => 2,
            'active' => true,
            'category_id' => 3,
            'sport_id' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'ean' => 'admin',
            'name' => 'Ballon Football Top',
            'description' => 'Ce ballon de football est la réplique du ballon officiel du championnat allemand.',
            'picture' => 'images/default_picture/default-equipement.jpg',
            'price' => 20,
            'url' => "http://www.fnac.com/mp26613509/Body-one-halteres-poignets-chevilles-2-x-2kg/w-4?ectrans=1&gclid=CjwKEAjwtqe8BRCs-9DdpMOilBoSJAAyqWz_35PUvahHE7tBNlmZhD1OtL7xoazGFEKi5DjQvCld4BoCadzw_wcB&mckv=lSI5HSi4_dc&oref=90999964-51c3-5033-4764-8c95e99ce66e&Origin=CMP_GOOGLE_MP_SPORT&pcrid=77401522223",
            'brand_id' => 2,
            'active' => true,
            'category_id' => 3,
            'sport_id' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);



    }
}
