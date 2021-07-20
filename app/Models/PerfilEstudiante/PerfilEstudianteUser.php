<?php

namespace App\Models\PerfilEstudiante;

use Illuminate\Database\Eloquent\Model;

class PerfilEstudianteUser extends Model
{
    protected $fillable = [
        'user_id','hobby','f_nacimiento','apodo','animal_id','color',
    ];
    public function animal(){
        return $this->belongsTo('App\Models\Animals\Animal');
      }
}
