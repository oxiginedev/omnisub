<?php

namespace App\Services\Monnify\Requests;

class CreateReserveAccountRequest
{
    public function __construct(
        public readonly string $accountReference,
        public readonly string $accountName,
        public readonly string $customerName,
        public readonly string $customerEmail,
        public readonly string $currencyCode = 'NGN'
    ) {
    }

    public function toArray(): array
    {
        return [
            'accountReference' => $this->accountReference,
            'accountName' => $this->accountName,
            'customerName' => $this->customerName,
            'customerEmail' => $this->customerEmail,
            'currencyCode' => $this->currencyCode,
        ];
    }
}
