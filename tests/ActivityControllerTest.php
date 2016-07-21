<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;



class ActivityControllerTest extends TestCase
{
	use WithoutMiddleware;
 
    public function test_index_activities()
    {
    	$user = factory(App\User::class)->create();
    	$activities = factory(App\Activity::class,2)->create(['user_id' => $user->id]);

    	$this
    		->get(route('activity.index'))
			->seeStatusCode(200);

		foreach($activities as $activity) {
			
			$this->seeJson([
				'description'=>$activity->description,
				'status'=>$activity->status,
				'sport_id'=>(string)$activity->sport_id,
				'time'=>(string)$activity->time,
				'created_at'=>(string)$activity->created_at,
				'updated_at'=>(string)$activity->updated_at
				]);
		}
    }

    public function test_can_index_activity()
    {
    	$user = factory(App\User::class)->create();
    	$activity = factory(App\Activity::class)->create(['user_id' => $user->id]);

    	$this
    		->get(route('activity.show',[$activity->id]))
			->seeStatusCode(200)->seeJson([
				'description'=>$activity->description,
				'status'=>$activity->status,
				'sport_id'=>(string)$activity->sport_id,
				'time'=>(string)$activity->time,
				'created_at'=>(string)$activity->created_at,
				'updated_at'=>(string)$activity->updated_at
				]);
    }
}
