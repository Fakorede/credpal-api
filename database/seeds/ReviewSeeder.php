<?php

use App\Book;
use App\Review;
use App\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = Book::all();
        $users = User::all();

        $reviews = (int) $this->command->ask('How many reviews would you like?', 5);

        factory(Review::class, $reviews)->make()->each(function ($review) use ($books, $users) {
            $review->user_id = $users->random()->id;
            $review->book_id = $books->random()->id;
            $review->save();
        });
    }
}
