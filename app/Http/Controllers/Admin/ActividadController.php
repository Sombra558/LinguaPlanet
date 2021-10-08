<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cursos\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->tipo==='Palabras del día') {
            Actividad::create([
                'tipo' => $request->tipo,
                'icom'=>'/images/actividades/palabra.svg',
                'clase_id' => $request->clase_id,
                'recurso' => $request->file('recurso')->store('Clases/Archivos', 'public')
            ]);
        }else if($request->tipo==='Video de apertura'){
            Actividad::create([
                'tipo' => $request->tipo,
                'icom'=>'/images/actividades/video.svg',
                'clase_id' => $request->clase_id,
                'recurso' => $request->file('recurso')->store('Clases/Archivos', 'public')
            ]);

        }else if($request->tipo==='Actividad'){
            Actividad::create([
                'tipo' => $request->tipo,
                'icom'=>'/images/actividades/actividad.svg',
                'clase_id' => $request->clase_id,
                'recurso' => $request->file('recurso')->store('Clases/Archivos', 'public')
            ]);

        }else if($request->tipo==='Libros'){
            Actividad::create([
                'tipo' => $request->tipo,
                'icom'=>'/images/actividades/libro.svg',
                'clase_id' => $request->clase_id,
                'recurso' => $request->file('recurso')->store('Clases/Archivos', 'public')
            ]);

        }else if($request->tipo==='Rompecabeza'){
            Actividad::create([
                'tipo' => $request->tipo,
                'icom'=>'/images/actividades/rompecabeza.svg',
                'clase_id' => $request->clase_id,
              
            ]);

        }else if($request->tipo==='Mochila'){
            Actividad::create([
                'tipo' => $request->tipo,
                'icom'=>'/images/actividades/mochila.svg',
                'clase_id' => $request->clase_id,
                
            ]);

        }else{
            Actividad::create([
                'tipo' => $request->tipo,
                'icom'=>'/images/actividades/control.svg',
                'clase_id' => $request->clase_id,
                
            ]);
        }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
