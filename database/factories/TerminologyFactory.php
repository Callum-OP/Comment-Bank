<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Terminology;
use Faker\Generator as Faker;

$factory->define(Terminology::class, function (Faker $faker) {
    return [
        'comment' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'tone' => $faker->word,   
    ];
});
