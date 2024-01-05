<?php

namespace App\Models;

use App\Casts\MoneyBalance;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wallet extends Model
{
    use HasFactory;
    use HasUlids;

    protected $casts = [
        'available_balance' => MoneyBalance::class,
        'pending_balance' => MoneyBalance::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
