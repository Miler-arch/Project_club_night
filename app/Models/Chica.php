<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Chica extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'health_card_expiry_date',
        'code_card',
        'ci',
        'phone',
        'age',
        'image',
        'state',
        'state_chica',
    ];
    public function ventas(){
        return $this->belongsToMany('App\Models\Venta');
    }

    public function manilla(){
        return $this->belongsToMany(Manilla::class, 'manillas_chicas')->withPivot('cantidad', 'monto');
    }

    public function rol()
    {
        return $this->belongsTo(Role::class);
    }
}
