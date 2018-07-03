<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguro', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idVehiculo');
            $table->integer('idProveedor');
            $table->string('numeroPoliza');
            $table->date('inicioCobertura');
            $table->date('vencimientoCobertura');
            $table->enum('tipoMoneda', ['Pesos','UF']);
            $table->integer('valorTotal');
            $table->integer('deducible');
            $table->integer('numeroCuotas');
            $table->integer('montoCuota');
            $table->date('fechaPrimeraCuota');
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
        Schema::dropIfExists('seguro');
    }
}
