<?php

use App\Marca;
use App\Genero;
use App\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
    return [
        'nombre' => $faker->company,
        'descripcion' => $faker->text,
        'cod_barras' => $faker->isbn10,
        'estado' => $faker->boolean(50),
        'id_marca' => Marca::all()->random()->id,
        'id_genero' => Genero::all()->random()->id
    ];
});
