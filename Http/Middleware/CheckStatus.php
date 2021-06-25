<?php

namespace Modules\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->check()):
        // if(auth()->check() && !empty(auth()->user()->role_id) && auth()->user()->status == 0):
          auth()->logout();
          
          session()->flash('warning', \Lang::get('core::general.banned'));
          return redirect()->route('epanel.login');

        endif;

        return $next($request);
    }
}
