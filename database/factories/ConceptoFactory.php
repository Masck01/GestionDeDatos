<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Concepto;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Concepto::class, function (Faker $faker) {
    $estado = ['activo', 'inactivo'];
    $tipo = ['haber', 'retencion'];

    return [
        'descripcion' => $faker->jobTitle,
        'tipo' => $tipo[rand(0, 1)],
        'estado' => $estado[rand(0, 1)],
        'updated_at' => now(),
        'created_at' => now()
    ];
});
