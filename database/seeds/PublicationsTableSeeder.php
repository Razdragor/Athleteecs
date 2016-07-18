<?php

use Illuminate\Database\Seeder;

class PublicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publications')->insert([
            'message' => 'Enfin remis de ma blessure, je vais pouvoir reprendre l\'entrainement',
            'picture' => '/images/pouce.png',
            'status' => 'Success',
            'user_id' => 2,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('videos')->insert([
            'url' => 'DEK4zfSmBw8',
            'youtube' => true,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('videos')->insert([
            'url' => 'JY5uHO6vk48',
            'youtube' => true,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);


        DB::table('publications')->insert([
            'message' => 'Pendant ma remise en forme, j\'ai perdu du poids grâce à cette vidéo',
            'video_id' => 1,
            'status' => 'Success',
            'user_id' => 2,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('publications')->insert([
            'message' => 'Course en perpective...',
            'video_id' => 2,
            'status' => 'Success',
            'user_id' => 3,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('publications')->insert([
            'message' => 'Tous derrière les bleus!!Allez Griezzou!!',
            'picture' => '/images/griezman.jpg',
            'status' => 'Success',
            'user_id' => 3,
            'event_id' => 2,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('publications')->insert([
            'message' => 'C\'est quand le prochain match ?',
            'status' => 'Success',
            'user_id' => 3,
            'association_id' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('videos')->insert([
            'url' => 'ibCvkAEPT0A',
            'youtube' => true,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('publications')->insert([
            'message' => 'Le plus beau but!',
            'video_id' => 3,
            'status' => 'Success',
            'user_id' => 1,
            'association_id' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
    }
}
