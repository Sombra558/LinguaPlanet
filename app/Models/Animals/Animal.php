<?php

namespace App\Models\Animals;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'animal','cara','cuerpo',
    ];
}
