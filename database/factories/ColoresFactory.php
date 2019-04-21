<?php

use App\Colore;
use Faker\Generator as Faker;

$factory->define(Colore::class, function (Faker $faker) {
    return [
        'color' => $faker->safeColorName,
        'hexa' => $faker->hexcolor
    ];
});
