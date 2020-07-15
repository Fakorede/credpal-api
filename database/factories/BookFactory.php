<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\Admin;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'authors' => factory(Admin::class),
        'isbn' => $faker->uuid,
        'title' => $faker->words(3, $asText = true),
        'description' => $faker->text,
    ];
});
