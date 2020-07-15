<?php

namespace Tests\Feature;

use App\Admin;
use App\Book;
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

        $admin = factory(Admin::class)->create();
        $this->actingAs($admin, 'admin');

        $response = $this->post('/api/books', [
            "isbn" => "9788328302341",
            "title" => "Clean code",
            "description" => "Lorem ipsum",
            // "admin_id" => $admin->id,
        ]);

        $book = Book::first();

        $this->assertCount(1, Book::all());
        $this->assertEquals($admin->id, $book->admin_id);
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
                        // "admin_id" => $admin->id
                    ],
                ],
                "links" => [
                    "self" => url('/books/' . $book->id),
                ],
            ]);
    }

    /** @test */
    public function only_valid_admin_users_can_be_made_author()
    {
        $this->withoutExceptionHandling();

        $admin = factory(Admin::class)->create();
        $this->actingAs($admin, 'admin');

        $response = $this->post('/api/books', [
            "data" => [
                "type" => "books",
                "attributes" => [
                    "isbn" => "9788328302341",
                    "title" => "Clean code",
                    "description" => "Lorem ipsum",
                    "authors" => [123],
                ],
            ],
        ])->assertStatus(404);

        $this->assertNull(Book::first());
    }

    /** @test */
    public function admin_id_is_required_for_adding_books()
    {
        $this->withoutExceptionHandling();

        $admin = factory(Admin::class)->create();
        $this->actingAs($admin, 'admin');

        $response = $this->post('/api/books', [
            "data" => [
                "type" => "books",
                "attributes" => [
                    "isbn" => "9788328302341",
                    "title" => "Clean code",
                    "description" => "Lorem ipsum",
                    "admin_id" => '',
                ],
            ],
        ]);

        // dd($response->getContent());
    }
}
