<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Models\PerfilEstudiante\PerfilEstudianteUser;
use App\Models\Cursos\Curso;
use App\Models\Relaciones\MembresiaCurso;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function home()
    {
        $usuarios=User::all()->count();
        $now = Carbon::now();
        $perfiles=PerfilEstudianteUser::all()->count();
        $cursosActivos=collect();
        $todosloscursos=Curso::get()->load(['modulos'=>function($k){
            return $k->with(['clases']);
        }]);
        foreach($todosloscursos as $key => $curso){
                    $objetoTemp=collect();
                    foreach($curso->modulos as $key2 => $modulo){
                        $j=0;
                        $finaliza = new Carbon($modulo->finaliza);
                        $inicia = new Carbon($modulo->inicia);
                            if($now->isAfter($inicia) && $now->isBefore($finaliza)){
                                foreach($modulo->clases as $key3 => $clase){
                                    $finalizaclase = new Carbon($clase->finaliza);
                                    $iniciaclase = new Carbon($clase->inicia);
                                    if($now->isAfter($iniciaclase) && $now->isBefore($finalizaclase)){
                                        $objetoTemp=collect([
                                            "Curso"=>$curso,
                                            "Semana"=>$clase,
                                        ]);
                                        $cursosActivos->push($objetoTemp);
                                    }
                                }
                            }
                    }
         }  
        return view('Administrador.Home.home', compact('usuarios','cursosActivos','perfiles'));
    }

    public function cursos()
    {
        
        $cursos=Curso::get()->load(['modulos'=>function($k){
            return $k->with(['clases']);
        }]);
        return view('Administrador.Cursos.cursos', compact('cursos'));
    }
    public function relacioncursomember(Request $request)
    {
       $relacion=MembresiaCurso::create([
            'curso_id' => $request->curso_id,
            'membresia_id' => $request->membresia_id,
        ]);
        return $relacion;
       
    }
    public function relaciondestroy($id)
    {
        MembresiaCurso::destroy($id);
    }
   
}
