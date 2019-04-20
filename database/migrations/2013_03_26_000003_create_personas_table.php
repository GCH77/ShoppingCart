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
            $table->unsignedInteger('id_rol');
            $table->string('nombre', 100);
            $table->string('apellidos', 100);
            $table->unsignedInteger('id_tipos_documento')->default(1);
            $table->string('num_documento', 45)->nullable();
            $table->string('direccion', 55)->nullable();
            $table->string('telefono', 45)->nullable();
            $table->string('correo', 100);
            $table->timestamps();

            $table->foreign('id_tipos_documento')->references('id')->on('tipos_documentos');
            $table->foreign('id_rol')->references('id')->on('roles');
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
