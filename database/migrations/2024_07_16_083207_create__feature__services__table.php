<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('feature_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('featureables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('feature_service_id');
            $table->unsignedBigInteger('featureable_id');
            $table->string('featureable_type');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('feature_service_id')->references('id')->on('feature_services')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('featureables');
        Schema::dropIfExists('feature_services');
    }
};
