<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColoresProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colores_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_colores');            
            $table->unsignedInteger('id_productos');
            $table->timestamps();
            $table->foreign('id_colores')->references('id')->on('colores');
            $table->foreign('id_productos')->references('id')->on('productos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colores_productos');
    }
}
