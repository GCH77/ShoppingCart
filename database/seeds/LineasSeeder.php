<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LineasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lineas')->insert([
            'linea' => 'Deportivos',
            'descripcion' => 'Zapatos deportivos para el diario'
        ]);

        DB::table('lineas')->insert([
            'linea' => 'Runner',
            'descripcion' => 'Zapatos hecho para correr'
        ]);

        DB::table('lineas')->insert([
            'linea' => 'Tenis',
            'descripcion' => 'Zapatos para jugar'
        ]);
    }
}
