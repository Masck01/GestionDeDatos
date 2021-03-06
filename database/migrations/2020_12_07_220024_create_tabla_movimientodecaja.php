<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaMovimientodeCaja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientodecaja', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion');
            $table->dateTime('fecha');
            $table->decimal('entrada', 9, 2)->default(0.00);
            $table->decimal('salida', 9, 2)->default(0.00);
            $table->string('moneda');
            $table->bigInteger('venta_id')->unsigned()->nullable();
            $table->bigInteger('caja_id')->unsigned();
            $table->bigInteger('compra_id')->unsigned()->nullable();
            $table->timestamps();


            $table->foreign('venta_id')
                  ->references('id')
                  ->on('venta')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('caja_id')
                  ->references('id')
                  ->on('caja')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('compra_id')
                  ->references('id')
                  ->on('compra')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('movimientodecaja');
    }
}
