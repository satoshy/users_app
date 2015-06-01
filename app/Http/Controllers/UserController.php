<?php 
namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(4);
        return view('user.index')->with('users', $users);
    }

    public function login(Request $request)
    {
        return view('user.login'); 
    }

    public function create()
    {
        return view('user.form'); 
    }

    public function edit($id)
    {
        $user = User::find($id);

        if ($user === null) {
            exit("Not found user!");
        }
        return view('user.form')->with('user', $user);
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
            $user = User::create($request->only( 'city', 'username', 'email', 'password'));

            return redirect()->route('users_all');
        }
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

    public function logout()
    {
        //Session::flush();
        //Session::regenerate();
        Auth::logout();
        return $this->withSuccessMessage('Sign out Successful');
        //return redirect('/');

    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/user/index'); 
    }

}