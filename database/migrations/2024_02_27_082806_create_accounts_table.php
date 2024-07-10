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
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('chart_of_account_id')->nullable();
            $table->string('account_number')->nullable();
            $table->string('parent_account_number')->nullable();
            $table->string('name');
            $table->string('group');
            $table->boolean('enabled')->default(1);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('chart_of_account_id')->references('id')->on('chart_of_accounts')->onDelete('set null');
            $table->foreign('parent_id')->references('id')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
