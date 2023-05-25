<?php

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
        Schema::create('monnify_transfers', function (Blueprint $table) {
            $table->id();
            $table->string('bankCode')->nullable();
            $table->decimal('amountPaid', 8, 2)->nullable();
            $table->string('accountName')->nullable();
            $table->string('sessionId')->nullable();
            $table->string('accountNumber')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monnify_transfers');
    }
};
