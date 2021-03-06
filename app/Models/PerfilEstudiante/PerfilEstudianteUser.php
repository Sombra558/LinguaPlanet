<?php

namespace App\Models\PerfilEstudiante;

use Illuminate\Database\Eloquent\Model;

class PerfilEstudianteUser extends Model
{
  protected $fillable = [
      'user_id','hobby','f_nacimiento','apodo','color','avatar_id',
  ];

  public function padre(){
    return $this->belongsTo('App\User','user_id');
  } 
  public function avatar(){
    return $this->belongsTo('App\Models\Animals\Avatar');
  } 

  public function planes()
  {
    return $this->belongsToMany('App\Models\Solicitudes\PlanUser','perfil_estudiante_user_plan');
  }
  public function premios()
  {
    return $this->belongsToMany('App\Models\Animals\Accesorios','perfil_premios')->withPivot('color');
  }
  public function misactividades()
  {
    return $this->belongsToMany('App\Models\Cursos\Actividad','actividad_users','perfil_id')->withPivot('estado','id','intentos','calificacion','repeticiones');
  }
  public function certificados(){
    return $this->hasMany('App\Models\Certificado\Certificado','perfil_id');
}
  
}
