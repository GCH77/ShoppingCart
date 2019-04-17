<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenerosProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generos_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_generos');            
            $table->unsignedInteger('id_productos');
            $table->timestamps();

            $table->foreign('id_generos')->references('id')->on('generos');
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
        Schema::dropIfExists('generos_productos');
    }
}
