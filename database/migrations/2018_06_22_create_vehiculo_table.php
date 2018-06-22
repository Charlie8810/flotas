<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patente')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->int('anio');
            $table->int('kilometrajeInicial');
            $table->int('capacidadEstanque');
            $table->string('dueno');
            $table->string('tipoVehiculo');
            $table->string('color');
            $table->string('numeroMotor')->unique();
            $table->string('numeroChasis')->unique();
            $table->string('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
