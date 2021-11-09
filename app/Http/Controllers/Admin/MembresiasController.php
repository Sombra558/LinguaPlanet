<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membresia\Membresia;
use App\Models\Relaciones\MembresiaIdioma;
use Illuminate\Http\Request;

class MembresiasController extends Controller
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
        $idiomas=$request['idiomas'];
  
        $membresia = Membresia::create([
            'nombre' => $request['nombre'],
            'nombreURL' => $request['nombreURL'],
        ]);
        foreach ($idiomas as $idioma) {

            MembresiaIdioma::create([
            'membresia_id' => $membresia->id,
            'idioma_id' => $idioma,
        ]);
        }
        return $membresia;
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
        $membresia=Membresia::find($id);
        $membresia->update([
            'nombre' => $request['nombre'],
            'idioma_id' => $request['idioma_id'],
            'nombreURL' => $request['nombreURL'],
        ]);
        return $membresia;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Membresia::destroy($id);
    }
}
