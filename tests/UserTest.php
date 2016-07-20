<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Activity;


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

    public function test_users_can_be_created()
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

	
	
	}
 }
