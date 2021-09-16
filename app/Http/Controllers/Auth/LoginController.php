<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Idioma\Idioma;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;


   
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        $idiomas=Idioma::get();
        return view('auth.login',compact('idiomas'));
    }
    public function logout(Request $request)

    {
    
       $this->guard()->logout();
    
       
    
       $request->session()->flush();
    
    
       $request->session()->regenerate();
    
    
    
       return redirect('/login');
    
    }
}
