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

$factory->define(App\Association::class, function (Faker\Generator $faker)
{
	return[
		'name' => $faker->name,
		'picture' => '/images/assos1.jpg',
		'address' => $faker->address,
		'number_street' => $faker->numberBetween($min = 0, $max = 10),
		'country' => $faker->country,
		'city_code' => $faker->postcode,
		'city' => $faker->city,
	  	'longitude' => $faker->numberBetween($min = 0, $max = 10),
        'lattitude' => $faker->numberBetween($min = 0, $max = 100),
        'description' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'user_id' => $faker->numberBetween($min = 0, $max = 10),
        'sport_id' => $faker->numberBetween($min = 0, $max = 10),
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now()
	];
});

$factory->define(App\Publication::class, function (Faker\Generator $faker)
{
	return[
			'message' => $faker->sentence($nbWords = 15, $variableNbWords = true),
            'picture' => '/images/pouce.png',
            'status' => 'Success',
            'user_id' => $faker->numberBetween($min = 0, $max = 100),
            'created_at' => Carbon\Carbon::now()->subHour(4),
            'updated_at' => Carbon\Carbon::now()->subHour(4)
        ];
});

$factory->define(App\Sport::class, function (Faker\Generator $faker)
{
	return[
            'name' =>  $faker->sentence($nbWords = 1, $variableNbWords = true),
            'icon' =>  $faker->sentence($nbWords = 1, $variableNbWords = true),
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ];
});


$factory->define(App\Event::class, function (Faker\Generator $faker)
{
	return[
			'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
            'picture' => '/images/event1.jpg',
            'address' => $faker->address,
            'number_street' => $faker->buildingNumber,
			'city_code' => $faker->postcode,
			'city' => $faker->city,
            'country' => $faker->country,
	   	    'longitude' => $faker->numberBetween($min = 0, $max = 10),
	        'lattitude' => $faker->numberBetween($min = 0, $max = 100),
	        'user_id' => $faker->numberBetween($min = 0, $max = 10),
	        'sport_id' => $faker->numberBetween($min = 0, $max = 10),
	        'created_at' => Carbon\Carbon::now(),
	        'updated_at' => Carbon\Carbon::now()
	     ];
});

$factory->define(App\UsersLinks::class, function (Faker\Generator $faker)
{
	return[
            'user_id' => $faker->numberBetween($min = 0, $max = 5),
            'userL_id' => $faker->numberBetween($min = 0, $max = 5),
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
	     ];
});

$factory->define(App\Conversation_message::class, function (Faker\Generator $faker)
{
	return[
            'conversation_id' => $faker->numberBetween($min = 0, $max = 5),
            'message' => $faker->sentence($nbWords = 12, $variableNbWords = true),
            'user_id' => $faker->numberBetween($min = 0, $max = 5),
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
	     ];
});