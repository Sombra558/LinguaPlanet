<?php

namespace App\Models\Cursos;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $fillable = [
        'nombre', 'descripcion','inicia','curso_id',
    ];
    
    public function clases(){
        return $this->hasMany('App\Models\Cursos\Clase');
    }
}
