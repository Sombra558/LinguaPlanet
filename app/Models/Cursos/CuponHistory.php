<?php

namespace App\Models\Cursos;

use Illuminate\Database\Eloquent\Model;

class CuponHistory extends Model
{
    protected $fillable = [
        'cupon_id', 'plan_id','precio_pago',
    ];

    public function plan() {
    	return $this->belongsTo('App\Models\Membresia\Plan');
    }
}
