<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaDetalleLiquidacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleliquidacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('unidad');
            $table->string('haberes');
            $table->bigInteger('concepto_id')->unsigned();
            $table->bigInteger('liquidacion_id')->unsigned();
            $table->bigInteger('preconfiguracion_id')->unsigned();
            $table->timestamps();

           
            $table->foreign('concepto_id')
                  ->references('id')
                  ->on('conceptos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('liquidacion_id')
                  ->references('id')
                  ->on('liquidaciones')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('preconfiguracion_id')
                  ->references('id')
                  ->on('preconfiguracion')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalleliquidacion');
    }
}
