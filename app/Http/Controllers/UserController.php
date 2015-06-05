<?php namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\User;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller 
{

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
        $city    = City::where('id', $request->input('city'))->find(1);

        $user->city = $city->city;
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
        $username = $request->input('username');
        $user = User::where('username', '=', $username)->first();
        if ($user === null) {
            return response()->json(['Свободно']);
        }
        return response()->json(['Занято']);
    }

    public function findcity(Request $request)
    {
        $cityname = $request->input('city');
        $city = City::where('name', 'LIKE', $cityname.'%')->first();
        if ($city === null) {
            return response()->json([['Nothin found.']]);
        }
        return response()->json([['id' => $city->id, 'name' => $city->name]]);
    }
}