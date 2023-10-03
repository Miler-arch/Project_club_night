<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    use HasFactory;

    protected $fillable = [

        'nombre_chica',
        'tiempo',
        'hora_ingreso',
        'hora_salida',
        'ingreso'

            // $table->id();
            // $table->string('nombre_chica');
            // $table->integer('tiempo');
            // $table->time('hora_ingreso');
            // $table->time('hora_salida');
            // $table->integer('ingreso');    
            // $table->timestamps();
    ];
}
