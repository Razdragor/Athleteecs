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
Route::auth();

//Social Login
Route::get('/login/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('/login/callback/{provider}', 'SocialAuthController@callback');
