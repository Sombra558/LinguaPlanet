<?php

namespace App\Models\Relaciones;

use Illuminate\Database\Eloquent\Model;

class MembresiaIdioma extends Model
{
    protected $table= 'membresia_idiomas';
    protected $fillable = [
        'membresia_id','idioma_id',
    ];
}
