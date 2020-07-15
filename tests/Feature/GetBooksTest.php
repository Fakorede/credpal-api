<?php

namespace Tests\Feature;

use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetBooksTest extends TestCase
{
    use RefreshDatabase;

    /**
     * TEST get success
     * TEST status code is 200
     * TEST request body
     */

    /** @test */
    public function user_can_view_books()
    {
        $this->withoutExceptionHandling();

        $books = factory(Book::class, 2)->create();

        $response = $this->get('/api/books');

        $response->assertStatus(200)
            ->assertJson([
                "data" => [
                    [
                        "data" => [
                            "type" => "books",
                            "book_id" => $books->last()->id,
                            "attributes" => [
                                "isbn" => $books->last()->isbn,
                                "title" => $books->last()->title,
                                "description" => $books->last()->description,
                                "admin_id" => $books->last()->user_id,
                            ],
                        ],
                        "links" => [
                            "self" => url('/books/' . $books->last()->id),
                        ],
                    ],
                    [
                        "data" => [
                            "type" => "books",
                            "book_id" => $books->first()->id,
                            "attributes" => [
                                "isbn" => $books->first()->isbn,
                                "title" => $books->first()->title,
                                "description" => $books->first()->description,
                                "admin_id" => $books->last()->user_id,
                            ],
                        ],
                        "links" => [
                            "self" => url('/books/' . $books->first()->id),
                        ],
                    ],
                    "links" => [
                        "self" => url('/books'),
                    ],
                ],
            ]);
    }
}
