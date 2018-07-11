<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MantencionProgramada extends Model
{
    public function mntdisponible()
    {
        return $this->belongsTo('App\MantencionDisponible', 'idMantencionDisponible');
    }

    public function vehiculo()
    {
        return $this->belongsTo('App\Vehiculo', 'idVehiculo');
    }


    protected $casts = [
        'fechaInicial' => 'date:d/m/Y'
    ];
}
