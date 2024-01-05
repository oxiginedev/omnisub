<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_authenticated_user_can_logout(): void
    {
        $user = User::factory()->roleUser()->create();

        $response = $this->actingAs($user)->post(route('logout'));

        $this->assertGuest();

        $response->assertRedirect('/');
    }
}
