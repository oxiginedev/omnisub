<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reserved_accounts', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('bank_code');
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('account_number');
            $table->timestamps();

            $table->unique([
                'user_id',
                'account_number',
                'bank_name',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserved_accounts');
    }
};
