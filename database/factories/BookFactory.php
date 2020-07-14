<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'isbn' => $faker->uuid,
        'title' => $faker->words(3, $asText = true),
        'description' => $faker->text,
    ];
});
