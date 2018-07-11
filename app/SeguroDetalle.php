<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeguroDetalle extends Model
{
    protected $table = 'seguro_detalle';


    protected $casts = [
       'estaPagada' => 'boolean'
    ];


}
