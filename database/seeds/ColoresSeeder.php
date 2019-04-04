<?php

use Illuminate\Database\Seeder;

class ColoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colores')->insert([
            'color' => 'Blanco',
            'hexa' => '#FFFFFF'
        ]);

        DB::table('colores')->insert([
            'color' => 'Negro',
            'hexa' => '#000000'
        ]);

        DB::table('colores')->insert([
            'color' => 'Rojo',
            'hexa' => '#FF0000'
        ]);

        DB::table('colores')->insert([
            'color' => 'Verde',
            'hexa' => '#00FF00'
        ]);

        DB::table('colores')->insert([
            'color' => 'Azul',
            'hexa' => '#0000FF'
        ]);

        DB::table('colores')->insert([
            'color' => 'Amarillo',
            'hexa' => '#FFFF00'
        ]);

        DB::table('colores')->insert([
            'color' => 'Rosado',
            'hexa' => '#FF00FF'
        ]);
    }
}
