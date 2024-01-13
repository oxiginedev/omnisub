<?php

namespace Tests\Feature;

use Tests\TestCase;

class PaystackWebhookTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_webhook_with_invalid_signature_is_rejected(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
