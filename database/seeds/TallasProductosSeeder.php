<?php

use Illuminate\Database\Seeder;

class TallasProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TallasProducto::class, 1)->create();
    }
}
