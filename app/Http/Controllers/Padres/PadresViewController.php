<?php

namespace App\Http\Controllers\Padres;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PadresViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $user=Auth::user()->load(['perfiles'=>function($q)
        {
            return $q->with('animal');
        }]);
        return view('Padres.Home.home',compact('user'));
    }

    public function detallespadre()
    {
        $user=Auth::user()->load(['perfiles'=>function($q)
        {
            return $q->with('animal');
        }]);
        return view('Padres.Detalles.index',compact('user'));
    }


    
}
