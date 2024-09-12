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
        Schema::create('ff_and_e_s', function (Blueprint $table) {
            $table->id();

            // Relationship to businesses
            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade');

            // FF&E fields
            $table->decimal('price_new', 10, 2)->nullable(); // Price (New)
            $table->decimal('pending_payments', 10, 2)->nullable();
            $table->year('year')->nullable();

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
        Schema::dropIfExists('ff_and_es');
    }
};
