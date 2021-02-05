<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaCapacidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacidad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cantidad');
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
        Schema::dropIfExists('capacidad');
    }
}
