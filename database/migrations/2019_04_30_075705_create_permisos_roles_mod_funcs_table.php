<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosRolesModFuncsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos_roles_mod_funcs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_roles'); 
            $table->unsignedInteger('id_modulos'); 
            $table->unsignedInteger('id_funcionalidades'); 
            $table->timestamps();

            $table->foreign('id_roles')->references('id')->on('roles');
            $table->foreign('id_modulos')->references('id')->on('modulos');
            $table->foreign('id_funcionalidades')->references('id')->on('funcionalidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos_roles_mod_funcs');
    }
}
