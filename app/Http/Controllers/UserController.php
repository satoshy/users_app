<?php namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Response;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    /**
     * Show the profile for the given users.
     */
    public function index()
    {
        $users = User::all();
        return view('user.index')->with('users', $users);
    }

    /**
    *The login from registration users
    */

    public function login()
    {
        return view('user.login');//->with('users', $users);
    }

    /**
    * The signup new user
    */
    public function signup()
    {
        return view('user.signup');//->with('users', $users);
    }

    /**
    * The logout user
    */

    public function logout()
    {

    }

}