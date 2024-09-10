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
        Schema::create('business_employees', function (Blueprint $table) {
            $table->id();

            // Relationship to businesses
            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade');

            // Employee fields
            $table->integer('number_of_employees')->nullable();
            $table->decimal('employee_cost', 10, 2)->nullable(); // Company cost for employees

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
        Schema::dropIfExists('employees');
    }
};
