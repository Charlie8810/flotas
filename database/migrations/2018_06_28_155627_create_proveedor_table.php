<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor', function (Blueprint $table) {
          $table->increments('id');
          $table->string('rut')->unique();
          $table->boolean('esEmpresa');
          $table->string('nombre');
          $table->string('contacto');
          $table->string('correo')->unique();
          $table->string('direccion');
          $table->string('comuna');
          $table->string('telefono');
          $table->string('fax')->nullable();
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
        Schema::dropIfExists('proveedor');
    }
}
