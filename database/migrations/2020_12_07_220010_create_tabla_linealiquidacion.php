<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaLineaLiquidacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linealiquidacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad');
            $table->decimal('montofijo',7,2);
            $table->decimal('montovariable',7,2);
            //$table->string('haberes');
            //$table->bigInteger('concepto_id')->unsigned();
            $table->bigInteger('liquidacion_id')->unsigned();
            $table->bigInteger('configuracioncategoria_id')->unsigned();
            $table->timestamps();

           
           /* $table->foreign('concepto_id')
                  ->references('id')
                  ->on('conceptos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');*/

            $table->foreign('liquidacion_id')
                  ->references('id')
                  ->on('liquidacion')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('configuracioncategoria_id')
                  ->references('id')
                  ->on('configuracioncategoria')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('linealiquidacion');
    }
}
