<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class isAdmin
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
        if(Auth::user() && Auth::user()->admin == 1)
        {
            return $next($request);     
        }
        // elseif ($this->Auth->getUser()->admin !==1) {
        //     rerutn error('your not allowed on this page');
        // }
            return redirect('/allpost');
   }
}

