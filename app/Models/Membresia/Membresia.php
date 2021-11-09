<?php

namespace App\Models\Membresia;

use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    protected $fillable = [
        'nombre','tipo','inicia','finaliza','nombreURL'
    ];

    public function planes(){
        return $this->hasMany('App\Models\Membresia\Plan');
    }

    public function idiomas() {
    	return $this->belongsToMany('App\Models\Idioma\Idioma','membresia_idiomas','membresia_id')->withPivot('membresia_id');
    }
    
    public function cursos()
    {
      return $this->belongsToMany('App\Models\Cursos\Curso')->withPivot('membresia_id');
    }

    public function cupones()
    {
      return $this->belongsToMany('App\Models\Cursos\Cupon')->withPivot('membresia_id');
    }
}
