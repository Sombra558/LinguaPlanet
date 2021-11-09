<?php

namespace App\Models\Idioma;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $fillable = [
        'idioma','diminutivo','src','video','nombreURL',
    ];
   
    public function membresias() {
    	return $this->belongsToMany('App\Models\Membresia\Membresia','membresia_idiomas','idioma_id')->withPivot('idioma_id');
    }
}
