<?php

namespace App\Actions\Products;

use App\Factories\AirtimeFactory;

class PurchaseAirtimeAction
{
    public function __construct(
        protected AirtimeFactory $airtimeFactory
    ) {}

    public function purchase(string $provider)
    {
        $this->airtimeFactory->create();
    }
}