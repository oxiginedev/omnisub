<?php

namespace App\Actions\Monnify;

use App\Actions\GenerateReferenceAction;
use App\Models\ReservedAccount;
use App\Models\User;
use App\Services\Monnify\Monnify;
use App\Services\Monnify\Requests\CreateReserveAccountRequest;
use Illuminate\Support\Facades\DB;

class CreateReservedAccountWithMonnifyAction
{
    public function __construct(
        protected Monnify $monnify, 
    ) {}

    public static function create(User $user): void
    {
        $reservedAccounts = static::$monnify->createReservedAccount(
            payload: new CreateReserveAccountRequest(
                accountReference: GenerateReferenceAction::generate(),
                accountName: $user->name,
                customerName: $user->name,
                customerEmail: $user->email,
            ),
        );

        DB::transaction(function () use ($user, $reservedAccounts) {
            foreach ($reservedAccounts as $reservedAccount) {
                ReservedAccount::query()->updateOrCreate([
                    'user_id' => $user->id,
                    'bank_name' => $reservedAccount->bankName,
                    'account_number' => $reservedAccount->accountNumber,
                    'account_name' => $reservedAccount->accountName,
                ]);
            }
        });
    }
}