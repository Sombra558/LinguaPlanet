<?php

namespace App\Models\Cursos;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $fillable = [
        'nombre', 'descripcion','inicia','curso_id',
    ];
    
}
