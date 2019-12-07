<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Advice;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Advice::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(30),
        'details' => $faker->realText(),
        'status' => 1,
        'user_id' => random_int(1, 10)
    ];
});
