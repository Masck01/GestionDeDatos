<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaLiquidacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->decimal('salario_neto',7,2);
            $table->decimal('salario_bruto',7,2);
            $table->string('periodo_liquidacion');
            $table->decimal('retenciones',7,2);
            $table->enum('estado', ['Pagado','Pendiente'])->default('Pendiente');
            $table->bigInteger('empleado_id')->unsigned();
            $table->timestamps();

           
            $table->foreign('empleado_id')
                  ->references('id')
                  ->on('empleado')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('liquidacion');
    }
}
