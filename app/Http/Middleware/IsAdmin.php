<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
	    if(Auth::check()) {
		    $role_id = Auth::user()->role->id; // get user id

		    if($role_id == 1){
			    return $next($request);
		    }
	    }

	    abort(403);
    }
}
