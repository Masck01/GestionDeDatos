<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaLiquidaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->string('salario_neto');
            $table->string('salario_bruto');
            $table->string('periodo_liquidacion');
            $table->string('retenciones');
            $table->enum('estado', ['Activo','Inactivo'])->default('Activo');
            $table->bigInteger('empleado_id')->unsigned();
            $table->timestamps();

           
            $table->foreign('empleado_id')
                  ->references('id')
                  ->on('empleados')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('liquidaciones');
    }
}
