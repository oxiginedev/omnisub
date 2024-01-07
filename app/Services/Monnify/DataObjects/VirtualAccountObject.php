<?php

namespace App\Services\Monnify\DataObjects;

class VirtualAccountObject
{    
    public function __construct(
        public readonly string $bankCode,
        public readonly string $bankName,
        public readonly string $accountName,
        public readonly string $accountNumber,
    ) {}
    
    /**
     * collection
     *
     * @return array<VirtualAccountObject>
     */
    public static function collection(array $accounts)
    {
        
    } 
}