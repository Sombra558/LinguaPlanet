<?php

namespace App\Models\Animals;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $fillable = [
        'animal_id','cara','cuerpo',
    ];

    public function animal(){
        return $this->belongsTo('App\Models\Animals\Animal');
    }
    
}
