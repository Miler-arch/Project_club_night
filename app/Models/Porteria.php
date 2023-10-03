<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Porteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_entry',
        'reason',
        'reason_txt',
        'chica_id',
        'client_id',
    ];

    public function chica()
    {
        return $this->belongsTo(Chica::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
