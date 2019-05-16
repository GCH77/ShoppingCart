<?php

use App\Empresa;
use App\Persona;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    return [
        'id_personas' => Persona::all()->random()->id,
        'nit' => $faker->ean8,
        'razon_social' => $faker->company,
        'direccion' => $faker->address
    ];
});
