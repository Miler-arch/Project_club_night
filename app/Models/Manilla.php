<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manilla extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'precio',
    ];

    public function chica(){
        return $this->belongsToMany(Chica::class, 'manillas_chicas')->withPivot('cantidad', 'monto');
    }
}
