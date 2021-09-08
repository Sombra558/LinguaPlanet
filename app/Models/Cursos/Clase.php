<?php

namespace App\Models\Cursos;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = [
        'inicia', 'finaliza','modulo_id',
    ];
    public function actividades(){
        return $this->hasMany('App\Models\Cursos\Actividad');
    }
}
