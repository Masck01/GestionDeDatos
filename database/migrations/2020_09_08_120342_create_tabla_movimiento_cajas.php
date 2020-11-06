<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaMovimientoCajas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos_cajas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cajas_id')->unsigned();
            $table->string('descripcion');
            $table->string('fecha');
            $table->string('entrada');
            $table->string('salida');
            $table->timestamps();

            $table->foreign('cajas_id')
                  ->references('id')
                  ->on('cajas')
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
        Schema::dropIfExists('movimiento_cajas');
    }
}
