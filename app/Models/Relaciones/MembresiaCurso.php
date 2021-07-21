<?php

namespace App\Models\Relaciones;

use Illuminate\Database\Eloquent\Model;

class MembresiaCurso extends Model
{
    protected $table= 'curso_membresia';
    protected $fillable = [
        'membresia_id','curso_id',
    ];
}
