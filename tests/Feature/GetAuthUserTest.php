<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetAuthUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_be_fetched()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $response = $this->get('/api/auth-user');

        $response->assertStatus(200)
            ->assertJson([
                "data" => [
                    "user_id" => $user->id,
                    "attributes" => [
                        "name" => $user->name,
                    ]
                ],
                "links" => [
                    "self" => url("/users/" . $user->id)
                ]
            ]);
    }
}
