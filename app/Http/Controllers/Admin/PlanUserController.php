<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solicitudes\PlanUser;
use App\Models\Membresia\Plan;
use Illuminate\Http\Request;

class PlanUserController extends Controller
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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $plan=Plan::find($request['plan_id']);
        $inscripcion = PlanUser::create([
            'user_id' => $request['user_id'],
            'plan_id' => $request['plan_id'],
            'tipo' => 'Sistema',
            'available' => $plan->stock,
        ]);
        return $inscripcion;
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
        $plan=Plan::find($request['plan_id']);
        $planuser=PlanUser::find($id);
        $planuser->update([
            'user_id' => $request['user_id'],
            'plan_id' => $request['plan_id'],
            'tipo' => 'Sistema',
            'available' => $plan->stock,
        ]);
        return $planuser;
    }

    
    public function destroy($id)
    {
        PlanUser::destroy($id);
    }
}
