<?php

namespace App\Http\Controllers\Padres;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $user->name=$request['name'];
        $user->lastname=$request['lastname'];
        $user->email=$request['email'];
        if ($request->file('img')) {
            if ($user->img!=null) {
                Storage::disk('public')->delete("imgPerfiles/$user->img");
            }
            $image = $request->file('img');
            $path = $image->store('public/imgPerfiles');
            $path = str_replace('public/', '', $path);
            $user->img=$path;
            $user->save();
        }else{
            $user->save();
        }
        return $user;
    }
    
  public function updatecontrasena(Request $request){
    $user = Auth::user();
    if(isset($request['password'])){
        if(Hash::check($request['password'],$user->password)){
          $request['password'] = Hash::make($request['newPassword']);
        }else{
          return response()->json("incorrecto");
        }
      }
      $user->fill($request->all());
      $user->save();
  }
}
