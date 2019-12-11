<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Story;
use Faker\Generator as Faker;

$factory->define(Story::class, function (Faker $faker) {
    static $no = 1;
    return [
        'level_id' => '2',
        'story_number' => $no++,
        'story_week_number' => $faker->numberBetween($min = 1, $max = 4),
        'icon_name' => $faker->name,
        'icon_image' => 'images/story.png',
        'icon_career_path' => 'Business',
        'icon_profile' => $faker->realText($maxNbChars = 500 , $indexSize = 5),
        'icon_quote' => $faker->realText($maxNbChars = 100 , $indexSize = 5),
        'icon_experience' => $faker->realText($maxNbChars = 500 , $indexSize = 5),
        'icon_step_to_glory' => $faker->realText($maxNbChars = 500 , $indexSize = 5),
    ];
});
