<?php

namespace App\Http\Controllers\Padres;

use App\Http\Controllers\Controller;
use App\Models\Animals\Animal;
use App\Models\Idioma\Idioma;
use App\Models\Cursos\Curso;
use App\Models\Solicitudes\PlanUser;
use App\Models\Relaciones\PerfilPlan;
use App\Models\PerfilEstudiante\PerfilEstudianteUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PerfilEstudiante extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animals=Animal::get();
        return view('Padres.PerfilUser.create',compact('animals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'apodo' => ['required'],
            'f_nacimiento' => ['required'],
            'animal_id' => ['required'],
        ];
        $request->validate($rules);
        $perfil = PerfilEstudianteUser::create([
            'apodo' => $request['apodo'],
            'animal_id' => $request['animal_id'],
            'f_nacimiento' => $request['f_nacimiento'],
            'color' => $request['color'],
            'hobby' => $request['hobby'],
            'user_id' => Auth::user()->id,
        ]);
        return $perfil;
    }
    public function asignarplan(Request $request)
    {
        $rules = [
            'plan_user_id' => ['required'],
            'perfil_estudiante_user_id' => ['required'],
        ];
        $request->validate($rules);
        $validacion=PerfilPlan::where('plan_user_id',$request['plan_user_id'])->where('perfil_estudiante_user_id',$request['perfil_estudiante_user_id'])->first();
        if ($validacion!=null) {
            $err=collect([
                'codigo' => 'E26741',
                'message'=>'Ya esta Asignado a Este perfil',
            ]);
            return json_encode($err);
        }else{
            $plan=PlanUser::find($request['plan_user_id']);
      
                if ($plan->available!=0) {
                    $perfil = PerfilPlan::create([
                        'plan_user_id' => $request['plan_user_id'],
                        'perfil_estudiante_user_id' => $request['perfil_estudiante_user_id'],
                    ]);
                    $plan->available=$plan->available-1;
                    $plan->save();
                    return $perfil;
                }else{
                    $err=collect([
                        'codigo' => 'E26742',
                        'message'=>'No dispones de Capacidad para otro perfil',
                    ]);
                    return json_encode($err);
                }
        }
        
    }
    //Estudiante
    public function previewshow($id)
    {
        $perfil=PerfilEstudianteUser::find($id)->load(['animal']);
      
        return view('Estudiantes.PerfilUser.preview',compact('perfil'));
    }

    public function show($id)
    {
        $perfil=PerfilEstudianteUser::find($id)->load(['planes'=>function($q){
            return $q->with(['plan'=>function($k){
                return $k->with(['membresia'=>function($j){
                    return $j->with(['cursos','idioma']);
                }]);
            }]);
        },'animal']);
       
        return view('Estudiantes.PerfilUser.show',compact('perfil'));
    }

    public function aplication($id,$apodo,$nombreURL)
    {
        $idioma=Idioma::where('nombreURL',$nombreURL)->first();
        $cursos = collect();
        $perfil=PerfilEstudianteUser::find($id)->load(['planes'=>function($q){
            return $q->with(['plan'=>function($k){
                return $k->with(['membresia'=>function($j){
                    return $j->with(['cursos','idioma']);
                }]);
            }]);
        },'animal']);

        foreach ($perfil->planes as $plan) {
            if ($plan->plan->membresia->idioma_id===$idioma->id) {
                $cursostem=$plan->plan->membresia->cursos;
                foreach ($cursostem as $tem) {
                    $cursos->push($tem);
                }
            }
           
        }
        if ($cursos->count()>1) {
            return view('Estudiantes.Cursos.ListaDeCursos',compact('cursos','perfil','idioma'));
        }else if($cursos->count()===1){

            dd('individual');
        }else{
            dd('no tienes cursos en este idioma');
        }
        return view('Estudiantes.PerfilUser.show',compact('perfil'));
    }
    public function aplicationCurso($id,$apodo,$nombreURL,$curso_id)
    {
        $idioma=Idioma::where('nombreURL',$nombreURL)->first();
        $curso = Curso::find($curso_id);
        $perfil=PerfilEstudianteUser::find($id)->load(['planes'=>function($q){
            return $q->with(['plan'=>function($k){
                return $k->with(['membresia'=>function($j){
                    return $j->with(['cursos','idioma']);
                }]);
            }]);
        },'animal']);

        return view('Estudiantes.Cursos.show',compact('curso','perfil','idioma'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
