<?php

use App\Linea;
use App\Producto;
use App\LineasProducto;
use Faker\Generator as Faker;

$factory->define(LineasProducto::class, function (Faker $faker) {
    return [
        'id_lineas' => Linea::all()->random()->id,
        'id_productos' => Producto::all()->random()->id
    ];
});
