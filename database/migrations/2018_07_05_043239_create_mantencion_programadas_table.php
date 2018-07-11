<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMantencionProgramadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantencion_programadas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idMantencionDisponible');
            $table->unsignedInteger('idVehiculo');
            $table->enum('tipoProgramacion', ['kilometraje','fecha']);
            $table->date('fechaInicial')->nullable();
            $table->integer('kilometrajeInicial')->nullable();
            $table->enum('tipoLapso', ['dias','semanas','meses', 'años'])->nullable();
            $table->integer('periodoMantencion');
            $table->timestamps();

            $table->foreign('idMantencionDisponible')->references('id')->on('mantencion_disponibles');
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
        Schema::dropIfExists('mantencion_programadas');
    }
}
