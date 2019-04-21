<?php

use App\Imagene;
use App\Producto;
use Faker\Generator as Faker;

$factory->define(Imagene::class, function (Faker $faker) {
    return [
        'id_productos' => Producto::all()->random()->id,
        'ruta' => $faker->image($dir="C:\laragon\www\shoppingCart\storage\app\public\productos", $width=500, $height=500, 'sports')
    ];
});
