<?php

namespace App\Models\Relaciones;

use Illuminate\Database\Eloquent\Model;

class ProgresoCursoUser extends Model
{
    protected $table= 'progreso_curso_users';
    protected $fillable = [
        'progreso','curso_id','perfil_id',
    ];
}
