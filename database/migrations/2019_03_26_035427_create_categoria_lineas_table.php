<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaLineasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_lineas', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedInteger('id_marca');
            $table->unsignedInteger('id_linea');            
            $table->unsignedInteger('id_producto');

            // $table->foreign('id_marca')->references('id')->on('marcas');
            $table->foreign('id_linea')->references('id')->on('lineas');
            $table->foreign('id_producto')->references('id')->on('productos');

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
        Schema::dropIfExists('categoria_lineas');
    }
}
