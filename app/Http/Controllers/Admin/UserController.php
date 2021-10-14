<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function buscarUsuario($query){
        $usuarios=User::where('email','LIKE','%'.$query.'%')->orWhere('name','LIKE','%'.$query.'%')->orWhere('lastname','LIKE','%'.$query.'%')->get();
        return $usuarios;
    }
    
    public function validaUsuario($email){
        $user=User::where('email',$email)->get();
        if ($user->count()>0) {
            return $user;
        }else{
            return null;
        }
    }
    public function crearUsuario(Request $request){

        $request->validate([
                'name' => 'required|max:80',
                'lastname' => 'required|max:80',
                'email' => 'required|string|email|max:255|unique:users',
        ]);
        $user= new User($request->except('rol'));
        $user->password= Hash::make($request->password);
        $user->assignRole($request->rol);
        $user->save();
        return $user;
      }
      public function editarUsuario(Request $request, $id, $facul_id){
        $user = User::find($id)->load('roles')->fill($request->except('rol')); 
        $user->removeRole($user->roles[0]->name);
        $user->assignRole($request->rol);
        $user->save();
        return $user;
      }
      public function destroy($id)
      {
          User::destroy($id);
      }
}
