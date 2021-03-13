<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('razon_social');
            $table->bigInteger('Cuit');
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->enum('tipo', ['consumidorfinal','responsableinscripto']);
            $table->enum('estado', ['Activo','Inactivo'])->default('Activo');
           /*  $table->string('ciudad')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->bigInteger('provincia_id')->unsigned(); */
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
        Schema::dropIfExists('clientes');
    }
}
