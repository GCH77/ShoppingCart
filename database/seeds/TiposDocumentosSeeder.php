<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposDocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_documentos')->insert([
            'tipo' => 'UD',
            'descripcion' => 'Indefinido'
        ]);

        DB::table('tipos_documentos')->insert([
            'tipo' => 'CC',
            'descripcion' => 'Cedula de ciudadania'
        ]);

        DB::table('tipos_documentos')->insert([
            'tipo' => 'TI',
            'descripcion' => 'Tarjeta de identidad'
        ]);

        DB::table('tipos_documentos')->insert([
            'tipo' => 'TP',
            'descripcion' => 'Tarjeta de pasaporte'
        ]);

        DB::table('tipos_documentos')->insert([
            'tipo' => 'CE',
            'descripcion' => 'Cedula de extranjeria'
        ]);
    }
}
