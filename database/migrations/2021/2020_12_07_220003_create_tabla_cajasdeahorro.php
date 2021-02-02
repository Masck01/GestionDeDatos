<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaCajasdeAhorro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajasdeahorro', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('codigo')->default('0');
            $table->bigInteger('banco_id')->unsigned();
            $table->timestamps();

            
            $table->foreign('banco_id')
                  ->references('id')
                  ->on('bancos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cajasdeahorro');
    }
}
