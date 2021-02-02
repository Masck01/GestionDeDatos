<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellido');
            //$table->string('imagen_perfil')->nullable();
            //$table->string('username',100)->unique();
            //$table->string('password');
            $table->string('email')->nullable();
            $table->string('telefono_celular')->nullable();
            $table->string('telefono_fijo')->nullable();
            $table->string('domicilio')->nullable();
            $table->date('fecha_ingreso');
            //$table->enum('pagina_principal', ['home','visor','ventas','administracion','tecnico','deposito',])->default('home');
            $table->enum('estado', ['activo','suspendido','baja',])->default('activo');
            //$table->enum('tipo', ['cliente','usuario',])->default('cliente');
            $table->bigInteger('categoria_id')->unsigned();
            $table->bigInteger('cajadeahorro_id')->unsigned();
            $table->bigInteger('sucursal_id')->unsigned();
            $table->timestamps();

            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categorias')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('cajadeahorro_id')
                  ->references('id')
                  ->on('cajasdeahorro')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('sucursal_id')
                  ->references('id')
                  ->on('sucursal')
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
        Schema::dropIfExists('empleados');
    }
}
