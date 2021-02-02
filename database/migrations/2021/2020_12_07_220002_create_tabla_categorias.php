<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaCategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion');
            $table->decimal('salario_basico',9 , 2)->default(0.00);
            $table->enum('estado', ['Activo','Inactivo'])->default('Activo');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
