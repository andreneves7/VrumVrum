<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    protected $fillable = [
        'data_boleia','destino','origem','condutor', 'carro'      
    ];

    protected $table = 'viagem';
}
