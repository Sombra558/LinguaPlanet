<?php

namespace App\Models\Membresia;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'nombre','precio','membresia_id','stock','nombreURL'
    ];

    public function membresia() {
    	return $this->belongsTo(Membresia::class);
    }
}
