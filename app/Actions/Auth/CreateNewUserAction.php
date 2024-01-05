<?php

namespace App\Actions\Auth;

use App\Enums\Role;
use App\Events\UserReferred;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateNewUserAction
{
    public function create(array $input): User
    {
        $referrer = isset($input['referral_code'])
                        ? User::query()->where('referral_code', $input['referral_code'])->first()
                        : null;

        if ($referrer) {
            UserReferred::dispatch();
        }

        return DB::transaction(function () use ($input, $referrer): User {
            return tap(User::query()->create([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'password' => Hash::make($input['password']),
                'referral_code' => Str::upper(Str::random(6)),
                'referrer_id' => $referrer?->id,
                'role' => Role::USER,
            ]), function (User $user): void {
                $user->wallet()->create();
            });
        });
    }
}