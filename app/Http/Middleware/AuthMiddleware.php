<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Authenticate implements Middleware {

    protected $auth;
    
    public function handle($request, Closure $next)
    {
        // Check login
        if (Session::has('user')) {
            return $next($request);
        }
        return redirect()->route('user_login_page');
    }

}