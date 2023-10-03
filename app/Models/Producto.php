<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'quantity',
        'costo',
        'precio',
        'costo_compania',
        'utilidad',
        'imagen',
        'estado',
    ];

    //relaciones muchos a muchos
    public function ventas(){
        return $this->belongsToMany('App\Models\Venta');
    }
}

