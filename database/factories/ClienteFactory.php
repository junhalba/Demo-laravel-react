<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'name' => $faker->text($maxNbChars = 50),
        'money' => $faker->numberBetween($min = 500, $max = 900)
    ];
});
