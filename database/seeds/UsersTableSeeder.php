<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'esgi.athleteec@gmail.com',
            'password' => bcrypt('admin'),
            'status' => 'success',
            'activated' => 1,
            'sexe' => 'Homme',
            'score' => 0,
            'newsletter' => 0,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'firstname' => 'Bertrand',
            'lastname' => 'Jnt',
            'email' => 'bertrand.jaunet@gmail.com',
            'password' => '$2y$10$aOrKvV/YsIHxPCf3T/UyoeGK5yVWHRvsKOp7/g8bLJOp/ImfcUGEW',
            'sexe' => 'Homme',
            'status' => 'success',
            'activated' =>  1,
            'picture' => 'https://graph.facebook.com/v2.6/10208149626716007/picture?type=normal',
            'score' => 0,
            'newsletter' => 0,
            'created_at' => '2016-06-26 10:31:37',
            'updated_at' =>'2016-06-26 10:31:37'
        ]);

        DB::table('users')->insert([
            'firstname' => 'Benjamin',
            'lastname' => 'Romanelli',
            'email' => 'benjamin@test.fr',
            'password' => bcrypt('admin'),
            'status' => 'success',
            'activated' => 1,
            'sexe' => 'Homme',
            'score' => 0,
            'picture' => 'https://media.licdn.com/mpr/mpr/shrink_100_100/AAEAAQAAAAAAAARuAAAAJDkxN2ExMDViLTBkNDktNDg4MC1iYTg0LTBlZDliMjI5ZWNlZQ.jpg',
            'newsletter' => 0,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'firstname' => 'Mathieu',
            'lastname' => 'Visintin',
            'email' => 'mathieu@test.fr',
            'password' => bcrypt('admin'),
            'status' => 'success',
            'activated' => 1,
            'sexe' => 'Homme',
            'score' => 0,
            'picture' => 'http://fr.web.img4.acsta.net/c_100_100/b_1_d6d6d6/medias/nmedia/18/35/65/82/18655069.jpg',
            'newsletter' => 0,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'firstname' => 'Amandine ',
            'lastname' => 'Jaunet',
            'email' => 'amandine@test.fr',
            'password' => bcrypt('admin'),
            'status' => 'success',
            'activated' => 1,
            'sexe' => 'Femme',
            'score' => 0,
            'picture' => 'http://imalbum.aufeminin.com/album/D20150505/coiffure-mariage-cheveux-longs-470147244-1159532_H151839_L_s100.jpg',
            'newsletter' => 0,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);



        DB::table('users')->insert([
            'firstname' => 'Julian',
            'lastname' => 'Michau',
            'email' => 'julian@test.fr',
            'password' => bcrypt('admin'),
            'status' => 'success',
            'activated' => 1,
            'sexe' => 'Homme',
            'score' => 0,
            'picture' => 'http://a4.mzstatic.com/us/r30/Music69/v4/4f/a1/84/4fa18410-962e-a04c-283d-a97c51fa66da/cover100x100.jpeg',
            'newsletter' => 0,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'firstname' => 'Maxime',
            'lastname' => 'Sageot',
            'email' => 'maxime@test.fr',
            'password' => bcrypt('admin'),
            'status' => 'success',
            'activated' => 1,
            'sexe' => 'Homme',
            'score' => 0,
            'picture' => 'http://blog.traininteractive.com/mt/mt-static/support/assets_c/userpics/userpic-2-100x100.png',
            'newsletter' => 0,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'firstname' => 'Cécile',
            'lastname' => 'Habig',
            'email' => 'cecile@test.fr',
            'password' => bcrypt('admin'),
            'status' => 'success',
            'activated' => 1,
            'sexe' => 'Femme',
            'score' => 0,
            'picture' => 'http://t2.uccdn.com/fr/images/4/7/9/img_remedes_maisons_contre_les_maux_de_tete_3974_100_square.jpg',
            'newsletter' => 0,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'firstname' => 'Valériane',
            'lastname' => 'Saguet',
            'email' => 'valeriane@test.fr',
            'password' => bcrypt('admin'),
            'status' => 'success',
            'activated' => 1,
            'sexe' => 'Femme',
            'score' => 0,
            'picture' => 'http://lapressegalactique.com/wp-content/uploads/2015/09/Emeline_avatar_1442426649-100x100.jpg',
            'newsletter' => 0,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1
        ]);
    }
}
