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
use Illuminate\Support\Facades\File;

Route::model('user', 'App\User');
Route::model('publication', 'App\Publication');
Route::model('activity', 'App\Activity');
Route::model('comment', 'App\Comment');



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
        Route::get('/friends', 'Front\FriendsController@getAllFriends');
        Route::get('search/autocomplete', 'SearchController@searchUser');
        Route::resource('user', 'UserController');
        Route::resource('publication', 'Front\PublicationController');
        Route::resource('activity', 'Front\ActivityController');
        Route::resource('comment', 'Front\CommentController');

    });

    Route::get('uploads/{image}', function($image){

        //do so other checks here if you wish

        if(!File::exists( $image=storage_path("uploads/{$image}") )) abort(404);

        return Image::make($image)->response('jpg'); //will ensure a jpg is always returned
    });
});

Route::get('/connect', function () {
    return view('auth.connect');
});
