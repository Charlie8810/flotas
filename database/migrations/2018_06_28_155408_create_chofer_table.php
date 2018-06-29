<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chofer', function (Blueprint $table) {
          $table->increments('id');
          $table->string('rut')->unique();
          $table->string('nombres');
          $table->string('apellidos');
          $table->date('fechaNacimiento');
          $table->date('fechaContrato');
          $table->integer('numeroLicencia');
          $table->date('fechaExpriraLicencia');
          $table->string('municipioLicencia');
          $table->string('observacionesLicencia');
          $table->json('clasesLicencia');
          $table->json('hojaVida')->nullable();;
          $table->string('urlFoto')->nullable();;
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
        Schema::dropIfExists('chofer');
    }
}
