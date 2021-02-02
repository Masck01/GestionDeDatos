<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaLineadeCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineadecompra', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('subtotal', 9, 2)->default(0.00);
            $table->integer('cantidad');
            $table->bigInteger('producto_id')->unsigned();
            $table->bigInteger('compra_id')->unsigned();
            $table->bigInteger('proveedor_id')->unsigned();
            $table->timestamps();

            $table->foreign('producto_id')
                  ->references('id')
                  ->on('productos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('compra_id')
                  ->references('id')
                  ->on('compras')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('proveedor_id')
                  ->references('proveedor_id')
                  ->on('productos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lineadecompra');
    }
}
