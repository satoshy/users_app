<?php namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\User;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(6);
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

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->city = $request->input('city');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        
        return redirect()->route('users_all');
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/user/index'); 
    }

    public function findname(Request $request)
    {
        $user = User::where('username', $request->input('username'))->find(1);
        if ($user === null) {
            return response()->json(['success' => false]);
        }
        return response()->json(['success' => true]);
    }

    public function findcity(Request $request)
    {
        $city  = $request->input('city');
        $findcity = City::where('city', 'LIKE', '%'.$city.'%')->paginate();
    }
}