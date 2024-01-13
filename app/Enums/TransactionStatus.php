<?php

namespace App\Enums;

enum TransactionStatus: string
{
    case SUCCESS = 'success';
    case FAILED = 'failed';
    case PENDING = 'pending';

    public static function match(string $value): TransactionStatus
    {
        return match (true) {
            TransactionStatus::SUCCESS->value => TransactionStatus::SUCCESS,
            TransactionStatus::FAILED->value => TransactionStatus::FAILED,
            TransactionStatus::PENDING->value => TransactionStatus::PENDING,
            'PAID' => TransactionStatus::SUCCESS
        };
    }
}
