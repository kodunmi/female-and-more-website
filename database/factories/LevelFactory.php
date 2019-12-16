<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Level;
use Faker\Generator as Faker;

$factory->define(Level::class, function (Faker $faker) {
    return [
        'level_name' => 'first level',
        'season_number' => 1,
        'level_description' => $faker->realText($maxNbChars = 100 , $indexSize = 5),
        'level_number' => '1'
    ];
});
