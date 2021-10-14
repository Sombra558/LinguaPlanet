<?php

namespace App\Models\Solicitudes;

use Illuminate\Database\Eloquent\Model;

class PlanUser extends Model
{
    protected $table= 'plan_user';

    protected $fillable = [
        'user_id','plan_id','available','tipo','comprobante',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function plan(){
        return $this->belongsTo('App\Models\Membresia\Plan');
    }
}
