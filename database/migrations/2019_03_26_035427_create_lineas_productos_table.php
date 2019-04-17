<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineasProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineas_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_lineas');            
            $table->unsignedInteger('id_productos');
            $table->timestamps();

            $table->foreign('id_lineas')->references('id')->on('lineas');
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
        Schema::dropIfExists('lineas_productos');
    }
}
