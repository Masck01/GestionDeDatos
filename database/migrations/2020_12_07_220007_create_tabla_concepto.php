<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaConcepto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concepto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion');
            $table->enum('tipo',['Haber','Retencion']);
            //$table->decimal('monto_fijo', 9, 2)->default(0.00);
            //$table->decimal('monto_variable', 9, 2)->default(0.00);
            $table->enum('estado', ['Activo','Inactivo'])->default('Activo');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concepto');
    }
}
