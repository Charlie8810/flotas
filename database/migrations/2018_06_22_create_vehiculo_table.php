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
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patente')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->integer('anio');
            $table->integer('kilometrajeInicial');
            $table->integer('capacidadEstanque');
            $table->string('dueno')->nullable();
            $table->string('tipoVehiculo');
            $table->string('color');
            $table->string('numeroMotor')->unique();
            $table->string('numeroChasis')->unique();
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('vehiculo');
    }
}
