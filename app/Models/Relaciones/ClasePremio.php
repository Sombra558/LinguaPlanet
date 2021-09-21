<?php

namespace App\Models\Relaciones;

use Illuminate\Database\Eloquent\Model;

class ClasePremio extends Model
{
    protected $table= 'clase_premios';
    protected $fillable = [
        'accesorio_id','clase_id',
    ];
    public function accesorio() {
    	return $this->belongsTo('App\Models\Animals\Accesorios');
    }
}
