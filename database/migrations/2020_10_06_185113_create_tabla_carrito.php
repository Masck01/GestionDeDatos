<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaCarrito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('producto_id')->unsigned();
            $table->bigInteger('cliente_id')->unsigned();
            $table->string('cantidad');
            $table->string('precio');
            $table->string('subTotal');
            $table->timestamps();

            $table->foreign('producto_id')
            ->references('id')
            ->on('productos')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('cliente_id')
            ->references('id')
            ->on('clientes')
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
        Schema::dropIfExists('carrito');
    }
}
