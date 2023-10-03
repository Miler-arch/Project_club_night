<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'ci',
        'photo',
        'phone',
        'name',
        'email',
        'username',
        'password',
        'state',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //relacion uno a muchos
    public function ventas(){
        return $this->hasMany('App\Models\Venta');
    }

    public function porterias(){
        return $this->hasMany('App\Models\Porteria');
    }
}
