<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo')->default('0');
            $table->date('fecha');
            $table->time('hora',0);
            $table->float('subtotalventa', 9, 2)->default(0.00);
            $table->float('iva', 9, 2)->default(0.00);
            $table->float('total', 9, 2)->default(0.00);
            $table->enum('estado', ['Pagado','Impago'])->default('Impago');
            $table->enum('tipocliente', ['Consumidor Final','Responsable Inscripto'])->default('Consumidor Final');
            $table->bigInteger('empleado_id')->unsigned();
            $table->bigInteger('cliente_id')->unsigned()->nullable();
            $table->timestamps();


            $table->foreign('empleado_id')
                  ->references('id')
                  ->on('empleado')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('cliente_id')
                  ->references('id')
                  ->on('cliente')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('venta');
    }
}
