<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => 'kodunmi lekan',
        'email' => 'lekan126@gmail.com',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'department' => 'IT',
        'position' => 'head',
        'image' => 'storage/admins/olalekan-omotayo-kodunmi.PNG',
        'email_verified_at' =>  now()
    ];
});
