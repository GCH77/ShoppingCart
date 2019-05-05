<?php

use App\Colore;
use App\Producto;
use App\ColoresProducto;
use Faker\Generator as Faker;

$factory->define(ColoresProducto::class, function (Faker $faker) {
    return [
        'id_colores' => Colore::all()->random()->id,
        'id_productos' => Producto::all()->random()->id
    ];
});
