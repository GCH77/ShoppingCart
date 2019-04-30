<?php

use Illuminate\Database\Seeder;

class ModulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modulos')->insert([
            'modulo' => 'Usuarios'
        ]);

        DB::table('modulos')->insert([
            'modulo' => 'Productos'
        ]);

        DB::table('modulos')->insert([
            'modulo' => 'Roles'
        ]);

        DB::table('modulos')->insert([
            'modulo' => 'Proveedores'
        ]);

    }
}
