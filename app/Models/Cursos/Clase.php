<?php

namespace App\Models\Cursos;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = [
        'recurso', 'tipo','modulo_id',
    ];
}
