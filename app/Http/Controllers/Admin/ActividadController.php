<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cursos\Actividad;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ActividadController extends Controller
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

        }else if($request->tipo==='Silueta'){
           Actividad::create([
                'tipo' => $request->tipo,
                'icom'=>'/images/actividades/control.svg',
                'clase_id' => $request->clase_id,
                
            ]);
         



           // $client = new Client([
         //
           //     'base_uri' => 'http://167.172.162.54/',
           
            //]);
            //$response = $client->post('http://localhost:8000/post-silueta-create',['name' => 'olas']);
           // dd($response->getBody());

        }else{
            Actividad::create([
                'tipo' => $request->tipo,
                'icom'=>'/images/actividades/control.svg',
                'clase_id' => $request->clase_id,
                
            ]);
        }
      
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
        //
    }

 
    public function destroy($id)
    {
        Actividad::destroy($id);
    }
}
