<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'category_id' => 1,
        'title' => $faker->name,
        'description' => $faker->sentence,
    ];
});
