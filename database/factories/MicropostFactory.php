<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Micropost;
use Faker\Generator as Faker;

$factory->define(Micropost::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'content' => $faker->word,
        'created_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
        'updated_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get())
    ];
});
