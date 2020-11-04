<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = "anuncio";
    protected $fillable = [
        'data_boleia','origem','destino','id_viagem'
    ];
}
