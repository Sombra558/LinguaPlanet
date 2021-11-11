<?php

namespace App\Http\Controllers\Padres;
use App\Http\Controllers\Controller;
use App\Models\Animals\Animal;
use App\Models\Animals\Avatar;
use App\Models\Idioma\Idioma;
use App\Models\Cursos\Curso;
use App\Models\Cursos\Actividad;
use App\Models\Solicitudes\PlanUser;
use App\Models\Relaciones\PerfilPlan;
use App\Models\Relaciones\ActividadUser;
use App\Models\Relaciones\ProgresoCursoUser;
use App\Models\Relaciones\PerfilPremios;
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
        $user = Auth::user();
        return view('Padres.PerfilUser.create',compact('animals','user'));
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
                            return $j->with(['cursos','idiomas']);
                        }]);
                    }]);
                  },'avatar']);
                  $user=Auth::user()->load(['perfiles'=>function($q)
                  {
                      return $q->with('avatar');
                  }]);
      
        return view('Estudiantes.PerfilUser.preview',compact('perfil','user'));
    }

    public function show($id)
    {
   
        $perfil=PerfilEstudianteUser::find($id)->load(['planes'=>function($q){
            return $q->with(['plan'=>function($k){
                return $k->with(['membresia'=>function($j){
                    return $j->with(['cursos','idiomas']);
                }]);
            }]);
        },'avatar']);
        $user=Auth::user()->load(['perfiles'=>function($q)
        {
            return $q->with('avatar');
        }]);

        return view('Estudiantes.PerfilUser.show',compact('perfil','user'));
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
        $user=Auth::user()->load(['perfiles'=>function($q)
        {
            return $q->with('avatar');
        }]);

        return view('Estudiantes.PerfilUser.premios',compact('perfil','user'));
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
     
        $user=Auth::user()->load(['perfiles'=>function($q)
        {
            return $q->with('avatar');
        }]);
        return view('Estudiantes.PerfilUser.armario',compact('perfil','user'));
    }

    public function aplication($id,$nombreURL)
    {
        
        $idioma=Idioma::where('diminutivo',$nombreURL)->first();
        $user=Auth::user()->load(['perfiles'=>function($q)
        {
            return $q->with('avatar');
        }]);
        $cursos = collect();
        $perfil=PerfilEstudianteUser::find($id)->load(['planes'=>function($q){
            return $q->with(['plan'=>function($k){
                return $k->with(['membresia'=>function($j){
                    return $j->with(['cursos','idiomas']);
                }]);
            }]);
        },'avatar','misactividades']);

        foreach ($perfil->planes as $plan) {
          
            foreach ($plan->plan->membresia->idiomas as $idi) {
                if ($idi->id===$idioma->id) {
                    $cursostem=$plan->plan->membresia->cursos;
                    foreach ($cursostem as $tem) {
                        if ($tem->idioma_id===$idioma->id) {
                            $cursos->push($tem);
                        }
                        
                    }
                }

            }
        }
        if ($cursos->count()>1) {
            return view('Estudiantes.Cursos.ListaDeCursos',compact('cursos','perfil','idioma','user'));
        }else if($cursos->count()===1){
            $now = Carbon::now();
            $curso = Curso::find($cursos[0]->id)->load(['modulos'=>function($k){
                return $k->with(['clases'=>function($p){
                    return $p->with(['actividades','premioClase'=>function($a){
                        return $a->with(['accesorio']);
                    }]);
                }]);
            },'idioma']);
            
            $pasadas = array();
            $encurso = array();
            $futuras = array();
            $semanaactiva = array();
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
            if (count($encurso)>0) {
                foreach($encurso[0]->clases as $key2 => $clase){
                    $q=0;
                    
                    $finaliza = new Carbon($clase->finaliza);
                 
                    $inicia = new Carbon($clase->inicia);
                    if($now->isAfter($inicia) && $now->isBefore($finaliza)){
                        $semanaactiva[$q] = $clase;
                        $q++;
                    }
                }
            }
          
            $contenidos = collect([
                'enCurso' => $semanaactiva,
                'guardadas' => $pasadas,
                'porTransmitir' => $futuras
              ]);
            
            return view('Estudiantes.Cursos.show',compact('curso','perfil','idioma','contenidos','user'));
        }else{
            dd('no tienes cursos en este idioma');
        }
        return view('Estudiantes.PerfilUser.show',compact('perfil','user'));
    }

    public function aplicationCurso($id,$nombreURL,$curso_id)
    {
    
        $idioma=Idioma::where('diminutivo',$nombreURL)->first();
        $now = Carbon::now();
        $user=Auth::user()->load(['perfiles'=>function($q)
        {
            return $q->with('avatar');
        }]);
        $curso = Curso::find($curso_id)->load(['modulos'=>function($k){
            return $k->with(['clases'=>function($p){
                return $p->with(['actividades','premioClase'=>function($a){
                    return $a->with(['accesorio']);
                }]);
            }]);
        },]);
        $perfil=PerfilEstudianteUser::find($id)->load(['planes'=>function($q){
            return $q->with(['plan'=>function($k){
                return $k->with(['membresia'=>function($j){
                    return $j->with(['cursos','idiomas']);
                }]);
            }]);
        },'avatar','misactividades']);

        $pasadas = array();
		$encurso = array();
		$futuras = array();
        $semanaactiva = array();
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
        if (count($encurso)>0) {
            foreach($encurso[0]->clases as $key2 => $clase){
                $q=0;
                
                $finaliza = new Carbon($clase->finaliza);
             
                $inicia = new Carbon($clase->inicia);
                if($now->isAfter($inicia) && $now->isBefore($finaliza)){
                    $semanaactiva[$q] = $clase;
                    $q++;
                }
            }
        }
      
        $contenidos = collect([
			'enCurso' => $semanaactiva,
			'guardadas' => $pasadas,
			'porTransmitir' => $futuras
		  ]);
        
        return view('Estudiantes.Cursos.show',compact('curso','perfil','idioma','contenidos','user'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $perfil=PerfilEstudianteUser::find($id)->load(['avatar'=>function($q){
            return $q->with(['animal']);
        }]);
        $animals=Animal::get();
        return view('Padres.PerfilUser.edit',compact('perfil','animals','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateperfil(Request $request, $id)
    {
        $perfil=PerfilEstudianteUser::find($id)->load(['avatar']);
        $perfil->apodo=$request['apodo'];
        $perfil->hobby=$request['hobby'];
        $perfil->f_nacimiento=$request['f_nacimiento'];
        $perfil->color=$request['color'];
        $perfil->save();

        $avatar=$perfil->avatar;
        $animal=Animal::find($request['animal_id']);
        if ($avatar->animal_id!=$animal->id) {
            $avatar->animal_id=$animal->id;
            $avatar->cara=$animal->cara;
            $avatar->cuerpo=$animal->cuerpo;
            $avatar->gorro=null;
            $avatar->botas=null;
            $avatar->gafas=null;
            $avatar->camisa=null;
            $avatar->bufanda=null;
            $avatar->guitarra=null;
            $avatar->yoyo=null;
            $avatar->save();
        }
        
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
                'color'=>$art->color
            ]);
            
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
                case 'bufanda':
                    $avatar->bufanda=json_encode($temp);
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
    public function veractividad($id,$nombreURL,$curso_id,$clase_id,$actividad_id){
        $actividad=Actividad::find($actividad_id);
        $curso=Curso::find($curso_id);
        
        $perfil=PerfilEstudianteUser::find($id)->load(['planes'=>function($q){
            return $q->with(['plan'=>function($k){
                return $k->with(['membresia'=>function($j){
                    return $j->with(['cursos','idiomas']);
                }]);
            }]);
        },'avatar']);

            return view('Estudiantes.Actividades.show',compact('perfil','actividad','curso'));
    
        
    }
 
    public function actividadrealizada($id,$curso_id,$clase_id,$actividad_id){
    
        $actividadus=ActividadUser::where('actividad_id',$actividad_id)->where('perfil_id',$id)->first();
     
        $countmisact=0;
        $actividadesCurso=collect();
        $curs=Curso::find($curso_id)->load(['modulos'=>function($j){
            return $j->with(['clases'=>function($j){
                return $j->with(['actividades']);
            }]);
        }]);
       

        foreach ($curs->modulos as $modulo) {
            foreach ($modulo->clases as $clase) {
                foreach ($clase->actividades as $actividad) {
                    $actividadesCurso->push($actividad);
                }
             }
        }
    
     
        if ($actividadus===null) {
            $actividadus = ActividadUser::create([
                'actividad_id' => $actividad_id,
                'perfil_id' => $id,
                'estado' => 1,
            ]);
       
            $progresocurso = ProgresoCursoUser::where('curso_id',$curso_id)->where('perfil_id',$id)->first();
            if ($progresocurso===null) {
                $progresocurso = ProgresoCursoUser::create([
                    'progreso' => 1/count($actividadesCurso),
                    'curso_id' => $curso_id,
                    'perfil_id' => $id,
                ]);
              
            }else{
                $perfil=PerfilEstudianteUser::find($id)->load(['misactividades']);
                foreach ($perfil->misactividades as $act) {
                    foreach ($actividadesCurso as $act2) {
                        if ($act->id===$act2->id) {
                            $countmisact++;
                        }
                     }
                }
               $progresocurso->progreso=$countmisact/count($actividadesCurso);
               $progresocurso->save();
            }


            return $actividadus;
        }else{
            $actividadus->estado=1;
            $actividadus->save();
        }
    }
    public function juegorealizado($id, $curso_id, $actividad_id,$valor){
        $actividadus=ActividadUser::where('actividad_id',$actividad_id)->where('perfil_id',$id)->first();
        $laactividad=Actividad::find($actividad_id);
        $countmisact=0;
        $actividadesCurso=collect();
        $curs=Curso::find($curso_id)->load(['modulos'=>function($j){
            return $j->with(['clases'=>function($j){
                return $j->with(['actividades']);
            }]);
        }]);
        foreach ($curs->modulos as $modulo) {
            foreach ($modulo->clases as $clase) {
                foreach ($clase->actividades as $actividad) {
                    $actividadesCurso->push($actividad);
                }
             }
        }
        if ($actividadus===null) {
            $calificacion=null;
            switch ($laactividad->tipo) {
                case 'Mochila':
                    $calificacion= 9/$valor*10;
                    break;
                case 'Rompecabeza':
                    $calificacion= 9/$valor*10;
                    break;
                case 'Memorama':
                    $calificacion= 4/$valor*10;
                    break;
                case 'Silueta':
                    $calificacion= 7/$valor*10;
                    break;
                case 'Simon Dice':
                    $calificacion= 9/$valor*10;
                    break;
                default:
                    $calificacion=null;
                    break;
            }
            $actividadus = ActividadUser::create([
                'actividad_id' => $actividad_id,
                'perfil_id' => $id,
                'estado' => 1,
                'valor' => $valor,
                'calificacion' => $calificacion,
            ]);
            $progresocurso = ProgresoCursoUser::where('curso_id',$curso_id)->where('perfil_id',$id)->first();
            if ($progresocurso===null) {
                $progresocurso = ProgresoCursoUser::create([
                    'progreso' => 1/count($actividadesCurso),
                    'curso_id' => $curso_id,
                    'perfil_id' => $id,
                ]); 
            }else{
                $perfil=PerfilEstudianteUser::find($id)->load(['misactividades']);
                foreach ($perfil->misactividades as $act) {
                    foreach ($actividadesCurso as $act2) {
                        if ($act->id===$act2->id) {
                            $countmisact++;
                        }
                     }
                }
               $progresocurso->progreso=$countmisact/count($actividadesCurso);
               $progresocurso->save();
            }
            return $actividadus;
        }else{
            $actividadus->estado=1;
            $actividadus->save();
        }
    }
    public function guardarpremio(Request $request, $id, $clase_id){
        $perfil=PerfilEstudianteUser::find($id)->load(['premios']);
  
        $ganados=json_decode($request->premios);
        $realizadas=json_decode($request->actividades);
  
        if ($perfil->premios->count()>0) {
           
                foreach ($ganados as $act) {
                    $pre=PerfilPremios::where('accesorios_id',$act->accesorio_id)->where('perfil_estudiante_user_id',$id)->first();
                    if ($pre!=null) {
                        $pre->color=$request->color;
                        $pre->save();
                    }else{
                        PerfilPremios::create([
                            'color' => $request->color,
                            'accesorios_id' =>$act->accesorio_id,
                            'perfil_estudiante_user_id' => $id,
                        ]);
                    }
                    
                 }
        }else{
            foreach ($ganados as $act) {
                
                    PerfilPremios::create([
                        'color' => $request->color,
                        'accesorios_id' =>$act->accesorio_id,
                        'perfil_estudiante_user_id' => $id,
                    ]);
                
                
             }
        }
        foreach ($realizadas as $rea) {
                
            $temp=ActividadUser::find($rea->pivot->id);
            $temp->estado=0;
            $temp->save();
        
        
     }
     return $realizadas;
        
    }
    public function destroy($id)
    {
        //
    }
}
