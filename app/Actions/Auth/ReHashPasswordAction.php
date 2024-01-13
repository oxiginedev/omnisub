<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ReHashPasswordAction
{
    public function handle(Request $request, callable $next): mixed
    {
        $user = User::query()->where('id', Auth::id())->first();

        if (! Hash::needsRehash($user->password)) {
            return $next($request);
        }

        $user->password = Hash::make($request->input('password'));

        $user->save();

        return $next($request);
    }
}