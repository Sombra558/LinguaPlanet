<?php

namespace App\Models\Animals;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'animal','cara','cuerpo',
    ];

    public function accesorios(){
        return $this->hasMany('App\Models\Animals\Accesorios');
    }
}
