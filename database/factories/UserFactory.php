<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->firstNameMale,
        'country' => $faker->country,
        'state' => $faker->state,
        'image' => 'lekan.jpg',
        'goal_to_greatness' => $faker->realText($maxNbChars = 100 , $indexSize = 5),
        'referral_score' => $faker->numberBetween($min = 10, $max = 100),
        'story_score' => $faker->numberBetween($min = 10, $max = 100),
        'total_score' => $faker->numberBetween($min = 100, $max = 1000),
        'name' => $faker->name,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
