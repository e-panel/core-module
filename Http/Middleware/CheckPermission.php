<?php

namespace Modules\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        if(auth()->check() && !empty(auth()->user()->role)):
            $admin = auth()->user();
            $permissions = json_decode($admin->role->permissions, true);
            if(!in_array($permission, $permissions)):
                return redirect()->route('epanel.index');
            endif;
        endif;

        return $next($request);
    }
}
