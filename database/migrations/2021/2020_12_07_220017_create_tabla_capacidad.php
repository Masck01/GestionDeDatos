<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaCapacidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacidad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cantidad');
            $table->enum('estado', ['Activo','Inactivo'])->default('Activo');
            $table->bigInteger('producto_id')->unsigned();
            $table->bigInteger('producto_proveedor_id')->unsigned();
            $table->timestamps();

            $table->foreign('producto_id')
                  ->references('id')
                  ->on('productos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            
            $table->foreign('producto_proveedor_id')
                  ->references('proveedor_id')
                  ->on('productos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capacidad');
    }
}
