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
        factory(App\Producto::class, 1)->create()->each(
            function($producto){
                DB::table('almacenes')->insert([
                    'id_productos' => $producto->id,
                    'cantidad' => 10,
                    'precio_compra' => 184200,
                    'precio_venta' => 245600
                ]);
            }
        );
    }
}
