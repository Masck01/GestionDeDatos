<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaEmpleado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('apellido');
            $table->string('nombre');
            $table->integer('cuit');
            $table->string('email')->nullable();
            $table->string('telefono_celular')->nullable();
            $table->string('telefono_fijo')->nullable();
            $table->string('domicilio')->nullable();
            $table->enum('estado', ['activo','suspendido','baja',])->default('activo');
            $table->date('fecha_ingreso');
            //$table->string('imagenperfil')->nullable();
            //$table->string('nombreusuario',100)->unique();
            //$table->string('passwordusuario');
            //$table->enum('pagina_principal', ['home','visor','ventas','administracion','tecnico','deposito',])->default('home');
            
            //$table->enum('tipousuario', ['admin','usuario','recusos humanos'])->default('cliente');
            $table->bigInteger('sucursal_id')->unsigned();
            $table->bigInteger('categoria_id')->unsigned();
            $table->bigInteger('cajadeahorro_id')->unsigned();
            
            $table->timestamps();

            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categoria')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('cajadeahorro_id')
                  ->references('id')
                  ->on('cajadeahorro')
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
        Schema::dropIfExists('empleado');
    }
}
