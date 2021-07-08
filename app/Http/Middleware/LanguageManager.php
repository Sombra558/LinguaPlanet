<?php

namespace App\Http\Middleware;
use App;
use Closure;

class LanguageManager
{
    
    public function handle($request, Closure $next)
    {
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        }
          
        return $next($request);
    }
}
