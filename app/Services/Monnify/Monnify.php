<?php

namespace App\Services\Monnify;

use App\Exceptions\MonnifyException;
use App\Services\Monnify\DataObjects\TransactionObject;
use App\Services\Monnify\DataObjects\VirtualAccountObject;
use App\Services\Monnify\Requests\CreateReserveAccountRequest;
use Illuminate\Http\Client\PendingRequest as Client;
use Illuminate\Support\Facades\Http;

class Monnify
{
    protected Client $client;

    public function __construct()
    {
        $this->client = Http::baseUrl(strval(config('services.monnify.url')))
                            ->withToken($this->getAccessToken())
                            ->asJson()
                            ->acceptJson();
    }

    public function createReservedAccount(CreateReserveAccountRequest $payload)
    {
        $response = $this->client->post(
            url: 'api/v2/bank-transfer/reserved-accounts',
            data: array_merge($payload->toArray(), [
                'contractCode' => strval(config('services.monnify.contract_code'))
            ]),
        );

        if ($response->failed()) {
            throw new MonnifyException($response->reason());
        }

        $reservedAccounts = $response->collect('responseBody.accounts')->toArray();

        return VirtualAccountObject::collection($reservedAccounts);
    }
    
    /**
     * Get the status of a transaction
     *
     * @param  string $reference
     * @return TransactionObject
     */
    public function getTransactionStatus(string $reference): TransactionObject
    {
        $response = $this->client->get(`/api/v2/transactions/$reference`);

        if ($response->failed()) {
            throw new MonnifyException($response->reason());
        }

        $decodedResponse = $response->collect('responseBody')->toArray();

        return TransactionObject::make($decodedResponse);
    }
    
    /**
     * Generate access token
     *
     * @return string
     * 
     * @throws MonnifyException
     */
    protected function getAccessToken(): string
    {
        $response = Http::baseUrl(strval(config('services.monnify.url')))
                        ->withBasicAuth(
                            username: strval(config('services.monnify.key')),
                            password: strval(config('services.monnify.secret')),
                        )
                        ->asJson()
                        ->acceptJson()
                        ->post('/api/v1/auth/login');

        if ($response->failed()) {
            throw new MonnifyException($response->reason());
        }

        $decodedResponse = $response->collect()->toArray();

        return strval(data_get($decodedResponse, 'responseBody.accessToken'));
    }   
}