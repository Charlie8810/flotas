<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehiculoDatos extends Model
{
    protected $table = 'vehiculo_datos';
    protected $appends = ['etiqueta_slug'];

    public function getEtiquetaSlugAttribute()
    {
      return str_slug($this->etiqueta, '_');
    }

    public static function clone($source)
    {
        $clon = new VehiculoDatos;
        $clon->idVehiculo = $source->idVehiculo;
        $clon->titulo = $source->titulo;
        $clon->etiqueta = $source->etiqueta;
        $clon->valor = $source->valor;
        $clon->pestana = $source->pestana;
        $clon->tipoDato = $source->tipoDato;
        $clon->orden = $source->orden;

        return $clon;
    }
}
