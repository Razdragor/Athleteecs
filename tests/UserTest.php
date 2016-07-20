<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Activity;
use App\User;


class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_can_create_user()
    {
		
    	$users = factory(App\User::class)->create([
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
            'star' => 1,
            'created_at' => Carbon\Carbon::tomorrow('Europe/London'),
            'updated_at' => Carbon\Carbon::tomorrow('Europe/London')
        ]);

    	$found_user = User::find($users->id);

		$this->assertEquals($found_user->firstname,"Admin");
		$this->assertEquals($found_user->lastname,"Admin");
		$this->assertEquals($found_user->email,"esgi.athleteec@gmail.com");	
		$this->assertEquals($found_user->status,"success");
		$this->assertEquals($found_user->activated,1);
		$this->assertEquals($found_user->picture,"/asset/img/avatars/avatar.png");
		$this->assertEquals($found_user->sexe,"Homme");
		$this->assertEquals($found_user->score,0);
		$this->assertEquals($found_user->newsletter,0);
		$this->assertEquals($found_user->star,1);

    }

    public function test_can_delete_user()
    {
		
    	$users = factory(App\User::class)->create([
            'firstname' => 'Martin',
            'lastname' => 'Jack',
            'email' => 'athleteec@gmail.com',
            'password' => bcrypt('admin'),
            'status' => 'success',
            'activated' => 1,
            'picture' => '/asset/img/avatars/avatar.png',
            'sexe' => 'Homme',
            'score' => 0,
            'newsletter' => 0,
            'star' => 1,
            'created_at' => Carbon\Carbon::tomorrow('Europe/London'),
            'updated_at' => Carbon\Carbon::tomorrow('Europe/London')
        ]);
		
		$users->delete();

		$this->notSeeInDatabase('users',[
			'id'=>$users->id,
			'firstname'=>'Martin',
			'lastname'=>'Jack',
			'email'=>'athleteec@gmail.com',
			'status'=>'success',
			'activated'=>1,
			'sexe'=>'Homme',
			'score'=>'0',
			'star'=>'1']);

    }

    public function test_can_update_user()
    {
		
    	$users = factory(App\User::class)->create([
            'firstname' => 'LeLion',
            'lastname' => 'Doux',
            'email' => 'Doux@gmail.com',
            'password' => bcrypt('admin'),
            'status' => 'success',
            'activated' => 1,
            'picture' => '/asset/img/avatars/avatar.png',
            'sexe' => 'Homme',
            'score' => 0,
            'newsletter' => 0,
            'star' => 1,
            'created_at' => Carbon\Carbon::tomorrow('Europe/London'),
            'updated_at' => Carbon\Carbon::tomorrow('Europe/London')
        ]);
		
		$users->firstname = "Henri";
		$users->lastname = "Didoux";
		$users->save();

		$user_found = User::find($users->id);

    	$this->assertEquals($user_found->firstname,"Henri");
  		$this->assertEquals($user_found->lastname,"Didoux");
    	  
    }

    public function test_activity_can_be_created()
    {

    	$users = factory(App\User::class)->create();

    	$activity = $users->activities()->create([
    		'description' => '10 Km de paris',
            'status' => 'Success',
            'sport_id' => 2,
            'time' => 3600,
            'created_at' => Carbon\Carbon::now()->subHour(2),
            'updated_at' => Carbon\Carbon::now()->subHour(2)
    		]); 

    		$found_activity = Activity::find($activity->id);

    		$this->assertEquals($found_activity->description,"10 Km de paris");
    		$this->assertEquals($found_activity->time,"1h ");

	
			$this->seeInDatabase('activities',['id'=>$activity->id,'description'=>'10 Km de paris','time'=>'3600']);
	}

	public function test_activity_can_be_deleted()
    {

    	$users = factory(App\User::class)->create();

    	$activity = $users->activities()->create([
    		'description' => '10 Km de paris',
            'status' => 'Success',
            'sport_id' => 2,
            'time' => 3600,
            'created_at' => Carbon\Carbon::now()->subHour(2),
            'updated_at' => Carbon\Carbon::now()->subHour(2)
    		]); 

    	$activity->delete();	
	
		$this->notSeeInDatabase('activities',['id'=>$activity->id,'description'=>'10 Km de paris','time'=>'3600']);
	}

	public function test_activity_can_be_updated()
    {

    	$users = factory(App\User::class)->create();

    	$activity = $users->activities()->create([
    		'description' => '10 Km de paris',
            'status' => 'Success',
            'sport_id' => 2,
            'time' => 3600,
            'created_at' => Carbon\Carbon::now()->subHour(2),
            'updated_at' => Carbon\Carbon::now()->subHour(2)
    		]); 

    	$activity->description = '100 Km de guadeloupe';
    	$activity->save();

    	$activity_found = Activity::find($activity->id);

    	$this->assertEquals($activity_found->description,"100 Km de guadeloupe");
	}

	public function test_sports_can_be_created()
	{
			$users = factory(App\User::class)->create();

    		$activity = $users->activities()->create([
    		'description' => '10 Km de paris',
            'status' => 'Success',
            'sport_id' => 2,
            'time' => 3600,
            'created_at' => Carbon\Carbon::now()->subHour(2),
            'updated_at' => Carbon\Carbon::now()->subHour(2)
    		]); 

    		$found_activity = Activity::find($activity->id);

    		$this->assertEquals($found_activity->description,"10 Km de paris");
    		$this->assertEquals($found_activity->time,"1h ");

	
			$this->seeInDatabase('activities',['id'=>$activity->id,'description'=>'10 Km de paris','time'=>'3600']);

	}

}
