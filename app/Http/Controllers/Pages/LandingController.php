<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Idioma\Idioma;

class LandingController extends Controller
{
    public function inicio()
    {
        $idiomas=Idioma::get();

        return view('welcome',compact('idiomas'));
    }
}