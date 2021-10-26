<?php

namespace App\Models\Cursos;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $fillable = [
       'nombre','codigo','valor','tipo_cupon','tipo_descuento', 'vence','cantidad',
    ];

    public function membresias()
    {
      return $this->belongsToMany('App\Models\Membresia\Membresia','cupon_membresias','cupon_id')->withPivot('cupon_id','id');
    }

    public function usados()
    {
        return $this->hasMany('App\Models\Cursos\CuponHistory');
    }

}
