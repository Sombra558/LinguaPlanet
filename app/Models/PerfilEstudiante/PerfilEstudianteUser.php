<?php

namespace App\Models\PerfilEstudiante;

use Illuminate\Database\Eloquent\Model;

class PerfilEstudianteUser extends Model
{
    protected $fillable = [
        'user_id','hobby','f_nacimiento','apodo',
    ];
}
