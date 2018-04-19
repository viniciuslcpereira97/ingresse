<?php

use Faker\Generator as Faker;

$factory->define(Ingresse\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->catchPhrase,
    ];
});
