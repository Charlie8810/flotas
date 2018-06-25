<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculoDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculoDatos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idVehiculo');
            $table->string('titulo');
            $table->string('etiqueta');
            $table->string('valor');
            $table->string('pestana');
            $table->string('tipoDato');
            $table->integer('orden');
            $table->timestamps();

            $table->foreign('idVehiculo')->references('id')->on('vehiculo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculoDatos');
    }
}
