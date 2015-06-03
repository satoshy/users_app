<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate implements Middleware {

    protected $auth;
    
    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            return $next($request);
        } else {
            return redirect('user/loginPage');
        }
        
    }

}