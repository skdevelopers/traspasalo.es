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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('entryable_id');
            $table->string('entryable_type');
            $table->unsignedBigInteger('account_id');
            $table->enum('type', ['debit', 'credit']);
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->foreign('account_id')->references('id')->on('accounts');

            $table->index(['entryable_id', 'entryable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
