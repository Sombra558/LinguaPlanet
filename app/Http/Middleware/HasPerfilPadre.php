<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\PerfilEstudiante\PerfilEstudianteUser;
class HasPerfilPadre
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
        $user = \Auth::user();
        $perfilId = $request->route()->parameters['id'];
        $perfil = PerfilEstudianteUser::find($perfilId);
        
        if ($perfil->user_id === $user->id) {
            return $next($request);
        }else{
            return response(view('errors.error'), 403);
        }
    }
}
