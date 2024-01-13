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
        Schema::create('airtime_purchases', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignIdFor(User::class)->constrained();
            $table->ulid('transaction_id')->unique();
            $table->string('provider');
            $table->string('phone');
            $table->string('network');
            $table->string('amount');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airtime_purchases');
    }
};
