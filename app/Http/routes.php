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

$app->get('/', function() use ($app) {
    return $app->welcome();
});



$app->group(['prefix' => 'users'], function($app)
{
	$app->get('/', ['uses' => 'App\Http\Controllers\UserController@index']);
	$app->get('login', ['uses' => 'App\Http\Controllers\UserController@login', 'as' => 'user_login']);
	$app->get('signup', ['uses' => 'App\Http\Controllers\UserController@signup', 'as' => 'user_signup']);
	$app->delete('logout', ['uses' => 'App\Http\Controllers\UserController@logout', 'as' => 'user_login_delete']);
});
