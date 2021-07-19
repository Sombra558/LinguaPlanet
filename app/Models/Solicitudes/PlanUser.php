<?php

namespace App\Models\Solicitudes;

use Illuminate\Database\Eloquent\Model;

class PlanUser extends Model
{
    protected $fillable = [
        'user_id','plan_id','available','tipo','comprobante',
    ];
}
