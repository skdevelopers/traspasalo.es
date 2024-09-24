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
            $table->bigInteger('gross_revenue')->change();
            $table->bigInteger('ebitda')->change();
            $table->bigInteger('asking_price')->change();
            $table->bigInteger('ff_and_e')->change();
            $table->bigInteger('inventory')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('financials', function (Blueprint $table) {
            //
            $table->decimal('gross_revenue', 10, 2)->chnage();
            $table->decimal('ebitda', 10, 2)->chnage();
            $table->decimal('asking_price', 10, 2)->chnage();
            $table->decimal('ff_and_e', 10, 2)->chnage();
            $table->decimal('inventory', 10, 2)->chnage();
        });
    }
};
