<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion');
            $table->decimal('salario_basico',7 , 2)->default(0.00);
            $table->enum('estado', ['Activo','Inactivo'])->default('Activo');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('categoria');
    }
}
