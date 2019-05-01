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
            'funcionalidad' => 'Create'
        ]);

        DB::table('funcionalidades')->insert([
            'funcionalidad' => 'Read'
        ]);

        DB::table('funcionalidades')->insert([
            'funcionalidad' => 'Update'
        ]);

        DB::table('funcionalidades')->insert([
            'funcionalidad' => 'Delete'
        ]);
    }
}
