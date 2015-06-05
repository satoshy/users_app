<?php namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\User;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller 
{

    public function loginPage()
    {
        return view('user.login'); 
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account'  => 'required',
            'password' => 'required',
        ]);

        $account = $request->input('account');
        $user    = User::where('username', $account)->orWhere('email', $account)->first();

        if ($validator->fails() || $user === null) {
            return redirect()->back();
            
        } else {
            $accountColumn = filter_var($request->input('account'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';   
            $request->merge([
                $accountColumn => $request->input('account')
            ]);

            $attempt = Auth::attempt($request->only($accountColumn, 'password')); //$request->only('remember')
            //return response()->json([Auth::attempt($request->only($accountColumn, 'password'))]);
            if ( $attempt ) {
                return redirect('/user/index');
            } else {
                return redirect()->back();
            }
        }

    }

    public function signupPage()
    {
        return view('user.form');
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city'                  => 'min:1|max:30',
            'username'              => 'required|min:6|max:36|unique:users',
            'email'                 => 'required|email|unique:users|max:60',
            'password'              => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);

        if ($validator->fails()) 
        {
            return redirect()->back();
        } else {
            $request->merge([
                'password' => bcrypt($request->input('password'))
            ]);
            $id = $request->input('city');
            $city = City::where('id', $id)->first();

            $user = User::create([
                'city' => $city->name,
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password'))
            ]);
            $user->save();

            return redirect()->route('users_all');
        }
    }

    public function logout()
    {
        Auth::logout();
        return view('/welcome');
    }
}