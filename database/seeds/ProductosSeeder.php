<?php

use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Producto::class, 3)->create()->each(
            function($producto){
                DB::table('almacenes')->insert([
                    'id_productos' => $producto->id,
                    'cantidad' => 10,
                    'precio_compra' => random_int(90000, 680500),
                    'precio_venta' => random_int(149900, 857900)
                ]);
            }
        );
    }
}
