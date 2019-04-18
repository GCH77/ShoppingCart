<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TiposDocumentosSeeder::class);
        $this->call(MarcasSeeder::class);
        $this->call(LineasSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(TallasSeeder::class);
        $this->call(GenerosSeeder::class);
        $this->call(ColoresSeeder::class);
        $this->call(PersonaSeeder::class);
    }
}
