<?php

namespace Tests\Feature;

use App\Book;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostNewBookTest extends TestCase
{
    use RefreshDatabase;

    /**
     * TEST poster is logged in
     * TEST poster is admin
     * TEST post success
     * TEST status code is 201
     * TEST request body
     */

    /** @test */
    public function user_can_create_a_book()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $response = $this->post('/api/books', [
            "data" => [
                "type" => "books",
                "attributes" => [
                    "isbn" => "9788328302341",
                    "title" => "Clean code",
                    "description" => "Lorem ipsum",
                    // "authors" => [$user->id],
                ],
            ],
        ]);

        $book = Book::first();

        $this->assertEquals($user->id, $book->user_id);
        $this->assertEquals("9788328302341", $book->isbn);
        $this->assertEquals("Clean code", $book->title);
        $this->assertEquals("Lorem ipsum", $book->description);

        $response->assertStatus(201)
            ->assertJson([
                "data" => [
                    "type" => "books",
                    "book_id" => $book->id,
                    "attributes" => [
                        "isbn" => "9788328302341",
                        "title" => "Clean code",
                        "description" => "Lorem ipsum",
                        // "authors" => [
                        //     "data" => [
                        //         "attributes" => [
                        //             "id" => $user->id,
                        //             "name" => $user->name,
                        //             "surname" => $user->surname,
                        //         ]
                        //     ]
                        // ],
                    ],
                ],
                "links" => [
                    "self" => url('/books/' . $book->id),
                ],
            ]);
    }
}
