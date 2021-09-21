<?php

namespace App\Models\Relaciones;

use Illuminate\Database\Eloquent\Model;

class PerfilPremios extends Model
{
    protected $table= 'perfil_premios';
    protected $fillable = [
        'color','accesorios_id','perfil_estudiante_user_id',
    ];
}
