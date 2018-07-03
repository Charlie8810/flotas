<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
    protected $table = 'seguro';

    protected $dates = [
        'inicioCobertura',
        'vencimientoCobertura',
        'fechaPrimeraCuota'
    ];

}
