<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     */
    public function test_register_screen_can_be_rendered(): void
    {
        $this->get(route('register'))->assertOk();
    }

    public function test_user_can_create_new_account(): void
    {
        $form = [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'password' => 'password'
        ];

        $this->post(route('register'), $form)->assertCreated();

        $this->assertAuthenticated();

        $this->assertDatabaseHas('users', [
            'email' => $form['email']
        ]);

        $this->assertDatabaseCount('users', 1);
    }

    public function test_user_cannot_register_with_existing_email(): void
    {
        $user = User::factory()->roleUser()->create();

        $response = $this->post(route('register'), [
            'name' => $this->faker->name(),
            'email' => $user->email,
            'phone' => $this->faker->phoneNumber(),
            'password' => 'password'
        ]);

        $this->assertGuest();

        $response->assertUnprocessable();
    }
}
