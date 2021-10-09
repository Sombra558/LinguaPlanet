<?php

namespace App\Models\Relaciones;

use Illuminate\Database\Eloquent\Model;

class CuponMembresia extends Model
{
    protected $table= 'cupon_membresias';
    protected $fillable = [
        'membresia_id','cupon_id',
    ];
}
