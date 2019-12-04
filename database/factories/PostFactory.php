<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BlogPost;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(BlogPost::class, function (Faker $faker) {
    $title = $faker->realText(30);
    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'article' => $faker->realText(),
        'user_id' => random_int(1, 10)
    ];
});
