<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\Review;
use App\User;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        // 'user_id' => factory(User::class),
        // 'book_id' => factory(Book::class),
        'review' => $faker->numberBetween(1, 10),
        'comment' => $faker->sentence(),
    ];
});
