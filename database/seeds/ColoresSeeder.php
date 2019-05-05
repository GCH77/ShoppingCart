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
        factory(App\Colore::class, 100)->create();
    }
}
