<?php

namespace App\Http\Controllers\Padres;

use App\Http\Controllers\Controller;
use App\Models\Animals\Animal;
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
