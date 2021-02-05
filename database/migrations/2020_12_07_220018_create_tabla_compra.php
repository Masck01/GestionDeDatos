<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->string('codigo')->default('0');;
            $table->date('fecha');
            $table->time('hora',0);
            $table->float('total', 9, 2)->default(0.00);
            //$table->enum('estado', ['Activo','Inactivo'])->default('Activo');
            $table->bigInteger('proveedor_id')->unsigned();
            $table->timestamps();

            
            $table->foreign('proveedor_id')
                  ->references('id')
                  ->on('proveedor')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
