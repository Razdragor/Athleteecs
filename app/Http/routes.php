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

Route::get('/', function () {
    return view('auth.connect');
});
// Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/login', ['as' => 'login', 'uses' => 'SocialAuthController@login']);
Route::auth();

//Social Login
Route::get('/login/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('/login/callback/{provider}', 'SocialAuthController@callback');

Route::get('/inscription', ['as' => 'register', 'uses' => 'SocialAuthController@register']);
