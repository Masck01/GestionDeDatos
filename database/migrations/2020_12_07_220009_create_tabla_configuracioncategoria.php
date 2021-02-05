<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaConfiguracionCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracioncategoria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('montofijo',7,2);
            $table->decimal('montovariable',7,2);
            $table->integer('unidad');
            $table->bigInteger('concepto_id')->unsigned();
            $table->bigInteger('categoria_id')->unsigned();
            $table->timestamps();


            $table->foreign('concepto_id')
                ->references('id')
                ->on('concepto')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categoria')
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
        Schema::dropIfExists('configuracioncategoria');
    }
}
