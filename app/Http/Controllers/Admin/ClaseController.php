<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cursos\Clase;
use App\Models\Relaciones\ClasePremio;
use App\Models\Animals\Accesorios;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
   
    public function index()
    {
        //
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $clase = Clase::create([
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
            'inicia' => $request['inicia'],
            'indice' => $request['indice'],
            'finaliza' => $request['finaliza'],
            'modulo_id' => $request['modulo_id'],
        ]);
        $accesorios=Accesorios::where('tipo',$request['premio'])->get();
        foreach($accesorios as $pre){
            ClasePremio::create([
                'accesorio_id' => $pre->id,
                'clase_id' => $clase->id,
            ]);
        }
        return $clase;
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        $clase = Clase::find($id);
     
        $clase->inicia=$request['inicia'];
        $clase->finaliza=$request['finaliza'];
        $clase->save();
        $accesorios=Accesorios::where('tipo',$request['premio_clase'][0]['accesorio']['tipo'])->get();
        $premios=ClasePremio::where('clase_id',$clase->id)->get();


        for ($i=0; $i < 5; $i++) { 
           
            $premios[$i]->update([
                'accesorio_id' =>  $accesorios[$i]->id,
                'clase_id' => $clase->id,
            ]);
        }

     
        return $clase;
    }
    
    public function destroy($id)
    {
        Clase::destroy($id);
    }
}
