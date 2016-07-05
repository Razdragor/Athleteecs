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

Route::group(['middleware' => 'web'], function() {
    // Place all your web routes here...

    Route::model('user', 'App\User');
    Route::model('publication', 'App\Publication');
    Route::model('activity', 'App\Activity');
    Route::model('comment', 'App\Comment');
    Route::model('association', 'App\Association');



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
        Route::resource('user', 'UserController');
        
        //Chat
        Route::post('sendmessage', 'ConversationController@sendMessage');
        Route::post('create_conversation', 'ConversationController@create');
        Route::resource('publication', 'Front\PublicationController');
        Route::post('/publication/{publication}/load', 'Front\PublicationController@load');
        Route::post('/publication/{publication}/updateAjax', 'Front\PublicationController@updateAjax');
        Route::post('/publication/{publication}/destroyAjax', 'Front\PublicationController@destroyAjax');
        Route::post('/publication/{publication}/signaleAjax', 'Front\PublicationController@signaleAjax');
        Route::post('/publication/loadAll', 'Front\PublicationController@loadAll');
        Route::resource('activity', 'Front\ActivityController');
        Route::post('/activity/{activity}/updateAjax', 'Front\ActivityController@updateAjax');
        Route::post('/activity/{activity}/destroyAjax', 'Front\ActivityController@destroyAjax');
        Route::post('/activity/{activity}/signaleAjax', 'Front\ActivityController@signaleAjax');
        Route::resource('comment', 'Front\CommentController');
        Route::resource('association', 'Front\AssociationController');

        Route::get('friends', ['as' => 'front.friends.show', 'uses' => 'Front\FriendsController@index']);
        Route::get('friends/destroy/{user}', ['as' => 'front.friends.destroy', 'uses' => 'Front\FriendsController@destroy']);
        Route::get('friends/add/{user}', ['as' => 'front.friends.add', 'uses' => 'Front\FriendsController@add']);
        Route::get('friends/cancel/{user}', ['as' => 'front.friends.cancel', 'uses' => 'Front\FriendsController@cancel']);
        Route::get('friends/accept/{user}', ['as' => 'front.friends.accept', 'uses' => 'Front\FriendsController@accept']);

        Route::get('search', ['as' => 'front.search.show', 'uses' => 'Front\SearchController@search']);


        });

        Route::get('uploads/{image}', function($image){

            //do so other checks here if you wish

            if(!File::exists( $image=storage_path("uploads/{$image}") )) abort(404);

            return Image::make($image)->response('jpg'); //will ensure a jpg is always returned
        });
    });
});
