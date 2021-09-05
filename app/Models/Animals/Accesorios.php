<?php

namespace App\Models\Animals;

use Illuminate\Database\Eloquent\Model;

class Accesorios extends Model
{
    protected $fillable = [
        'animal_id','accesorio','nombre','estado','tipo','corde_x','corde_y'
    ];
}
