<?php 
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\City;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Registrar;

class UserController extends Controller {

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(3);
        return view('user.index')->with('users', $users);
    }

    public function edit($id)
    {
        $user = User::find($id);

        if ($user === null) {
            exit("Not found user!");
        }
        return view('user.form')->with('user', $user);
    }

    public function loginPage()
    {
        return view('user.loginPage'); 
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'  => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        } else {

            if ( Auth::attempt($request->only('username', 'password'))) {
             return redirect('/user/index');
             //return redirect('/')->with('message', 'Logged in!');
            } else {
                return redirect()->back();
            }
        }

    }

    public function signupPage()
    {
        return view('user.form');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city'                  => 'min:3|max:30',
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
                'password' => Hash::make($request->input('password'))
            ]);

            $user = User::create($request->only( 'city', 'username', 'email', 'password'));

            return redirect()->route('users_all');
        }
    }

    public function logout()
    {
        Auth::logout();
        return $this->withSuccessMessage('Sign out Successful');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->city = $request->input('city');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = ($request->input('password'));
        $user->save();
        
        return redirect()->route('users_all');
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/user/index'); 
    }

    public function userSearch(Request $request)
    {
        $user = User::where('username', $request->input('username'))->find();
        return "$username";
    }

    public function keySearch(Request $request)
    {
        $keyword  = $request->input('city');
        $username = City::where('city', 'LIKE', '%'.$keyword.'%')->paginate();

        //return 
    }

}