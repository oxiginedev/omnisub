<?php

namespace App\Http\Controllers\Webhooks;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MonnifyWebhookController
{
    public function __invoke(Request $request): Response
    {
        return new Response('webhook handled');
    }
}