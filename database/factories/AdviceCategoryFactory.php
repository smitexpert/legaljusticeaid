<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AdviceCategory;
use App\Model;
use Faker\Generator as Faker;

$factory->define(AdviceCategory::class, function (Faker $faker) {
    return [
        'practicearea_id' => $faker->numberBetween(1, 60),
        'advice_id' => $faker->unique()->numberBetween(1, 50),
    ];
});
