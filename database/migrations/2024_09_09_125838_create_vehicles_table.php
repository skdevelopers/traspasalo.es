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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            // Relationship to businesses
            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade');

            // Vehicle fields
            $table->string('make_and_model');
            $table->year('year')->nullable();
            $table->integer('km')->nullable(); // Kilometers

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
        Schema::dropIfExists('vehicles');
    }
};
