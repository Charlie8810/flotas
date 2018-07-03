<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguroDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguro_detalle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idSeguro');
            $table->integer('numeroCuota');
            $table->integer('montoCuota');
            $table->date('vencimientoCuota');
            $table->boolean('estaPagada');
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
        Schema::dropIfExists('seguro_detalle');
    }
}
