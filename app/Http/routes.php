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
/*
//Home page
*/
$app->get('/', function() {
    return view('welcome');
});

$app->group(['prefix' => '/auth', 'namespace' => 'App\Http\Controllers'], function($app)
{
	$app->post('/login',      ['uses' => 'AuthController@login',       'as' => 'login']);
	$app->get('/loginPage',   ['uses' => 'AuthController@loginPage',   'as' => 'login_page']);
	$app->post('/signup',     ['uses' => 'AuthController@signup',      'as' => 'signup']);
	$app->get('/signupPage',  ['uses' => 'AuthController@signupPage',  'as' => 'signup_page']);
	$app->get('/logout',      ['uses' => 'AuthController@logout',      'as' => 'logout']);
});



$app->group(['prefix' => '/user', 'namespace' => 'App\Http\Controllers'], function($app)
{
	$app->get('/index',        ['uses' => 'UserController@index',      'as' => 'users_all']);
	$app->get('/edit/{id}',    ['uses' => 'UserController@edit',       'as' => 'user_edit']);
	$app->post('/update/{id}', ['uses' => 'UserController@update',     'as' => 'user_update']);
	$app->get('/delete/{id}',  ['uses' => 'UserController@destroy',    'as' => 'user_delete']);

	$app->get('/findname',     ['uses' => 'UserController@findname',   'as' => 'findname']);
	$app->get('/findcity',     ['uses' => 'UserController@findcity',   'as' => 'findcity']);
});

$app->group(['prefix' => '/city', 'namespace' => 'App\Http\Controllers'], function($app)
{
	$app->get('/new',          ['uses' => 'CityController@cityPage',   'as' => 'create_page']);
	$app->post('/create',      ['uses' => 'CityController@create',     'as' => 'create']);	
});
