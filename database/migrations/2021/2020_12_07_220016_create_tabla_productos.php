<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->string('codigo')->default('0');;
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->date('fecha_vencimiento');
            $table->decimal('precio_compra', 9, 2)->default(0.00);
            $table->decimal('precio_venta', 9, 2)->default(0.00);
            $table->enum('estado', ['Disponible','No Disponible'])->default('Disponible');
            $table->integer('stock');
            //$table->decimal('precioLocalDolares', 9, 2)->default(0.00);
            //$table->decimal('precioLocalDolaresB', 9, 2)->default(0.00);
            $table->bigInteger('almacen_id')->unsigned();
            $table->bigInteger('categoria_id')->unsigned();
            $table->bigInteger('marca_id')->unsigned();
            $table->bigInteger('proveedor_id')->unsigned();
            $table->timestamps();

            $table->foreign('almacen_id')
                  ->references('id')
                  ->on('almacendemedicamentos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            
            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categoriadeproductos')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('marca_id')
                  ->references('id')
                  ->on('marcas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('proveedor_id')
                  ->references('id')
                  ->on('proveedores')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
