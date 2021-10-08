<?php

namespace App\Models\Cursos;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $fillable = [
        'tipo', 'icom','clase_id','recurso',
    ];
}
