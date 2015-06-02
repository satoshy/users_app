<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

//Guest
$app->get('/', function() {
    return view('welcome');
});

$app->get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

$app->group(['prefix' => '/user','namespace' => 'App\Http\Controllers'], function($app)
{
	$app->get('/index',           ['uses' => 'UserController@index',   'as' => 'users_all']);
	$app->get('/edit/{id}',       ['uses' => 'UserController@edit',    'as' => 'user_edit']);
	$app->get('/create',          ['uses' => 'UserController@create',  'as' => 'user_create']);
	$app->post('/store',          ['uses' => 'UserController@store',   'as' => 'user_store']);
	$app->post('/update/{id}',    ['uses' => 'UserController@update',  'as' => 'user_update']);
	$app->get('/delete/{id}',     ['uses' => 'UserController@destroy', 'as' => 'user_delete']);

	$app->get('/loginPage',       ['uses' => 'UserController@loginPage',   'as' => 'user_login_page']);
	$app->post('/login',          ['uses' => 'UserController@login',       'as' => 'user_login']);
	$app->get('/signup',          ['uses' => 'UserController@signupPage',  'as' => 'user_signup_page']);

	$app->get('/search',          ['uses' => 'UserController@userSearch',   'as' => 'user_search']);
});

