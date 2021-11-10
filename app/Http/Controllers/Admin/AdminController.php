<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Models\PerfilEstudiante\PerfilEstudianteUser;
use App\Models\Cursos\Curso;
use App\Models\Cursos\Cupon;
use App\Models\Idioma\Idioma;
use App\Models\Membresia\Membresia;
use App\Models\Relaciones\MembresiaCurso;
use App\Models\Solicitudes\PlanUser;
use App\Models\Relaciones\CuponMembresia;
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
    public function cupones()
    {
        
        $cupones=Cupon::get()->load(['usados']);
        return view('Administrador.Cupones.cupones', compact('cupones'));
    }
    public function relacioncuponmember(Request $request)
    {
       $relacion=CuponMembresia::create([
            'cupon_id' => $request->cupon_id,
            'membresia_id' => $request->membresia_id,
        ]);
        return $relacion;
       
    }
    public function relacioncupondestroy($id)
    {
        CuponMembresia::destroy($id);
    }

    public function membresias()
    {
        $membresias=Membresia::get()->load(['idiomas']);
        $idiomas=Idioma::get();
        return view('Administrador.Membresias.membresia', compact('membresias','idiomas'));
    }

    public function usuarios()
    {
        $membresias=Membresia::get()->load(['idiomas','planes']);
        $usuarios=User::get();
        $inscripciones=PlanUser::get()->load(['user','plan']);
       
        return view('Administrador.Usuarios.usuarios', compact('membresias','usuarios','inscripciones'));
    }

    public function configuraciones()
    {
        $membresias=Membresia::get()->load(['idiomas','planes']);
        return view('Administrador.Configuraciones.configuraciones', compact('membresias'));
    }


    public function reportes()
    {
        
       
        return view('Administrador.Reportes.reportes');
    }

    public function reportesPadre()
    {
        $usuarios=User::get()->load('perfiles');
       
        return view('Administrador.Reportes.Secciones.padres',compact('usuarios'));
    }
    public function reportesAlumnos()
    {
        $perfiles=PerfilEstudianteUser::get()->load(['padre','planes']);
        $cursos=Curso::get();
       
        return view('Administrador.Reportes.Secciones.alumnos',compact('perfiles','cursos'));
    }
    public function reportesCalificaciones()
    {
        
       
        return view('Administrador.Reportes.Secciones.calificaciones');
    }
    public function reportesVentas()
    {
        $ventas=PlanUser::get()->load(['plan'=>function($p){
            return $p->with('membresia');
        },'user']);
       $membresias=Membresia::get();
        return view('Administrador.Reportes.Secciones.ventas',compact('ventas','membresias'));
    }
    public function reportesCupones()
    {
        $cupones=Cupon::get()->load(['usados']);
        $membresias=Membresia::get();
        return view('Administrador.Reportes.Secciones.cupones',compact('cupones','membresias'));
    }
}
