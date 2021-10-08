<?php

namespace App\Http\Middleware;

use Closure;

class StudenAndOthersRole
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
        $user_roles = auth()->user()->roles;

        if (isset($user_roles[0])) 
        {
            if ($user_roles[0]->name === 'estudiante') {
                if ($user_roles->count() > 1) {
                    return $next($request);
                } else {
                   return back();
                }
            } else {
                return $next($request);
            }
        }
    }
}
