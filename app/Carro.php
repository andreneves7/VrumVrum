<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = [
        'matricula', 'lugares', 'seguro','inspecao', 'dono'
    ];

    protected $table = 'carro';
}

