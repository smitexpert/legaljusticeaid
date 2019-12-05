<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Court;
use App\Http\Controllers\Slug;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Court::class, function (Faker $faker) {
    $name = $faker->unique()->name;
    return [
        'name' => $name,
        'slug' => Slug::slug($name)
    ];
});
