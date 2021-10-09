<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cursos\Cupon;
use App\Models\Membresia\Membresia;



use Illuminate\Http\Request;

class CuponesController extends Controller
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
        
        return view('Administrador.Cupones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = Cupon::create([
            'nombre' => $request['nombre'],
            'codigo' => $request['codigo'],
            'tipo_cupon' => $request['tipo_cupon'],
            'tipo_descuento' => $request['tipo_descuento'],
            'cantidad' => $request['cantidad'],
            'valor' =>  $request['valor'],
            'vence' => $request['vence'],
        ]);
        return $curso;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cupon=Cupon::find($id)->load(['membresias'=>function($q){
            return $q->with('idioma');
        }]);
        $membresias=Membresia::get();
        return view('Administrador.Cupones.show',compact('cupon','membresias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Administrador.Cupones.edit');
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
        $curso=Cupon::find($id);
        $curso->update([
            'nombre' => $request['nombre'],
            'codigo' => $request['codigo'],
            'tipo_cupon' => $request['tipo_cupon'],
            'tipo_descuento' => $request['tipo_descuento'],
            'cantidad' => $request['cantidad'],
            'valor' =>  $request['valor'],
            'vence' => $request['vence'],
        ]);
        return $curso;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cupon::destroy($id);
    }
}
