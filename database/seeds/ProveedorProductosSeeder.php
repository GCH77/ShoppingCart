<?php

use Illuminate\Database\Seeder;

class ProveedorProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProveedorProducto::class, 3)->create();
    }
}
