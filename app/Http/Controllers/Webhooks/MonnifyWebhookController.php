<?php

namespace App\Http\Controllers\Webhooks;

use App\Events\MonnifyWebhookHandled;
use App\Events\MonnifyWebhookReceived;
use App\Jobs\ProcessMonnifySuccessfulTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class MonnifyWebhookController
{
    public function __invoke(Request $request): Response
    {
        $payload = $request->all();

        MonnifyWebhookReceived::dispatch($payload);

        $method = Str::studly(data_get($payload, 'eventType'));

        if (method_exists($this, $method)) {
            $response = $this->{$method}($payload);

            MonnifyWebhookHandled::dispatch($payload);

            return $response;
        }

        Log::notice('monnify webhook wasn\'t handled', $payload);

        return new Response();
    }

    protected function handleSuccessfulTransaction(array $payload): Response
    {
        ProcessMonnifySuccessfulTransaction::dispatch($payload);

        return new Response('webhook handled');
    }
}
