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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();

            // Relationship to businesses
            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade');

            // Facilities fields
            $table->decimal('rent', 10, 2)->nullable();
            $table->integer('duration_months')->nullable();
            $table->decimal('property_price', 10, 2)->nullable();
            $table->decimal('pending_mortgage', 10, 2)->nullable();
            $table->string('state_conditions')->nullable();
            $table->string('supplies')->nullable();

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
        Schema::dropIfExists('facilities');
    }
};
