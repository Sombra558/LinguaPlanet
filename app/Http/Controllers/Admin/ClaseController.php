<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cursos\Clase;
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
            'finaliza' => $request['finaliza'],
            'modulo_id' => $request['modulo_id'],
        ]);
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
        dd($request['editando']);
        $clase->inicia=$request['inicia'];
        $clase->finaliza=$request['finaliza'];
        $clase->save();
        return $clase;
    }
    
    public function destroy($id)
    {
        Clase::destroy($id);
    }
}
