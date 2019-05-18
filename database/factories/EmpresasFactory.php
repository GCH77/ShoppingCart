<?php

use App\Empresa;
use App\Persona;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    return [
        'id_personas' => 2,
        'nit' => $faker->ean8,
        'razon_social' => $faker->company,
        'direccione' => $faker->address
    ];
});
