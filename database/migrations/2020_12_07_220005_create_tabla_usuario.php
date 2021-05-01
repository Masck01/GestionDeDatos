<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username',100)->unique();
            $table->string('password');
            $table->enum('tipousuario', ['admin','usuario','recusos humanos','ventas'])->default('usuario');
            $table->bigInteger('empleado_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('empleado_id')
                  ->references('id')
                  ->on('empleado')
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
        Schema::dropIfExists('usuarios');
    }
}
