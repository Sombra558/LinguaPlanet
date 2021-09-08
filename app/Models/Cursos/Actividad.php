<?php

namespace App\Models\Cursos;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $fillable = [
        'tipo', 'icon','clase_id','recurso',
    ];
}
