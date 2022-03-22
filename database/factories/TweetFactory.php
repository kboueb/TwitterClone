<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tweet;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    return [
        'title' => $faker->text(21) ,
        'content' => $faker->paragraph,
        'user_id' => $faker->numberBetween(1,5)
    ];
});
