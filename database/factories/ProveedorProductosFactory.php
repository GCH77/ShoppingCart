<?php

use App\Producto;
use App\Empresa;
use App\ProveedorProducto;
use Faker\Generator as Faker;

$factory->define(App\ProveedorProducto::class, function (Faker $faker) {
    return [
        'id_empresa' => Empresa::all()->random()->id,
        'id_producto' => Producto::all()->random()->id,
        'cantidad' => 10,
        'statusProgress' => 0
    ];
});
