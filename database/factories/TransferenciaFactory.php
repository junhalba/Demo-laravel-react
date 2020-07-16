<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transferencia;
use Faker\Generator as Faker;

$factory->define(Transferencia::class, function (Faker $faker) {
    return [
        'description' => $faker->text($maxNbChars = 200),
        'amount' => $faker->numberBetween($min = 10, $max = 90),
        'cliente_id' => $faker->randomDigitNotNull,
    ];
});
