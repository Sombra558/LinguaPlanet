<?php

namespace App\Http\Controllers\Padres;

use App\Http\Controllers\Controller;
use App\Models\Animals\Animal;
use App\Models\Animals\Avatar;
use App\Models\Idioma\Idioma;
use App\Models\Cursos\Curso;
use App\Models\Solicitudes\PlanUser;
use App\Models\Relaciones\PerfilPlan;
use App\Models\PerfilEstudiante\PerfilEstudianteUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
        $animal=Animal::find($request['animal_id']);
        $perfil = PerfilEstudianteUser::create([
            'apodo' => $request['apodo'],
            'f_nacimiento' => $request['f_nacimiento'],
            'color' => $request['color'],
            'hobby' => $request['hobby'],
            'user_id' => Auth::user()->id,
        ]);


        $avatar = Avatar::create([
            'animal_id' => $animal->id,
            'cuerpo'  => $animal->cuerpo,
            'cara'  => $animal->cara,
        ]);

        $perfil->avatar_id=$avatar->id;
        $perfil->save();
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
        $perfil = PerfilEstudianteUser::find($id)->load(['planes'=>function($q){
                    return $q->with(['plan'=>function($k){
                        return $k->with(['membresia'=>function($j){
                            return $j->with(['cursos','idioma']);
                        }]);
                    }]);
                  },'avatar']);
      
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
        },'avatar']);

        return view('Estudiantes.PerfilUser.show',compact('perfil'));
    }

    public function premios($id)
    {
        $perfil=PerfilEstudianteUser::find($id)->load(['avatar'=>function($q){
            return $q->with(['animal'=>function($j){
                return $j->with(['accesorios']);
            }]);
        }]);
        $animal=$perfil->avatar->animal_id;
      
        $perfil->load(['premios'=>function($k) use($animal){
            return $k->where('animal_id',$animal);
        }]);

        return view('Estudiantes.PerfilUser.premios',compact('perfil'));
    }

    public function armario($id)
    {
        $perfil=PerfilEstudianteUser::find($id)->load(['avatar'=>function($q){
            return $q->with(['animal'=>function($j){
                return $j->with(['accesorios']);
            }]);
        }]);
        $animal=$perfil->avatar->animal_id;
      
        $perfil->load(['premios'=>function($k) use($animal){
            return $k->where('animal_id',$animal);
        }]);
     
      
        return view('Estudiantes.PerfilUser.armario',compact('perfil'));
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
        },'avatar']);

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
        $now = Carbon::now();
        //$hoy->addDay(6);
        //dd($hoy);


        
        $curso = Curso::find($curso_id)->load(['modulos']);
        $perfil=PerfilEstudianteUser::find($id)->load(['planes'=>function($q){
            return $q->with(['plan'=>function($k){
                return $k->with(['membresia'=>function($j){
                    return $j->with(['cursos','idioma']);
                }]);
            }]);
        },'avatar']);

        $pasadas = array();
		$encurso = array();
		$futuras = array();
        foreach($curso->modulos as $key2 => $modulo){
            $i=0;
			$j=0;
			$k=0;
            $finaliza = new Carbon($modulo->inicia);
            $finaliza->addMonth();
            $inicia = new Carbon($modulo->inicia);
            if( $finaliza->isBefore($now)){
                $pasadas[$i] = $modulo; 
                $i++;
               
            }elseif($inicia->isAfter($now)){
                $futuras[$k] = $modulo;
				$k++;
         
            }elseif($now->isAfter($inicia) && $now->isBefore($finaliza)){
                $encurso[$j] = $modulo;
				$j++;
            }
        }
        $contenidos = collect([
			'enCurso' => $encurso,
			'guardadas' => $pasadas,
			'porTransmitir' => $futuras
		  ]);
        
        return view('Estudiantes.Cursos.show',compact('curso','perfil','idioma','contenidos'));    
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

   public function guardaravatar(Request $request, $id)
    {
        $articulos=json_decode($request['data']);

        
        $avatar=Avatar::find($id);
        if ($avatar->gorro!=null) {
            $valid=true;
            foreach ($articulos as $art) {
                if ($art->tipo==='gorro') {
                    $valid=false;
                }
            }

            if ($valid===true) {
                $avatar->gorro=null;
            }
        }
        if ($avatar->camisa!=null) {
            $valid=true;
            foreach ($articulos as $art) {
                if ($art->tipo==='camisa') {
                    $valid=false;
                }
            }

            if ($valid===true) {
                $avatar->camisa=null;
            }
        }
        if ($avatar->botas!=null) {
            $valid=true;
            foreach ($articulos as $art) {
                if ($art->tipo==='botas') {
                    $valid=false;
                }
            }

            if ($valid===true) {
                $avatar->botas=null;
            }
        }
        if ($avatar->bufanda!=null) {
            $valid=true;
            foreach ($articulos as $art) {
                if ($art->tipo==='bufanda') {
                    $valid=false;
                }
            }

            if ($valid===true) {
                $avatar->bufanda=null;
            }
        }
        if ($avatar->yoyo!=null) {
            $valid=true;
            foreach ($articulos as $art) {
                if ($art->tipo==='yoyo') {
                    $valid=false;
                }
            }

            if ($valid===true) {
                $avatar->yoyo=null;
            }
        }
        if ($avatar->guitarra!=null) {
            $valid=true;
            foreach ($articulos as $art) {
                if ($art->tipo==='guitarra') {
                    $valid=false;
                }
            }

            if ($valid===true) {
                $avatar->guitarra=null;
            }
        }
        if ($avatar->gafas!=null) {
            $valid=true;
            foreach ($articulos as $art) {
                if ($art->tipo==='gafas') {
                    $valid=false;
                }
            }

            if ($valid===true) {
                $avatar->gafas=null;
            }
        }

        
        foreach ($articulos as $art) {
            $temp=collect([
                'id'=>$art->id,
                'accesorio'=>$art->accesorio,
                'corde_x'=>$art->corde_x,
                'corde_y'=>$art->corde_y,
                'tipo'=>$art->tipo,
                'color'=>null]);
            
            switch ($art->tipo) {
                case 'gorro':
                    $avatar->gorro=json_encode($temp);
                break;
                case 'yoyo':
                    $avatar->yoyo=json_encode($temp);
                break;
                case 'camisa':
                    $avatar->camisa=json_encode($temp);
                break;
                case 'gafas':
                    $avatar->gafas=json_encode($temp);
                break;
                case 'guitarra':
                    $avatar->guitarra=json_encode($temp);
                break;
                case 'botas':
                    $avatar->botas=json_encode($temp);
                break;
                default:
                    # code...
                    break;
            }
        }
        $avatar->save();
       
      
    }
    public function destroy($id)
    {
        //
    }
}
