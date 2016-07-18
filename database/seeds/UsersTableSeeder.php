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
            'picture' => '/asset/img/avatars/avatar.png',
            'sexe' => 'Homme',
            'score' => 0,
            'newsletter' => 0,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
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


        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1
        ]);

        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 2
        ]);

        DB::table('role_user')->insert([
            'user_id' => 3,
            'role_id' => 2
        ]);
    }
}
