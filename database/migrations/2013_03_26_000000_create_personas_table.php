<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->string('apellidos', 100);
            $table->unsignedInteger('id_tipos_documento');
            $table->string('num_documento', 45);
            $table->string('direccion', 55);
            $table->string('telefono', 45);
            $table->string('correo', 100);
            $table->timestamps();

            $table->foreign('id_tipos_documento')->references('id')->on('tipos_documentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
