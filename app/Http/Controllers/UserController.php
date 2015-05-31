<?php namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller {

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(4);
        return view('user.index')->with('users', $users);
    }

    public function login(Request $request)
    {
        if ($request->method() == Request::METHOD_POST) {
            $validator = Validator::make($request->all(), [
                'account'  => 'required',
                'password' => 'required',
            ]);
            
            if ($validator->fails()) {
                return redirect()->route('user_login_page');
            } else {
                $account = $request->input('account');
                $user    = User::where('username', $account)->orWhere('email', $account)->find(1);

                $user = User::select('SELECT * FROM users where username = ?', [$request->input('username')]);
                
                if ($user === null) {

                }
                $accountColumn = filter_var($request->input('account'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
                
                if (Auth::attempt($request->only($accountColumn, 'password')) === false) {}

            if (!empty($user)) {
                if ( Hash::check($request->input('password'), $user->password) ) {
                    Session::flush();
                    Session::regenerate();
                    Session::put('user', $user[0]);
                    return redirect('/');
                }
            }
            }

        } else {
            return view('user.login');
        }
        
    }

    public function signup(Request $request)
    {
        if ($request->method() == Request::METHOD_POST) {
            $validator = Validator::make($request->all(), [
                'city'                  => 'max:30',
                'username'              => 'required|min:6|max:36|unique:users',
                'email'                 => 'required|email|unique:users|max:60',
                'password'              => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8'
            ]);

            if ($validator->fails()) {
                return redirect()->route('user_signup_page');
            } else {
                $user = User::create($request->only('firstname', 'lastname', 'city', 
                                                    'username', 'email', 'password'));

                return redirect()->route('user_login_page');
            }
        } else {
            return view('user.signup');
        } 
    }

    public function update(Request $request)
    {
        $this->validate($req, [
            'firstname'             => 'min:5',
            'lastname'              => 'min:5',
            'password' => 'required|min:8',
        ]);
        $user = DB::update(
            'update users set password = ? where id = ?',
            [Hash::make($req->input('password')), Session::get('user')->id]
        );
        return redirect()->route('user_me_show');
    }

    public function logout()
    {
        //Session::flush();
        //Session::regenerate();
        Auth::logout();
        return $this->withSuccessMessage('Sign out Successful');
        //return redirect('/');

    }

    public function edit()
    {

    }
    
    public function destroy()
    {

    }

}