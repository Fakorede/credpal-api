<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use App\Book;
use App\Review;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'admin_id' => factory(Admin::class),
        'review_id' => factory(Review::class),
        'isbn' => $faker->uuid,
        'title' => $faker->words(3, $asText = true),
        'description' => $faker->text,
    ];
});
