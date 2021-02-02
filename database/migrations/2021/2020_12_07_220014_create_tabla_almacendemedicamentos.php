<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaAlmacendeMedicamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacendemedicamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('codigo_postal');
            $table->enum('estado', ['Activo','Inactivo'])->default('Activo');
            $table->bigInteger('sucursal_id')->unsigned();

            $table->foreign('sucursal_id')
                  ->references('id')
                  ->on('sucursal')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('almacendemedicamentos');
    }
}
