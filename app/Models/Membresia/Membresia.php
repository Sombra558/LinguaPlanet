<?php

namespace App\Models\Membresia;

use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    protected $fillable = [
        'nombre','tipo','idioma_id','inicia','finaliza','nombreURL'
    ];

    public function planes(){
        return $this->hasMany('App\Models\Membresia\Plan');
    }

    public function idioma() {
    	return $this->belongsTo('App\Models\Idioma\Idioma');
    }
    public function cursos()
    {
      return $this->belongsToMany('App\Models\Cursos\Curso')->withPivot('membresia_id');
    }
}
