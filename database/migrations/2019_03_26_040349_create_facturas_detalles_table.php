<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_factura');
            $table->unsignedInteger('id_almacen');
            $table->unsignedInteger('cantidad');
            $table->timestamps();

            $table->foreign('id_factura')->references('id')->on('facturas');
            $table->foreign('id_almacen')->references('id')->on('almacenes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas_detalles');
    }
}
