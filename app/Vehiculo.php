<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculo';


    public function mantenciones()
    {
        return $this->hasMany('App\MantencionProgramada','idVehiculo');
    }

}
