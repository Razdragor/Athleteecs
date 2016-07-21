<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->name,
        'lastname' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'status' => 'success',
        'activated' => 1,
        'sexe' => 'Homme',
        'score' => 0,
        'picture' => 'https://media.licdn.com/mpr/mpr/shrink_100_100/AAEAAQAAAAAAAARuAAAAJDkxN2ExMDViLTBkNDktNDg4MC1iYTg0LTBlZDliMjI5ZWNlZQ.jpg',
        'newsletter' => 0,
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now()
    ];
});

$factory->define(App\Activity::class, function (Faker\Generator $faker)
{
	return[
	    	'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            'status' => 'Success',
            'sport_id' => $faker->randomDigit,
            'time' => $faker->numberBetween($min = 0, $max = 100),
            'created_at' => Carbon\Carbon::now()->subHour(2),
            'updated_at' => Carbon\Carbon::now()->subHour(2)
	];	
});