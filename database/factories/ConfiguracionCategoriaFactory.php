<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Concepto;
use App\ConfiguracionCategoria;
use Faker\Generator as Faker;

$factory->define(ConfiguracionCategoria::class, function (Faker $faker) {
    $concepto = factory(App\Concepto::class)->create();
    $tipo = Concepto::find($concepto->id)->tipo;
    return [
        'montofijo' => ($tipo == 'Haber') ? rand(1, 40) : null,
        'montovariable' => ($tipo == 'Retencion') ? rand(1, 40) : null,
        'unidad' => rand(1, 10),
        'concepto_id' => $concepto->id,
        'categoria_id' => '1',
    ];
});
