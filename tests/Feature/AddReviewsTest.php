<?php

namespace Tests\Feature;

use App\Book;
use App\Review;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddReviewsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function user_can_add_review()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $book = factory(Book::class)->create(["id" => 5]);

        $response = $this->post('/api/books/' . $book->id . '/reviews', [
            "review" => 5,
            "comment" => "Lorem ipsum",
        ]);

        $review = Review::first();

        $this->assertCount(1, Review::all());
        $this->assertEquals($book->id, $review->book_id);
        $this->assertEquals(5, $review->review);
        $this->assertEquals("Lorem ipsum", $review->comment);

        $response->assertStatus(201)
            ->assertJson([
                "data" => [
                    "type" => "reviews",
                    "review_id" => $review->id,
                    "attributes" => [
                        "review" => 5,
                        "comment" => "Lorem ipsum",
                        "user" => [
                            "data" => [
                                "user_id" => $user->id,
                                "attributes" => [
                                    "name" => $user->name,
                                ],
                            ],
                        ],
                    ],
                ],
            ]);
    }

    /** @test */
    public function comment_is_required_for_a_review()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $book = factory(Book::class)->create(["id" => 5]);

        $response = $this->post('/api/books/' . $book->id . '/reviews', [
            "review" => 5,
            "comment" => "",
        ])->assertStatus(422);

        $responseString = json_decode($response->getContent(), true);
        $this->assertArrayHasKey("comment", $responseString["errors"]["meta"]);
    }

    /** @test */
    public function review_is_returned_with_fdv()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $book = factory(Book::class)->create(["id" => 5]);

        $this->post('/api/books/' . $book->id . '/reviews', [
            "review" => 5,
            "comment" => "",
        ]);

        $response = $this->get('/api/books');
    }
}
