<?php

use Illuminate\Database\Seeder;

class ColoresProductosSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ColoresProducto::class, 1)->create();
    }
}
