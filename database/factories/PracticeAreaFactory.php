<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Slug;
use App\Model;
use App\PracticeArea;
use Faker\Generator as Faker;

$factory->define(PracticeArea::class, function (Faker $faker) {
    $name = $faker->unique()->name;
    return [
        'name' => $name,
        'slug' => Slug::slug($name)
    ];
});
