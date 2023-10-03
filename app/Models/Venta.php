<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'estado',
    ];

    //relacion uno a muchos
    public function user(){
        return $this->belongsTo(User::class, 'user_id',);
    }

    //relacion de muchos a muchos
    public function productos(){
        return $this->belongsToMany(Producto::class, 'ventas_productos')->withPivot('nombre', 'precio');
    }

    public function chicas(){
        return $this->belongsToMany(('App\Models\Chica'));

    }
}
