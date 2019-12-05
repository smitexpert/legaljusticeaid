<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Controllers\Slug;
use App\Lawyer;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Lawyer::class, function (Faker $faker) {
    $name = $faker->unique()->name;
    return [
        'name' => $name,
        'slug' => Slug::slug($name),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->phoneNumber,
        'location' => $faker->address,
        'experience' => $faker->numberBetween(1, 5),
        'description' => $faker->realText(),
        'gender' => 'male'
    ];
});
