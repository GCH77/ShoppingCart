<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marcas')->insert([
            'marca' => 'Adidas'
        ]);

        DB::table('marcas')->insert([
            'marca' => 'Rebook'
        ]);

        DB::table('marcas')->insert([
            'marca' => 'Nike'
        ]);

        DB::table('marcas')->insert([
            'marca' => 'Puma'
        ]);

        DB::table('marcas')->insert([
            'marca' => 'New Balance'
        ]);
    }
}
