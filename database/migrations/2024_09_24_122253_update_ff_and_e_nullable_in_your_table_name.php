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
        Schema::table('financials', function (Blueprint $table) {
            //
            $table->bigInteger('gross_revenue')->nullable()->change();
            $table->bigInteger('ebitda')->nullable()->change();
            $table->bigInteger('asking_price')->nullable()->change();
            $table->bigInteger('ff_and_e')->nullable()->change();
            $table->bigInteger('inventory')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('financials', function (Blueprint $table) {
            //
            $table->decimal('gross_revenue', 10, 2)->nullable()->chnage();
            $table->decimal('ebitda', 10, 2)->nullable()->chnage();
            $table->decimal('asking_price', 10, 2)->nullable()->chnage();
            $table->decimal('ff_and_e', 10, 2)->nullable()->chnage();
            $table->decimal('inventory', 10, 2)->nullable()->chnage();
        });
    }
};
