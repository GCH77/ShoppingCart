<?php

use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        factory(App\Empresa::class, 5)->create();
            
    }
}
        