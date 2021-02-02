<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaLineadeVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineadeventa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('subtotal', 9, 2)->default(0.00);
            $table->integer('cantidad');
            $table->bigInteger('producto_id')->unsigned();
            $table->bigInteger('venta_id')->unsigned();
            $table->bigInteger('proveedor_id')->unsigned();
            $table->timestamps();

            $table->foreign('producto_id')
                  ->references('id')
                  ->on('productos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('venta_id')
                  ->references('id')
                  ->on('ventas')
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
        Schema::dropIfExists('lineadeventa');
    }
}
