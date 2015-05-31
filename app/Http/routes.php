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

//$app->get('/', function() use ($app) {
//    return $app->welcome();
//});
$app->get('/', function() {
    return view('welcome');
});

$app->get('users', ['uses' => 'App\Http\Controllers\UserController@index']);

$app->group(['prefix' => 'user'], function($app)
{
	$app->get('show/{id}', ['uses' => 'App\Http\Controllers\UserController@show', 'as' => 'user_show']);
	$app->get('update/{id}', ['uses' => 'App\Http\Controllers\UserController@show', 'as' => 'user_update']);
	$app->get('login', ['uses' => 'App\Http\Controllers\UserController@login', 'as' => 'user_login_page']);
	$app->post('login', ['uses' => 'App\Http\Controllers\UserController@login', 'as' => 'user_login_login']);
	$app->get('signup', ['uses' => 'App\Http\Controllers\UserController@signup', 'as' => 'user_signup_page']);
	$app->post('signup', ['uses' => 'App\Http\Controllers\UserController@signup', 'as' => 'user_signup_signup']);
	$app->delete('logout', ['uses' => 'App\Http\Controllers\UserController@logout', 'as' => 'user_login_delete']);
});
