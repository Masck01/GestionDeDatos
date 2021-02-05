<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaPago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('monto', 9, 2)->default(0.00);
            $table->decimal('vuelto', 9, 2)->default(0.00);
            $table->bigInteger('venta_id')->unsigned();
            $table->timestamps();

            
            $table->foreign('venta_id')
                  ->references('id')
                  ->on('venta')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
