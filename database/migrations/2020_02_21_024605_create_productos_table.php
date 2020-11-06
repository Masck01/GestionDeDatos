<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo')->default('0');;
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->decimal('precioLocal', 9, 2)->default(0.00);
            $table->decimal('precioLocalB', 9, 2)->default(0.00);
            $table->decimal('precioLocalDolares', 9, 2)->default(0.00);
            $table->decimal('precioLocalDolaresB', 9, 2)->default(0.00);
            $table->decimal('precioEccomerce', 9, 2)->default(0.00);
            $table->decimal('precioMercadoLibre', 9, 2)->default(0.00);
            $table->bigInteger('unidadnegocio_id')->unsigned();
            $table->bigInteger('categoria_id')->unsigned();
            $table->bigInteger('marcas_id')->unsigned();
            $table->timestamps();

            $table->foreign('unidadnegocio_id')
                  ->references('id')
                  ->on('unidad_negocio')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
