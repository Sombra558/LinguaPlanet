<?php

namespace App\Http\Controllers\Padres;

use App\Http\Controllers\Controller;
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

        return view('Padres.Home.home');
    }
}
