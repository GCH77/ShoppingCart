<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 80);
            $table->string('descripcion', 450);
            $table->string('cod_barras', 30)->nulleable();
            $table->unsignedInteger('id_marca');
            $table->unsignedInteger('id_genero');
            $table->timestamps();

            $table->foreign('id_marca')->references('id')->on('marcas');
            $table->foreign('id_genero')->references('id')->on('generos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
