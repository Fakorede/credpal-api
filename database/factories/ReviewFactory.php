<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use App\User;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'user' => factory(User::class),
        'review' => 5,
        'comment' => 'Lorem ipsum',
    ];
});
