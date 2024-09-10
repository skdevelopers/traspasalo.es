<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financials', function (Blueprint $table) {
            $table->id();

            // Financial fields
            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade');
            $table->decimal('gross_revenue', 10, 2)->nullable();
            $table->decimal('ebitda', 10, 2)->nullable();
            $table->decimal('asking_price', 10, 2)->nullable();
            $table->decimal('ff_and_e', 10, 2)->nullable();
            $table->decimal('inventory', 10, 2)->nullable();
            $table->year('established')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financials');
    }
};
