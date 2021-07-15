<?php

namespace App\Models\Idioma;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $fillable = [
        'idioma','diminutivo','src','video','nombreURL',
    ];
    public function membresias(){
        return $this->hasMany('App\Models\Membresia\Membresia');
    }
}
