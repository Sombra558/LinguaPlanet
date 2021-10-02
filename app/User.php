<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;
    protected $fillable = [
        'name','lastname', 'email', 'password','img','img_min','frase',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function planes()
    {
      return $this->belongsToMany('App\Models\Membresia\Plan')->withPivot('available','id');
    }

    public function perfiles()
    {
        return $this->hasMany('App\Models\PerfilEstudiante\PerfilEstudianteUser','user_id');
    }

}