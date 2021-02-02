<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaSucursal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('razon_social');
            $table->string('direccion')->nullable();
            $table->string('telefonos')->nullable();
            $table->string('cuit')->nullable();
            $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo');
            /*  $table->string('ciudad')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->bigInteger('provincia_id')->unsigned(); */
            $table->timestamps();
            /* 
            $table->foreign('provincia_id')
                  ->references('id')
                  ->on('provincias')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursal');
    }
}
