<?php

namespace App\Services\Monnify\DataObjects;

use App\Enums\TransactionStatus;
use Carbon\Carbon;

class TransactionObject
{
    public function __construct(
        public readonly string $transactionReference,
        public readonly string $paymentReference,
        public readonly float $amountPaid,
        public readonly float $totalPayable,
        public readonly float $settlementAmount,
        public readonly Carbon $paidOn,
        public readonly TransactionStatus $paymentStatus,
        public readonly string $paymentDescription,
        public readonly string $currency,
        public readonly string $paymentMethod,
    ) {
    }

    public static function make(array $payload): self
    {
        return new self(
            transactionReference: strval(data_get($payload, 'transactionReference')),
            paymentReference: strval(data_get($payload, 'paymentReference')),
            amountPaid: floatval(data_get($payload, 'amountPaid')),
            totalPayable: floatval(data_get($payload, 'totalPayable')),
            settlementAmount: floatval(data_get($payload, 'settlementAmount')),
            paidOn: Carbon::parse(data_get($payload, 'paidOn')),
            paymentStatus: TransactionStatus::match(
                value: data_get($payload, 'paymentStatus')
            ),
            paymentDescription: strval(data_get($payload, 'paymentDescription')),
            currency: strval(data_get($payload, 'currency')),
            paymentMethod: strval(data_get($payload, 'paymentMethod'))
        );
    }
}
