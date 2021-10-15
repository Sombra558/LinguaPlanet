<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Idioma\Idioma;
use App\Models\Membresia\Membresia;
use App\Models\Membresia\Plan;

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
                    $idioma->load(['membresias']);
           
                    return view('landing.cursos.show', compact('idioma','idiomas'));
                }else {
                    return view('errors.404');
                }
        }

        public function MembresiaShow($nombreURL){
            $idiomas=Idioma::get();
            
            $membresia = Membresia::where('nombreURL',$nombreURL)->first();
                if ($membresia) {
                    $membresia->load(['planes', 'idioma']);
                    
                    return view('landing.membresia.show', compact('membresia','idiomas'));
                }else {
                    return view('errors.404');
                }
        }

        public function payment($nombreURL){
            $idiomas=Idioma::get();
            $plan = Plan::where('nombreURL',$nombreURL)
                        ->with('membresia.idioma:id,diminutivo,idioma,src')
                        ->first();
                        
            if ($plan) {
                return view('landing.Comprar.Confirma', compact('plan','idiomas'));
            }else {
                return view('errors.404');
            }
        }
}
