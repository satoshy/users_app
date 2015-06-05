<?php namespace App\Http\Controllers;

use Auth;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller 
{
    public function cityPage()
    {
        return view('city.form');
    }

    public function create(Request $request)
    {
        $city = City::create($request->only( 'name'));
        return redirect()->route('users_all');
    }
}