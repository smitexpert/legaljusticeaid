<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BlogCategory;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(BlogCategory::class, function (Faker $faker) {
    $name = $faker->unique()->name;
    return [
        'name' => $name,
        'slug' => Str::slug($name)
    ];
});
