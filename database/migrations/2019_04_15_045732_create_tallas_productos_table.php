<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTallasProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tallas_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_tallas');            
            $table->unsignedInteger('id_productos');
            $table->timestamps();

            $table->foreign('id_tallas')->references('id')->on('tallas');
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
        Schema::dropIfExists('tallas_productos');
    }
}
