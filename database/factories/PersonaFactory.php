<?php

use App\Persona;
use Faker\Generator as Faker;

$factory->define(Persona::class, function (Faker $faker) {
    return [
        'id_rol' => 1,
        'nombre' => 'Super',
        'apellidos' => 'admin',
        'id_tipos_documento' => 2,
        'num_documento' => '1118754293',
        'direccion' => 'Cll 01 # 20 - 10',
        'telefono' => '320458752',
        'correo' => 'admin@admin.com'
    ];
});
