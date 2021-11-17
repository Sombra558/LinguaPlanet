<?php

namespace App\Models\Certificado;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    protected $table = 'certificados';
    protected $fillable = ['codigo','perfil_id', 'curso_id'];

    public function perfil(){
        return $this->belongsTo('App\Models\PerfilEstudiante\PerfilEstudianteUser','perfil_id');
      }
      public function curso()
    {
      return $this->belongsTo('App\Models\Cursos\Curso','curso_id');
    }
}
