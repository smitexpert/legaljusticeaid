<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BlogPostCategory;
use App\Model;
use Faker\Generator as Faker;

$factory->define(BlogPostCategory::class, function (Faker $faker) {
    return [
        'cateogry_id' => random_int(1, 20),
        'post_id' => random_int(1, 50)
    ];
});
