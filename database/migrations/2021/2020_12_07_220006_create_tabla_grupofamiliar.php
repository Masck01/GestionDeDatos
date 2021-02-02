<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaGrupoFamiliar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupofamiliar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('dni');
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nacimiento');
            $table->string('parentesco');
            $table->bigInteger('empleado_id')->unsigned();
            $table->timestamps();

            $table->foreign('empleado_id')
                  ->references('id')
                  ->on('empleados')
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
        Schema::dropIfExists('grupofamiliar');
    }
}
