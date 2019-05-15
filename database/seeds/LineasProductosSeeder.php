<?php

use Illuminate\Database\Seeder;

class LineasProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\LineasProducto::class, 3)->create();
    }
}
