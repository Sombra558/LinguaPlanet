<?php

namespace App\Models\Relaciones;

use Illuminate\Database\Eloquent\Model;

class ActividadUser extends Model
{
    protected $table= 'actividad_users';
    protected $fillable = [
        'actividad_id','perfil_id',
    ];
}
