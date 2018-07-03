<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeguroDetalle extends Model
{
    protected $table = 'seguro_detalle';

    protected $dates = [
        'vencimientoCuota'
    ];

    protected $casts = [
       'estaPagada' => 'boolean',
       'vencimientoCuota' => 'datetime:d/m/Y',
    ];


}
