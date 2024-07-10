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
        Schema::create('journal_entry_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('journal_entry_id')->constrained()->onDelete('cascade');
            $table->morphs('entryable');
            $table->foreignId('account_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['debit', 'credit']);
            $table->decimal('total_amount', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journal_entry_details');
    }
};
