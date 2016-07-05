<?php namespace App\Http\Controllers\Chat;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use LRedis;
 
class SocketController extends Controller {
    
	public function sendMessage(){
		$redis = LRedis::connection();
		$redis->publish('message', Request::input('message'));
	}
}
 