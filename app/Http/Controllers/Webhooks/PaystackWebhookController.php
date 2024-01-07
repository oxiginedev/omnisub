<?php

namespace App\Http\Controllers\Webhooks;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaystackWebhookController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response
    {
        return new Response('webhook handled');
    }
}
