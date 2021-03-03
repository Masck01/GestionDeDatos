<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaCajadeAhorro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajadeahorro', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('codigo')->default('0');
            $table->bigInteger('banco_id')->unsigned();
            $table->timestamps();

            
            $table->foreign('banco_id')
                  ->references('id')
                  ->on('banco')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cajadeahorro');
    }
}
