<?php

use Illuminate\Database\Seeder;

class FuncionalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funcionalidades')->insert([
            'funcionalidad' => 'Crear'
        ]);

        DB::table('funcionalidades')->insert([
            'funcionalidad' => 'Leer'
        ]);

        DB::table('funcionalidades')->insert([
            'funcionalidad' => 'Actualizar'
        ]);

        DB::table('funcionalidades')->insert([
            'funcionalidad' => 'Borrar'
        ]);
    }
}
