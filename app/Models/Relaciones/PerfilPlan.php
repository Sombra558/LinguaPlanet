<?php

namespace App\Models\Relaciones;

use Illuminate\Database\Eloquent\Model;

class PerfilPlan extends Model
{
    protected $table= 'perfil_estudiante_user_plan';
    protected $fillable = [
        'plan_user_id','perfil_estudiante_user_id',
    ];
}
