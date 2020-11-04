<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passageiro extends Model
{
    protected $table = 'passageiro';
    protected $fillable = [
        'id_passageiro', 'id_viagem'
    ];
}

