<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Auth;

Route::model('association', 'App\Association');
Route::model('groupe', 'App\Group');



Route::auth();
Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');

//Social Login
Route::get('/login/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('/login/callback/{provider}', 'SocialAuthController@callback');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
        Route::get('/', 'Admin\AdminController@index');
    });

    Route::group(['middleware' => ['role:user|admin']], function () {
        Route::get('/', 'Front\IndexController@index');
        Route::resource('user', 'UserController');
        
        //Chat
        Route::get('socket', 'Chat\SocketController@index');
        Route::post('sendmessage', 'Chat\SocketController@sendMessage');
        Route::get('writemessage', 'Chat\SocketController@writemessage');
        Route::resource('conversation', 'SocketController');
        Route::resource('conversation_user', 'SocketController');
        Route::resource('conversation_message', 'SocketController');
        //Chat
    });
});

Route::get('/connect', function () {
    return view('auth.connect');
});
