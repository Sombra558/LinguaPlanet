<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cursos\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
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
        $modulo = Modulo::create([
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
            'inicia' => $request['inicia'],
            'finaliza' => $request['finaliza'],
            'curso_id' => $request['curso_id'],
        ]);
        return $modulo;
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
        $Modulo = Modulo::find($id);
        dd($request['nombre']);
        $modulo->nombre=$request['nombre'];
        $modulo->inicia=$request['inicia'];
        $modulo->finaliza=$request['finaliza'];
        $modulo->descripcion=$request['descripcion'];
        $modulo->save();
        //if ($request->file('file')) {
          //  $image = $request->file('file');
            //$path = $image->store('public/Testimonial');
            //$path = str_replace('public/', '', $path);
            //$testimonial->img = $path;
            //$testimonial->save();
       // }
        return $modulo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Modulo::destroy($id);
    }
}
