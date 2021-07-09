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
    public function cursos()
    {
        $idiomas=Idioma::get();

        return view('landing.cursos.cursos',compact('idiomas'));
    }
        public function CursosShow($nombreURL){
            $idiomas=Idioma::get();
            $idioma = Idioma::where('nombreURL',$nombreURL)->first();
                if ($idioma) {
                   
                    return view('Landing.cursos.show', compact('idioma','idiomas'));
                }else {
                    return view('errors.404');
                }
        }
}
