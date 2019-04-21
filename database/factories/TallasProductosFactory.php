<?php

use App\Talla;
use App\Producto;
use App\TallasProducto;
use Faker\Generator as Faker;

$factory->define(TallasProducto::class, function (Faker $faker) {
    return [
        'id_tallas' => Talla::all()->random()->id,
        'id_productos' => Producto::all()->random()->id
    ];
});
