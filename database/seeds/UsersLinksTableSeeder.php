<?php

use Illuminate\Database\Seeder;

class UsersLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_links')->insert([
            'user_id' => '1',
            'userL_id' => '2',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_links')->insert([
            'user_id' => '1',
            'userL_id' => '3',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_links')->insert([
            'user_id' => '1',
            'userL_id' => '4',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_links')->insert([
            'user_id' => '1',
            'userL_id' => '5',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_links')->insert([
            'user_id' => '1',
            'userL_id' => '6',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_links')->insert([
            'user_id' => '1',
            'userL_id' => '7',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_links')->insert([
            'user_id' => '1',
            'userL_id' => '8',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_links')->insert([
            'user_id' => '1',
            'userL_id' => '9',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_links')->insert([
            'user_id' => '2',
            'userL_id' => '1',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_links')->insert([
            'user_id' => '3',
            'userL_id' => '1',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_links')->insert([
            'user_id' => '4',
            'userL_id' => '1',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_links')->insert([
            'user_id' => '5',
            'userL_id' => '1',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_links')->insert([
            'user_id' => '6',
            'userL_id' => '1',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_links')->insert([
            'user_id' => '7',
            'userL_id' => '1',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_links')->insert([
            'user_id' => '8',
            'userL_id' => '1',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users_links')->insert([
            'user_id' => '9',
            'userL_id' => '1',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
    }
}
